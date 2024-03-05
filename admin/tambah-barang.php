<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Barang</title>
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
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #4682B4;
            /* Ubah warna border menjadi biru */
            border-radius: 6px;
            font-size: 16px;
            color: #333;

        }

        input[type="submit"] {
            background-color: #4682B4;
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
        <form action="proses_tambah_barang.php"
              method="post">
            <h2 style="color: #4682B4;">Tambah Barang</h2>

            <label for="harga_jual">Harga Jual:</label>
            <input type="text"
                   id="harga_jual"
                   name="harga_jual"
                   required>

            <input type="submit"
                   value="Tambah Barang">
        </form>
    </body>

</html>