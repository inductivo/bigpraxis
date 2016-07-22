<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
    <h2 class="page-header">Alumnos</h2>
    <div id="mensaje"></div>
  </div>
</div>
<form class="form-horizontal" id="frmconsultar-temas" method="post" action="">
  <div class="row">
  	<div class="col-lg-4 col-sm-4 margen">
  		<label><strong>NIVEL:</strong></label>
  		<select class="form-control" name="grados" id="grados" autofocus required></select>
  	</div>

  	<div class="col-lg-4 col-sm-4 margen">
  		<label><strong>SEMESTRE:</strong></label>
  		<select class="form-control" name="semestres" id="semestres" required></select>
  	</div>

    <div class="col-lg-4 col-sm-4 btnalumnos">
  		<button type="button" class="btn btnconsultar" name="btnconsultar" id="btnalumnos">Consultar <i class="fa fa-search"></i> </button>
  	</div>
  </div>
</form>
<div id="cabecera"></div>
<div id="content"></div>
<div id="botones"></div>

<!--Modal Agregar Alumno -->
<div id="nuevoAlumno" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-user-plus icon-tema" aria-hidden="true"></i> AGREGAR ALUMNO</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmalumno" class="frmalumno" method="post" action="">
            <input type="hidden" name="id_nuevoAlumno" id="id_nuevoAlumno">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoNombre">Nombre:</label>
                <input id="nuevoNombre" type="text" name="nuevoNombre" class="input-editar" autofocus>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoApellido">Apellidos:</label>
                <input id="nuevoApellido" type="text" name="nuevoApellido" class="input-editar">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoEmail">Email:</label>
                <input id="nuevoEmail" type="email" name="nuevoEmail" class="input-editar">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoLMS">ID LMS:</label>
                <input id="nuevoLMS" type="text" name="nuevoLMS" class="input-editar">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoPassword">Contraseña:</label>
                <input id="nuevoPassword" type="password" name="nuevoPassword" class="input-editar">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoPassword2">Confirmar Contraseña:</label>
                <input id="nuevoPassword2" type="password" name="nuevoPassword2" class="input-editar">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnGuardarAlumno" type="submit" name="guardarAlumno" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <!--Modal EDITAR ALUMNO -->
<div id="editarAlumno" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-pencil-square icon-editar" aria-hidden="true"></i> EDITAR ALUMNO</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmEditarAlumno" class="frmEditarAlumno" method="post" action="">
            <input type="hidden" name="id_editarAlumno" id="id_editarAlumno">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="editarNombre">Nombre:</label>
                <input id="editarNombre" type="text" name="editarNombre" class="input-editar" autofocus>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="editarApellido">Apellidos:</label>
                <input id="editarApellido" type="text" name="editarApellido" class="input-editar">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="editarEmail">Email:</label>
                <input id="editarEmail" type="email" name="editarEmail" class="input-editar">
              </div>
            </div>

            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="editarLMS">ID LMS:</label>
                <input id="editarLMS" type="text" name="editarLMS" class="input-editar">
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnEditarAlumno" type="submit" name="editarAlumno" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Actualizar Contraseña-->
<div id="actualizarPassword" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-asterisk icon-pass" aria-hidden="true"></i> ACTUALIZAR CONTRASEÑA</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmPassAlumno" class="frmPassAlumno" method="post" action="">
            <input type="hidden" name="id_passAlumno" id="id_passAlumno">
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="cambiarPassword">Nueva Contraseña:</label>
                <input id="cambiarPassword" type="password" name="cambiarPassword" class="input-editar">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="cambiarPassword2">Confirmar Contraseña:</label>
                <input id="cambiarPassword2" type="password" name="cambiarPassword2" class="input-editar">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnPassAlumno" type="submit" name="passAlumno" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- jQuery -->
<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.validate.js')?>"></script>

<script type="text/javascript" src="<?= base_url('js/admin/panel.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/alumnos.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/validar_alumnos.js')?>"></script>
