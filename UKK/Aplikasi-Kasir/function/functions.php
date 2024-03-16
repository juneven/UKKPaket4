<?php 

$conn = mysqli_connect("localhost","root","","app-kasir");

function getData($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;

}

function addUser($dataUser) {
    global $conn;

    $username = htmlspecialchars($dataUser["username"]);
    $email = htmlspecialchars($dataUser["email"]);
    $password = htmlspecialchars($dataUser["password"]);    
    $level = $dataUser["level"];

    if( $level === "" ) {
        echo "<script>
             alert('Anda belum memilih level user, silakan dipilih terlebih dahulu');
        </script>";

        return 0;
    }

    // Password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    $queryInsertToUsers = "INSERT INTO users VALUES(
                          '', '$username', '$email', '$password',
                          '$level'
                          )";

    mysqli_query($conn, $queryInsertToUsers);

    return mysqli_affected_rows($conn);

}

function deleteUser($id) {
    global $conn;

    $idUser = $id;

    mysqli_query($conn,"DELETE FROM users WHERE idUser = $idUser");

    return mysqli_affected_rows($conn);

}

function editUser( $dataUser ) {
    global $conn;

    $idUser = $dataUser["idUser"];
    $newUsername = htmlspecialchars($dataUser["username"]);
    $newEmail = htmlspecialchars($dataUser["email"]);  
    $newLevel = htmlspecialchars($dataUser["level"]);

    if( $newLevel === "" ) {
        echo "<script>
             alert('Anda Belum memilih level, Silakan Dipilih Terlebih Dahulu!');
        </script>";

        return 0;
    }

    $updateUsers = "UPDATE users SET username = '$newUsername',
                    email = '$newEmail', level = '$newLevel' WHERE idUser = $idUser";

    mysqli_query($conn, $updateUsers);

    return mysqli_affected_rows($conn);

}

function uploadPic() {

    $picName = $_FILES["pic_product"]["name"];
    $picSize = $_FILES["pic_product"]["size"];
    $picError = $_FILES["pic_product"]["error"];
    $tmpName = $_FILES["pic_product"]["tmp_name"];

    if( $picError === 4 ) {
        echo "<script>
             alert('Anda Belum Mengupload Gambar!');
        </script>";

        return 0;
    }

    if( $picSize > 1000000 ) {
        echo "<script>
             alert('Gambar Yang Anda Upload Terlalu Besar! Silakan Upload Gambar dengan Ukuran lebih kecil lagi.');
        </script>";

        return 0;
    }

    // Extension Validation
    $extensionFileValidation = ["jpg", "jpeg", "png"];
    $myExtensionFile = explode(".", $picName);
    $myExtensionFile = strtolower(end( $myExtensionFile));

    if( !in_array( $myExtensionFile, $extensionFileValidation ) ) {
        echo "<script>
             alert('Yang Anda Upload Bukan Gambar, Silakan Upload Gambar!');
        </script>";

         return 0;
    }

    // Generate Unique ID
    $picName = uniqid();
    
    $picName .= ".";
    $picName .= $myExtensionFile;

    move_uploaded_file($tmpName, "imgProduct/" . $picName);

    return $picName;

}

function addProduct( $item ) {
    global $conn;

    $productID = $item["product_id"];
    $productName = $item["product_name"];
    $price = $item["product_price"];
    $stock = $item["product_stock"];
    $picProduct = uploadPic();

    // Ambil Produk ID di database
    $getDatasProducts = getData("SELECT * FROM produk");

    foreach( $getDatasProducts as $getDataProducts ) {
        if( $getDataProducts["ProdukID"] === $productID ) {
            echo "<script>
                 alert('Produk ID ini sudah digunakan, Silahkan Gunakan Produk ID yang lain');
            </script>";

            return 0;
        }
    }

    if( $picProduct === 0 ) {
        return $picProduct;
    }

    $queryInsertToProducts = "INSERT INTO produk VALUES(
                             '', '$productID', '$productName', $price,
                             $stock, '$picProduct'
                             )"; 
                
    mysqli_query($conn, $queryInsertToProducts);

    return mysqli_affected_rows($conn);

}

function addCheckout($item) {
    global $conn;

    $penjualanID = $item["penjualan_id"];
    $produkID = $item["product_id"];
    $totalProduk = $item["total_products"];
    $subtotal = $item["subtotal"];
    $stok = $item["product_stock"];

    $queryInsertToKeranjang = "INSERT INTO keranjang VALUES(
                              '', $penjualanID, '$produkID', $totalProduk,
                              $subtotal, $stok
                              )";

    mysqli_query($conn, $queryInsertToKeranjang);

    return mysqli_affected_rows($conn);

}

