<!DOCTYPE html>
<html class="bg-black"><head>
        <meta charset="UTF-8">
        <title>Inscription</title>
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
            <div class="header">Inscription à Evorganiz</div>
            <form action="<?php echo site_url('Register/addUser')?>" method="post" data-toggle="validator" role="form">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="lastnameUser" class="form-control" placeholder="NOM">
                        <input type="text" name="firstnameUser" class="form-control" placeholder="Prénom">  
                    </div>
                    <div class="form-group">
                        <input type="email" name="mailUser" class="form-control" placeholder="adresse mail*" data-error="adresse mail invalide" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" data-minlength="6" name="passwordUser" id="inputPassword" class="form-control" placeholder="mot de passe*" required>
                        <div class="help-block with-errors"></div>                        
                    </div>
                    <div class="form-group">
                        <input type="password" data-minlength="6" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Ouuups, les mots de passe ne correspondent pas !" placeholder="confirmer mot de passe*" required>
                        <div class="help-block">Minimum 6 caractères</div>
                        <div class="help-block with-errors"></div>
                      </div>

                </div>
                <div class="footer">                    

                    <button type="submit" class="btn bg-olive btn-block">m'inscrire</button>

                    <a href="Login" class="text-center">J'ai déjà un compte</a>
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    </body>
</html>