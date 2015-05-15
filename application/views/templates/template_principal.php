<DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Reforzamiento Educativo">
    <meta name="author" content="Suma Ventas Consultores">

    <title>Study - Reforzamiento Educativo</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?= base_url('css/principal.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/sweetalert.css')?>"> 

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
     <script src="<?= base_url('js/jquery.js')?>"></script>

     <link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.countdown.css')?>"> 
    <script type="text/javascript" src="<?= base_url('js/jquery.plugin.js')?>"></script> 
    <script type="text/javascript" src="<?= base_url('js/jquery.countdown.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('js/jquery.countdown-es.js')?>"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('principal'); ?>">Study</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                </ul>
            </div>
            .navbar-collapse -->
            
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" id="principal">

        <?php $this->load->view($contenido); ?>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-10 col-sm-10">
                    <p>Copyright &copy; Suma Ventas Consultores 2015</p>
                </div>
                <div class="col-lg-2 col-sm-2 text-right ">
                    <ul class="list-inline">
                        <li><a href="https://www.facebook.com/sumaventas"><i class="fa fa-facebook-official fa-2x"></i></a></li>
                        <li><a href="https://twitter.com/suma_ventas"><i class="fa fa-twitter fa-2x"></i></a></li>
                    </ul>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript 1111 -->
           <!-- jQuery -->
    <script src="<?= base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('js/myjs.js')?>"></script> 
    <script src="<?= base_url('js/sweetalert.min.js')?>"></script>
    

</body>

</html>