<?php 
session_start();
include "../koneksi.php";

$total_bayar = $_POST['total_bayar'];
$sisa = $_POST['sisa'];
$jumlah_bayar = $_POST['jumlah_bayar'];

$result_tambah_pembelian= mysqli_query($koneksi,"SELECT tambah_pembelian.*,barang_suplier.* FROM tambah_pembelian INNER JOIN barang_suplier ON tambah_pembelian.nama_produk = barang_suplier.nama_barang");
$datenow = date("Y-m-d");

while($row = mysqli_fetch_assoc($result_tambah_pembelian)){
    $nama_barang = $row['nama_produk'];
    $bayar = $row['bayar'];
    $sisa = $row['sisa'];
    $qty = $row['qty'];
    $harga = $row['harga'];
    $total = $row['harga'] * $qty;
    $sisa_barang = $jumlah_bayar - $total_bayar;
    $nama_suplier = $row['nama_suplier'];

    $insertdata = mysqli_query($koneksi,"INSERT INTO pembelian (qty,bayar,sisa,nama_produk,tanggal_pembelian,harga_beli,nama_suplier,total_bayar) VALUES ('$qty','$jumlah_bayar','$sisa_barang','$nama_barang','$datenow','$total','$nama_suplier','$total_bayar')");
    $insertdatabarang = mysqli_query($koneksi,"INSERT INTO produk (nama_produk,stok,harga_beli,created_at) VALUES ('$nama_barang','$qty','$harga','$datenow')");
}

$deleteproduk = mysqli_query($koneksi,"DELETE FROM tambah_pembelian");
header("Location:data-pembelian.php");

?>