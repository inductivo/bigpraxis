<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="bigpraxis - Exercises to reinforce learning">
    <meta name="author" content="Suma Ventas Consultores">

    <title>Bigpraxis</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="<?= base_url('css/principal.css')?>" rel="stylesheet">
    <link href="<?= base_url('css/login.css')?>" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('img/favicon/apple-icon-57x57.png')?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('img/favicon/apple-icon-60x60.png')?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('img/favicon/apple-icon-72x72.png')?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('img/favicon/apple-icon-76x76.png')?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('img/favicon/apple-icon-114x114.png')?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('img/favicon/apple-icon-120x120.png')?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('img/favicon/apple-icon-144x144.png')?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('img/favicon/apple-icon-152x152.png')?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('img/favicon/apple-icon-180x180.png')?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url('img/favicon/android-icon-192x192.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('img/favicon/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('img/favicon/favicon-96x96.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('img/favicon/favicon-16x16.png')?>">
    <link rel="manifest" href="<?= base_url('img/favicon/manifest.json')?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('img/favicon/ms-icon-144x144.png')?>">
    <meta name="theme-color" content="#ffffff">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <header>
      <!-- Navigation -->
      <nav class="barnav navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo site_url('principal'); ?>"><img class="img-responsive logo" src="<?= base_url('img/logo.png')?>"></a>
              </div>
          </div>
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
