<?php 

require 'function/functions.php';

$produkID = $_GET["produkId"];

$getDataProducts = getData("SELECT * FROM produk WHERE ProdukID = '$produkID'")[0];

if( isset( $_POST["buy2"] )) {
    if( buyItemWithoutCheckout( $_POST ) > 0 ) {
        echo "<script>
             alert('Transaksi Berhasil! Terimakasih sudah membeli');
             document.location.href = 'index.php?file=products';
        </script>";
    } else {
        echo "<script>
             alert('Transaksi Gagal!');
        </script>";
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <h3 class="text-center mb-4">Checkout Product</h3>
            <form action="" method="post">
                <div class="form-floating mb-3">
                <input type="text" name="penjualan_id" class="form-control" id="floatingInput" placeholder="Your Penjualan ID" value="<?= random_int(100,900); ?>" readonly>
                <label for="floatingInput">No.</label>
                </div>
                <div class="form-floating mb-3">
                <?php date_default_timezone_set('Asia/Jakarta') ?>
                <input type="text" name="date_purchase" class="form-control" id="floatingInput" placeholder="Your Date Purchase" value="<?= date("d M Y, H:i:s"); ?>" readonly>
                <label for="floatingInput">Date Purchase</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_id" class="form-control" id="floatingInput" placeholder="Insert Your Product ID" value="<?= $getDataProducts["ProdukID"]; ?>"readonly>
                <label for="floatingInput">Product ID</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="product_name" class="form-control" id="floatingInput" placeholder="Insert Your Product Name" value="<?= $getDataProducts["NamaProduk"]; ?>" readonly>
                <label for="floatingInput">Product Name</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_price" class="form-control price" id="floatingInput" placeholder="Insert Your Product Price" value="<?= $getDataProducts["Harga"]; ?>" readonly>
                <label for="floatingInput">Price</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="product_stock" class="form-control" id="floatingInput" placeholder="Insert Your Product Stock" value="<?= $getDataProducts["Stok"]; ?>"  readonly>
                <label for="floatingInput">Stock</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="total_products" class="form-control" id="floatingInput" placeholder="Insert Your Total Purchase Items" oninput="myFunc(this);">
                <label for="floatingInput">Purchase Items</label>
                </div>
                <div class="form-floating mb-3">
                <input type="number" name="subtotal" class="form-control subtotal" id="floatingInput" placeholder="Your Subtotal" readonly>
                <label for="floatingInput">Subtotal</label>
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Picture Products</label> <br>
                <img src="imgProduct/<?= $getDataProducts["gambarProduk"]; ?>" class="img-thumbnail" alt="Picture Products" width="200">
                </div>
                <div class="d-grid gap-2">
                    <button name="buy2" class="btn btn-primary" type="submit">Buy</button>
                    <a href="index.php?file=products" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function myFunc(el) {
        const totalProducts =  el.value;
        const price = document.querySelector(".price").value;
        let subtotal = document.querySelector(".subtotal");

        subtotal.value =totalProducts * price;
    }
</script>