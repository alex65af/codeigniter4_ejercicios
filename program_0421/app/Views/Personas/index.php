<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>

<div class="actionbutton mt-2">
    <a class="btn btn-info float-right mb20" href="<?= site_url('personas/create') ?>">Add Subject</a>
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

<!-- Subject List -->
<table width="100%" border="1" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>id</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Estado Civil</th>
            <th>Hijos</th>
            <th>Intereses</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($personas) > 0) {

            foreach ($personas as $persona) {
        ?>
                <tr>
                    <td><?= $persona['id'] ?></td>
                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($persona['image']); ?>" class="img-fluid rounded-start" alt="..."></td>
                    <td><?= $persona['nombre'] ?></td>
                    <td><?= $persona['correo'] ?></td>
                    <td><?= $persona['telefono'] ?></td>
                    <td><?= $persona['estado_civil'] ?></td>
                    <td><?= $persona['hijos'] ?></td>
                    <td><?= $persona['intereses'] ?></td>
                    <td align="center">
                        <a class="btn btn-sm btn-info" href="<?= site_url('personas/edit/' . $persona['id']) ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="<?= site_url('personas/delete/' . $persona['id']) ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No data found.</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>