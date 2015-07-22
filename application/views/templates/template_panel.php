<DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="bigpraxis - Exercises to reinforce learning">
    <meta name="author" content="Suma Ventas Consultores">

    <title>Bigpraxis</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"></div>
        
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" id="principal">

        <?php $this->load->view($contenido); ?>

        <!-- Footer -->
        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom navfooter">
              <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-sm-10 col-xs-8">
                            <p class="txtsv">Copyright &copy; Suma Ventas Consultores 2015</p>
                        </div>
                    </div> <!-- /.row -->
                </div>        
            </nav>
        </footer>

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript 1111 -->
           <!-- jQuery -->
    <script src="<?= base_url('js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('js/myjs.js')?>"></script> 
    <script src="<?= base_url('js/sweetalert.min.js')?>"></script>

    <!-- Validaciones -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
    <script src="<?= base_url('js/validaciones.js')?>"></script>

    



    

</body>

</html>