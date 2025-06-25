        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i> <?=$_SESSION['user']->firstname().' '.$_SESSION['user']->lastname()?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="users/edit/<?=$_SESSION['user']->id_user()?>/"><i class="fa fa-pencil pull-right"></i> Mon profil</a></li>
                    <li><a href="identification/logout/"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a></li>
                  </ul>
                </li>
                <li>
                   <a href="<?=$infos->site_url()?>" target="_blank" class="hidden-xs">
                    <i class="fa fa-desktop"></i> Voir site
                  </a> 
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">