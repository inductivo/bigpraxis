        <!-- Temas Matemáticas -->
        <div class="row" style="margin-bottom:3em;">
            <div class="col-lg-12">
                <h1 class="page-header titulo text-center">B. Algebra</h2>
            </div>
             <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-rounded img-responsive img-center" src="http://sumaventas.com.mx/study/img/preparatoria1/h-propiedades.png" alt="Algebra">
                <?= anchor('preparatoria/mat1','<h4 class="h4temas">Math I</h4>');?>
            </div>

            <div id="lista_contenidos" class="col-lg-8 col-sm-8 text-left">
                <ul class="list-group">
            
                    <?php
                        $clave="B";
                        $q = $this->Model_contenidos->mostrar($clave);
                        foreach ($q as $cont):
                    ?>
                   
                    <li class="list-group-item" id="<?php echo $cont->id_contenidos ?>">
                        <h4 class="h4temas" style="cursor:pointer"><span class="label label-info"><?= $cont->subclave ?></span>  <?= $cont->contenido ?></h4>
                    </li>
               
                <?php endforeach; ?>  
                </ul>
            </div>
            
        </div> <!--.row -->
        