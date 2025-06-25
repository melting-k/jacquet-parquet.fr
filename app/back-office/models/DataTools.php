<?php
class DataTools
{
    // =================================================================
    // Liste des règles de validation 
    // =================================================================

    private $validationRules = [
        'required' => [
            'type' => 'required',
        ],
        'multiple' => [
            'type' => 'multiple',
        ],
        'alpha' => [
            'type' => 'pattern',
            'pattern' => "/^[A-Za-z'’ èéàùçâêûôîäüöïëÈÉÀÙÇÂÊÛÔÎÄÜÖÏË,-.\/()!?:\";*+]*$/",
        ],
        'alphanum' => [
            'type' => 'pattern',
            'pattern' => "/^[A-Za-z0-9'’ èéàùçâêûôîäüöïëÈÉÀÙÇÂÊÛÔÎÄÜÖÏË,-.°\/()!?:\";*+]*$/",
        ],
        'date' => [
            'type' => 'pattern',
            'pattern' => "/^[\d]{4}\-[\d]{2}\-[\d]{2}$/",
        ],
        'phone' => [
            'type' => 'pattern',
            'pattern' => "/^(?:0|\(?\+33\)?\s?|\+33\(?0\)?|0033\s?)[1-79][\s\.\-]?(?:\d\d[\s\.\-]?){4}$/",
        ],
        'mail' => [
            'type' => 'filter',
            'filter' => FILTER_VALIDATE_EMAIL,
        ],
        'url' => [
            'type' => 'filter',
            'filter' => FILTER_VALIDATE_URL,
        ],

        // Validation des fichiers
        'file' => [
            'type' => 'extension',
            'extensions' => ['pdf'], // Extensions autorisées pour les fichiers PDF
            'upload_dir' => 'uploads/files/', // Répertoire d'upload pour les fichiers
        ],
        'icon' => [
            'type' => 'extension',
            'extensions' => ['svg'], // Extensions autorisées pour les icônes
            'upload_dir' => 'uploads/icons/', // Répertoire d'upload pour les icônes
        ],
        'image' => [
            'type' => 'extension',
            'extensions' => ['jpg', 'png', 'jpeg'], // Extensions autorisées
            'upload_dir' => 'uploads/images/', // Répertoire d'upload
        ]
    ];

    // =================================================================
    // Fusionne récursivement deux tableaux
    // Si les deux valeurs à une même clé sont des tableaux, leur contenu est fusionné.
    // Sinon, la valeur issue du second tableau remplace celle du premier.
    // =================================================================

    private function recursiveMerge(array $a, array $b)
    {
        foreach ($b as $key => $value) {
            if (isset($a[$key]) && is_array($a[$key]) && is_array($value)) {
                $a[$key] = $this->recursiveMerge($a[$key], $value);
            } else {
                $a[$key] = $value;
            }
        }
        return $a;
    }

    // =================================================================
    // Vérification spécifiques des champs de formulaire et renvoi d'un tableau normalisé
    // =================================================================

    public function check_form_fields($post, $files = false)
    {
        $form_data = [];
        $form_state = true;

        // *** On vide la session des données temporaires
        unset($_SESSION['temp_data']);

        // *** Traitement des champs du formulaire ($_POST)
        if (!empty($post)) {
            $this->process_post_fields($post, $form_data, $form_state);
        }

        // *** Traitement des fichiers ($_FILES)
        if (!empty($files)) {
            $normalizedFiles = $this->normalize_files_array($files);
            $this->process_files_fields($normalizedFiles, $form_data, $form_state);
        }

        $this->save_uploaded_files($form_data, $form_state);


        // Retourne les données normalisées ou false en cas d'erreur
        if ($form_state) {
            return $form_data;
        } else {
            $_SESSION['temp_data'] = $form_data;
            return false;
        }
    }

    // =================================================================
    // Parcours du tableau $_POST récursivement avec validations de données
    // =================================================================

    public function process_post_fields($fields, &$form_data, &$form_state, $parent_keys = [])
    {
        foreach ($fields as $key => $value) {
            // Vérifie si la clé correspond à une règle spécifique
            if (isset($this->validationRules[$key])) {
                if (!$this->validateField($key, $value)) {
                    $form_state = false;
                }

                // Continue à descendre dans les niveaux d'imbrication
                if (is_array($value)) {
                    $this->process_post_fields($value, $form_data, $form_state, $parent_keys);
                }
            } else {
                // Si la clé n'est pas une règle spécifique, continue la descente
                if (is_array($value)) {
                    if (!isset($form_data[$key])) {
                        $form_data[$key] = [];
                    }
                    $this->process_post_fields($value, $form_data[$key], $form_state, array_merge($parent_keys, [$key]));
                } else {
                    $form_data[$key] = $value;
                }
            }
        }
    }

    // =================================================================
    // Vérification des champs spéciaux (Données $_POST)
    // =================================================================

