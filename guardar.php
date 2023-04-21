<?php

require 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$estado_civil = $_POST['estado_civil'];
$hijos = isset($_POST['hijo']) ? $_POST['hijos'] : 0;
$intereses = isset($_POST['intereses']) ? $_POST['intereses'] : null;

$arrayIntereses = null;

$num_array = count($intereses);
$contador = 0;

if ($num_array > 0) {
	foreach ($intereses as $key => $value) {
		if ($contador != $num_array - 1)
			$arrayIntereses .= $value . ' ';
		else
			$arrayIntereses .= $value;
		$contador++;
	}
}

$sql = "INSERT INTO personas (nombre, correo, telefono, estado_civil, hijos, intereses) VALUES ('$nombre', '$email', '$telefono', '$estado_civil', '$hijos', '$arrayIntereses')";
$resultado = $mysqli->query($sql);

?>

<html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="row" style="text-align:center">
				<?php if ($resultado) { ?>
					<h3>REGISTRO GUARDADO</h3>
				<?php } else { ?>
					<h3>ERROR AL GUARDAR</h3>
				<?php } ?>

				<a href="index.php" class="btn btn-primary">Regresar</a>

			</div>
		</div>
	</div>
</body>

</html>