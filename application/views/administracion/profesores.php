
<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
    <h2 class="page-header">Profesores</h2>
    <div id="mensaje"></div>
  </div>
</div>
<div id="cabecera"></div>
<div id="content"></div>
<div id="botones"></div>

<!--Modal Agregar Profesor -->
<div id="nuevoProfesor" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-user-plus icon-tema" aria-hidden="true"></i> AGREGAR PROFESOR</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmNuevoProfesor" class="frmNuevoProfesor" method="post" action="">
            <input type="hidden" name="id_nuevoProfesor" id="id_nuevoProfesor">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoNombre">Nombre:</label>
                <input id="nuevoNombre" type="text" name="nuevoNombre" class="input-editar" autofocus required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoApellido">Apellidos:</label>
                <input id="nuevoApellido" type="text" name="nuevoApellido" class="input-editar" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoEmail">Email:</label>
                <input id="nuevoEmail" type="email" name="nuevoEmail" class="input-editar" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoNivel">Nivel:</label>
                <select id="nuevoNivel" class="select input-editar" name="nuevoNivel"></select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoPassword">Contraseña:</label>
                <input id="nuevoPassword" type="password" name="nuevoPassword" class="input-editar" required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoPassword2">Confirmar Contraseña:</label>
                <input id="nuevoPassword2" type="password" name="nuevoPassword2" class="input-editar" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnGuardarProfesor" type="submit" data-dismiss="modal" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('js/jquery.js')?>"></script>
<script src="<?= base_url('js/jquery.validate.js')?>"></script>
<script src="<?= base_url('js/admin/validaciones.js')?>"></script>
<script src="<?= base_url('js/admin/panel.js')?>"></script>
<script src="<?= base_url('js/admin/profesores.js')?>"></script>
