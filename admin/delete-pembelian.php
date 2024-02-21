<?php
// Pastikan parameter id_pembelian telah ada
if (isset($_GET['id_pembelian'])) {
    // Mendapatkan id_pembelian dari parameter
    $id_pembelian = $_GET['id_pembelian'];

    // Lakukan koneksi ke database
    include "../koneksi.php";

    // Query untuk menghapus data pembelian berdasarkan id_pembelian
    $query = "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, redirect kembali ke halaman data-pembelian.php
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