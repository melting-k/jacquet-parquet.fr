<?php

// INIT CLASS

$RaceManager = new RaceManager($db);

//***********************************************
// Affichage de la liste
//***********************************************

function races_list(RaceManager $manager) 
{
    global $current_user;

    $races_list = $manager->lists();
    include (realpath(__DIR__ . '/..') . '/view/RacesListView.php');
}

//***********************************************
// Création
//***********************************************

function new_race() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $race = new Race($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $race = new Race([]);
    }

    $race->setRace_date(date('Y-m-d',time()));
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'une nouvelle course";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/RaceEditView.php');
}

//***********************************************
// Modifications
//***********************************************

function edit_race(RaceManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']))
    {
        $id = intval($_GET['id']);
        $race = $manager->get($id, 'race');

        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $race = new Race($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Modification d'une course";
        $_SESSION['edit_race'] = $id;
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/RaceEditView.php');
    }
    else
    {
        $tools->redirect('races/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_race(RaceManager $manager, Tools $tools, DataTools $data_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'races/new';
    }
    else 
    {
        $url_redirect = 'races/edit/'.$_GET['id'];
    }
    
    $form_data = $data_tools->check_form_fields($_POST,$_FILES);
    
    if($form_data)
    {   
        // Création de l'objet Race
        $new_race = new Race($form_data);
        
        // Case : création d'un nouvel race
        if($creation)
        {   
            // Création du domaine d'race en BDD et renvoi vers la page de succès
            $manager->create($new_race, 'race');
            $tools->redirect('races/?msgsystem=success_create');
        }

        // Case : update d'une race existante
        else
        {
            // On vérifie que l'ID transmis est correct et que le race existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_race']) && 
                $_SESSION['edit_race'] == $_GET['id']
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_race']);

                $new_race->setId_race($id);

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_race,'race');
                $tools->redirect('races/?msgsystem=success_update');
            }
        }
    }
    else 
    {
        // Un ou plusieurs champ(s) ne correspond(ent) pas au(x) format(s) attendu(s)
        $tools->redirect($url_redirect.'?msgsystem=warning_error-format');
    }
}

//***********************************************
// Suppression
//***********************************************

function delete_race(RaceManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']))
    {
        $id = intval($_GET['id']);
        $manager->delete($id, 'race');
        $tools->redirect('races/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('races/?msgsystem=error_unknown-element');
    }
}