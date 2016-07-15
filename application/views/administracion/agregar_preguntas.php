
<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
		<h2 class="page-header">Diseño de Preguntas</h2>
	</div>
	<div id="mensaje"></div>
</div>

<form id="frmpublicar" class="form-horizontal frmpublicar" method="post" name="frmpublicar"  action= "publicar">
<div class="row">
	<div class="col-lg-12">
		<?= validation_errors('<div class="row"><div class="col-lg-4 alerta-validacion"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  ','</div></div>');?>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 col-sm-4 margen">
		<p>NIVEL:</p>
		<select class="form-control" name="grados" id="grados" autofocus></select>
	</div>
	<div class="col-lg-4 col-sm-4 margen">
		<p>SEMESTRE:</p>
		<select class="form-control" name="semestres" id="semestres" ></select>
	</div>
	<div class="col-lg-4 col-sm-4 margen">
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
	<div class="col-lg-12 col-sm-12 margenbtn" id="cajaPregunta">
		<label for="txtpregunta"><i class="fa fa-pencil"></i> ESCRIBIR PREGUNTA</label>
		<textarea name="txtpregunta" class="txtarea" id="txtpregunta"></textarea>
	</div>
</div>

<div class="row" id="cajatipopregunta">
	<div class="col-xs-6 col-sm-6 col-lg-6 margen">
		<label>TIPO DE PREGUNTA</label>
		<select class="form-control" name="tipopregunta" id="tipopregunta"></select>
	</div>
</div>

<div class="row" id="cajarespuestas">
	<div class="col-lg-12 col-sm-12" id="respuestas">
		<label>RESPUESTAS</label>
	<div class="input-group respuestas__editor">
		<input type="hidden" name="chk1" value="0">
		<span class="input-group-addon">
			<input type="checkbox" name="chk1" value="1" class="cursor cajarespuestas__check">
		</span>
		<textarea name="resp[]" class="txtarea" id="r1" required></textarea>
		<a href="#" class="eliminar cursor fa fa-times-circle fa-lg icon-eliminar"></a>
	</div>

	</div>
</div>

<div class="row" id="cajanuevaresp">
	<div class="col-lg-6 col-sm-6">
		<div class="input-group margen" id="agregar_respuesta">
			<span class="input-group-addon cursor"><i class="fa fa-plus-circle"></i></span>
			<input type="text" class="form-control cursor" placeholder="Agregue una nueva respuesta" readonly>
		</div>
	</div>
</div>

<div class="row" id="cajas">
	<div class="col-lg-12 col-sm-12 margen" id="cajaRepaso">
		<label for="txtrepaso"><i class="fa fa-book"></i> REPASO</label>
		<textarea name="txtrepaso" class="txtarea" id="txtrepaso"></textarea>
	</div>

	<div class="col-lg-12 col-sm-12 margen" id="cajaSolucion">
		<label for="txtsolucion"><i class="fa fa-check-square-o"></i> SOLUCION</label>
		<textarea name="txtsolucion" class="txtarea" id="txtsolucion"></textarea>
	</div>
</div>

<div class="row" id="publicar">
	<div class="col-lg-12 margen">
		<button type="submit" class="btn btnconsultar" name="btnpublicar" id="btnpublicar">PUBLICAR <i class="fa fa-paper-plane-o"></i> </button>
	</div>
</div>

</form>

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.validate.js')?>"></script>

<script type="text/javascript" src="<?= base_url('js/admin/panel.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/validar_preguntas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/agregar_preguntas.js')?>"></script>
