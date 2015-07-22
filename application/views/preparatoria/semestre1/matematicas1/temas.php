
        <!-- Temas Matemáticas -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center titulo">Math I<br>
                    <small>High School</small>
                </h1>
            </div>
        </div>

        <div id="lista_temas">
            <?php foreach ($tema as $datos): ?> 

                <div class="col-lg-4 col-sm-4 text-center" data-idtema="<?php echo $datos->id_temas ?>">
                    <img class="img-rounded img-responsive img-center imgtemas" src="<?php echo $datos->imagen ?>" alt="<?php $datos->tema ?>">
                    <h4 class="h4temas"><?= $datos->tema ?></h4>
                </div>

            <?php endforeach; ?>
 
            
        </div> <!--.row -->