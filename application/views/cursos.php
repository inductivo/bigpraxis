
<!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center titulo">HIGH SCHOOL</h1>
            </div>
        </div>

        <!-- Grades -->
        <div class="row">

            <div class="col-lg-4 col-sm-4 text-center" id="lista-materias">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/primero.png" alt="Primero">
                <h3 class="h3semester">First Semester</h3>
              
              <ul class="list-group">
                <?php

                  $sem1 = $this->Model_cursos->mostrarSemestre1();
                  foreach ($sem1 as $materia):
                ?>                     
                    <li class="list-group-item listcursos" id-idmateria="<?php echo $materia->id_materias ?>"> <?=$materia->materia ?></li>


                <?php endforeach; ?> 
              </ul>

            </div>

            <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/segundo.png" alt="Segundo">
                <h3 class="h3semester">Second Semester</h3>
                <div class="list-group">
                  <a href="#" class="list-group-item disabled listcursos">Math II</a>
                  <a href="#" class="list-group-item disabled listcursos">Chemistry II</a>
                  <a href="#" class="list-group-item disabled listcursos">Ethics and Values II</a>
                  <a href="#" class="list-group-item disabled listcursos">Globals Perspectives II</a>
                  <a href="#" class="list-group-item disabled listcursos">Literature</a>
                  <a href="#" class="list-group-item disabled listcursos">French II</a>
                  <a href="#" class="list-group-item disabled listcursos">Informatica II</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/tercero.png" alt="Tercero">
                <h3 class="h3semester">Third Semester</h3>

                <div class="list-group">
                  <a href="#" class="list-group-item disabled listcursos">Math III</a>
                  <a href="#" class="list-group-item disabled listcursos">Biology I</a>
                  <a href="#" class="list-group-item disabled listcursos">Physics I</a>
                  <a href="#" class="list-group-item disabled listcursos">Mexico History</a>
                  <a href="#" class="list-group-item disabled listcursos">Art Appreciation</a>
                  <a href="#" class="list-group-item disabled listcursos">French III</a>
                  <a href="#" class="list-group-item disabled listcursos">Digital Design</a>
                </div>

            </div>

            <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/cuarto.png" alt="Cuarto">
                <h3 class="h3semester">Fourth Semester</h3>

                <div class="list-group">
                  <a href="#" class="list-group-item disabled listcursos">Math IV</a>
                  <a href="#" class="list-group-item disabled listcursos">Biology II</a>
                  <a href="#" class="list-group-item disabled listcursos">Physics II</a>
                  <a href="#" class="list-group-item disabled listcursos">World History</a>
                  <a href="#" class="list-group-item disabled listcursos">Developing Thinking Skills</a>
                  <a href="#" class="list-group-item disabled listcursos">Portuguese I</a>
                  <a href="#" class="list-group-item disabled listcursos">Digital Expression</a>
                </div>

            </div>

            <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/quinto.png" alt="Quinto">
                <h3 class="h3semester">Fifth Semester</h3>
                <div class="list-group">
                  <a href="#" class="list-group-item disabled listcursos">Critical Thinking</a>
                  <a href="#" class="list-group-item disabled listcursos">Life and Career Plan</a>
                  <a href="#" class="list-group-item disabled listcursos">Differential Calculus</a>
                  <a href="#" class="list-group-item disabled listcursos">Health Education I</a>
                  <a href="#" class="list-group-item disabled listcursos">Creativity and Innovation</a>
                  <a href="#" class="list-group-item disabled listcursos">Portuguese II</a>
                  <a href="#" class="list-group-item disabled listcursos">Interactive Multimedia</a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 text-center">
                <img class="img-circle img-responsive img-center" src="http://sumaventas.com.mx/study/img/sexto.png" alt="Sexto">
                <h3 class="h3semester">Sixth Semester</h3>

                <div class="list-group">
                  <a href="#" class="list-group-item disabled listcursos">Philosophy</a>
                  <a href="#" class="list-group-item disabled listcursos">Emotional Intelligence</a>
                  <a href="#" class="list-group-item disabled listcursos">Integral Calculus</a>
                  <a href="#" class="list-group-item disabled listcursos">Health Education II</a>
                  <a href="#" class="list-group-item disabled listcursos">Entrepreneurship</a>
                  <a href="#" class="list-group-item disabled listcursos">Portuguese III</a>
                  <a href="#" class="list-group-item disabled listcursos">Business Social Media</a>
                </div>

            </div>

        </div>