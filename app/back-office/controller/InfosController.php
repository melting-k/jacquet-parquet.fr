<?php

$InfosManager = new InfosManager($db);

//***********************************************
// Affichage des informations générales
//***********************************************

function infos_list(Tools $tools, InfosManager $manager) 
{
    global $current_user;
    
    // Vérification des droits de l'utilisateur 
    if($current_user->user_type() === 'contributor')
    {
        $tools->redirect('/?msgsystem=error_forbidden');
        die();
    }

    $infos = $manager->get(1,'infos');
    include 'view/InfosView.php';
}

//***********************************************
// Mise à jour et enregistrement des infos générales
//***********************************************

function edit_infos(Tools $tools, DataTools $data_tools, InfosManager $manager) 
{
    // On vérifie que les données obligatoires sont bien présentes
    $form_data = $data_tools->check_form_fields($_POST);
    
    if($form_data)
    {
        $infos = new Infos($form_data);
        $manager->update($infos,'infos');
        $tools->redirect('infos/?msgsystem=success_update');
    }
    else
    {
        // Il manque des données obligatoires
        $tools->redirect('infos/?msgsystem=warning_error-format');
    }
}
