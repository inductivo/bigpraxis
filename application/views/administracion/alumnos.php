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

    <div class="col-lg-4 col-sm-4 btn-consultar-alumnos">
  		<button type="button" class="btn btnconsultar" name="btnconsultar" id="btnconsultaralumnos">Consultar <i class="fa fa-search"></i> </button>
  	</div>
  </div>
</form>
<div id="cabecera"></div>
<div id="content"></div>
<div id="botones"></div>

<!-- jQuery -->
<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.validate.js')?>"></script>

<script type="text/javascript" src="<?= base_url('js/admin/panel.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/admin/alumnos.js')?>"></script>
