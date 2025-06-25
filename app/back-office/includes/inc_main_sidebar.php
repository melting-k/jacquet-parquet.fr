 <body class="nav-md">
     <div class="container body">
         <div class="main_container">
             <div class="col-md-3 left_col menu_fixed">
                 <div class="left_col scroll-view">
                     <div class="navbar nav_title" style="border: 0;">
                         <div class="wrapper-img">
                             <img src="img/logo.png" alt="Logo <?=$infos->client_name()?>" class="">
                         </div>
                         <a href="index.php" class=""><span><?=$infos->client_name()?></span></a>
                     </div>
                     <div class="clearfix"></div>
                     <!-- sidebar menu -->
                     <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                         <div class="menu_section">
                             <ul class="nav side-menu">
                                 <li class="<?=(!isset($_GET['page'])) ? "current-page" : ""; ?>">
                                     <a href=""><i class="fa fa-desktop"></i> Accueil</a>
                                 </li>

                                 <hr>
                                 
                                <li
                                    class="<?=(isset($_GET['page']) && $_GET['page'] == "races") ? "current-page" : "";?>">
                                    <a href="races/"><i class="fa fa-flag-checkered"></i> Courses</a>
                                </li>

                                <hr>

                                <li
                                    class="<?=(isset($_GET['page']) && $_GET['page'] == "events") ? "current-page" : "";?>">
                                    <a href="events/"><i class="fa fa-calendar"></i> Événements</a>
                                </li>
                                                                
                                 <hr>
                                 
                                 <li
                                     class="<?=(isset($_GET['page']) && $_GET['page'] == "users") ? "current-page" : "";?>">
                                     <a href="users/"><i class="fa fa-user"></i> Utilisateurs</a>
                                 </li>
<?php
    if($_SESSION['user']->user_type() !== 'contributor')
    {
?>
                                <li
                                    class="<?=(isset($_GET['page']) && $_GET['page'] == "infos") ? "current-page" : "";?>">
                                    <a href="infos/"><i class="fa fa-info-circle"></i> Infos générales</a>
                                </li>
                                <li
                                    class="<?=(isset($_GET['page']) && $_GET['page'] == "legals") ? "current-page" : "";?>">
                                    <a href="legals/"><i class="fa fa-vcard"></i> Infos légales</a>
                                </li>
<?php
    }
    if($_SESSION['user']->user_type() === 'superadmin')
    {
?>
                                <hr>
                                <li
                                    class="<?=(isset($_GET['page']) && $_GET['page'] == "images") ? "current-page" : "";?>">
                                    <a href="images/"><i class="fa fa-picture-o"></i> Images & Icônes</a>
                                </li>
<?php
    }
?>                            
                                 
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>