

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
  		<button type="button" class="btn btnconsultar" name="btnconsultarpreguntas" id="btnconsultarpreguntas">Consultar <i class="fa fa-search"></i> </button>
  	</div>
  </div>

</form>

<div id="titulo-pregunta"></div>

<div id="mostrarPreguntas"></div>


<div id="modal-pregunta" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('js/jquery.js')?>"></script>
<script src="<?= base_url('js/admin/agregar_preguntas.js')?>"></script>
<script src="<?= base_url('js/admin/consultar_preguntas.js')?>"></script>
<script src="<?= base_url('js/admin/panel.js')?>"></script>
