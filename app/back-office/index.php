<?php
// Include the Main Controller
include 'controller/MainController.php';

// ========================================================
// Routeur : Page Name
// ========================================================

switch ($pageName) {

    // ========================================================
    // Gestion des courses
    // ========================================================

    case 'races':
        include 'controller/RaceController.php';
        switch ($actionName) {
            // Nouvel race
            case 'new':
                new_race();
                break;

            // Création d'un race
            case 'create':
                update_race($RaceManager, $tools, $data_tools, true);
                break;

            // Edition d'un race
            case 'edit':
                edit_race($RaceManager, $tools);
                break;

            // Modification d'un race
            case 'update':
                update_race($RaceManager, $tools, $data_tools, false);
                break;

            // Suppression d'un race
            case 'delete':
                delete_race($RaceManager, $tools);
                break;

            // Par défaut : affichage de la liste des races
            default:
                races_list($RaceManager);
        }
        break;

    
    // ========================================================
    // Gestion des courses
    // ========================================================

    case 'events':
        include 'controller/EventController.php';
        switch ($actionName) {
            // Nouvel event
            case 'new':
                new_event();
                break;

            // Création d'un event
            case 'create':
                update_event($EventManager, $tools, $data_tools, true);
                break;

            // Edition d'un event
            case 'edit':
                edit_event($EventManager, $tools);
                break;

            // Modification d'un event
            case 'update':
                update_event($EventManager, $tools, $data_tools, false);
                break;

            // Suppression d'un event
            case 'delete':
                delete_event($EventManager, $tools);
                break;

            // Par défaut : affichage de la liste des events
            default:
                events_list($EventManager);
        }
        break;

    // ========================================================
    // Gestion du login
    // ========================================================

    case 'identification':
        include 'controller/LoginController.php';
        switch ($actionName) {
            // Login d'un utilisateur 
            case 'login':
                login($UserManager, $tools, $data_tools);
                break;

            // Logout d'un utilisateur 
            case 'logout':
                logout($UserManager, $tools);
                break;

            // Par défaut : affichage du formulaire de login
            default:
                identification($tools);
        }
        break;

    // ========================================================
    // Gestion des informations générales du site
    // ========================================================

    case 'infos':
        include 'controller/InfosController.php';
        switch ($actionName) {
            // Mise à jour de la configuration
            case 'edit':
                edit_infos($tools, $data_tools, $InfosManager);
                break;

            // Par défaut : affichage de la liste des réglages de l'admin
            default:
                infos_list($tools, $InfosManager);
        }
        break;

    // ========================================================
    // Gestion des informations légales du site
    // ========================================================

    case 'legals':
        include 'controller/LegalsController.php';
        switch ($actionName) {
            // Mise à jour de la configuration
            case 'edit':
                edit_legals($tools, $data_tools, $LegalsManager);
                break;

            // Par défaut : affichage de la liste des réglages de l'admin
            default:
                legals_list($tools, $LegalsManager);
        }
        break;

    // ========================================================
    // Gestion des images globales
    // ========================================================

    case 'images':
        include 'controller/ImagesController.php';
        switch ($actionName) {
            // Mise à jour des images
            case 'edit':
                edit_images($tools, $data_tools, $ImagesManager);
                break;

            // Par défaut : affichage de la liste des images avec aperçu de celles-ci
            default:
                images_list($tools, $ImagesManager);
        }
        break;
    // ========================================================
    // Gestion des utilisateurs
    // ========================================================

    case 'users':
        include 'controller/UsersController.php';
        switch ($actionName) {
            // Nouvel utilisateur
            case 'new':
                new_user($tools);
                break;

            // Création d'un utilisateur
            case 'create':
                update_user($UserManager, $tools, $data_tools, true);
                break;

            // Edition des infos d'un utilisateur
            case 'edit':
                edit_user($UserManager, $tools);
                break;

            // Modification d'un utilisateur
            case 'update':
                update_user($UserManager, $tools, $data_tools, false);
                break;

            // Suppression d'un utilisateur
            case 'delete':
                delete_user($UserManager, $tools);
                break;

            // Par défaut : affichage de la liste des utilisateurs
            default:
                users_list($UserManager);
        }
        break;

    // ========================================================
    // Special : Générer des classes depuis la base de données
    // ========================================================

    case 'tables':
        include 'controller/TablesController.php';
        switch ($actionName) {
            // Nouvel utilisateur
            case 'create':
                create_table($TableGenerator, $id);
                break;
        }
        break;

    // ========================================================
    // Default page : afficher la notice
    // ========================================================

    default:
        include 'view/NoticeView.php';
        break;
}