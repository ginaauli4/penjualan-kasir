<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Pelanggan</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
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
            color: #4682B4;
            /* Ubah warna judul menjadi biru */
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
            border: 1px solid #4682B4;
            /* Ubah warna border menjadi biru */
            border-radius: 6px;
            font-size: 16px;
            color: #333;
            /* Ubah warna teks menjadi gelap */
        }

        input[type="submit"] {
            background-color: #4682B4;
            /* Ubah warna background tombol menjadi biru */
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4169E1;
            /* Ubah warna background tombol menjadi biru yang lebih tua saat hover */
        }
        </style>
    </head>

    <body>
        <form action="proses_tambah_pelanggan.php"
              method="post">
            <h2>Tambah Pelanggan</h2>


            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text"
                   id="nama_pelanggan"
                   name="nama_pelanggan"
                   required>

            <label for="alamat">Alamat:</label>
            <input type="text"
                   id="alamat"
                   name="alamat"
                   required>

            <label for="no_hp">No. HP:</label>
            <input type="text"
                   id="no_hp"
                   name="no_hp"
                   required>

            <label for="created_at">Created At:</label>
            <input type="text"
                   id="created_at"
                   name="created_at"
                   required>

            <input type="submit"
                   value="Tambah Pelanggan">
        </form>
    </body>
    <script>
    var createdAtInput = document.getElementById("created_at");

    var currentTime = new Date();

    var formattedTime = currentTime.toISOString().slice(0, 19).replace('T', ' ');

    createdAtInput.value = formattedTime;
    </script>

</html>