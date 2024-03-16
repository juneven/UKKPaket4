<?php 

require 'function/functions.php';

$idProduk = $_GET["idProduk"];

$getDataProducts = getData("SELECT * FROM produk WHERE idProduk = $idProduk")[0];

if( isset( $_POST["restock_product"] ) ) {
    if(restockProduct($_POST)  > 0) {
        echo "<script>
             alert('Produk Ini Berhasil direstok');
             document.location.href = 'index.php?file=products';
        </script>";
    } else {
        echo "<script>
             alert('Produk Ini Gagal direstok');
        </script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <h3 class="text-center mb-4">Restock Product</h3>
            <?php $stockDB = $getDataProducts["Stok"]; ?>
            <?php $stockDB = (int)$stockDB; ?>
            <?php if( $stockDB === 0 ) : ?>
            <form action="" method="post">
                <div class="form-floating mb-3">
                <input type="text" name="product_id" class="form-control" id="floatingInput" placeholder="Insert Your Product ID" value="<?= $getDataProducts["ProdukID"]; ?>" readonly>
                <label for="floatingInput">Produk ID</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_name" class="form-control" id="floatingInput" placeholder="Insert Your Product Name" value="<?= $getDataProducts["NamaProduk"]; ?>" readonly>
                <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control" id="floatingInput" placeholder="Insert Your Product Price" value="<?= $getDataProducts["Harga"]; ?>" readonly>
                <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_stock" class="form-control" id="floatingInput" placeholder="Insert Your Product Stock" required>
                <label for="floatingInput">Stock</label>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Picture Products</label> <br>
                <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products" width="200">
                </div>
                <div class="d-grid gap-2">
                    <button name="restock_product" class="btn btn-primary" type="submit">Restock Product</button>
                    <a href="index.php?file=products" class="btn btn-primary">Back</a>
                </div>
            </form>
            <?php elseif( $stockDB > 0 ) : ?>
                <form action="" method="post">
                <div class="form-floating mb-3">
                <input type="text" name="product_id" class="form-control" id="floatingInput" placeholder="Insert Your Product ID" value="<?= $getDataProducts["ProdukID"]; ?>" readonly>
                <label for="floatingInput">Produk ID</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_name" class="form-control" id="floatingInput" placeholder="Insert Your Product Name" value="<?= $getDataProducts["NamaProduk"]; ?>" readonly>
                <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control" id="floatingInput" placeholder="Insert Your Product Price" value="<?= $getDataProducts["Harga"]; ?>" readonly>
                <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_stock" class="form-control" id="floatingInput" placeholder="Insert Your Product Stock" value="<?= $getDataProducts["Stok"] ?>" readonly>
                <label for="floatingInput">Stock</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="restock_stock" class="form-control" id="floatingInput" placeholder="Insert Your Restock Product" required>
                <label for="floatingInput">Restock</label>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Picture Products</label> <br>
                <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products" width="200">
                </div>
                <div class="d-grid gap-2">
                    <button name="restock_product" class="btn btn-primary" type="submit">Restock Product</button>
                    <a href="index.php?file=products" class="btn btn-primary">Back</a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>