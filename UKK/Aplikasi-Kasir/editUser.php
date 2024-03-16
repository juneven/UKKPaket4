<?php 

require 'function/functions.php';

$idUser = $_GET["idUser"];

$getDataUsers = getData("SELECT * FROM users WHERE idUser = $idUser")[0];

if( isset( $_POST["edit"] ) ) {
    if( editUser( $_POST ) > 0 ) {
        echo "<script>
             alert('Data User Ini Berhasil Diedit');
             document.location.href = 'index.php?file=dataUser';
        </script>";
    } else {
        echo "<script>
             alert('Data User Ini Gagal Diedit');
        </script>";
    }
}

?>


<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" action="" method="post">
                        <input type="hidden" name="idUser" value="<?= $getDataUsers["idUser"]; ?>">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" id="exampleInput"
                                placeholder="Username" value="<?= $getDataUsers["username"]; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address" value="<?= $getDataUsers["email"]; ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="level" aria-label="Default select example">
                            <?php if( $getDataUsers["level"] === "Admin" ) : ?>
                                <option value="">Choose Level...</option>
                                <option value="Admin" selected>Admin</option>
                                <option value="Petugas">Petugas</option>
                            <?php elseif( $getDataUsers["level"] === "Petugas" ) : ?>
                                <option value="">Choose Level...</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas" selected>Petugas</option>
                            <?php endif; ?>
                            </select>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary btn-user btn-block">
                            Edit Account
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

</div>