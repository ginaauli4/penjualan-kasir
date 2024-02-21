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
$id_supplier = $_POST['id_supplier'];
$id_toko = $_POST['id_toko'];
$nama_supplier = $_POST['nama_supplier'];
$tlp_hp = $_POST['tlp_hp'];
$created_at = $_POST['created_at'];

// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO suplier (id_supplier, id_toko, nama_supplier, tlp_hp, created_at)
        VALUES ('$id_supplier', '$id_toko', '$nama_supplier', '$tlp_hp', '$created_at')";

// Jalankan query
if ($koneksi->query($sql) === TRUE) {
    echo '<script>alert("Data Supplier Berhasil Ditambahkan.");
    window.location.href = "data-supplier.php";
    </script>';
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>