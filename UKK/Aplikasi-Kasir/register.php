<?php

require 'function/functions.php';

if( isset($_POST["register"]) ) {
    if( addUser($_POST) > 0 ) {
        echo "<script>
              alert('Data User Baru Berhasil Ditambahkan!');
              document.location.href = 'index.php?file=dataUser';
        </script>";
    } else {
        echo "<script>
              alert('Data User Baru Gagal Ditambahkan!');
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
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" id="exampleInput"
                                placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" id="exampleInput"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <select class="form-select" name="level" aria-label="Default select example">
                            <option value="" selected>Choose Level...</option>
                            <option value="Admin">Admin</option>
                            <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

</div>