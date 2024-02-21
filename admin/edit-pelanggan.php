<?php
// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Inisialisasi variabel ID pelanggan
$id_pelanggan = null;

// Periksa apakah ID pelanggan diberikan dalam URL
if(isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Buat query untuk mengambil data pelanggan
    $stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
    $stmt->execute(['id_pelanggan' => $id_pelanggan]);
    $pelanggan = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika pelanggan tidak ditemukan, tampilkan pesan kesalahan
    if(!$pelanggan) {
        echo "Pelanggan tidak ditemukan.";
        exit;
    }
} else {
    // Jika ID pelanggan tidak diberikan dalam URL, tampilkan pesan kesalahan
    echo "ID pelanggan tidak diberikan.";
    exit;
}

// Set nilai-nilai dalam variabel PHP jika pelanggan ditemukan
$id_toko = $pelanggan['id_toko'];
$nama_pelanggan = $pelanggan['nama_pelanggan'];
$alamat = $pelanggan['alamat'];
$no_hp = $pelanggan['no_hp'];
$created_at = $pelanggan['created_at'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Edit Pelanggan</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #dddddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        </style>
    </head>

    <body>
        <form action="proses_edit_pelanggan.php"
              method="post">
            <h2>Edit Pelanggan</h2>
            <!-- Hidden field to store the ID of the customer -->
            <input type="hidden"
                   name="id_pelanggan"
                   value="<?= $id_pelanggan ?>">
            <label for="id_toko">ID Toko:</label>
            <input type="text"
                   id="id_toko"
                   name="id_toko"
                   value="<?= $id_toko ?>"
                   required>
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text"
                   id="nama_pelanggan"
                   name="nama_pelanggan"
                   value="<?= $nama_pelanggan ?>"
                   required>
            <label for="alamat">Alamat:</label>
            <input type="text"
                   id="alamat"
                   name="alamat"
                   value="<?= $alamat ?>"
                   required>
            <label for="no_hp">No. HP:</label>
            <input type="text"
                   id="no_hp"
                   name="no_hp"
                   value="<?= $no_hp ?>"
                   required>
            <label for="created_at">Created At:</label>
            <input type="text"
                   id="created_at"
                   name="created_at"
                   value="<?= $created_at ?>"
                   required>
            <input type="submit"
                   value="Simpan Perubahan">
        </form>
    </body>

</html>