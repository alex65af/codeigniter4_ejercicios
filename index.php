<?php
require 'conexion.php';

$where = "";

if (!empty($_POST)) {
	$valor = $_POST['campo'];
	if (!empty($valor)) {
		$where = "WHERE nombre LIKE '%$valor'";
	}
}
$sql = "SELECT * FROM personas $where";
$resultado = $mysqli->query($sql);

?>

<html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="row">
			<h2 style="text-align:center">Curso de PHP y MySQL</h2>
		</div>

		<div class="row">
			<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>
			<!-- BuscadorPorNombre -->
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
				<b>Nombre: </b><input type="text" id="campo" name="campo" />
				<input type="submit" id="enviar" name="enviar" value="Buscar" class="btn btn-info" />
			</form>
		</div>

		<br>

		<div class="row table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Telefono</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['correo']; ?></td>
							<td><?php echo $row['telefono']; ?></td>
							<td><a href="modificar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Upd</a></td>
							<td><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete">Del<span class="glyphicon glyphicon-trash"></span></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
				</div>

				<div class="modal-body">
					¿Desea eliminar este registro?
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a class="btn btn-danger btn-ok">Delete</a>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

			$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
		});
	</script>

</body>

</html>