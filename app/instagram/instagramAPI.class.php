<?php
    class InstagramAPI
    {
        private $_token;
        
        public function __construct() {
            $json = file_get_contents(realpath(__DIR__).'/token.json');
            $object = json_decode($json);
            
            $access_token = $object->access_token;
            $token_expires = $object->expires;
            
            $this->_token = $this->verifyToken($token_expires,$access_token);
            
        }
        
        public function verifyToken($expiration,$token) {
            if(time() > $expiration)
            {
                $token = $this->getNewToken($token);
            }
            return $token;
        }
        
        public function getNewToken($old_token) {
            $route = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=".$old_token;
            $result = $this->api_call_get($route);
            
            $token = $result->access_token;
            $expires = (int) round(time() + $result->expires_in / 2);
            
            $object = (object) array('access_token' => $token,'expires' => $expires);
            file_put_contents(realpath(__DIR__).'/token.json',json_encode($object));
            
            return $token;
        }
        
        public function api_call_get($route) {
            $ch = curl_init();
            if(empty($_SERVER['HTTPS'])) {
                curl_setopt_array($ch, array(
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_URL => $route,
                    CURLOPT_CAINFO => __DIR__ . "/certs/cacert.pem", // ENLEVER CES LIGNES EN PROD
                    CURLOPT_SSL_VERIFYPEER => true // ENLEVER CES LIGNES EN PROD
                ));
            }
            else 
            {
                curl_setopt_array($ch, array(
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_URL => $route
                ));
            }
            $result = curl_exec($ch);
            $result = json_decode($result);
            return $result;
        }
        
        public function get_photos($nb_items) {
            $route = "https://graph.instagram.com/me/media?fields=media_type,media_url&access_token=".$this->_token."&limit=100";
            $photos = $this->api_call_get($route);
            $photo_list = [];
            $i = 0;
            
            foreach($photos->data as $photo) {
                if(($photo->media_type == 'IMAGE' || $photo->media_type == 'CAROUSEL_ALBUM') && $i < $nb_items)
                {
                    $photo_list[] = $photo->media_url;
                    $i ++;
                }
            }
            
            return $photo_list;
        }
        
        public function get_medias($nb_items) {
            $route = "https://graph.instagram.com/me/media?fields=media_type,media_url&access_token=".$this->_token."&limit=100";
            $medias = $this->api_call_get($route);
            $media_list = [];
            $i = 0;
            
            foreach($medias->data as $media) {
                if($i < $nb_items)
                {
                    $media_list[] = $media->media_url;
                    $i ++;
                }
            }
            
            return $media_list;
        }
        
        public function save_session($nb_items, $all = false, $override = false) {
            if(empty($_SESSION['instagram']) || $override)
            {
                if(!$all) 
                {
                    $photos = $this->get_photos($nb_items);
                    $_SESSION['instagram'] = $photos;
                }
                else 
                {
                    $medias = $this->get_medias($nb_items);
                    $_SESSION['instagram'] = $medias;
                }
            }
        }
    }
?>