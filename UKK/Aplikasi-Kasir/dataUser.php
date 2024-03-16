<?php 

require 'function/functions.php';

$getDatasUsers = getData("SELECT * FROM users");

?>


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach( $getDatasUsers as $getDataUsers ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $getDataUsers["username"]; ?></td>
                    <td><?= $getDataUsers["email"]; ?></td>
                    <td><?= $getDataUsers["level"]; ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="index.php?file=editUser&idUser=<?= $getDataUsers["idUser"]; ?>" class="btn btn-outline-warning">Edit</a>
                            <a href="deleteUser.php?idUser=<?= $getDataUsers["idUser"]; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data User ini?');">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>