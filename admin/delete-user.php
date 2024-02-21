<?php
include "../koneksi.php";

// Pastikan parameter id_user telah ada
if (isset($_GET['id_user'])) {
    // Mendapatkan id_user dari parameter
    $id_user = $_GET['id_user'];

    // Query untuk menghapus data pengguna berdasarkan id_user
    $query = "DELETE FROM user WHERE id_user = '$id_user'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika penghapusan berhasil, redirect kembali ke halaman data-user.php
        header("Location: data-user.php");
        exit();
    } else {
        // Jika terjadi error saat menjalankan query
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_user tidak tersedia, berikan pesan error
    echo "ID User tidak tersedia";
}
?>