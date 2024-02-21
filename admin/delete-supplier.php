<?php
// Include file koneksi
include "../koneksi.php";

// Pastikan parameter id_supplier telah ada
if (isset($_GET['id_supplier'])) {
    // Mendapatkan id_supplier dari parameter
    $id_supplier = $_GET['id_supplier'];

    // Query untuk menghapus data supplier berdasarkan id_supplier
    $query = "DELETE FROM supplier WHERE id_supplier = '$id_supplier'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, redirect kembali ke halaman data-supplier.php
        header("Location: data-supplier.php");
        exit();
    } else {
        // Jika terjadi error saat menjalankan query
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_supplier tidak tersedia, berikan pesan error
    echo "ID Supplier tidak tersedia";
}
?>