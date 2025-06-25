<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';
?>
<!-- start content  -->
<div class="row actualites">
    <div class="col-xs-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Utilisateurs</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right text-right"> 
<?php
    if($current_user->user_type() !== 'contributor') {
?>
                    <a href="users/new/" class="btn btn-success">Ajouter un utilisateur</a>
<?php
    }
?>
                    
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <!-- start projet list -->
                    <table class="table table-responsive table-striped projets">
                      <thead>
                        <tr>
                          <th>Nom complet</th>
                          <th>Rôle</th>
                          <th>Email</th>
                          <th style="width: auto; text-align:right"></th>
                        </tr>
                      </thead>
                      <tbody>
                <?php
                    if(!empty($users_list))
                    {
                        foreach($users_list as $user)
                        {
                ?>
                        <tr>
                            <td><strong><?=$user->firstname()." ".$user->lastname()?></strong></td>
                            <td><strong><?=USERS_TYPES[$user->user_type()]?></strong></td>
                            <td><strong><?=$user->email()?></strong></td>
                            <td style="text-align:right">
                                <form method="post" class="edition">
                                    <a href="users/edit/<?=$user->id_user()?>" class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil"></i>&nbsp;&nbsp;Éditer <?=$current_user->id_user() === $user->id_user() ? 'mon profil' : ''?>
                                    </a>
<?php
    if($current_user->user_type() !== 'contributor' && $current_user->id_user() !== $user->id_user()) {
?>                                    
                                    <button id="<?=$user->id_user()?>" class="btn btn-danger btn-xs delete-post" type="button" data-toggle="modal" data-target=".modal-delete">
                                        <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer
                                    </button>
<?php
    }
?>                                       
                                </form>
                            </td>
                        </tr>
                        
                        <?php 
                            }
                          }
                          else
                          {
                        ?>
                        <tr>
                            <td colspan="3">
                                <p class="center">
                                    <br/>Il n'y a pas encore d'utilisateurs enregistrés.
                                </p>
                            </td>
                        </tr>
                        <?php
                              
                          }
                        ?>
                      </tbody>
                    </table>
                    <!-- end projet list -->

                  </div>
                </div>
            </div>
        </div>
      </div>
</div>

<!-- modal -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">EFFACER</h4> </div>
            <div class="modal-body">
                <h4>Supprimer cet utilisateur ?</h4>
                <p>
                    Vous êtes sur le point de supprimer cet utilisateur.<br/>
                    <strong>Cette opération est irréversible.</strong><br/>
                    Souhaitez-vous continuer ?
                </p>
            </div>
            <form class="modal-footer" method="get" action="index.php">
                <input id="page" type="hidden" name="page" value="users">
                <input id="action" type="hidden" name="action" value="delete">
                <input id="id" type="hidden" name="id" value="4">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Confirmer</button>
            </form>
        </div>
    </div>
</div>
<!-- /modal -->

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>