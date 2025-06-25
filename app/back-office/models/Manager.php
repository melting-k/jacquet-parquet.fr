<?php
class Manager 
{
    // ========================================================
    // Définition des propriétés de base
    // ========================================================
    
    protected $_db;
    
    // ========================================================
    // Création du constructeur
    // ========================================================
    
    public function __construct($db) 
    {
        $this->setDb($db);
    }
    
    // ========================================================
    // Assignation de la requête PDO à la propriété $_db
    // ========================================================
    
    protected function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    // ========================================================
    // Ajout d'un élément
    // ========================================================
    
    public function create(object $item, string $table)
    {
        $columns = [];
        $values = [];

        $reflection_object = new ReflectionClass($item);
        $properties = $reflection_object->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $key = trim($property->getName(), '_');
            $columns[] = $key;
            $values[] = ':' . $key;
        }

        // Préparation de la requête à executer pour ajouter un article.
        $sql = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES(" . implode(', ', $values) . ")";
        $q = $this->_db->prepare($sql);

        foreach($properties as $property) {
            $property->setAccessible(true);
            $value = is_array($property->getValue($item)) ? serialize($property->getValue($item)) : $property->getValue($item);
            $key = trim($property->getName(),'_');
            $q->bindValue(':'.$key, $value);
        }

        // Execution de la requête
        $q->execute();
        
        // Renvoie le dernier ID inséré en base de données
        return $this->_db->lastInsertId();
    }

    // ========================================================
    // Update d'un élément
    // ========================================================
    
    public function update(object $item, string $table)
    {
        $this->delete_old_files($item, $table, false);
        
        $cols_and_values = '';

        $reflection_object = new ReflectionClass($item);
        $properties = $reflection_object->getProperties();

        $primary = trim($properties[0]->getName(), '_');

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $key = trim($property->getName(), '_');
            $cols_and_values .= ($cols_and_values ? ', ' : '') . $key . ' = :' .$key;  
        }

        $sql = "UPDATE $table SET $cols_and_values WHERE $primary = :$primary";
        $q = $this->_db->prepare($sql);
        
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $key = trim($property->getName(),'_');
            $value = is_array($property->getValue($item)) ? serialize($property->getValue($item)) : $property->getValue($item);
            $q->bindValue(':'.$key, $value);
        }

        $q->execute();

        return true;
    }

    // ========================================================
    // Suppression d'un élément
    // ========================================================
    
    public function delete($id, string $table)
    {
        $primary = "id_".$table;
        
        $item = $this->get($id, $table);
        $this->delete_old_files($item, $table, true);

        $sql = "DELETE FROM $table WHERE $primary = :id";
        $q = $this->_db->prepare($sql);
        
        // Assignation des valeurs
        $q->bindValue(':id',$id);
        
        // Execution de la requête.
        $q->execute();
    }
    

    // ========================================================
    // Récupération d'un élément
    // ========================================================

    public function get($id, string $table) {
        
        $primary = "id_".$table;
        $className = ucfirst($table);
        
        if(is_numeric($id)) // Récupération via l'ID
        {
            $query = "SELECT * FROM $table WHERE $primary = :id";
        }
        else // Récupération via le slug
        {
            $query = "SELECT * FROM $table WHERE slug = :id";
        }

        $q = $this->_db->prepare($query);
        $q->bindValue(':id', $id);
        $q->execute();
        
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        if(!$donnees)
        {
            return false;
        }
        else
        {
            return new $className($donnees);
        }
    }

    public function delete_old_files(object $item, $table, $delete = false)
    {
        $primary = "id_".$table;
        $images = $this->getFilesCollections($item);

        if(!$delete) {
            $item_old = $this->get($item->$primary(),$table);
            
            $old_images = $this->getFilesCollections($item_old);
        }
        else {
            $old_images = $images;
            $images = [];
        }

        // Suppression des anciennes images si elles ne sont plus utilisées
        $images_to_delete = array_diff($old_images, $images);
        
        if(!empty($images_to_delete)) {
            foreach ($images_to_delete as $image) {
                if(realpath(__DIR__ . '/../../' . $image))
                {
                    unlink(realpath(__DIR__ . '/../../' . $image));
                }
            }
        }
    }

    // =========================================================
    // Parcourt récursivement les propriétés de l'objet $item et retourne toutes les chaînes contenant "uploads/".
    // =========================================================

    public function getFilesCollections(object $item): array
    {
        $images = [];
        $this->collectFilesRecursive($item, $images);
        
        return $images;
    }

    // =========================================================
    // Fonction récursive qui collecte dans $images toutes les chaînes trouvées
    // qui contiennent "uploads/". Elle accepte aussi des tableaux et des objets.
    // =========================================================

    private function collectFilesRecursive($data, &$images)
    {
        if (is_string($data)) {
            // Si c'est une chaîne et qu'elle contient "uploads/", on l'ajoute.
            if (strpos($data, 'uploads/') !== false) {
                $images[] = $data;
            }
        } elseif (is_array($data)) {
            // Si c'est un tableau, on parcourt chacune de ses valeurs.
            foreach ($data as $value) {
                $this->collectFilesRecursive($value, $images);
            }
        } elseif (is_object($data)) {
            // Pour les objets, on utilise la reflection pour accéder aux propriétés.
            $reflection = new ReflectionObject($data);
            foreach ($reflection->getProperties() as $property) {
                $property->setAccessible(true);
                $value = $property->getValue($data);
                $this->collectFilesRecursive($value, $images);
            }
        }
    }
}