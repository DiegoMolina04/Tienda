<?php
include "configs/config.php";
include "configs/funciones.php";

if(!isset($p)){
	$p = "principal";
}else{
	$p = $p;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/estilo.css"/>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<title>Tienda Online</title>
</head>
<body>
	<div class="header">
		Tienda Online
	</div>
	<div class="menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=productos">Productos</a>
		<a href="?p=ofertas">Ofertas</a>

		<?php
		if(isset($_SESSION['id_cliente'])){
		?>
		<a href="?p=carrito">Mi Carrito</a>
		<a href="?p=miscompras">Mis Compras</a>
		<?php
		}else{
			?>
				<a href="?p=registro" class="pull-right subir">Registrate</a>
				<a href="?p=login" class="pull-right subir">Iniciar Sesión</a>
			<?php
		}
		?>

		<?php
			if(isset($_SESSION['id_cliente'])){
		?>

		<a class="pull-right subir" href="?p=salir">Salir</a>
		<a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>

		<?php
			}
		?>
	</div>
	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado la página <b>".$p."</b> <a href='./'>Regresar</a></i>";
			}
		?>
	</div>

	<div class="footer">
		Copyright &copy; <?=date("Y")?>
	</div>

</body>
</html>
