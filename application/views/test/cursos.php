
<div class="row">
  <div class="col-md-4 col-md-offset-4 text-center" id="lista-materias">
    <h2 class="h2semester"><span class="number-semester">
    <?php
      $id= $this->session->userdata('id_semestres');
      $numero = $this->Model_cursos->obtenerSemestre($id);
      echo $numero->numero;
    ?>
    </span></h2>
    <h3 class="h3semester">
      <?php
        $id= $this->session->userdata('id_semestres');
        $periodo = $this->Model_cursos->obtenerPeriodo($id);
        echo $periodo->periodo;
      ?>
    </h3>
    <ul class="list-group">
      <?php
        $id= $this->session->userdata('id_semestres');
        $semestre = $this->Model_cursos->mostrarSemestre($id);
        foreach ($semestre as $materia):
      ?>
      <li class="list-group-item listcursos" data-idmateria="<?php echo $materia->id_materias ?>" data-materia="<?php echo $materia->materia ?>" style="cursor:pointer"> <?=$materia->materia ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div> <!--.row -->

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/cursos.js')?>"></script>
