<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Barang Supplier</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4e73df;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #375ab5;
        }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Tambah Barang Supplier</h2>
            <form action="proses_tambah_barang_supplier.php"
                  method="POST">
                <input type='hidden'
                       name='id_suplier'
                       value='<?= $_GET['id_suplier'] ?>' />
                <label for="kategori">Kategori:</label>
                <input type="text"
                       id="kategori"
                       name="kategori"
                       required>

                <label for="nama_barang">Nama Barang:</label>
                <input type="text"
                       id="nama_barang"
                       name="nama_barang"
                       required>

                <label for="harga">Harga:</label>
                <input type="number"
                       id="harga"
                       name="harga"
                       required>

                <input type="submit"
                       value="Tambah Barang">
            </form>
        </div>
    </body>

</html>