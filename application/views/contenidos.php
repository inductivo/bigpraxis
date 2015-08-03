    
        <input type="hidden" id="id_temas" value="<?php echo $_POST['id_temas'];?>"></input>

        <div class="row">
            <div class="col-lg-12">
                <h1 id="h1-titulo" class="page-header titulo text-center"></h1>
            </div>
          
            <div class="col-lg-4 col-sm-4 text-center" id="div-imagen"></div>

            <div id="lista_contenidos" class="col-lg-8 col-sm-8 text-left">
                <ul class="list-group" id="ul-contenidos"></ul>
            </div>
            
        </div><!--.row -->

        <script type="text/javascript" src="<?= base_url('js/contenidos_funcion.js')?>"></script> 
        <script type="text/javascript" src="<?= base_url('js/test.js')?>"></script>  
        