    private function validateField($key, $data)
    {
        $rule = $this->validationRules[$key];

        // Si $data est un tableau, applique récursivement la validation
        if (is_array($data)) {
            foreach ($data as $value) {
                if (!$this->validateField($key, $value)) {
                    return false;
                }
            }
            return true; // Si toutes les validations passent
        }

        // Si le champ n'est pas obligatoire et est vide, la validation passe
        if ($rule['type'] !== 'required' && empty($data)) {
            return true;
        }

        // Validation "required"
        if ($rule['type'] === 'required') {
            return !empty($data) || $data === '0'; // Accepte "0" comme valeur valide
        }

        // Validation par pattern
        if ($rule['type'] === 'pattern') {
            return preg_match($rule['pattern'], $data);
        }

        // Validation par filtre PHP
        if ($rule['type'] === 'filter') {
            return filter_var($data, $rule['filter']);
        }

        return true; // Par défaut, la validation passe
    }

    // =================================================================
    // Fonction de normalisation du tableau $_FILES
    // =================================================================

    public function normalize_files_array($files)
    {
        $normalized = [];

        foreach ($files as $key => $fileGroup) {
            if (!is_array($fileGroup)) {
                continue; // Ignore les valeurs non conformes
            }

            // Appelle la fonction récursive pour chaque attribut (name, type, tmp_name, error, size)
            foreach ($fileGroup as $attribute => $values) {
                $this->normalize_recursive($normalized[$key], $values, $attribute);
            }
        }

        return $normalized;
    }

    // =================================================================
    // Parcours récursif des index de tableau pour normaliser $_FILES
    // =================================================================

    private function normalize_recursive(&$output, $values, $attribute)
    {
        if (is_array($values)) {
            foreach ($values as $key => $value) {
                // Appel récursif pour descendre dans les niveaux d'imbrication
                $this->normalize_recursive($output[$key], $value, $attribute);
            }
        } else {
            // Attribue la valeur au niveau actuel
            $output[$attribute] = $values;
        }
    }

    // =================================================================
    // Parcours du tableau $_FILES normalisé de manière récursive
    // Vérification des clés spécifiques
    // Renvoi d'un tableau où les clés spécifiques ont été retirées
    // =================================================================

    public function process_files_fields($files, &$form_data, &$form_state, $applied_rules = [])
    {
        foreach ($files as $key => $value) {
            // Si la clé correspond à une règle de vérification, on l'ajoute aux règles cumulées.
            // On continue ensuite à parcourir les tableaux imbriqués, en ignorant la clé courant qui devra être retirée
            if (isset($this->validationRules[$key])) {
                $new_rules = $applied_rules;
                $new_rules[] = $key;

                $this->process_files_fields($value, $form_data, $form_state, $new_rules);
            } else {
                // La clé n'est pas une clé de vérification, on continue à parcourir les données imbriquées
                if (is_array($value)) {
                    // On vérifie tout d'abord si le tableau $value est un fichier ?
                    if ($this->isFileInfo($value)) {
                        // Vérifier que le fichier est bien valide, si ça n'est pas le cas, on met $form_state en erreur
                        foreach ($applied_rules as $rule) {
                            if (!$this->validateFile($rule, $value)) {
                                $form_state = false;
                            }
                        }
                        // Si le fichier n'est pas vide, alors on réécrit l'index correspondant dans $form_data
                        if ($this->isNotEmptyFile($value)) {
                            // S'il y a des valeur déjà présentes à ne pas écraser, on ajoute les données à celles-ci
                            if(!empty($form_data[$key]) && in_array('multiple',$applied_rules))
                            {
                                $form_data[] = $value;
                            } else {
                                // Sinon, on remplace directement la valeur déjà présente
                                $form_data[$key] = $value;
                            }
                        }
                    } else {
                        // $value n'est pas un fichier, on continue de parcourir les données imbriquées
                        $this->process_files_fields($value, $form_data[$key], $form_state, $applied_rules);
                    }
                }
            }
        }

    }

    // =================================================================
    // Vérifier si un tableau correspond à un file_info
    // =================================================================

    private function isFileInfo($array)
    {
        return is_array($array)
            && isset($array['name'])
            && isset($array['tmp_name'])
            && isset($array['error'])
            && isset($array['size']);
    }

    // =================================================================
    // Vérifier si un fichier n'est pas vide
    // =================================================================

    private function isNotEmptyFile($array)
    {
        return !empty($array['name'])
            && !empty($array['tmp_name'])
            && $array['size'] > 0;
    }

    // =================================================================
    // Vérification des champs spéciaux (Données $_FILES)
    // =================================================================