function deleteCheckout($id) {
    global $conn;

    $idKeranjang = $id;

    mysqli_query($conn, "DELETE FROM keranjang WHERE idKeranjang = $idKeranjang");

    return mysqli_affected_rows($conn);

}

function buyItemWithCheckout($item) {
    global $conn;

    $produkID = $item["product_id"];
    $penjualanID = $item["penjualan_id"];
    $tanggalPenjualan = $item["date_purchase"];
    $subtotal = $item["subtotal"];
    $namaPelanggan = getData("SELECT * FROM pelanggan")[0]["NamaPelanggan"];
    $totalProduk = (int)$item["total_products"];
    $pelangganID = getData("SELECT * FROM pelanggan")[0]["PelangganID"];

    // Ambil Stok didatabase
    $stokDB = getData("SELECT Stok FROM produk WHERE ProdukID = '$produkID'")[0]["Stok"];

    // Konversi String to int
    $stokDB = (int)$stokDB;

    $stokDB -= $totalProduk;


    $queryInsertToPenjualan = "INSERT INTO penjualan VALUES(
                                $penjualanID, '$tanggalPenjualan', $subtotal, '$namaPelanggan', $pelangganID
                                )";
            
    mysqli_query($conn, $queryInsertToPenjualan);
    mysqli_query($conn, "UPDATE produk SET Stok = $stokDB WHERE ProdukID = '$produkID'");

    return mysqli_affected_rows($conn);
}

function buyItemWithoutCheckout($item) {
    global $conn;

    $penjualanID = $item["penjualan_id"];
    $produkID = $item["product_id"];
    $totalProduk = (int)$item["total_products"];
    $subtotal = $item["subtotal"];
    $stok = $item["product_stock"];
    $tanggalPenjualan = $item["date_purchase"];
    $namaPelanggan = getData("SELECT * FROM pelanggan")[0]["NamaPelanggan"];
    $pelangganID = getData("SELECT * FROM pelanggan")[0]["PelangganID"];

    // Ambil Stok didatabase
    $stokDB = getData("SELECT Stok FROM produk WHERE ProdukID = '$produkID'")[0]["Stok"];

    // Konversi String to int
    $stokDB = (int)$stokDB;

    $stokDB -= $totalProduk;
    
    $queryInsertToKeranjang = "INSERT INTO keranjang VALUES(
        '', $penjualanID, '$produkID', $totalProduk,
        $subtotal, $stok
        )";


    $queryInsertToPenjualan = "INSERT INTO penjualan VALUES(
        $penjualanID, '$tanggalPenjualan', $subtotal, '$namaPelanggan', $pelangganID
        )";

    mysqli_query($conn, $queryInsertToKeranjang);
    mysqli_query($conn, $queryInsertToPenjualan);
    mysqli_query($conn, "UPDATE produk SET Stok = $stokDB WHERE ProdukID = '$produkID'");

    return mysqli_affected_rows($conn);
}

function  restockProduct( $item ) {
    global $conn;

    $produkID = $item["product_id"];
    $stock = $item["product_stock"];

    // Ambil Stok didatabase
    $stockDB = getData("SELECT Stok FROM produk WHERE ProdukID = '$produkID'")[0]["Stok"];
    
    // Konversi String ke int
    $stockDB = (int)$stockDB;
    
    if( $stockDB === 0 ) {
        
        mysqli_query( $conn, "UPDATE produk SET Stok = $stock WHERE ProdukID = '$produkID'" );
        return mysqli_affected_rows($conn);
        
    } else if( $stockDB > 0 ) {
        
        $restock = (int)$item["restock_stock"];
        $stockDB += $restock;

        mysqli_query( $conn, "UPDATE produk SET Stok = $stockDB WHERE ProdukID = '$produkID'" );
        return mysqli_affected_rows( $conn );
    }
}

function deleteProduct($id) {
    global $conn;

    $idProduk = $id;

    mysqli_query($conn, "DELETE FROM produk WHERE idProduk = $idProduk");

    return mysqli_affected_rows($conn);

}

function editProduct($item) {
    global $conn;

    $idProduk = $item["idProduk"];
    $produkID = $item["product_id"];
    $namaProduk = $item["product_name"];
    $harga = $item["product_price"];

    $updateProduk = "UPDATE produk SET ProdukID = '$produkID',
                    NamaProduk = '$namaProduk', Harga = $harga WHERE idProduk = $idProduk";

    mysqli_query($conn, $updateProduk);

    return mysqli_affected_rows($conn);

}

?>