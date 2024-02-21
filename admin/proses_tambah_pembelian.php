<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_user = $_POST["id_user"];
    $no_faktur = $_POST["no_faktur"];
    $qty = $_POST["qty"];
    $tanggal_pembelian = $_POST["tanggal_pembelian"];
    $id_suplier = $_POST["id_suplier"];
    $harga_beli = $_POST["harga_beli"];
    $bayar = $_POST["bayar"];
    $sisa = $_POST["sisa"];
    $created_at = $_POST["created_at"];

    // Lakukan validasi data
    // Misalnya, pastikan semua input tidak kosong dan sesuai dengan format yang diharapkan

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'pos');

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk memasukkan data pembelian ke dalam database
    $sql = "INSERT INTO pembelian (id_user, id_produk, qty, tanggal_pembelian, id_suplier, harga_beli, bayar, sisa, created_at) VALUES ('$id_user', '$id_produk', '$qty', '$tanggal_pembelian', '$id_suplier', '$harga_beli', '$bayar', '$sisa', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Pembelian berhasil ditambahkan.";
        header("Location: data-pembelian.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    // Jika tidak, redirect ke halaman tambah pembelian
    header("Location: tambah-pembelian.php");
    exit();
}
?>