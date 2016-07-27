
        <!-- Grades -->
        <div class="row">

            <!--First Semester -->

            <div class="col-lg-4 col-sm-4 text-center" id="lista-materias1">
                <h2 class="h2semester"><span class="number-semester">1</span></h2>

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

               <h2 class="h2semester"><span class="number-semester">2</span></h2>
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

                <h2 class="h2semester"><span class="number-semester">3</span></h2>
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
          </div>
            <!--Fourth Semester -->
          <div>
             <div class="col-lg-4 col-sm-4 text-center" id="lista-materias4">

                <h2 class="h2semester"><span class="number-semester">4</span></h2>
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
                <h2 class="h2semester"><span class="number-semester">5</span></h2>
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
                 <h2 class="h2semester"><span class="number-semester">6</span></h2>
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
      <script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
      <script type="text/javascript" src="<?= base_url('js/cursos.js')?>"></script>
