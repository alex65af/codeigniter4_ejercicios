<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="actionbutton mt-2">
    <a class="btn btn-info float-right mb20" href="<?= site_url('/') ?>">List</a>
</div>

<div class="row">
    <h2>Edit Subject</h2>
</div>

<?php
// Display Response 
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
        <form action="<?= site_url('personas/update/' . $persona['id']) ?>" method="post">
            <div class="form-group">
                <label for="email">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required value="<?= old('nombre', $persona['nombre']) ?>">

                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" name="image" required></input>

                    <!-- Error -->

                </div>


                <!-- Error -->
                <?php if ($validation->getError('name')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('name'); ?>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="pwd">Correo:</label>
                <textarea class="form-control" name="correo" required><?= old('correo', $persona['correo']) ?></textarea>

                <!-- Error -->
                <?php if ($validation->getError('description')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('description'); ?>
                    </div>
                <?php } ?>

            </div>

            <div class="form-group">
                <label for="telefono">telefono:</label>
                <input type="text" class="form-control" name="telefono" required value="<?= old('telefono', $persona['telefono']) ?>">
            </div>

            <div class="form-group">
                <label for="estado_civil" class="col-sm-2 control-label">Estado Civil</label>
                <div class="col-sm-10">
                    <select class="form-control" id="estado_civil" name="estado_civil">
                        <option <?php if ($persona['estado_civil'] == "SOLTERO") {
                                    echo "selected";
                                } ?> value="SOLTERO">SOLTERO</option>
                        <option <?php if ($persona['estado_civil'] == "CASADO") {
                                    echo "selected";
                                } ?> value="CASADO">CASADO</option>
                        <option <?php if ($persona['estado_civil'] == "OTRO") {
                                    echo "selected";
                                } ?> value="OTRO">OTRO</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="hijos" class="col-sm-2 control-label">¿Tiene Hijos?</label>

                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" id="hijos" name="hijos" value="1" <?php if ($persona['hijos'] == 1) {
                                                                                    echo "checked";
                                                                                }  ?>> SI
                    </label>

                    <label class="radio-inline">
                        <input type="radio" id="hijos" name="hijos" value="0" <?php if ($persona['hijos'] == 0) {
                                                                                    echo "checked";
                                                                                } ?>> NO
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="intereses" class="col-sm-2 control-label">INTERESES</label>
                <?php
                $chkbox = $persona['intereses'];
                $arr = explode(" ", $chkbox);
                ?>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input <?php if (in_array("Libros", $arr)) {
                                    echo "checked";
                                } ?> type="checkbox" id="intereses[]" name="intereses[]" value="Libros">Libros
                    </label>

                    <label class="checkbox-inline">
                        <input <?php if (in_array("Musica", $arr)) {
                                    echo "checked";
                                } ?> type="checkbox" id="intereses[]" name="intereses[]" value="Musica"> Musica
                    </label>

                    <label class="checkbox-inline">
                        <input <?php if (in_array("Deportes", $arr)) {
                                    echo "checked";
                                } ?> type="checkbox" id="intereses[]" name="intereses[]" value="Deportes"> Deportes
                    </label>

                    <label class="checkbox-inline">
                        <input <?php if (in_array("Otros", $arr)) {
                                    echo "checked";
                                } ?> type="checkbox" id="intereses[]" name="intereses[]" value="Otros"> Otros
                    </label>
                </div>
            </div>

    </div>

    <button type="submit" class="btn btn-success" name="submit">Submit</button>
    </form>
</div>

</div>

<?= $this->endSection() ?>