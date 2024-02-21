<?php
include "../koneksi.php";

// Periksa apakah parameter id_toko telah diberikan
if(isset($_GET['id_toko'])) {
    $id_toko = $_GET['id_toko'];

    // Hapus data toko dari database berdasarkan id_toko
    $query = "DELETE FROM toko WHERE id_toko=$id_toko";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah proses penghapusan berhasil
    if($result) {
        header("Location: toko.php"); // Redirect kembali ke halaman data-toko.php setelah hapus berhasil
    } else {
        echo "Gagal menghapus data toko.";
    }
} else {
    echo "ID toko tidak diberikan.";
}
?>