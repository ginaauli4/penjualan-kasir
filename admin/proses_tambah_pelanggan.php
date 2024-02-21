<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "pos";

// Objek koneksi mysqli
$koneksi = new mysqli($servername, $username, $password, $database);

// Koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Tangkap data dari formulir
$id_pelanggan = $_POST['id_pelanggan'];
$id_toko = $_POST['id_toko'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$created_at = $_POST['created_at'];

// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO pelanggan (id_pelanggan, id_toko, nama_pelanggan, alamat, no_hp, created_at)
        VALUES ('$id_pelanggan', '$id_toko', '$nama_pelanggan', '$alamat', '$no_hp', '$created_at')";

// Jalankan query
if ($koneksi->query($sql) === TRUE) {
    echo '<script>alert("Data Pelanggan Berhasil Ditambahkan.");
    window.location.href = "data-pelanggan.php";
    </script>';
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>