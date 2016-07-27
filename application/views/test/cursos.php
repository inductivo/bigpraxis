
<div class="row">
  <div class="col-md-4 col-md-offset-4 text-center" id="lista-materias">
    <h2 class="h2semester"><span class="number-semester"><?php echo $this->session->userdata('id_semestres'); ?></span></h2>
    <h3 class="h3semester">Semester</h3>
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
<script type="text/javascript" src="<?= base_url('js/cursos.js')?>"></script>
