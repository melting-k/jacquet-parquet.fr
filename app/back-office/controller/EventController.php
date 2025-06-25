<?php

// INIT CLASS

$EventManager = new EventManager($db);

//***********************************************
// Affichage de la liste
//***********************************************

function events_list(EventManager $manager) 
{
    global $current_user;

    $events_list = $manager->lists();
    include (realpath(__DIR__ . '/..') . '/view/EventsListView.php');
}

//***********************************************
// Création
//***********************************************

function new_event() 
{
    // Tentative de récupération de la session temporaire, si existante
    if(!empty($_SESSION['temp_data']))
    {
        $event = new Event($_SESSION['temp_data']);
    }
    // Sinon, création de l'objet vide
    else
    {
        $event = new Event([]);
    }

    $event->setDate_event(date('Y-m-d',time()));
    
    // Définition des actions et variables utiles
    $action = "create/";
    $title = "Création d'un nouvel événement";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/EventEditView.php');
}

//***********************************************
// Modifications
//***********************************************

function edit_event(EventManager $manager, Tools $tools)
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']))
    {
        $id = intval($_GET['id']);
        $event = $manager->get($id, 'event');

        // Tentative de récupération de la session temporaire, si existante
        if(!empty($_SESSION['temp_data']))
        {
            $event = new Event($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Modification d'un événement";
        $_SESSION['edit_event'] = $id;
        
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/EventEditView.php');
    }
    else
    {
        $tools->redirect('events/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update dans la base de données
//***********************************************

function update_event(EventManager $manager, Tools $tools, DataTools $data_tools, $creation) 
{
    // Création de l'URL de redirection en cas d'erreur
    if($creation)
    {
        $url_redirect = 'events/new';
    }
    else 
    {
        $url_redirect = 'events/edit/'.$_GET['id'];
    }
    
    $form_data = $data_tools->check_form_fields($_POST,$_FILES);
    
    if($form_data)
    {   
        // Création de l'objet Event
        $new_event = new Event($form_data);

        // Création et assignation du slug
        $new_event->setSlug($tools->createSlug($new_event->title()));
        
        // Case : création d'un nouvel event
        if($creation)
        {   
            // Création du domaine d'event en BDD et renvoi vers la page de succès
            $manager->create($new_event, 'event');
            $tools->redirect('events/?msgsystem=success_create');
        }

        // Case : update d'une event existante
        else
        {
            // On vérifie que l'ID transmis est correct et que le event existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_event']) && 
                $_SESSION['edit_event'] == $_GET['id']
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_event']);

                $new_event->setId_event($id);

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_event,'event');
                $tools->redirect('events/?msgsystem=success_update');
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

function delete_event(EventManager $manager, Tools $tools) 
{
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']))
    {
        $id = intval($_GET['id']);
        $manager->delete($id, 'event');
        $tools->redirect('events/?msgsystem=success_delete');
    }
    else
    {
        $tools->redirect('events/?msgsystem=error_unknown-element');
    }
}