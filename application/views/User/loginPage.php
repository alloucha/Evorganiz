<!DOCTYPE html>
<html class="bg-black"><head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url() ?>/AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- font Awesome -->
        <link href="<?php echo base_url() ?>/AdminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Theme style -->
        <link href="<?php echo base_url() ?>/AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css">

        <link rel="icon" href="<?php echo base_url() ?>/AdminLTE/logo.png">

    </head>
    <body class="bg-black" style="">

        <div class="form-box" id="login-box">
            <div class="header">Identification à Evorganiz </div>
            <form action="<?php echo base_url('Login/login')?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" test class="form-control" placeholder="identifiant" <?php if (isset($usernameAlreadyUsed)){ echo 'value="' . $usernameAlreadyUsed . '"' ; } ?>>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="mot de passe">
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">s'identifier</button>  
                    
                    <a href="Register" class="text-center">Nouveau membre ? S'inscrire</a>
                </div>
            </form>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url()?>/AdminLTE/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url() ?>/AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>        
    
</body></html>