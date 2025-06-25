<?php
class EventManager extends Manager
{
    
    // ========================================================
    // Créer des listes personnalisées pour le front-end
    // ========================================================
    
    public function lists($frontend = false, $number = false, $start = 0) 
    {
        // Création du tableau vide
        $events = [];
        
        // Création de la requête SQL qui sera envoyée
        $query = 'SELECT * FROM event';
        
        // Préparation de la requête
        $q = $this->_db->prepare($query);
        
        // Execution de la requête.
        $q->execute();
        
        // Retourne un tableau d'objets de type Race
        while($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
        {
            $events[] = new Event($donnees);
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

            foreach($events as $event) {
                $timestamp = strtotime($event->date_event());

                if($timestamp > $now) {
                    $liste['coming'][] = $event;
                } else {
                    $liste['past'][] = $event;
                }
            }

            usort($liste['coming'], function($a, $b) {
                return strtotime($a->date_event()) <=> strtotime($b->date_event());
            });
            usort($liste['past'], function($a, $b) {
                return strtotime($b->date_event()) <=> strtotime($a->date_event());
            });
            
            $liste = array_merge($liste['coming'],$liste['past']);

        } else {
            // Tri des events par ordre décroissant de dates
            usort($events, function($a, $b) {
                return strtotime($b->date_event()) <=> strtotime($a->date_event());
            });

            $liste = $events;
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
        
        // Renvoi de la liste
        return $return;
    }
}