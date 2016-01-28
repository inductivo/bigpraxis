        
    <link href="<?= base_url('css/test.css')?>" rel="stylesheet">

    
        <input type="hidden" id="id_contenidos" value="<?php echo $_POST['id_contenidos'];?>"></input>   
       
       <!--Sección de Time -->
        <div class="row text-center">
            <div class="col-lg-12 statstxt">
                <i class="fa fa-clock-o fa-3x"></i>
                <div id="caja_tiempo" class="txttime"></div>
            </div>
        </div>

        <!-- Seccion de estadísticas-->
        <div class="row seccion-estadisticas">
           <div class="col-lg-6 col-sm-6 col-xs-6 text-left">
                <p id="caja_titulo"></p>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-6 text-right">
                <p clas="text-right"></strong><strong id="caja_aciertos"></strong> aciertos / <strong id="caja_problemas"></strong> problemas</p>
           </div>
        </div> <!-- .row -->

        <!--Sección de preguntas -->
        <div class="row seccion-preguntas">
            <div class="col-lg-12 text-left">
            
                <div id="caja" class="caja">    
                    <h3 id="caja_pregunta" class="pregunta"></h3>
                    <div id="caja_sorry"></div>        
                    <div id="caja_opciones"></div>
                    <div id="caja_boton" class="test"></div>
                    <div id="caja_repaso"></div>
                    <div id="caja_solucion"></div>
                    <div id="caja_siguiente"></div>
                </div> <!-- div caja principal-->
            </div> <!--.col-lg-12 -->
        </div><!--.row -->
   
        <script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('js/jquery.plugin.js')?>"></script> 
        <script type="text/javascript" src="<?= base_url('js/jquery.countdown.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('js/jquery.countdown-es.js')?>"></script>
        <script src="<?= base_url('js/sweetalert.min.js')?>"></script>
        <script type="text/javascript" src="<?= base_url('js/test_funcion.js')?>"></script>
