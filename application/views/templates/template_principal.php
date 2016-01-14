
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="bigpraxis - Exercises to reinforce learning">
    <meta name="author" content="Suma Ventas Consultores">

    <title>Bigpraxis</title>

    <link rel="shortcut icon" href="/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- Custom CSS -->
    <link href="<?= base_url('css/principal.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/sweetalert.css')?>"> 
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>
<header>
    <!-- Navigation -->
    <nav class="barnav navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle btniconbar" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('principal'); ?>"><img class="img-responsive logo" src="<?= base_url('img/logo.png')?>"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><?= anchor('principal/profesores','<i class="fa fa-group txtmenu"> Teachers</i>');?></li>
                    <li><?= anchor('principal/estudiantes','<i class="fa fa-book txtmenu"> Students</i>');?></li>
                </ul>
            </div>
        
        </div>
        <!-- /.container -->
    </nav>  
</header>
    

    <!-- Page Content -->
    <div class="container" id="principal">

        <?php $this->load->view($contenido); ?>

    </div>
    <!-- /.container -->

        <!-- Footer -->
    <footer>
        <nav class="navbar navbar-default navbar-fixed-bottom navfooter">
              <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-sm-10 col-xs-8">
                            <p class="txtsv">Copyright &copy; Suma Ventas Consultores 2016</p>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-xs-4 text-right ">
                            <ul class="list-inline">
                                <li><a href="https://www.facebook.com/sumaventas"><i class="fa fa-facebook-official fa-2x txtfooter tw-icon"></i></a></li>
                                <li><a href="https://twitter.com/suma_ventas"><i class="fa fa-twitter fa-2x txtfooter fac-icon"></i></a></li>
                            </ul>
                        </div><!-- /.col-lg-12 --> 
                    </div> <!-- /.row -->
                </div>        
        </nav>
         <!-- jQuery -->
        <script src="<?= base_url('js/jquery.js')?>"></script>
        <script src="<?= base_url('js/bootstrap.min.js')?>"></script>
        <script src="<?= base_url('js/sweetalert.min.js')?>"></script>

        <!-- Validaciones -->
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
        <script src="<?= base_url('js/validaciones.js')?>"></script>
    </footer>
</body>
</html>