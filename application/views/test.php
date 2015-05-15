

       <?php
        $problemas = 1;
        $aciertos = 0;
        $tiempo = 0;
        $var=0;
        $id=0;

        ?> 

        <!-- Test -->
        <div class="row">
           <div class="col-lg-12">
                <h2 class="page-header">A.1 <?= $info->contenido ?></h2>
            </div>
            <div class="col-lg-4 col-sm-4 text-center">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Problemas</h3></div>
                    <div class="panel-body"><?= $problemas ?></div>
                </div>
             </div>
             
             <div class="col-lg-4 col-sm-4 text-center">
                <div class="panel panel-success">
                    <div class="panel-heading"><h3 class="panel-title">Aciertos</h3></div>
                    <div class="panel-body"><?= $aciertos ?></div>
                </div>
            </div>
            
             <div class="col-lg-4 col-sm-4 text-center">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h3 class="panel-title">Tiempo</h3></div>
                        <div class="panel-body"><?= $tiempo ?></div>
                </div>
            </div>

            
            <div class="col-lg-12 text-left">
            
                <?php foreach ($preguntas as $pregunta): ?>
            
            <div class="caja" id="caja<?php echo $id=$id+1 ?>">
                <form>
                <p> <h3><?= $pregunta->pregunta ?></h3></p>

                <?php 
                   
                    $opciones = $this->Model_contenidos->obtener_opciones($pregunta->id_preguntas); 
                    foreach ($opciones as $opt):

                    if($pregunta->id_tipo_pregunta == 1)
                    {
                ?>

                    <div class="test">
                        <?php $var=$var+1?>
                        <input type="radio" name="radio" id="r<?php echo $var?>" class="radio" value="<?=$opt->opcion?>">
                        <label for="r<?php echo $var?>"><?= $opt->opcion ?></label>
                    </div>

                <?php } else if($pregunta->id_tipo_pregunta == 2) { ?>

                
                    <div class="test">
                         <?php $var=$var+1?>
                        <input type="checkbox" name="checkbox[]" id="c<?php echo $var ?>" class="checkbox" value="<?=$opt->opcion?>">
                        <label for="c<?php echo $var?>"><?= $opt->opcion ?></label>
                    </div>

                <?php  } else if($pregunta->id_tipo_pregunta == 3) {  ?>
            
                    <p> En construcción...</p>
           
                <?php  }  endforeach;?>  <!-- Opciones -->         
                
                <div class="test">
                 <button type="button" class="btn btn-success btnenviar" data-id ="<?php echo $pregunta->id_preguntas ?>" data-tipo ="<?php echo $pregunta->id_tipo_pregunta ?>" >Enviar</button>
                </div>

                </form>
       
                <div id="caja_feliz"></div>
                <div class="bs-callout bs-callout-danger box" id="box_repaso"><h3>Repaso</h3></div>
                <div class="bs-callout bs-callout-success box" id="box_solucion"><h3>Solución</h3></div>


            </div> <!-- div pregunta-->
            <?php  endforeach;?> <!--Preguntas -->
 
            </div> <!--.col-lg-12 -->

        </div> <!--.row -->            


        <link href="<?= base_url('css/test.css')?>" rel="stylesheet">
        <link href="<?= base_url('css/callouts.css')?>" rel="stylesheet">
