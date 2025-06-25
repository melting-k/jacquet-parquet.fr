<?php

$ImagesManager = new ImagesManager($db);

//***********************************************
// Affichage des informations légales
//***********************************************

function images_list(Tools $tools, ImagesManager $manager) 
{
    global $current_user;
    
    // Vérification des droits de l'utilisateur 
    if($current_user->user_type() !== 'superadmin')
    {
        $tools->redirect('/?msgsystem=error_forbidden');
        die();
    }

    $images = $manager->get(1,'images');
    include 'view/ImagesView.php';
}

//***********************************************
// Mise à jour et enregistrement des informations légales
//***********************************************

function edit_images(Tools $tools, DataTools $data_tools, ImagesManager $manager) 
{
    // On vérifie que les données obligatoires sont bien présentes
    $form_data = $data_tools->check_form_fields($_POST, $_FILES);
    
    if($form_data)
    {
        $images = new Images($form_data);
        $manager->update($images,'images');
        $tools->redirect('images/?msgsystem=success_update');
    }
    else
    {
        // Il manque des données obligatoires
        $tools->redirect('images/?msgsystem=warning_error-format');
    }
}
