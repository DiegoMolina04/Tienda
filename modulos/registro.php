<?php
if(isset($_SESSION['id_cliente'])){
	redir("./");
}

if(isset($enviar)){
	$username = clear($username);
	$password = clear($password);
	$cpassword = clear($cpassword);
	$nombre = clear($nombre);

	$q = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");

	if(mysqli_num_rows($q)>0){
		alert("El usuario ya está en uso");
		redir("");
	}

	if($password != $cpassword){
		alert("Error ! Las contraseñas ingresadas son distintas");
		redir("");
	}



	$mysqli->query("INSERT INTO clientes (username,password,name) VALUES ('$username','$password','$nombre')");


	$q2 = $mysqli->query("SELECT * FROM clientes WHERE username = '$username'");

	$r = mysqli_fetch_array($q2);

	$_SESSION['id_cliente'] = $r['id'];

	alert("El registro a sido satisfactorio");

	redir("./");



}
	?>


	<center>
		<form method="post" action="">
			<div class="centrar_login">
				<label><h2><i class="fa fa-key"></i>Iniciar Sesión</h2></label>
				<div class="form-group">
					<input type="text" autocomplete="off" class="form-control" placeholder="Usuario" name="username"/>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Contraseña" name="password"/>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Confirmar Contraseña" name="cpassword"/>
				</div>


				<div class="form-group">
					<input type="text" autocomplete="off" class="form-control" placeholder="Nombre" name="nombre"/>
				</div>

				<div class="form-group">
					<button class="btn btn-primary" name="enviar" type="submit">Registrate</button>
				</div>
			</div>
		</form>
	</center>
