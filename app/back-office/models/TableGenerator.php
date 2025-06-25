<?php

class TableGenerator extends Manager
{
    public function generateClass($tableName)
    {
        $columns = $this->getColumns($tableName);
        $className = ucfirst($tableName);
        $pageBody = [];

        $classCode = "<?php\n\nclass $className extends BaseMethods\n{\n\n";
        $classCode .= "    public function __construct(array \$donnees)\n    {\n";
        $classCode .= "        \$this->hydrate(\$donnees);\n    }\n\n";

        foreach ($columns as $column) {
            
            $propertyName = $column['Field'];
            $propertyDefault = $column['Default'];
            
            $classCode .= isset($propertyDefault) ? "    private \$_$propertyName = $propertyDefault;\n\n" : "    private \$_$propertyName;\n\n";

            $classCode .= "    public function $propertyName()\n";
            $classCode .= "    {\n";
            $classCode .= "        return \$this->_$propertyName;\n";
            $classCode .= "    }\n\n";

            $classCode .= "    public function set".ucfirst($propertyName)."(\$value)\n";
            $classCode .= "    {\n";
            $classCode .= "        \$this->_$propertyName = \$this->" . $this->getTypeCheckMethod($column) . "(\$value);\n";
            $classCode .= "    }\n\n";

            // Ajout au tableau du constructeur de corps de page si nécessaire
            if(strpos($propertyName,"body_") !== false) {
                $pageBody[] = $propertyName;
            }

            // Vérification de la présence d'un champ "tags"
            if($propertyName == "tags") {
                $hasTags = true;
            }

            // Vérification de la présence d'un champ "category"
            if($propertyName == "category") {
                $hasCategory = true;
            }
        }

        if(!empty($pageBody)) {
            $classCode .= "    public function create_body()\n    {\n";
            $classCode .= "        \$page_body = [];\n\n";

            foreach($pageBody as $key) {
                $key = trim($key,"_");
                $classCode .= "            if(!empty(\$this->_$key)) {\n";
                $classCode .= "                foreach(\$this->_$key as \$index => \$value) {\n";
                $classCode .= "                    \$page_body[\$index]['$key'] = \$value;\n";
                $classCode .= "                }\n";
                $classCode .= "            }\n";
            }
            $classCode .= "         ksort(\$page_body);\n\n";
            $classCode .= "        return \$page_body;\n";
            $classCode .= "     }\n";
        }

        $classCode .= "}\n";

        // Sauvegarde du code dans un fichier (optionnel)
        file_put_contents("models/$className.php", $classCode);

        echo "La classe PHP \"$tableName\" a bien été créée";
    }

    private function getColumns($tableName)
    {
        $stmt = $this->_db->prepare("SHOW TABLES LIKE :table");
        $stmt->bindValue(':table', $tableName);
        $stmt->execute();
        
        // Récupération du résultat
        $query = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($query) {
            $stmt2 = $this->_db->query("SHOW FULL COLUMNS FROM $tableName");
            $columns = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            return $columns;
        }
        else {
            throw new Exception('Cette table n\'existe pas');
        }
    }

    private function getTypeCheckMethod($column)
    {
        $propertyType = $column['Type'];
        $propertyTypeFine = $column['Comment'];

        switch ($propertyType) {
            case 'text':
                return "string";

            case 'longtext':
                return 'array_or_string';

            case 'int(11)':
                if(empty($propertyTypeFine)) {
                    return 'integer';
                } elseif($propertyTypeFine == "object") {
                    return 'object_or_integer';
                }

            case 'tinyint(4)':
                return 'boolean';

            default:
                if(strpos($propertyType,'varchar') !== false) {
                    if(empty($propertyTypeFine)) {
                        return 'string';
                    } else {
                        if($propertyTypeFine == "date") {
                            return 'date_timestamp';
                        }
                        if($propertyTypeFine == "email") {
                            return 'mailAddress';
                        }
                        if($propertyTypeFine == "url") {
                            return 'valid_url';
                        }
                    }
                }
        }
    }
}