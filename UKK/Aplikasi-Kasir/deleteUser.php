<?php 

require 'function/functions.php';

$idUser = $_GET["idUser"];

if( deleteUser($idUser) > 0 ) {
    echo "<script>
          alert('Data User ini Berhasil Dihapus!');
          document.location.href = 'index.php?file=dataUser';
    </script>";
} else {
    echo "<script>
          alert('Data User ini Gagal Dihapus!');
          document.location.href = 'index.php?file=dataUser';
    </script>";
}

?>