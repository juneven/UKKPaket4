<?php 

require 'function/functions.php';

$getDatasPenjualan = getData("SELECT * FROM penjualan");

?>

<div class="row">
    <div class="col-lg-4 mb-3">
    <a href="" class="btn btn-sm btn-primary shadow-sm report" onclick="return window.print();"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Penjualan ID</th>
                <th>Tanggal Penjualan</th>
                <th>Total Harga</th>
                <th>Nama Pelanggan</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Penjualan ID</th>
                <th>Tanggal Penjualan</th>
                <th>Total Harga</th>
                <th>Nama Pelanggan</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach( $getDatasPenjualan as $getDataPenjualan ) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $getDataPenjualan["PenjualanID"]; ?></td>
                    <td><?= $getDataPenjualan["TanggalPenjualan"]; ?></td>
                    <td><?= $getDataPenjualan["TotalHarga"]; ?></td>
                    <td><?= $getDataPenjualan["NamaPelanggan"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>