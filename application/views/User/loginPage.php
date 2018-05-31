<!DOCTYPE html>
<html class="bg-black"><head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url() ?>AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- font Awesome -->
        <link href="<?php echo base_url() ?>AdminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?php echo base_url() ?>AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="<?php echo base_url() ?>AdminLTE/logo.png">

    </head>
    <body class="bg-black" style="">

        <div class="form-box" id="login-box">
            <div class="header">Identification à Evorganiz</div>
            <form action="<?php echo site_url('Login/checkUser')?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="mailUser" test class="form-control" placeholder="adresse mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="passwordUser" class="form-control" placeholder="mot de passe">
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"> Se souvenir de moi
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">s'identifier</button>  
                    
                    <p><a href="#">Mot de passe oublié</a></p>
                    
                    <a href="Register" class="text-center">Nouveau membre ? S'inscrire</a>
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>        

    
</body></html>