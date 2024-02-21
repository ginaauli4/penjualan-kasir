<?php
// Mulai session
session_start();

// Ambil data yang dikirimkan melalui metode POST
$stok = $_POST['stok'];
$id_produk = $_POST['id_produk'];
$id_toko = $_POST['id_toko'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$created_at = $_POST['created_at'];

// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Buat query untuk mengupdate data barang
$sql = "UPDATE produk SET  stok = :stok, id_toko = :id_toko, nama_produk = :nama_produk, id_kategori = :id_kategori, satuan = :satuan, harga_beli = :harga_beli, harga_jual = :harga_jual, created_at = :created_at WHERE id_produk = :id_produk";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':stok', $stok);
$stmt->bindParam(':id_toko', $id_toko);
$stmt->bindParam(':nama_produk', $nama_produk);
$stmt->bindParam(':id_kategori', $id_kategori);
$stmt->bindParam(':satuan', $satuan);
$stmt->bindParam(':harga_beli', $harga_beli);
$stmt->bindParam(':harga_jual', $harga_jual);
$stmt->bindParam(':created_at', $created_at);
$stmt->bindParam(':id_produk', $id_produk);

// Eksekusi query
if ($stmt->execute()) {
    // Set notifikasi dengan menggunakan JavaScript
    echo '<script>
        alert("Data Berhasil Disimpan.");
        window.location.href = "data-barang.php"; 
    </script>';
} else {
    // Jika query tidak berhasil dieksekusi
    echo "Gagal menyimpan data.";
}
?>