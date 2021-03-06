
<!DOCTYPE html>
<!--TEMPLATE CURSOS -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="bigpraxis - Exercises to reinforce learning">
    <meta name="author" content="Suma Ventas Consultores">

    <title>Bigpraxis</title>

    <link href='https://fonts.googleapis.com/css?family=Montserrat|Lato:400,700,300,900|Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/principal.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/cursos.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/callouts.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/temas.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/sweetalert.css')?>">

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

</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="barnav navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="btniconbar navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('principal'); ?>"><img class="img-responsive logo" src="<?= base_url('img/logo.png')?>"></a>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg avatar" aria-hidden="true"></i>  <?= $this->session->userdata('nombre'); ?> <?= $this->session->userdata('apellidos'); ?>
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a class="cerrarsesion" href="<?php echo site_url('principal/cambiar_password')?>" ><i class="fa fa-asterisk"></i> Cambiar contraseña</a></li>
                        <li><a class="cerrarsesion" href="<?php echo site_url('principal/cerrar_sesion')?>" ><font color="red"><i class="fa fa-power-off"></i></font> Cerrar sesión</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
          </nav>
    </header>

    <!-- CONTENIDO PRINCIPAL-->
    <div class="container" id="principal">
      <?php $this->load->view($contenido); ?>
    </div>

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
    </footer>
</body>

</html>
