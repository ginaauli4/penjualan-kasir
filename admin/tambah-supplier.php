<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Supplier</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
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
            color: #4682B4;
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
            border-radius: 6px;
            font-size: 16px;
            color: #333;
        }

        input[type="submit"] {
            background-color: #4682B4;
            /* Warna biru untuk tombol */
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
        }
        </style>
    </head>

    <body>
        <form action="proses_tambah_supplier.php"
              method="post">
            <h2>Tambah Supplier</h2>

            <label for="nama_supplier">Nama Supplier:</label> <!-- Perbaiki penulisan nama_supplier -->
            <input type="text"
                   id="nama_supplier"
                   name="nama_supplier"
                   required>

            <label for="tlp_hp">No. Telepon:</label>
            <input type="text"
                   id="tlp_hp"
                   name="tlp_hp"
                   required>

            <label for="created_at">Created At:</label>
            <input type="timestamp"
                   id="created_at"
                   name="created_at"
                   required>

            <input type="submit"
                   value="Tambah Supplier">
        </form>
    </body>
    <script>
    var createdAtInput = document.getElementById("created_at");

    var currentTime = new Date();

    var formattedTime = currentTime.toISOString().slice(0, 19).replace('T', ' ');

    createdAtInput.value = formattedTime;
    </script>

</html>