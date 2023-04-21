<?php
require 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM personas WHERE id = '$id'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

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
            <h3 style="text-align:center">MODIFICAR REGISTRO</h3>
        </div>

        <form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
            <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
                </div>
            </div>

            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['correo']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
                <div class="col-sm-10">
                    <select class="form-control" id="estado_civil" name="estado_civil">
                        <option value="SOLTERO" <?php if ($row['estado_civil'] == 'SOLTERO') echo 'selected'; ?>>SOLTERO</option>
                        <option value="CASADO" <?php if ($row['estado_civil'] == 'CASADO') echo 'selected'; ?>>CASADO</option>
                        <option value="OTRO" <?php if ($row['estado_civil'] == 'OTRO') echo 'selected'; ?>>OTRO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>

                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" id="hijos" name="hijos" value="1" <?php if ($row['hijos'] == '1') echo 'checked'; ?>> SI
                    </label>

                    <label class="radio-inline">
                        <input type="radio" id="hijos" name="hijos" value="0" <?php if ($row['hijos'] == '0') echo 'checked'; ?>> NO
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="intereses" class="col-sm-2 control-label">INTERESES</label>

                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="intereses[]" name="intereses[]" value="Libros" <?php if (strpos($row['intereses'], "Libros") !== false) echo 'checked'; ?>> Libros
                    </label>

                    <label class="checkbox-inline">
                        <input type="checkbox" id="intereses[]" name="intereses[]" value="Musica" <?php if (strpos($row['intereses'], "Musica") !== false) echo 'checked'; ?>> Musica
                    </label>

                    <label class="checkbox-inline">
                        <input type="checkbox" id="intereses[]" name="intereses[]" value="Deportes" <?php if (strpos($row['intereses'], "Deportes") !== false) echo 'checked'; ?>> Deportes
                    </label>

                    <label class="checkbox-inline">
                        <input type="checkbox" id="intereses[]" name="intereses[]" value="Otros" <?php if (strpos($row['intereses'], "Otros") !== false) echo 'checked'; ?>> Otros
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

<!-- composer create-project codeigniter4/appstarter probando-ci4 --stability beta --no-dev -->