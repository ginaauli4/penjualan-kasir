<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Pengguna</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            /* Mengubah tinggi body menjadi minimal 100vh */
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            /* Mengubah padding menjadi 30px */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #4682B4;
            /* Ubah warna judul menjadi biru */
            margin-bottom: 20px;
            /* Ubah margin-bottom menjadi 20px */
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            /* Ubah margin-bottom menjadi 10px */
            color: #555555;
        }

        input,
        select {
            width: calc(100% - 22px);
            /* Ubah width menjadi 100% - 22px */
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4682B4;
            /* Ubah warna background tombol menjadi biru */
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4169E1;
            /* Ubah warna background tombol menjadi biru tua saat hover */
        }
        </style>
    </head>

    <body>
        <form action="proses_tambah_pengguna.php"
              method="post">
            <h2>Tambah Pengguna</h2>

            <label for="id_user">ID User:</label>
            <input type="text"
                   id="id_user"
                   name="id_user"
                   readonly>


            <label for="username">Username:</label>
            <input type="text"
                   id="username"
                   name="username"
                   required>

            <label for="password">Password:</label>
            <input type="password"
                   id="password"
                   name="password"
                   required>

            <label for="email">Email:</label>
            <input type="email"
                   id="email"
                   name="email"
                   required>

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text"
                   id="nama_lengkap"
                   name="nama_lengkap"
                   required>


            <label for="access_level">Access Level:</label>
            <select id="access_level"
                    name="access_level"
                    required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>

            <label for="created_at">Created At:</label>
            <input type="timestamp"
                   id="created_at"
                   name="created_at"
                   required>

            <input type="submit"
                   value="Tambah Pengguna">
        </form>
    </body>
    <script>
    var createdAtInput = document.getElementById("created_at");

    var currentTime = new Date();

    var formattedTime = currentTime.toISOString().slice(0, 19).replace('T', ' ');

    createdAtInput.value = formattedTime;
    </script>

</html>