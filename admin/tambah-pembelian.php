<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Tambah Pembelian</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 170vh;
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
        <form action="proses_tambah_pembelian.php"
              method="post">
            <h2>Tambah Pembelian</h2>

            <label for="id_user">ID User:</label>
            <input type="text"
                   id="id_user"
                   name="id_user"
                   required>

            <label for="id_produk">ID Produk:</label>
            <input type="text"
                   id="id_produk"
                   name="id_produk"
                   required>

            <label for="qty">Qty:</label>
            <input type="text"
                   id="qty"
                   name="qty"
                   required>

            <label for="tanggal_pembelian">Tanggal Pembelian:</label>
            <input type="text"
                   id="tanggal_pembelian"
                   name="tanggal_pembelian"
                   required>

            <label for="id_suplier">ID Suplier:</label>
            <input type="text"
                   id="id_suplier"
                   name="id_suplier"
                   required>

            <label for="harga_beli">Harga Beli:</label>
            <input type="text"
                   id="harga_beli"
                   name="harga_beli"
                   required>

            <label for="bayar">Bayar:</label>
            <input type="text"
                   id="bayar"
                   name="bayar"
                   required>

            <label for="sisa">Sisa:</label>
            <input type="text"
                   id="sisa"
                   name="sisa"
                   required>

            <label for="created_at">Created At:</label>
            <input type="text"
                   id="created_at"
                   name="created_at"
                   required>

            <input type="submit"
                   value="Tambah Pembelian">
        </form>

        <script>
        var tanggalPembelianInput = document.getElementById("tanggal_pembelian");
        var createdAtInput = document.getElementById("created_at");

        var currentTime = new Date();
        var formattedDate = currentTime.toISOString().slice(0, 10);

        tanggalPembelianInput.value = formattedDate;
        createdAtInput.value = formattedDate;
        </script>
    </body>

</html>