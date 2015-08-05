
<!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center titulo">HIGH SCHOOL</h1>
            </div>
        </div>

        <!-- Grades -->
        <div class="row">

            <!--First Semester -->

            <div class="col-lg-4 col-sm-4 text-center" id="lista-materias1">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/primero.png" alt="Primero">
                <h3 class="h3semester">First Semester</h3>
              
              <ul class="list-group">
                <?php

                  $sem1 = $this->Model_cursos->mostrarSemestre1();
                  foreach ($sem1 as $materia):
                ?>                     
                    <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>


                <?php endforeach; ?> 
              </ul>

            </div>

            <!--Second Semester -->

             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias2">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/segundo.png" alt="Segundo">
                <h3 class="h3semester">Second Semester</h3>
              
                <ul class="list-group">
                  <?php

                    $sem2 = $this->Model_cursos->mostrarSemestre2();
                    foreach ($sem2 as $materia):
                  ?>                     
                      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
                  <?php endforeach; ?> 
                </ul>
            </div>


            <!--Third Semester -->

             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias3">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/tercero.png" alt="Tercero">
                <h3 class="h3semester">Third Semester</h3>
              
                <ul class="list-group">
                  <?php

                    $sem3 = $this->Model_cursos->mostrarSemestre3();
                    foreach ($sem3 as $materia):
                  ?>                     
                      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
                  <?php endforeach; ?> 
                </ul>
            </div>

            <!--Fourth Semester -->

             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias4">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/cuarto.png" alt="Cuarto">
                <h3 class="h3semester">Fourth Semester</h3>
              
                <ul class="list-group">
                  <?php

                    $sem4 = $this->Model_cursos->mostrarSemestre4();
                    foreach ($sem4 as $materia):
                  ?>                     
                      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
                  <?php endforeach; ?> 
                </ul>
            </div>

            <!--Fifth Semester -->

             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias5">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/quinto.png" alt="Quinto">
                <h3 class="h3semester">Fifth Semester</h3>
              
                <ul class="list-group">
                  <?php

                    $sem5 = $this->Model_cursos->mostrarSemestre5();
                    foreach ($sem5 as $materia):
                  ?>                     
                      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
                  <?php endforeach; ?> 
                </ul>
            </div>

            <!--Sixth Semester -->

             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias6">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/sexto.png" alt="Sexto">
                <h3 class="h3semester">Sixth Semester</h3>
              
                <ul class="list-group">
                  <?php

                    $sem6 = $this->Model_cursos->mostrarSemestre6();
                    foreach ($sem6 as $materia):
                  ?>                     
                      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
                  <?php endforeach; ?> 
                </ul>
            </div>   

        </div> <!--.row -->

      <script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
      <script type="text/javascript" src="<?= base_url('js/cursos.js')?>"></script>