

<div class="row">

  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
    <h2 class="page-header">Consultar Preguntas</h2>
  </div>


	<?= validation_errors('<div class="col-md-12 alert alert-danger">','</div>'); ?>
</div>

<form class="form-horizontal" id="frmconsultar-preguntas" method="post" action="#">

  <div class="row">
  	<div class="col-lg-4 col-sm-4 margen">
  		<p>NIVEL:</p>
  		<select class="form-control" name="grados" id="grados" autofocus required></select>
  	</div>

  	<div class="col-lg-4 col-sm-4 margen">
  		<p>SEMESTRE:</p>
  		<select class="form-control" name="semestres" id="semestres" required></select>
  	</div>

  	<div class="col-lg-4 col-sm-4 margen">
  		<p>MATERIA:</p>
  		<select class="form-control" name="materias" id="materias" required></select>
  	</div>

  </div>

  <div class="row">
  	<div class="col-lg-6 col-sm-6 margen">
  		<p>TEMA:</p>
  		<select class="form-control" name="temas" id="temas" required ></select>
  	</div>

  	<div class="col-lg-6 col-sm-6 margen">
  		<p>CONTENIDO:</p>
  		<select class="form-control" name="contenidos" id="contenidos" required></select>
  	</div>
  </div>

  <div class="row">
  	<div class="col-lg-12">
  		<button type="button" class="btn btnconsultar" name="btnconsultar" id="btnconsultar">Consultar <i class="fa fa-search"></i> </button>
  	</div>
  </div>

</form>

<script src="<?= base_url('js/jquery.js')?>"></script>
<script src="<?= base_url('js/preguntas.js')?>"></script>
<script src="<?= base_url('js/panel.js')?>"></script>

<!-- Validaciones -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
<script src="<?= base_url('js/validaciones.js')?>"></script>
