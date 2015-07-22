<script src="<?= base_url('js/preguntas.js')?>"></script>
<script src="<?= base_url('js/tinymce/tinymce.min.js')?>"></script>
<link href="<?= base_url('css/panel.css')?>" rel="stylesheet">

<form class="form-horizontal frmpublicar" action= "publicar" method="post" id="frmpublicar">

<div class="row">
	<div class="col-lg-12">
		<h2 class="page-header">Diseño de Preguntas</h2>
	</div>
	<?= validation_errors('<div class="col-md-12 alert alert-danger">','</div>'); ?>
</div>

<div class="row">
	<div class="col-lg-6 col-sm-6 margen">
		<p>NIVEL:</p>
		<select class="form-control" name="grados" id="grados" autofocus></select>
	</div>

	<div class="col-lg-6 col-sm-6 margen">
		<p>MATERIA:</p>
		<select class="form-control" name="materias" id="materias"></select>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-sm-6 margen">
		<p>TEMA:</p>
		<select class="form-control" name="temas" id="temas"></select>
	</div>

	<div class="col-lg-6 col-sm-6 margen">
		<p>CONTENIDO:</p>
		<select class="form-control" name="contenidos" id="contenidos"></select>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 margen">
		<button type="button" class="btn btn-info" id="agregar">AGREGAR PREGUNTA</button>
	</div>

	<div class="col-lg-6 col-sm-6 margenbtn" id="cajaPregunta">
		<p><i class="fa fa-pencil"></i> ESCRIBIR PREGUNTA</p>
		<textarea name="txtpregunta" class="txtarea" id="txtpregunta"></textarea>
	</div>
</div>

<div class="row" id="cajatipopregunta">
	<div class="col-xs-6 col-sm-6 col-lg-6 margen">
		<p>TIPO DE PREGUNTA</p>
		<select class="form-control" name="tipopregunta" id="tipopregunta"></select>
	</div>
</div>

<div class="row" id="cajarespuestas">
	<div class="col-lg-6 col-sm-6" id="respuestas">
		<p>RESPUESTAS</p>
		<div class="input-group">
			<input type="hidden" name="chk1" value="0">
			<span class="input-group-addon"><input type="checkbox" name="chk1" value="1"></span>
			<input type="text" name="resp[]" id="r1" class="form-control" placeholder="Por favor ingrese una respuesta">
			<a href="#" class="eliminar">&times;</a>
		</div>

	</div>
</div>

<div class="row" id="cajanuevaresp">
	<div class="col-lg-6 col-sm-6">
		<div class="input-group margen" id="agregar_respuesta">
			<span class="input-group-addon"><i class="fa fa-plus-circle"></i></span>
			<input type="text" class="form-control" placeholder="Agregue una nueva respuesta" readonly>
		</div>
	</div>
</div>

<div class="row" id="cajas">
	<div class="col-lg-6 col-sm-6 margen" id="cajaRepaso">
		<p><i class="fa fa-book"></i> REPASO</p>
		<textarea name="txtrepaso" class="txtarea" id="txtrepaso"></textarea>
	</div>

	<div class="col-lg-6 col-sm-6 margen" id="cajaSolucion">
		<p><i class="fa fa-check-square-o"></i> SOLUCION</p>
		<textarea name="txtsolucion" class="txtarea" id="txtsolucion"></textarea>
	</div>
</div>

<div class="row" id="publicar">
	<div class="col-lg-12 margen">
		<button type="submit" class="btn btn-success" name="btnpublicar" id="btnpublicar">PUBLICAR <i class="fa fa-paper-plane-o"></i> </button>
	</div>
</div>

</form>
