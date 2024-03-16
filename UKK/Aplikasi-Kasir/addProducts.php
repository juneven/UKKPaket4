<?php 

require 'function/functions.php';

if( isset($_POST["add_product"]) ) {
    if( addProduct($_POST) > 0 ) {
        echo "<script>
              alert('Data Produk Baru Berhasil Ditambahkan!');
              document.location.href = 'index.php?file=products';
        </script>";
    } else {
        echo "<script>
              alert('Data Produk Baru Gagal Ditambahkan!');
        </script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <h3 class="text-center mb-4">Add New Product</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                <input type="text" name="product_id" class="form-control" id="floatingInput" placeholder="Insert Your Product ID" required>
                <label for="floatingInput">Produk ID</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_name" class="form-control" id="floatingInput" placeholder="Insert Your Product Name">
                <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control" id="floatingInput" placeholder="Insert Your Product Price">
                <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_stock" class="form-control" id="floatingInput" placeholder="Insert Your Product Stock">
                <label for="floatingInput">Stock</label>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Picture Products</label>
                <input class="form-control" name="pic_product" type="file" id="formFile">
                </div>
                <div class="d-grid gap-2">
                    <button name="add_product" class="btn btn-outline-primary" type="submit"><i class="bi bi-plus-square-fill"></i> Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>