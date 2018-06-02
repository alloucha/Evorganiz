<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo site_url()?>AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- font Awesome -->
        <link href="<?php echo site_url()?>AdminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Ionicons -->
        <link href="<?php echo site_url()?>AdminLTE/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <!-- Morris chart -->
        <link href="<?php echo site_url()?>AdminLTE/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo site_url()?>AdminLTE/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo site_url()?>AdminLTE/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo site_url()?>AdminLTE/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo site_url()?>AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo site_url()?>AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link rel="icon" href="<?php echo site_url()?>AdminLTE/logo.png">


    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 ~  E v o r g a n i z ~
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> 
                                    <?php 
                                    foreach ($userInfo as $user) {
                                        
                                        $lastnameUser = $user->lastnameUser;
                                        $firstnameUser = $user->firstnameUser;
                                        $sexUser = $user->sexUser;
                                        $username = $user->username;
                                        $idUser = $user->idUser;

                                        echo ($lastnameUser . ' ' . $firstnameUser); 
                                    }
                                    ?>

                                <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">

                                    <?php

                                        if ($sexUser=='NotDefined') {
                                            echo '<img src="'. site_url() . 'AdminLTE/img/user-bg.png" class="img-circle" alt="User Image" />';
                                        } elseif ($sexUser=='Homme') {
                                            echo '<img src="'. site_url() . 'AdminLTE/img/avatar5.png" class="img-circle" alt="User Image" />';
                                        } else {
                                            echo '<img src="'. site_url() . 'AdminLTE/img/avatar2.png" class="img-circle" alt="User Image" />';
                                        }

                                    ?>

                                    
                                    <p>
                                        <?php echo ($lastnameUser . ' ' . $firstnameUser); ?>

                                        <small><?php echo $username; ?></small>

                                        <small><?php if ($sexUser=='Homme' || $sexUser=='Femme'){ echo $sexUser;}?></small>
                                    </p>
                                </li>
                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                     
                                    
                                    
                                    <?php
                                        echo '<div class="pull-left">

                                        <a class="btn btn-default btn-flat dropdown-toggle" data-toggle="modal" href="#editUserModal_' . $idUser .'" role="button">Modifier</a>
                                        </div>';

                                        ?>
                                    





                                    
                                    <div class="pull-right">
                                        <a href="Login/logout" class="btn btn-default btn-flat">Se déconnecter</a>
                                    </div>


                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>


        <?php
        $isMan ="";
        $isWoman ="";
        if ($sexUser=='Homme'){ $isMan = 'checked'; } 
        if ($sexUser=='Femme'){ $isWoman = 'checked';}

        $modalEditUser ='
            <div class="modal fade" id="editUserModal_' . $idUser .'"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="exampleModalLabel">Modifier mon profil</h5>
                        </div>
            
                        <form method="POST" action="' . site_url("User/editUser") . '">
                            
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="lastnameToEdit">NOM : </label>
                                    <input type="text" value="' . $lastnameUser . '" class="form-control" name="lastnameToEdit" placeholder="Entrer le nom">

                                     <label for="firstnameToEdit">Prénom : </label>
                                    <input type="text" value="' . $firstnameUser . '" class="form-control" name="firstnameToEdit" placeholder="Entrer le prénom">
                                </div>
                                <div form-inline>
                                    <label class="radio-inline"><input type="radio" name="sexToEdit" value="Homme" ' . $isMan . '> Homme</label>
                                    <label class="radio-inline"><input type="radio" name="sexToEdit" value="Femme" ' . $isWoman . '> Femme</label>

                                </div>

                            </div>
            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-warning">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

            echo $modalEditUser;
        ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <?php

                                if ($sexUser=='NotDefined') {
                                    echo '<img src="'. site_url() . 'AdminLTE/img/user-bg.png" class="img-circle" alt="User Image" />';
                                } elseif ($sexUser=='Homme') {
                                    echo '<img src="'. site_url() . 'AdminLTE/img/avatar5.png" class="img-circle" alt="User Image" />';
                                } else {
                                    echo '<img src="'. site_url() . 'AdminLTE/img/avatar2.png" class="img-circle" alt="User Image" />';
                                }

                            ?>
                        </div>
                        <div class="pull-left info">
                            <p>Bonjour <?php echo $firstnameUser; ?></p>

                            
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="Events">
                                <i class="fa fa-dashboard"></i> 
                                <span>Evenements</span>
                            </a>
                        </li>
                        <li>
                            <a href="Contact">
                                <i class="fa fa-group"></i> <span>Liste Contacts</span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-barcode"></i>
                                <span>Achats</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                             <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Décoration</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Art de la table</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Voiture</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Salle</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Souvenir</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i> Autre</a></li>
                            </ul>
                    
                        </li>
                    
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cutlery"> </i> <span>Repas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu"> 
                                <li><a href="Meal"><i class="fa fa-angle-double-right"></i> Tous</a></li>
                                <li><a href="Meal?typeMeal=Apéritif"><i class="fa fa-angle-double-right"></i> Apéritif</a></li>
                                <li><a href="Meal?typeMeal=Entrée"><i class="fa fa-angle-double-right"></i> Entrée</a></li>
                                <li><a href="Meal?typeMeal=Plat"><i class="fa fa-angle-double-right"></i> Plat</a></li>
                                <li><a href="Meal?typeMeal=Dessert"><i class="fa fa-angle-double-right"></i> Dessert</a></li>
                                <li><a href="Meal?typeMeal=Boisson"><i class="fa fa-angle-double-right"></i> Boisson</a></li>
                                <li><a href="Meal?typeMeal=Autre"><i class="fa fa-angle-double-right"></i> Autre</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="AdminLTE/pages/calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendrier</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $title?>
                        
                    </h1>
                
                </section>

                <!-- Main content -->
              
                <section class="content" >

                    <?php echo $page; ?>

                </section>
                      

                    

                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

          <!-- jQuery 2.0.2 -->
        <script src="<?php echo site_url()?>AdminLTE/js/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script src="<?php echo site_url()?>AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo site_url()?>AdminLTE/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        
        <!-- daterangepicker -->
        <script src="<?php echo site_url()?>AdminLTE/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo site_url()?>AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo site_url()?>AdminLTE/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo site_url()?>AdminLTE/js/AdminLTE/app.js" type="text/javascript"></script>
    </body>
</html>