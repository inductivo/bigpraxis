<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btnatras" name="btnatras" id="btnatras"> <i class="fa fa-arrow-left"></i><span class="hidden-xs">  Regresar</span> </button>
  </div>
</div>

<div class="row">
  <input type="hidden" id="id_temas" value="<?php echo $_POST['id_temas'];?>"></input>
  <div id="titulo-contenidos" class="col-lg-8 col-lg-offset-4"></div>
</div>
<div id="loading" class="row"></div>
<div class="row">
  <div class="col-lg-4 col-sm-4 text-center" id="div-imagen"></div>
  <div id="lista_contenidos" class="col-lg-8 col-sm-8 text-left">
    <ul class="list-group" id="ul-contenidos"></ul>
  </div>
</div><!--.row -->

<script type="text/javascript" src="<?= base_url('js/jquery.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/general.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/contenidos_funcion.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/test.js')?>"></script>
