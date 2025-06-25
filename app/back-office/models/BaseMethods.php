<?php

class BaseMethods
{
    // Fonction générale d'hydratation de classe 
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // Fonction de vérification : soit un array, soit une string (array serialisé)
    public function array_or_string($data) {

        if(is_array($data) && !empty($data)) {
            return $data;
        }
        elseif(is_string($data) && is_array(unserialize($data))) {
            return unserialize($data);
        }
    }

    // Fonction de vérification : soit un array, soit une string (array serialisé)
    public function object_or_integer($data) {

        if(is_object($data))
        {
            return $data;
        }
        else
        {
            return $this->integer($data);
        }
    }

    // Fonction de vérification : nombre entier supérieur à 0
    public function integer($data) {

        if(is_numeric($data) && (int) $data > 0) {
            return (int) $data;
        }
    }

    // Fonction de vérification : nombre entier supérieur à 0
    public function string($data) {

        if (is_string($data) && !empty($data)) {
            return $data;
        }
    }

    // Fonction de vérification : date
    public function date_timestamp($data) {

        if (is_string($data) && !empty($data)) {
            {
                $timestamp = strtotime($data);
                $date = date('d-m-Y',$timestamp);
                return $date;
            }
        }
    }

    // Fonction de vérification : booléen (0 / 1)
    public function boolean($data) {

        if(is_numeric($data) && ((int) $data == 0 || (int) $data == 1)) {
            return (int) $data;
        }
    }

    // Fonction de vérification : email
    public function mailAddress($data) {

        if (is_string($data) && !empty($data) && filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return $data;
        }
    }

    // Fonction de vérification : URL Valide
    public function valid_url($data) {

        if (is_string($data) && !empty($data) && filter_var($data, FILTER_VALIDATE_URL)) {
            return $data;
        }
    }

    // ========================================================
    // Récupération des tags au format objet
    // ========================================================
    
    public function get_tags() 
    {
        global $db;

        $tag_manager = new TagManager($db);
        $tags = [];

        if(is_array($this->tags())) {
            
            foreach($this->tags() as $id)
            {
                if(is_numeric($id))
                {
                    $current_tag = $tag_manager->get($id,'tag');
                
                    if($current_tag)
                    {
                        $tags[] = $current_tag;
                    }
                }
            }

            $this->setTags($tags);
        }
    }
    
    // ========================================================
    // Vérifier les tags 
    // -> Suppression des doublons
    // -> Création des tags inexistants
    // -> Renvoi un tableau d'ID 
    // ========================================================
    
    public function normalize_tags() 
    {
        global $db;
        
        $slugs = [];
        $tags_array = [];
        $tags = $this->tags();
        $tools = new Tools();
        $tag_manager = new TagManager($db);
        
        // Suppression des doublons et création des tags inexsitatns (comparaison sur le slug)

        foreach($tags as $key => $tag_name)
        {
            $slug = $tools->createSlug($tag_name);
            
            if(!in_array($slug,$slugs))
            {
                $slugs[] = $slug;

                $tag_exists = $tag_manager->get($slug,'tag');

                if(!$tag_exists) {
                    
                    $new_tag = new Tag([
                        'title' => $tag_name,
                        'slug'  => $slug
                    ]);

                    $tags_array[] = $tag_manager->create($new_tag,'tag');
                }
                else {
                    $tags_array[] = $tag_exists->id_tag();
                }
            }
        }
        
        $this->setTags($tags_array);
    }
    
    // ========================================================
    // Récupération de la category au format objet
    // ========================================================

    public function get_category() 
    {
        global $db;
        if(is_int($this->category())) {

            $manager = new CategoryManager($db);
            $category = $manager->get($this->category(),'category');
            
            // On met à jour l'objet Article
            
            $this->setCategory($category);
        }
    }
}