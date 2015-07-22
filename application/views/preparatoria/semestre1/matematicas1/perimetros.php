        <!-- Temas Matemáticas -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header titulo text-center">C. Perimeters, areas and volumes of regular geometric figures</h2>
            </div>
             <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-rounded img-responsive img-center" src="http://sumaventas.com.mx/study/img/preparatoria1/f-geometria.png" alt="Geometría">
                <?= anchor('preparatoria/matematicas1','<h4 class="h4temas">Math I</h4>');?>
            </div>

            <div id="lista_contenidos" class="col-lg-8 col-sm-8 text-left">
                <ul class="list-group">
            
                 <?php foreach ($subtemas as $cont):?>
                   
                    <li class="list-group-item" id="<?php echo $cont->id_contenidos ?>">
                        <h4 class="h4temas" style="cursor:pointer"><span class="label label-info"><?= $cont->subclave ?></span>  <?= $cont->contenido ?></h4>
                    </li>
               
                <?php endforeach; ?>  
                </ul>
            </div>
            
        </div> <!--.row -->
        