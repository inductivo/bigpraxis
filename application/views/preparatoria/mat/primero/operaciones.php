        <!-- Temas Matemáticas -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">B. Operaciones</h2>
            </div>
             <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-rounded img-responsive img-center" src="http://sumaventas.com.mx/study/img/preparatoria1/b-operaciones.png" alt="Operaciones">
                <?= anchor('preparatoria/mat1','<h5>Matemáticas 1</h5>');?>
            </div>

            <div class="col-lg-8 col-sm-8 text-left">
                <ul class="list-group">
            
                    <?php
                        $var = 1;
                        $clave = "B";
                        $q = $this->Model_contenidos->mostrar($clave);
                        foreach ($q as $cont):
                    ?>
                   
                    <?= anchor('test/problemas/'.$cont->id_temas.'/'.$cont->id_contenidos,'<li class="list-group-item"><span class="label label-info">'.$cont->clave.$var++.'</span> '.$cont->contenido.'</li>'); ?>
               
                <?php endforeach; ?>  
                </ul>
            </div>
            
        </div> <!--.row -->
