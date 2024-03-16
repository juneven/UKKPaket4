<?php 

require 'function/functions.php';

$idKeranjang = $_GET["idKeranjang"];

if( deleteCheckout($idKeranjang) > 0 ) {
    echo "<script>
          alert('Item Ini Berhasil Dihapus Dari Keranjang!');
          document.location.href = 'index.php?file=keranjang';
    </script>";
} else {
    echo "<script>
          alert('Item Ini Gagal Dihapus Dari Keranjang!');
          document.location.href = 'index.php?file=keranjang';
    </script>";
}

?>