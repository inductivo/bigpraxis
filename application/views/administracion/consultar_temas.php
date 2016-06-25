
<div class="row">

  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i> Regresar </button>
    <h2 class="page-header">Consultar Temas</h2>
  </div>

</div>
<div class="row">
  <div class="col-lg-12" id="success"></div>
</div>
<form class="form-horizontal" id="frmconsultar-preguntas" method="post" action="#">

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
<div id="mostrarTemas"></div>
<div id="nuevoTema"></div>

<div id="editarTema" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-lg fa-pencil-square icon-editar" aria-hidden="true"></i> EDITAR TEMA</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frmEditarTema" method="post" action="#">
            <input type="hidden" name="id_temas" id="id_temas">
            <input type="hidden" name="id_materias" id="id_materias">
          <div class="row form-group">
              <div class="col-lg-12">
                <label class="txt-editar">Clave:</label>
                <input id="clave" type="text" name="clave" class="input-editar" required>
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
              <button id="btneditartemas" type="button" data-dismiss="modal" class="btn btn-guardar"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i> Guardar</button>
            </div>
          </form>
        </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('js/jquery.js')?>"></script>
<script src="<?= base_url('js/admin/agregar_preguntas.js')?>"></script>
<script src="<?= base_url('js/admin/consultar_temas.js')?>"></script>
<script src="<?= base_url('js/admin/panel.js')?>"></script>
