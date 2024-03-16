<?php 

require 'function/functions.php';

$idProduk = $_GET["idProduk"];

if( deleteProduct($idProduk) > 0 ) {
    echo "<script>
         alert('Data Produk Ini Berhasil Dihapus!');
         document.location.href = 'index.php?file=stock';
    </script>";
} else {
    echo "<script>
         alert('Data Produk Ini Gagal Dihapus!');
         document.location.href = 'index.php?file=stock';
    </script>";
}

?>