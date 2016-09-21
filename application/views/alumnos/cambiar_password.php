<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i><span class="hidden-xs">  Regresar</span> </button>
  </div>
</div>

<div class="row center-block">
	<?= validation_errors('<div class="col-sm-6 col-sm-offset-3 alert alert-danger text-center msj">','</div>'); ?>
	<div class="col-sm-6 col-sm-offset-3 box-password">
		<div class="form-top text-center">
			<h3>ACTUALIZAR CONTRASEÑA</h3>
		</div>

    <form class="form-horizontal" id="frmcambiarpassword" name="frmcambiarpassword" method="post" action="validar_password_alumno">
      <div class="row form-group">
          <div class="col-lg-12">
            <label class="txt-password">Contraseña Actual:</label>
            <input id="pass_actual" type="password" name="pass_actual" class="input-password" autofocus required>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-lg-12">
            <label class="txt-password">Nueva Contraseña:</label>
            <input id="pass_nuevo" type="password" name="pass_nuevo" class="input-password" required>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-lg-12">
            <label class="txt-password">Confirma Nueva Contraseña:</label>
            <input id="pass_nuevoc" type="password" name="pass_nuevoc" class="input-password" required>
          </div>
        </div>
            <button id="btnguardarpassword" type="submit" class="btn btn-block btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
      </form>

	</div> <!--.container-lg-6 -->
</div><!--.row -->
<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/general.js')?>"></script>
