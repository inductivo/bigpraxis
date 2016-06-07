
<div class="row center-block">
	<?= validation_errors('<div class="col-sm-6 col-sm-offset-3 alert alert-danger text-center msj">','</div>'); ?>
	<div class="col-sm-6 col-sm-offset-3 box-login">
		<div class="form-top text-center">
			<h2 class="top-txt1">Sign In</h2>
			<h4 class="top-txt2">section for teachers</h4>
			<!--<img class="img-responsive img-center" src= <?= base_url("img/logo_teachers.png")?>" alt="Bigpraxis"> -->
		</div>

		<div class="form-bottom">
			<form class="frmlogin center-block" action= "login_profesores" method="post" id="frmlogin">
			    <div class="form-group">
			      <div class="input-group">
					  <span class="input-group-addon icon-input" id="emailtxt"><i class="fa fa-user"></i></span>
				      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" aria-describedby="emailtxt">
			      </div>
			    </div>

			    <div class="form-group">
			      <div class="input-group">
			      	<span class="input-group-addon icon-input" id="passtxt"><i class="fa fa-asterisk"></i></span>
			        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" aria-describedby="passtxt">
			      </div>
			    </div>

			   <button type="submit" class="btn">LOGIN</button>
			</form>
		</div>
	</div> <!--.container-lg-6 -->
</div><!--.row -->
