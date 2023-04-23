<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="actionbutton mt-2">
  <a class="btn btn-info float-right mb20" href="<?= site_url('/') ?>">List</a>
</div>

<div class="row">
  <h2>Add Persona</h2>
</div>

<?php
// Display Response
//nombre image correo telefono estado_civil hijos intereses
if (session()->has('message')) {
?>
  <div class="alert <?= session()->getFlashdata('alert-class') ?>">
    <?= session()->getFlashdata('message') ?>
  </div>
<?php
}
?>

<?php $validation = \Config\Services::validation(); ?>
<div class="row">
  <div class="col-md-12">
    <form action="<?= site_url('personas/store') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" required value="<?= old('nombre') ?>">

        <!-- Error -->
        <?php if ($validation->getError('nombre')) { ?>
          <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombre'); ?>
          </div>
        <?php } ?>
      </div>

      <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" class="form-control" name="image" required></input>
      </div>

      <div class="form-group">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" name="correo" required value="<?= old('correo') ?>"></input>

        <!-- Error -->
        <?php if ($validation->getError('correo')) { ?>
          <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('correo'); ?>
          </div>
        <?php } ?>

      </div>

      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono" required value="<?= old('telefono') ?>"></input>

        <!-- Error -->

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

      <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </form>
  </div>

</div>

<?= $this->endSection() ?>