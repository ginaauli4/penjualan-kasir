<?php
include "../koneksi.php";

// Periksa apakah parameter id_toko telah diberikan
if(isset($_GET['id_toko'])) {
    $id_toko = $_GET['id_toko'];

    // Ambil data toko dari database berdasarkan id_toko
    $query = "SELECT * FROM toko WHERE id_toko = $id_toko";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah data toko ditemukan
    if(mysqli_num_rows($result) > 0) {
        $toko = mysqli_fetch_assoc($result);
    } else {
        echo "Data toko tidak ditemukan.";
        exit();
    }
} else {
    echo "ID toko tidak diberikan.";
    exit();
}

// Proses form jika ada data yang dikirimkan
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui form
    $nama_toko = $_POST['nama_toko'];
    $alamat = $_POST['alamat'];
    $tlp_hp = $_POST['tlp_hp'];

    // Update data toko dalam database
    $query = "UPDATE toko SET nama_toko='$nama_toko', alamat='$alamat', tlp_hp='$tlp_hp' WHERE id_toko=$id_toko";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah proses update berhasil
    if($result) {
        header("Location: data-toko.php"); // Redirect kembali ke halaman data-toko.php setelah update berhasil
    } else {
        echo "Gagal mengupdate data toko.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Edit Toko</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
        </style>
    </head>

    <body>
        <h2>Edit Toko</h2>
        <form action=""
              method="POST">
            <label for="nama_toko">Nama Toko:</label><br>
            <input type="text"
                   id="nama_toko"
                   name="nama_toko"
                   value="<?php echo $toko['nama_toko']; ?>"><br>

            <label for="alamat">Alamat:</label><br>
            <input type="text"
                   id="alamat"
                   name="alamat"
                   value="<?php echo $toko['alamat']; ?>"><br>

            <label for="tlp_hp">Nomor HP:</label><br>
            <input type="text"
                   id="tlp_hp"
                   name="tlp_hp"
                   value="<?php echo $toko['tlp_hp']; ?>"><br>

            <button type="submit">Simpan</button>
        </form>
    </body>

</html>