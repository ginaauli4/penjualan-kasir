<?php
// Pastikan parameter id_pelanggan telah ada
if (isset($_POST['id_pelanggan'])) {
    // Mendapatkan id_pelanggan dari parameter
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_toko = $_POST['id_toko'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $created_at = $_POST['created_at'];

    // Lakukan koneksi ke database
    include "../koneksi.php";

    // Query untuk melakukan update data pelanggan
    $query = "UPDATE pelanggan SET id_toko = '$id_toko', nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', no_hp = '$no_hp', created_at = '$created_at' WHERE id_pelanggan = '$id_pelanggan'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Jika pengeditan berhasil, redirect kembali ke halaman data-pelanggan.php
        header("Location: data-pelanggan.php");
        exit();
    } else {
        // Jika terjadi error saat menjalankan query
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter id_pelanggan tidak tersedia, berikan pesan error
    echo "ID Pelanggan tidak tersedia";
}
?>