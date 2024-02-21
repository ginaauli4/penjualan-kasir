<?php
include "../koneksi.php";

// Pastikan data yang dikirimkan tidak kosong
if (!empty($_POST['nama_toko']) && !empty($_POST['alamat']) && !empty($_POST['tlp_hp'])) {
    $nama_toko = $_POST['nama_toko'];
    $alamat = $_POST['alamat'];
    $tlp_hp = $_POST['tlp_hp'];

    // Tambahkan data toko ke dalam database
    $query = "INSERT INTO toko (nama_toko, alamat, tlp_hp, created_at) VALUES ('$nama_toko', '$alamat', '$tlp_hp', NOW())";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Jika berhasil, redirect ke halaman utama atau halaman lain yang diinginkan
        header("Location: toko.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan penanganan error sesuai kebutuhan
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika data yang dikirimkan kosong, tampilkan pesan error atau lakukan penanganan error sesuai kebutuhan
    echo "Semua field harus diisi!";
}
?>