    private function validateFile($key, $file)
    {
        $rule = $this->validationRules[$key];

        // Vérifie si le fichier est requis
        if ($rule['type'] === 'required') {
            // - La clé 'error' est définie et différente de UPLOAD_ERR_NO_FILE
            if (!isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
                return false;
            }
        }

        // Si le fichier n'est pas requis et qu'il n'a pas été transmis, la validation passe
        if (!isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
            return true;
        }

        // Vérifie si le fichier contient une erreur
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        // Vérifie l'extension si spécifiée
        if ($rule['type'] === 'extension') {
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $rule['extensions'])) {
                return false;
            }
        }

        return true;
    }

    // =================================================================
    // Fonction de parcours de $form_data, une fois normalisé
    // Récupération des règles d'enregistrement
    // Lancement de l'enregistrement des fichiers
    // =================================================================

    public function save_uploaded_files(&$data, &$form_state, $config = [], $config_options = [])
    {
        // Récupération des configurations spécifiques 
        if (isset($data['config'])) {
            $config = $config_options = $data['config'];
        }

        // D'abord, teste si $data correspond à un file info.
        if ($this->isFileInfo($data)) {
            // Traiter le file info : déterminer la règle, enregistrer le fichier, etc.
            $extension = strtolower(pathinfo($data['name'], PATHINFO_EXTENSION));
            $selected_rule = null;
            foreach ($this->validationRules as $rule => $rule_properties) {
                if (isset($rule_properties['extensions']) && in_array($extension, $rule_properties['extensions'])) {
                    $selected_rule = $rule;
                    break;
                }
            }
            if ($selected_rule !== null) {
                $uploadDir = $this->validationRules[$selected_rule]['upload_dir'];
                $savedPath = $this->saveFile($selected_rule, $data, $uploadDir, $config_options);
                if ($savedPath === null) {
                    $form_state = false;
                }
                // Remplace le file info par le chemin relatif du fichier enregistré.
                $data = $savedPath;
            }
            return;
        }

        // Sinon, $data est un conteneur. Tout d'abord, on extrait les options locales.
        if (is_array($data)) {

            // Ensuite, descendre récursivement dans le conteneur.
            foreach ($data as $key => &$value) {
                if (array_key_exists($key, $config_options) && is_array($config_options[$key])) {
                    $config_options = $config_options[$key];
                } elseif (array_key_exists($key, $config) && is_array($config[$key])) {
                    $config_options = $config[$key];
                }
                // Ici, $inherited_options est transmis aux niveaux inférieurs.
                $this->save_uploaded_files($value, $form_state, $config, $config_options);
            }
            return;
        }
    }

    // =================================================================
    // Fonction d'enregistrement des fichiers
    // =================================================================

    private function saveFile($ruleKey, $file, $uploadDir, $options = [])
    {
        // Vérifie si le fichier contient une erreur
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null; // Retourne null en cas d'erreur
        }

        // Crée un nom unique pour le fichier
        $uniqueName = uniqid() . '_' . basename($file['name']);
        $uploadPath = realpath(__DIR__ . '/../..') . '/' . $uploadDir;

        // *** Creation / suppression des repertoires
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777);
        }

        $destination = $uploadPath . $uniqueName;
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Pour le type 'image', en cas d'options width/height/crop, on effectue une opération de redimensionnement
        if (!empty($options) && $extension !== 'svg') {
            $width = isset($options['width']) ? (int) $options['width'] : null;
            $height = isset($options['height']) ? (int) $options['height'] : null;
            $crop = isset($options['crop']) ? (bool) $options['crop'] : false;

            // Appelle la méthode de traitement d'image
            if (!$this->processImage($file['tmp_name'], $destination, $width, $height, $crop)) {
                return null;
            }
        } else {
            // Pour les autres types (file, icon, etc.), on déplace simplement le fichier
            if (!move_uploaded_file($file['tmp_name'], $destination)) {
                return null;
            }
        }

        // Retourne un chemin relatif (par rapport à la racine du site)
        return $uploadDir . $uniqueName;
    }

    // =================================================================
    // Traitement des fichiers images : crop & redimensionnement
    // =================================================================

    private function processImage($sourcePath, $destinationPath, $width = null, $height = null, $crop = false)
    {
        // Chargement du manipulateur d'image
        $manipulator = new ImageManipulator($sourcePath);

        // Redimensionne l'image
        if ($width && $height) {
            $manipulator->resample($width, $height, $crop);

            if ($crop) {
                // Recadre l'image si nécessaire
                $centreX = round($manipulator->getWidth() / 2);
                $centreY = round($manipulator->getHeight() / 2);

                $x1 = $centreX - round($width / 2);
                $y1 = $centreY - round($height / 2);
                $x2 = $centreX + round($width / 2);
                $y2 = $centreY + round($height / 2);

                $manipulator->crop($x1, $y1, $x2, $y2);
            }
        }

        // *** Nettoyage du nom du fichier
        $fileExtension = strtolower(strrchr($destinationPath, "."));

        // Get image type
        if ($fileExtension === '.jpg' || $fileExtension === '.jpeg') {
            $image_type = IMAGETYPE_JPEG;
        } elseif ($fileExtension === '.png') {
            $image_type = IMAGETYPE_PNG;
        }

        // saving file to uploads folder
        $manipulator->save($destinationPath, $image_type);

        return true;
    }
}