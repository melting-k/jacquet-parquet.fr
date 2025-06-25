<?php

// *** Instanciation des classes

$manager = new UserManager($db);
$UserManager = new UserManager($db);

//***********************************************
// Afficher la liste des users
//***********************************************

function users_list(UserManager $manager) 
{
    $users_list = $manager->lists();
    global $current_user;

    // Filtrage des profils selon les droits de l'utilisateur courant
    foreach($users_list as $id => $user) {
        switch ($current_user->user_type()) 
        {
            case "admin" :
                if($user->user_type() == 'superadmin') {
                    unset($users_list[$id]);
                }
                break;
            case "contributor" :
                if($user->id_user() !== $current_user->id_user()) {
                    unset($users_list[$id]);
                }
                break;
        }
    }

    include (realpath(__DIR__ . '/..') . '/view/UsersListView.php');
}

//***********************************************
// Nouvel utilisateur
//***********************************************

function new_user($tools) 
{
    global $current_user;

    // Vérification des droits de l'utilisateur courant
    if($current_user->user_type() === "contributor")
    {
        $tools->redirect('users/?msgsystem=error_forbidden');
        die();
    }

    // Création de l'objet user (vérification des données temporaires)
    if(!empty($_SESSION['temp_data']))
    {
        $user = new User($_SESSION['temp_data']);
    }
    else
    {
        $user = new User([]);
    }
    
    // Définition des actions
    $action = "create/";
    $title = "Création d'un nouvel utilisateur";
    
    // Inclusion de la vue
    include (realpath(__DIR__ . '/..') . '/view/UsersEditView.php');
}

//***********************************************
// Edition d'un utilisateur
//***********************************************

function edit_user(UserManager $manager, Tools $tools) 
{
    global $current_user;

    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        
        // Récupération de l'utilisateur dans la base de données
        $user = $manager->get($id,'user');

        // Vérification des droits de l'utilisateur courant
        if($current_user->user_type() === "contributor" && $current_user->id_user() !== $user->id_user())
        {
            $tools->redirect('users/?msgsystem=error_forbidden');
            die();
        }
        
        // Vérification des données temporaires
        if(!empty($_SESSION['temp_data']))
        {
            $user = new User($_SESSION['temp_data']);
        }
        
        // Création des variables utiles
        $action = "update/".$id;
        $title = "Edition d'un utilisateur";

        if($current_user->id_user() == $id)
        {
            $title = "Éditer mon profil";
        }

        $_SESSION['edit_user'] = $id;
    
        // Inclusion de la vue
        include (realpath(__DIR__ . '/..') . '/view/UsersEditView.php');
    }
    else
    {
        $tools->redirect('users/?msgsystem=error_unknown');
    }
}

//***********************************************
// Création / update d'un utilisateur dans la database
//***********************************************

function update_user(UserManager $manager, Tools $tools, DataTools $data_tools, $creation) 
{
    global $current_user;

    $form_data = $data_tools->check_form_fields($_POST);
    if($form_data)
    {
        // Création de l'objet User
        $new_user = new User($form_data);

        // Case : création d'un nouvel utilisateur
        if($creation)
        {
            // Vérification des droits de l'utilisateur courant
            if($new_user->user_type() === "superadmin" && $current_user->user_type() !== "superadmin")
            {
                $tools->redirect('users/new/?msgsystem=error_forbidden');
                die();
            }

            // Création de l'objet User et hashage du mot de passe
            $new_user->hash();
            
            // Si le mail existe déjà en base de données, on renvoit à la page précédente
            if($manager->matchMail($new_user->email()))
            {
                $tools->redirect('users/new/?msgsystem=error_existing');
                die();
            }
            
            // Création de l'utilisateur en BDD et renvoi vers la page de succès
            $manager->create($new_user,'user');
            
            $tools->redirect('users/?msgsystem=success_create');
        }

        // Case : update d'un utilisateur existant
        else
        {
            // On vérifie que l'ID transmis est correct et que l'utilisateur existe
            if(
                !empty($_GET['id']) &&
                !empty($_SESSION['edit_user']) && 
                $_SESSION['edit_user'] === $_GET['id']
            )
            {
                // Stockage de l'ID transmis et destruction de la session
                $id = $_GET['id'];
                unset($_SESSION['edit_user']);
                $new_user->setId_user($id);

                // Récupération de l'utilisateur existant avant modification
                $old_user = $manager->get($id,'user');

                // Vérification des droits de l'utilisateur
                if(($new_user->user_type() !== 'contributor' && $current_user->user_type() === 'contributor') 
                || ($new_user->user_type() === "superadmin" && $current_user->user_type() !== "superadmin"))
                {
                    $tools->redirect('users/edit/'.$id.'?msgsystem=error_forbidden');
                    die();
                }

                // Comparaison des mots de passe pour voir s'il a été remplacé
                if(isset($_POST['new_password']) && !empty($_POST['new_password']))
                {
                    $new_user->setPassword($_POST['new_password']);
                    $new_user->hash();
                }
                else 
                {
                    $new_user->setPassword($old_user->password());
                }

                // Update en base de données et redirection vers la page de succès
                $manager->update($new_user,'user');
                $tools->redirect('users/?msgsystem=success_update');
            }

        }
    }
    else 
    {
        // Un ou plusieurs champ(s) ne correspond(ent) pas au(x) format(s) attendu(s)
        $tools->redirect('users/new?msgsystem=warning_error-format');
    }
}

//***********************************************
// Suppression d'un utilisateur
//***********************************************

function delete_user(UserManager $manager, Tools $tools) 
{
    $id = intval($_GET['id']);
    global $current_user;
    
    if($current_user->user_type() === 'contributor' || $current_user->id_user() === $id)
    {
        $tools->redirect('users/?msgsystem=error_forbidden');
        die();
    }
    
    // Récupération de l'ID et vérification de l'existence dans la base de données
    if(!empty($id))
    {
        $manager->delete($id,'user');
        $tools->redirect('users/?msgsystem=success_delete');
        die();
    }
    else
    {
        $tools->redirect('users/?msgsystem=error_unknown');
        die();
    }
}
