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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="bg-black" style="">

        <div class="form-box" id="login-box">
            <div class="header">Inscription à Evorganiz</div>
            <form action="<?php echo base_url() ?>AdminLTE/index.html" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="NOM Prénom">
                    </div>
                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="adresse mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="mot de passe">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" class="form-control" placeholder="confirmer mot de passe">
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

    
</body>
    </html>