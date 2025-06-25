<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualite">
    <form id="enregistrer-utilisateur" action="users/<?=$action?>" method="post" class="col-xs-12" autocomplete="new-password" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> 
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="users/" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <div class="col-xs-12 col-lg-6">
                        <!-- start content-->
                        <div class="form-group form-checker">
                            <label>Nom</label>
                            <input class="form-control" placeholder="Entrez votre nom :" type="text" value="<?=$user->lastname()?>" data-required="Vous devez spécifier un nom" name="required[alpha][lastname]">
                        </div>
                        <br>
                        <div class="form-group form-checker">
                           <label>Prénom</label>
                           <input class="form-control" placeholder="Entrez votre prénom :" type="text" value="<?=$user->firstname()?>" data-required="Vous devez spécifier un prénom" name="required[alpha][firstname]">
                        </div>
                        <br>
                        <div class="form-group form-checker">
                           <label>Rôle de l'utilisateur</label>
                           <select class="form-control" name="required[user_type]" data-required="Vous devez sélectionner un rôle">
                                <option value="" <?=(empty($user->user_type())) ? "selected" : ""?>>Choisir un rôle</option>
                        <?php
                            foreach(USERS_TYPES as $slug => $type)
                            {
                        ?>
                                <option value="<?=$slug?>" 
                                    <?=$user->user_type() === $slug ? "selected" : ""?> 
                                    <?=($current_user->user_type() === 'contributor' && $slug !== 'contributor') 
                                    || ($current_user->user_type() !== 'superadmin' && $slug === 'superadmin')
                                    ?  "disabled title='Vous ne pouvez pas sélectionner ce rôle'" : ""
                                    ?>
                                >
                                        <?=$type?>
                                </option>
                        <?php
                            }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-offset-1 col-lg-5">
                        <div class="form-group form-checker">
                            <label>Adresse email (login) </label>
                            <input class="form-control" placeholder="Entrez votre email :" type="email" value="<?=$user->email()?>" data-required="Vous devez spécifier une adresse email" name="required[mail][email]" autocomplete="new-password">
                        </div>
                        <br/>
<?php
    if($_GET['action'] === 'edit')
    {
?>
                        <div class="form-group form-checker">
                            <label>Modifier le mot de passe</label>
                            <div class="form_password" password_field>
                                <input class="form-control" id="password" placeholder="Nouveau mot de passe" type="password" name="new_password" autocomplete="new-password">
                                <button class="fa fa-eye" type="button" show_password></button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-checker">
                            <label>Confirmer le nouveau mot de passe</label>
                            <div class="form_password" password_field>
                                <input class="form-control" is_equal_to="#password" placeholder="Confirmer le nouveau mot de passe" type="password" name="new_password_confirm" autocomplete="new-password">
                                <button class="fa fa-eye" type="button" show_password></button>
                            </div>
                        </div>
<?php
    }
    elseif($_GET['action'] === 'new')
    {
?>
                        <div class="form-group form-checker">
                            <label>Mot de passe</label>
                            <div class="form_password" password_field>
                                <input class="form-control" id="password" placeholder="Mot de passe" type="password" data-required="Vous devez spécifier un mot de passe" name="required[password]" autocomplete="new-password">
                                <button class="fa fa-eye" type="button" show_password></button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group form-checker">
                            <label>Confirmer le mot de passe</label>
                            <div class="form_password" password_field>
                                <input class="form-control" is_equal_to="#password" placeholder="Confirmer le mot de passe" type="password" data-required="Vous devez confirmer votre mot de passe" name="required[password_confirm]" autocomplete="new-password">
                                <button class="fa fa-eye" type="button" show_password></button>
                            </div>
                        </div>
<?php
    }
?>
                        
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>