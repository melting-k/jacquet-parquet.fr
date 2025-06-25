<?php

$LegalsManager = new LegalsManager($db);

//***********************************************
// Affichage des informations légales
//***********************************************

function legals_list(Tools $tools, LegalsManager $manager) 
{
    global $current_user;
    
    // Vérification des droits de l'utilisateur 
    if($current_user->user_type() === 'contributor')
    {
        $tools->redirect('/?msgsystem=error_forbidden');
        die();
    }

    $legals = $manager->get(1,'legals');
    include 'view/LegalsView.php';
}

//***********************************************
// Mise à jour et enregistrement des informations légales
//***********************************************

function edit_legals(Tools $tools, DataTools $data_tools, LegalsManager $manager) 
{
    // On vérifie que les données obligatoires sont bien présentes
    $form_data = $data_tools->check_form_fields($_POST);

    if($form_data)
    {
        $legals = new Legals($form_data);
        $manager->update($legals,'legals');
        $tools->redirect('legals/?msgsystem=success_update');
    }
    else
    {
        // Il manque des données obligatoires
        $tools->redirect('legals/?msgsystem=warning_error-format');
    }
}
