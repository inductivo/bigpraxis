<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i><span class="hidden-xs">  Regresar</span> </button>
  </div>
</div>

<div class="row">
  <input type="hidden" id="id_materias" value="<?php echo $_POST['id_materias'];?>"></input>
  <input type="hidden" id="materia" value="<?php echo $_POST['materia'];?>"></input>

	<div id="titulo-tema" class="col-lg-12"></div>
</div>
<div id="loading" class="row"></div>
<div id="lista-temas" class="row"></div>

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/general.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/cursos_funcion.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/contenidos.js')?>"></script>
