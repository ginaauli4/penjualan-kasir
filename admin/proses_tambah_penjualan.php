<?php 
session_start();
include "../koneksi.php";

$total_bayar = $_POST['total_bayar'];
$sisa = $_POST['sisa'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$id_user = $_SESSION['id_user'];
$id_toko = $_SESSION['id_toko'];

$result_produk_kasir = mysqli_query($koneksi,"SELECT produk_kasir.*,produk.* FROM produk_kasir INNER JOIN produk ON produk_kasir.nama_barang = produk.nama_produk");


while($row = mysqli_fetch_assoc($result_produk_kasir)){
    $iduser = $row['id_user'];
    $nama_barang = $row['nama_barang'];
    $bayar = $row['bayar'];
    $sisa = $row['sisa'];
    $qty = $row['qty'];
    $total = $row['harga_jual'] * $qty;
    $sisa_barang = $total - $total_bayar;

    $insertdata = mysqli_query($koneksi,"INSERT INTO penjualan (id_toko,id_user,qty,bayar,sisa,nama_barang,total) VALUES('$id_toko','$id_user','$qty','$total_bayar','$sisa_barang','$nama_barang','$total')");

}

$deleteproduk = mysqli_query($koneksi,"DELETE FROM produk_kasir");
header("Location:../kasir/index.php");

?>