<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Toko</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f5f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        label {
            margin-top: 10px;
            color: #007bff;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-top: 4px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        </style>
    </head>

    <body>

        <form action="proses_tambah_toko.php"
              method="POST">
            <h2>Tambah Toko</h2>
            <label for="nama_toko">Nama Toko:</label><br>
            <input type="text"
                   id="nama_toko"
                   name="nama_toko"><br>

            <label for="alamat">Alamat:</label><br>
            <input type="text"
                   id="alamat"
                   name="alamat"><br>

            <label for="tlp_hp">Nomor HP:</label><br>
            <input type="text"
                   id="tlp_hp"
                   name="tlp_hp"><br>

            <!-- Jika Anda ingin menambahkan pilihan kategori, Anda bisa menambahkan dropdown di sini -->

            <button type="submit">Simpan</button>
        </form>

    </body>

</html>