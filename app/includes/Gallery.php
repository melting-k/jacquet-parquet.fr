<?php

// EXEMPLE
// $galerie = new Galerie("img/realisations/extension-surelevation");
// le nom des dossiers contenu dans img/realisations/extension-surelevation n'a pas d'importance
// le nom des images doit etre précedé d'un numéro ecrit entre parenthes ex (100), (101) etc
// le nom des images sert pour les balises ALT : chaque mot séparé par des tirets et ne surtout pas mattre d'accent ex : (100)
// How to USE
// include 'includes/class.moulinette-image.php';
// $galerie_renovation = new MoulinetteImage("img/entretien/sliders"); /!\ Sans slash à la fin

class Gallery {
    
    // attributs
	protected $path;
    public $images = [];
    
	// constructeur  
	function __construct($path) {
        $this->path = $path;
        if (is_dir($this->path)) {
            $this->getContent();
        }else{
            echo "Le dossier n'existe pas !";
        }
	}

    // getters
    public function getContent() {  

        $allImages = glob("$this->path/*.*", GLOB_BRACE);
        
        asort($allImages);

        $filter = array(".jpg", "-", "_");
        foreach($allImages as $key => $value) {
            // on détermine la balise alt (title)
            $title = str_replace($this->path, "", $value); // on filtre, remplace par des espaces
            $title = str_replace($filter, " ", $title); // on filtre, remplace par des espaces
            $pattern = '/\((\d+)\)/';
            $title = preg_replace($pattern, "", $title); // on filtre, remplace par des espaces
            $title = trim($title,'/');
            
            // On injecte les images dans la vue
            $this->images[] = "<img src='$value' alt='Logo $title'/>";
        }
    } 

}