<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Manage<b> Personas</b></h2>
            </div>
            <div class="col-sm-6">

              <a href="#addPersonaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Agregar</span></a>

            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Telefono</th>
              <th>Estado Civil</th>
              <th>Hijos</th>
              <th>Interes</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <!-- 
                             
                    -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Add Modal HTML -->
  <div id="addPersonaModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <form method="post" action="<?= site_url('/add-persona') ?>">
          <div class="modal-header">
            <h4 class="modal-title">RegistrarPersonal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
          <div class="form-group">
              <label>Imagen</label>
              <label class="input-group-text">Upload</label>
                        <input type="file" name="image" class="form-control" id="image">
            </div>  
          <div class="form-group">
              <label>Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <div class="form-group">
              <label>telefono</label>
              <input type="number" name="telefono" id="telefono" class="form-control" required>
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
            <!-- <div class="form-group">
                            <label>Hijos</label>
                            <input type="checkbox" name="hijos" name="hijos" class="form-control" required>
                        </div> -->

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

          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>

<style>
  body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
    max-width: 1540px
  }

  .table-responsive {
    margin: 30px 0;
  }

  .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    min-width: 1000px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
  }

  .table-title {
    padding-bottom: 15px;
    background: #0397d6;
    color: #fff;
    padding: 16px 30px;
    min-width: 100%;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
  }

  .table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
  }

  .table-title .btn-group {
    float: right;
  }

  .table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
  }

  .table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }

  .table-title .btn span {
    float: left;
    margin-top: 2px;
  }

  table.table tr th,
  table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
  }

  table.table tr th:first-child {
    width: 60px;
  }

  table.table tr th:last-child {
    width: 100px;
  }

  table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
  }

  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }

  table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
  }

  table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
  }

  table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
    outline: none !important;
  }

  table.table td a:hover {
    color: #2196F3;
  }

  table.table td a.edit {
    color: #FFC107;
  }

  table.table td a.delete {
    color: #F44336;
  }

  table.table td i {
    font-size: 19px;
  }

  table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
  }

  /* Modal styles */
  .modal .modal-dialog {
    max-width: 400px;
  }

  .modal .modal-header,
  .modal .modal-body,
  .modal .modal-footer {
    padding: 20px 30px;
  }

  .modal .modal-content {
    border-radius: 3px;
    font-size: 14px;
  }

  .modal .modal-footer {
    background: #ecf0f1;
    border-radius: 0 0 3px 3px;
  }

  .modal .modal-title {
    display: inline-block;
  }

  .modal .form-control {
    border-radius: 2px;
    box-shadow: none;
    border-color: #dddddd;
  }

  .modal textarea.form-control {
    resize: vertical;
  }

  .modal .btn {
    border-radius: 2px;
    min-width: 100px;
  }

  .modal form label {
    font-weight: normal;
  }