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
			<h3 style="text-align:center">NUEVO REGISTRO</h3>
		</div>

		<form class="form-horizontal" method="POST" action="guardar.php" autocomplete="off">
			<div class="form-group">
				<label for="nombre" class="col-sm-2 control-label">Nombre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
				</div>
			</div>

			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
			</div>

			<div class="form-group">
				<label for="telefono" class="col-sm-2 control-label">Telefono</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
				</div>
			</div>

			<div class="form-group">
				<label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
				<div class="col-sm-10">
					<select class="form-control" id="estado_civil" name="estado_civil">
						<option value="SOLTERO">SOLTERO</option>
						<option value="CASADO">CASADO</option>
						<option value="OTRO">OTRO</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>

				<div class="col-sm-10">
					<label class="radio-inline">
						<input type="radio" id="hijos" name="hijos" value="1" checked> SI
					</label>

					<label class="radio-inline">
						<input type="radio" id="hijos" name="hijos" value="0"> NO
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="intereses" class="col-sm-2 control-label">INTERESES</label>

				<div class="col-sm-10">
					<label class="checkbox-inline">
						<input type="checkbox" id="intereses[]" name="intereses[]" value="Libros"> Libros
					</label>

					<label class="checkbox-inline">
						<input type="checkbox" id="intereses[]" name="intereses[]" value="Musica"> Musica
					</label>

					<label class="checkbox-inline">
						<input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes"> Deportes
					</label>

					<label class="checkbox-inline">
						<input type="checkbox" id="intereses[]" name="intereses[]" value="Otros"> Otros
					</label>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<a href="index.php" class="btn btn-default">Regresar</a>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</body>

</html>