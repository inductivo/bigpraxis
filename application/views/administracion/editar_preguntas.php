

<form id="frmeditarpreguntas" class="form-horizontal frmpublicar" method="post" name="frmeditarpreguntas"  action= "actualizar_pregunta">
<div class="row">
	<div class="col-lg-12">
		<?= validation_errors('<div class="row"><div class="col-lg-4 alerta-validacion"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  ','</div></div>');?>
	</div>
</div>
<input type="hidden" name="idpreguntas" id="idpreguntas">
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
	<label>RESPUESTAS</label>
	<div class="col-lg-12 col-sm-12" id="respuestas"></div>
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
		<button type="button" class="btn btn-cancelar" name="btncancelarpregunta" id="btncancelarpregunta"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
		<button type="submit" class="btn btn-guardar" name="btneditarpregunta" id="btneditarpregunta"><i class="fa fa-check-circle-o fa-lg"></i> Guardar</button>
	</div>
</div>

</form>

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.validate.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/tinymce/tinymce.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/editar_preguntas.js')?>"></script>

<script type="text/javascript" src="<?= base_url('js/admin/validar_editar_preguntas.js')?>"></script>
