
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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


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