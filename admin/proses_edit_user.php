<?php
// Mulai session
session_start();

// Ambil data yang dikirimkan melalui metode POST
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$access_level = $_POST['access_level'];
$created_at = $_POST['created_at'];

// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Buat query untuk mengupdate data pengguna
$sql = "UPDATE user SET username = :username, email = :email, nama_lengkap = :nama_lengkap, access_level = :access_level, created_at = :created_at WHERE id_user = :id_user";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':nama_lengkap', $nama_lengkap);
$stmt->bindParam(':access_level', $access_level);
$stmt->bindParam(':created_at', $created_at);
$stmt->bindParam(':id_user', $id_user);

// Eksekusi query
if ($stmt->execute()) {
    // Set notifikasi dengan menggunakan JavaScript
    echo '<script>
        alert("Data Berhasil Disimpan.");
        window.location.href = "data-user.php"; 
    </script>';
} else {
    // Jika query tidak berhasil dieksekusi
    echo "Gagal menyimpan data.";
}
?>