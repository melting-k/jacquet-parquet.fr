<?php
class RaceManager extends Manager
{
    
    // ========================================================
    // Créer des listes personnalisées pour le front-end
    // ========================================================
    
    public function lists($id_category = false, $frontend = false, $number = false, $start = 0) 
    {
        // Création du tableau vide
        $races = [];
        
        // Création de la requête SQL qui sera envoyée
        $query = 'SELECT * FROM race ';
        
        // Cas 1 : Tri par catégorie (course / épreuve de la saison)
        if($id_category)
        {
            $query .= "WHERE category='".$id_category."'";
        }

        // Préparation de la requête
        $q = $this->_db->prepare($query);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Race
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $races[] = new Race($donnees);
        }

        // Tri pour le front-end :
        // On classe les événements à venir par ordre croissant (présent > futur)
        // On classe les événements passés par ordre décroissant (présent > passé)
        // Sinon : on trie l'ensemble par ordre décroissant (futur > présent > passé)
        
        if($frontend) {
            $now = time();
            $liste = [
                'coming' => [],
                'past' => []
            ];

            foreach($races as $race) {
                $timestamp = strtotime($race->race_date());

                if($timestamp > $now) {
                    $liste['coming'][] = $race;
                } else {
                    $liste['past'][] = $race;
                }
            }

            usort($liste['coming'], function($a, $b) {
                return strtotime($a->race_date()) <=> strtotime($b->race_date());
            });
            usort($liste['past'], function($a, $b) {
                return strtotime($b->race_date()) <=> strtotime($a->race_date());
            });

            $liste = array_merge($liste['coming'],$liste['past']);

        } else {
            // Tri des courses par ordre décroissant de dates
            usort($races, function($a, $b) {
                return strtotime($b->race_date()) <=> strtotime($a->race_date());
            });

            $liste = $races;
        }

        // Nombre défini d'éléments à renvoyer

        if($number) {

            $return = [];
            
            $start = (int) $start;  
            $number = (int) $number;
            
            $end = $start + $number; 
            for($i=$start;$i<$end;$i++)
            {
                if(isset($liste[$i]))
                {
                    $return[] = $liste[$i];
                }
            }
        }
        else 
        {
            $return = $liste;
        }
        
        // Renvoi de la liste des courses
        return $return;
    }
}