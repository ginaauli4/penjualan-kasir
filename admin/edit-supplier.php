<?php
// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Inisialisasi variabel ID supplier
$id_supplier = null;

// Periksa apakah ID supplier diberikan dalam URL
if(isset($_GET['id_supplier'])) {
    $id_supplier = $_GET['id_supplier'];

    // Buat query untuk mengambil data supplier
    $stmt = $pdo->prepare("SELECT * FROM suplier WHERE id_supplier = :id_supplier");
    $stmt->execute(['id_supplier' => $id_supplier]);
    $supplier = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika supplier tidak ditemukan, tampilkan pesan kesalahan
    if(!$supplier) {
        echo "Supplier tidak ditemukan.";
        exit;
    }
} else {
    // Jika ID supplier tidak diberikan dalam URL, tampilkan pesan kesalahan
    echo "ID supplier tidak diberikan.";
    exit;
}

// Set nilai-nilai dalam variabel PHP jika supplier ditemukan
$id_toko = $supplier['id_toko'];
$nama_supplier = $supplier['nama_supplier'];
$no_telepon = $supplier['tlp_hp'];
$alamat = $supplier['alamat_supplier'];
$created_at = $supplier['created_at'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Edit Supplier</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150vh;
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
        <form action="proses_edit_supplier.php"
              method="post">
            <h2>Edit Supplier</h2>

            <!-- Hidden field to store the ID of the supplier -->
            <input type="hidden"
                   name="id_supplier"
                   value="<?= $id_supplier ?>">

            <label for="id_toko">ID Toko:</label>
            <input type="text"
                   id="id_toko"
                   name="id_toko"
                   value="<?= $id_toko ?>"
                   required>

            <label for="nama_supplier">Nama Supplier:</label>
            <input type="text"
                   id="nama_supplier"
                   name="nama_supplier"
                   value="<?= $nama_supplier ?>"
                   required>

            <label for="no_telepon">No. Telepon:</label>
            <input type="text"
                   id="no_telepon"
                   name="no_telepon"
                   value="<?= $no_telepon ?>"
                   required>

            <label for="alamat">Alamat:</label>
            <input type="text"
                   id="alamat"
                   name="alamat"
                   value="<?= $alamat ?>"
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