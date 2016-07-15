
<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
    <h2 class="page-header">Temas</h2>
    <div id="mensaje"></div>
  </div>
</div>

<form class="form-horizontal" id="frmconsultar-temas" method="post" action="">

  <div class="row">
  	<div class="col-lg-4 col-sm-4 margen">
  		<p><strong>NIVEL:</strong></p>
  		<select class="form-control" name="grados" id="grados" autofocus required></select>
  	</div>

  	<div class="col-lg-4 col-sm-4 margen">
  		<p><strong>SEMESTRE:</strong></p>
  		<select class="form-control" name="semestres" id="semestres" required></select>
  	</div>

  	<div class="col-lg-4 col-sm-4 margen">
  		<p><strong>MATERIA:</strong></p>
  		<select class="form-control" name="materias" id="materias" required></select>
  	</div>

  </div>

  <div class="row">
  	<div class="col-lg-12">
  		<button type="button" class="btn btnconsultar" name="btnconsultar" id="btnconsultartemas">Consultar <i class="fa fa-search"></i> </button>
  	</div>
  </div>

</form>
<div id="cabecera"></div>
<div id="content"></div>
<div id="botones"></div>

<!--Modal Editar Tema -->
<div id="editarTema" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-pencil-square icon-editar" aria-hidden="true"></i> EDITAR TEMA</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmEditarTema" name="frmEditarTema" method="post" action="">
            <input type="hidden" name="id_temas" id="id_temas">
            <input type="hidden" name="id_materias" id="id_materias">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Clave:</label>
                <input id="clave" type="text" name="clave" class="input-editar" autofocus required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Tema:</label>
                <input id="tema" type="text" name="tema" class="input-editar" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btneditartemas" type="submit" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Agregar Tema -->
<div id="agregarTemaModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-file-text-o icon-tema" aria-hidden="true"></i> AGREGAR TEMA</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmAgregarTema" name="frmAgregarTema" class="frmAgregarTema" method="post" action="">
            <input type="hidden" name="id_nuevaMaterias" id="id_nuevaMateria">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevaClave">Clave:</label>
                <input id="nuevaClave" type="text" name="nuevaClave" class="input-editar" autofocus>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar" for="nuevoTema">Tema:</label>
                <input id="nuevoTema" type="text" name="nuevoTema" class="input-editar">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnagregartema" name="btnagregartema" type="submit" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!--Modal Editar Contenido -->
<div id="editarContenidoModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-pencil-square icon-editar" aria-hidden="true"></i> EDITAR CONTENIDO</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmEditarContenido" name="frmEditarContenido" method="post" action="">
            <input type="hidden" name="id_Editartemas" id="id_Editartemas">
            <input type="hidden" name="id_Editarcontenidos" id="id_Editarcontenidos">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Subtema:</label>
                <input id="subtemaEditar" type="text" name="subtemaEditar" class="input-editar" autofocus required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Contenido:</label>
                <input id="contenidoEditar" type="text" name="contenidoEditar" class="input-editar" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btneditarcontenido" type="submit" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal Agregar Contenido -->
<div id="agregarNuevoContenido" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-list icon-contenido" aria-hidden="true"></i> AGREGAR CONTENIDO</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmAgregarContenido" name="frmAgregarContenido" method="post" action="">
            <input type="hidden" name="id_temaNuevoContenido" id="id_temaNuevoContenido">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Subtema:</label>
                <input id="nuevoSubtema" type="text" name="nuevoSubtema" class="input-editar" autofocus required>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Contenido:</label>
                <input id="nuevoContenido" type="text" name="nuevoContenido" class="input-editar" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-cancelar" data-dismiss="modal"><i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i> Cancelar</button>
              <button id="btnguardarcontenido" type="submit" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>

<script type="text/javascript" src="<?= base_url('js/jquery.validate.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/panel.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/consultar_temas.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/validar_temas.js')?>"></script>
