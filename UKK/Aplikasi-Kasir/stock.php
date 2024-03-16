<?php 

require 'function/functions.php';

$getDatasProducts = getData("SELECT * FROM produk");

?>


<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Picture Product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Picture Product</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach( $getDatasProducts as $getDataProducts ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $getDataProducts["ProdukID"]; ?></td>
                    <td><?= $getDataProducts["NamaProduk"]; ?></td>
                    <td><?= $getDataProducts["Harga"]; ?></td>
                    <td><?= $getDataProducts["Stok"]; ?></td>
                    <td>
                        <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products" width="150">
                    </td>
                    <td>
                        <a href="index.php?file=editProduct&idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-warning">Edit</a>
                        <a href="deleteProduct.php?idProduk=<?= $getDataProducts["idProduk"]; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin Ingin Menghapus Data Produk Ini?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>