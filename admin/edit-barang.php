<?php
// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Inisialisasi variabel ID produk
$id_produk = null;

// Periksa apakah ID produk diberikan dalam URL
if(isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Buat query untuk mengambil data produk
    $stmt = $pdo->prepare("SELECT * FROM produk WHERE id_produk = :id_produk");
    $stmt->execute(['id_produk' => $id_produk]);
    $produk = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika produk tidak ditemukan, tampilkan pesan kesalahan
    if(!$produk) {
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    // Jika ID produk tidak diberikan dalam URL, tampilkan pesan kesalahan
    echo "ID produk tidak diberikan.";
    exit;
}

// Set nilai-nilai dalam variabel PHP jika produk ditemukan
$stok = $produk['stok'];
$id_toko = $produk['id_toko'];
$nama_produk = $produk['nama_produk'];
$id_kategori = $produk['id_kategori'];
$satuan = $produk['satuan'];
$harga_beli = $produk['harga_beli'];
$harga_jual = $produk['harga_jual'];
$created_at = $produk['created_at'];
?>



<!DOCTYPE html>
<html lang="en">

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, initial-scale=1.0">
            <title>Edit Barang</title>
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
            <form action="proses_edit_barang.php"
                  method="post">
                <h2>Edit Barang</h2>

                <!-- Hidden field to store the ID of the product -->
                <input type="hidden"
                       name="id_produk"
                       value="<?= $id_produk ?>">

                <label for="id_toko">ID Toko:</label>
                <input type="text"
                       id="id_toko"
                       name="id_toko"
                       value="<?= $id_toko ?>"
                       readonly>

                <label for="stok">Stok:</label>
                <input type="text"
                       id="stok"
                       name="stok"
                       value="<?= $stok ?>"
                       required>

                <label for="nama_produk">Nama Produk:</label>
                <input type="text"
                       id="nama_produk"
                       name="nama_produk"
                       value="<?= $nama_produk ?>"
                       required>

                <label for="id_kategori">ID Kategori:</label>
                <input type="text"
                       id="id_kategori"
                       name="id_kategori"
                       value="<?= $id_kategori ?>"
                       readonly>

                <label for="satuan">Satuan:</label>
                <input type="text"
                       id="satuan"
                       name="satuan"
                       value="<?= $satuan ?>"
                       required>

                <label for="harga_beli">Harga Beli:</label>
                <input type="text"
                       id="harga_beli"
                       name="harga_beli"
                       value="<?= $harga_beli ?>"
                       required>

                <label for="harga_jual">Harga Jual:</label>
                <input type="text"
                       id="harga_jual"
                       name="harga_jual"
                       value="<?= $harga_jual ?>"
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
        <script>
        var createdAtInput = document.getElementById("created_at");

        var currentTime = new Date();

        var formattedTime = currentTime.toISOString().slice(0, 19).replace('T', ' ');

        createdAtInput.value = formattedTime;
        </script>


    </html>