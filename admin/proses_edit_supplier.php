<?php
// Mulai session
session_start();

// Ambil data yang dikirimkan melalui metode POST
$id_supplier = $_POST['id_supplier'];
$id_toko = $_POST['id_toko'];
$nama_supplier = $_POST['nama_supplier'];
$no_telepon = $_POST['no_telepon'];
$alamat = $_POST['alamat'];
$created_at = $_POST['created_at'];

// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Buat query untuk mengupdate data supplier
$sql = "UPDATE suplier SET id_toko = :id_toko, nama_supplier = :nama_supplier, tlp_hp = :tlp_hp, alamat_supplier = :alamat, created_at = :created_at WHERE id_supplier = :id_supplier";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_supplier', $id_supplier);
$stmt->bindParam(':id_toko', $id_toko);
$stmt->bindParam(':nama_supplier', $nama_supplier);
$stmt->bindParam(':tlp_hp', $no_telepon);
$stmt->bindParam(':alamat', $alamat);
$stmt->bindParam(':created_at', $created_at);


// Eksekusi query
if ($stmt->execute()) {
    // Set notifikasi dengan menggunakan JavaScript dan redirect ke halaman data supplier setelah proses edit selesai
    echo '<script>
        alert("Data Berhasil Disimpan.");
        window.location.href = "data-supplier.php"; 
    </script>';
} else {
    // Jika query tidak berhasil dieksekusi
    echo "Gagal menyimpan data.";
}
?>