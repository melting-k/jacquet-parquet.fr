<?php
$UserManager = new UserManager($db);

// ======================================================== 
// Affichage du formulaire d'identification
// ========================================================

function identification(Tools $tools) 
{
    // Utilisateur logué ? >> Renvoi vers la page d'accueil
    if(!empty($_SESSION['user'])) {
        $tools->redirect('');
    } 
    else
    {
        include 'view/LoginView.php';
    }
}

// ======================================================== 
// Login d'un utilisateur
// ========================================================

function login(UserManager $manager, Tools $tools, DataTools $data_tools) 
{   

    // Vérification que les données correspondent à ce qui est attendu
    $form_data = $data_tools->check_form_fields($_POST); 
    if($form_data)  
    {
        // Vérification que le mail existe dans la base de données
        if($manager->matchMail($form_data['email']))
        {
            // Login de l'utilisateur
            $login = $manager->logIn($form_data['email'],$form_data['password']);
            if($login)
            {
                // Login réussi
                $tools->redirect('?msgsystem=success_logged');
            }
            else
            {
                // Login échoué
                $tools->redirect('identification/?msgsystem=warning_connexion');
            }
        }
        else
        {
            // Le mail n'existe pas dans la base de données
            $tools->redirect('identification/?msgsystem=warning_connexion');
        }
    }
    else
    {
        // Les données transmises ne correspondent pas aux patterns attendus
        $tools->redirect('identification/?msgsystem=warning_error-format');
    }
}

// ======================================================== 
// Logout d'un utilisateur
// ========================================================

function logout(UserManager $manager, Tools $tools) 
{   
    $manager->logOut();
    $tools->redirect('identification/?msgsystem=info_unlogged');
}