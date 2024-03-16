<?php 

require 'function/functions.php';

$getDatasKeranjang = getData("SELECT * FROM keranjang");

$getDatasPenjualan = getData("SELECT PenjualanID FROM penjualan");

$rows = [];

foreach( $getDatasPenjualan as $getDataPenjualan ) {
    $rows[] = $getDataPenjualan["PenjualanID"];
}

?>

<div class="container-fluid d-flex justify-content-evenly">
    <?php foreach( $getDatasKeranjang as $getDataKeranjang ) : ?>
    <?php if( !in_array( $getDataKeranjang["PenjualanID"], $rows ) ) : ?>
    <div class="card" style="width: 18rem;">
    <div class="card-header">
        No. <?= $getDataKeranjang["PenjualanID"]; ?>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Product ID : <?= $getDataKeranjang["ProdukID"]; ?></li>
        <li class="list-group-item">Total Product : <?= $getDataKeranjang["JumlahProduk"]; ?></li>
        <li class="list-group-item">Subtotal : <?= $getDataKeranjang["subtotal"]; ?></li>
        <li class="list-group-item">
            <div class="d-grid gap-2 d-md-block">
                <a href="index.php?file=transaction&idKeranjang=<?= $getDataKeranjang["idKeranjang"]; ?>&produkId=<?= $getDataKeranjang["ProdukID"]; ?>" class="btn btn-primary">Beli</a>
                <a href="deleteCheckout.php?idKeranjang=<?= $getDataKeranjang["idKeranjang"]; ?>" class="btn btn-primary" onclick="return confirm('Yakin Ingin Menghapus Item Ini dari Keranjang?');">Hapus Dari Keranjang</a>
            </div>
        </li>
    </ul>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>