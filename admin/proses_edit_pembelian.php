<?php
// Pastikan parameter id_pembelian telah ada
if (isset($_POST['id_pembelian'])) {
    // Mendapatkan id_pembelian dari parameter
    $id_pembelian = $_POST['id_pembelian'];
    $id_toko = $_POST['id_toko'];
    $id_user = $_POST['id_user'];
    $no_faktur = $_POST['no_faktur'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];
    $id_suplier = $_POST['id_suplier'];
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];
    $keterangan = $_POST['keterangan'];

    // Lakukan koneksi ke database
    include "../koneksi.php";

    // Query untuk melakukan update data pembelian
    $query = "UPDATE pembelian SET 
              id_toko = '$id_toko', 
              id_user = '$id_user', 
              no_faktur = '$no_faktur', 
              tanggal_pembelian = '$tanggal_pembelian', 
              id_suplier = '$id_suplier', 
              total = '$total', 
              bayar = '$bayar', 
              sisa = '$sisa', 
              keterangan = '$keterangan' 
              WHERE id_pembelian = '$id_pembelian'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika pengeditan berhasil, redirect kembali ke halaman data-pembelian.php
        header("Location: data-pembelian.php");
        exit();
    } else {
        // Jika terjadi error saat menjalankan query
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_pembelian tidak tersedia, berikan pesan error
    echo "ID Pembelian tidak tersedia";
}
?>