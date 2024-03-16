<?php 

require 'function/functions.php';

$idProduk = $_GET["idProduk"];

$getDataProducts = getData("SELECT * FROM produk WHERE idProduk = $idProduk")[0];

if( isset( $_POST["edit_product"] ) ) {
    if( editProduct($_POST) > 0 ) {
        echo "<script>
             alert('Data Produk Ini Berhasil Diubah!');
             document.location.href = 'index.php?file=stock';
        </script>";
    } else {
        echo "<script>
             alert('Data Produk Ini Gagal Diubah!');
        </script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <h3 class="text-center mb-4">Edit Product</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idProduk" value="<?= $getDataProducts["idProduk"]; ?>">
                <div class="form-floating mb-3">
                <input type="text" name="product_id" class="form-control" id="floatingInput" placeholder="Insert Your Product ID" value="<?= $getDataProducts["ProdukID"]; ?>">
                <label for="floatingInput">Produk ID</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_name" class="form-control" id="floatingInput" placeholder="Insert Your Product Name" value="<?= $getDataProducts["NamaProduk"]; ?>">
                <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control" id="floatingInput" placeholder="Insert Your Product Price" value="<?= $getDataProducts["Harga"]; ?>">
                <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_stock" class="form-control" id="floatingInput" placeholder="Insert Your Product Stock" value="<?= $getDataProducts["Stok"]; ?>" readonly>
                <label for="floatingInput">Stock</label>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Picture Products</label> <br>
                <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products" width="200">
                </div>
                <div class="d-grid gap-2">
                    <button name="edit_product" class="btn btn-primary" type="submit">Edit Product</button>
                </div>
            </form>
        </div>
    </div>
</div>