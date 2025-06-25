<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row notice">
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Accueil</h3>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <blockquote>
                            <p>
                                Bonjour et bienvenue dans votre espace
                                d'administration.<br />
                                Que souhaitez-vous faire ?
                            </p>
                        </blockquote>
                        <br>
                        <p>
                            <b>Accéder à la liste des courses</b>, avec possibilité de modification, suppression, ou
                            ajout d'un nouvel élément : <br />
                            <a href="races/" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-flag-checkered"></span>&nbsp; GÉRER LES COURSES
                            </a>
                            <br /><br />
                            <b>Accéder à la liste des événements</b>, avec possibilité de
                            modification, suppression, ou ajout d'un nouvel élément :<br />
                            <a href="index.php?page=categories" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-calendar"></span>&nbsp; GÉRER LES ÉVÉNEMENTS
                            </a>
                            <br /><br />
                            <b>Accéder aux utilisateurs</b>, avec possibilité d'ajout d'un nouvel utilisateur, ou de
                            modification / suppression d'un utilisateur existant :<br />
                            <a href="index.php?page=users" class="btn btn-primary" style="margin-top:7px;">
                                <span class="fa fa-user"></span>&nbsp; GÉRER LES UTILISATEURS
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>