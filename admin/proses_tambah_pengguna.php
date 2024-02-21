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
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$access_level = $_POST['access_level'];
$created_at = $_POST['created_at'];


// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO user (id_user, username, password, email, nama_lengkap, access_level, created_at)
        VALUES ('$id_user', '$username', '$password', '$email', '$nama_lengkap', '$access_level', '$created_at')";

// Jalankan query
if ($koneksi->query($sql) === TRUE) {
echo '<script>
alert("Data Berhasil Ditambahkan.");
window.location.href = "data-user.php";
</script>';
 } else {
echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>