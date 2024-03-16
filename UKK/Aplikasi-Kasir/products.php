<?php 

require 'function/functions.php';

$getDatasProducts = getData("SELECT * FROM produk");

?>

<div class="row">
    <div class="col-lg-3">
    <a href="index.php?file=keranjang" class="btn btn-outline-dark mb-4"><i class="bi bi-cart-fill"></i> Keranjang Saya</a>
    </div>
</div>

<div class="container-fluid d-flex justify-content-evenly">
    <div class="row">
    <?php foreach( $getDatasProducts as $getDataProducts ) : ?>
    <?php $stock = $getDataProducts["Stok"]; ?>
    <?php $stock = (int)$stock; ?>
    <?php if( $stock > 0 ) : ?>
    <div class="card m-3" style="width: 18rem;">
    <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products">
    <div class="card-body">
        <h5 class="card-title"><?= $getDataProducts["NamaProduk"]; ?></h5>
        <p class="card-text">Harga : <?= $getDataProducts["Harga"]; ?></p>
        <p class="card-text">Stok : <?= $getDataProducts["Stok"]; ?></p>
        <div class="d-grid gap-2 d-md-block">
            <a href="index.php?file=transaction2&produkId=<?= $getDataProducts["ProdukID"]; ?>" class="btn btn-outline-success">Beli</a>
            <a href="index.php?file=Checkout&idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-dark"><i class="bi bi-cart-plus-fill"></i></a>
            <a href="index.php?file=Restock&idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-warning m-3"><i class="bi bi-boxes"></i> Restock</a>
        </div>
    </div>
    </div>
    <?php elseif( $stock === 0 ) : ?>
    <div class="card m-5" style="width: 18rem;">
    <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products">
    <div class="card-body">
        <h5 class="card-title"><?= $getDataProducts["NamaProduk"]; ?></h5>
        <p class="card-text">Harga : <?= $getDataProducts["Harga"]; ?></p>
        <p class="card-text">Stok : <?= $getDataProducts["Stok"]; ?></p>
        <div class="d-grid gap-2 d-md-block">
            <a href="index.php?file=transaction2&produkId=<?= $getDataProducts["ProdukID"]; ?>" class="btn btn-outline-success disabled">Beli</a>
            <a href="index.php?file=Checkout&idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-dark disabled">Tambah Ke Keranjang</a>
            <a href="index.php?file=Restock&idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-warning"><i class="bi bi-boxes"></i> Restock</a>
        </div>
    </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>