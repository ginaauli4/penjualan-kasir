<?php
include "../koneksi.php";

// Pastikan parameter id_produk telah ada
if (isset($_GET['id_produk'])) {
    // Mendapatkan id_produk dari parameter
    $id_produk = $_GET['id_produk'];

    // Query untuk menghapus data barang berdasarkan id_produk
    $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, redirect kembali ke halaman data-barang.php
        header("Location: data-barang.php");
        exit();
    } else {
        // Jika terjadi error saat menjalankan query
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_produk tidak tersedia, berikan pesan error
    echo "ID Produk tidak tersedia";
}
?>