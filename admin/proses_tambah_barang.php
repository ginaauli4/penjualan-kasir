<?php
// koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "pos";

// objek koneksi mysqli
$koneksi = new mysqli($servername, $username, $password, $database);

// koneksi
if (mysqli_connect_error()){
    echo"koneksi database gagal : ", mysqli_connect_error();
}
function dump($var)
{
  var_dump($var);
  die;

}

// Tangkap data dari formulir

$harga_jual = $_POST['harga_jual'];

// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO produk (harga_jual)
VALUES ('$harga_jual')";

// Jalankan query
if ($koneksi->query($sql) === TRUE) {
echo '<script>
alert("Data Berhasil Ditambahkan.");
window.location.href = "data-barang.php";
</script>';
 } else {
echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>