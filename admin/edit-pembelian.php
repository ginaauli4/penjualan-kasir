<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Edit Pembelian</title>
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

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Edit Pembelian</h2>
            <form action="proses_edit_pembelian.php"
                  method="POST">
                <label for="id_toko">ID Toko</label>
                <input type="text"
                       id="id_toko"
                       name="id_toko"
                       value="<?= $id_toko ?>">

                <label for="id_user">ID User</label>
                <input type="text"
                       id="id_user"
                       name="id_user"
                       value="<?= $id_user ?>">

                <label for="no_faktur">No. Faktur</label>
                <input type="text"
                       id="no_faktur"
                       name="no_faktur"
                       value="<?= $no_faktur ?>">

                <label for="tanggal_pembelian">Tanggal Pembelian</label>
                <input type="date"
                       id="tanggal_pembelian"
                       name="tanggal_pembelian"
                       value="<?= $tanggal_pembelian ?>">

                <label for="id_suplier">ID Suplier</label>
                <input type="text"
                       id="id_suplier"
                       name="id_suplier"
                       value="<?= $id_suplier ?>">

                <label for="total">Total</label>
                <input type="text"
                       id="total"
                       name="total"
                       value="<?= $total ?>">

                <label for="bayar">Bayar</label>
                <input type="text"
                       id="bayar"
                       name="bayar"
                       value="<?= $bayar ?>">

                <label for="sisa">Sisa</label>
                <input type="text"
                       id="sisa"
                       name="sisa"
                       value="<?= $sisa ?>">

                <label for="keterangan">Keterangan</label>
                <input type="text"
                       id="keterangan"
                       name="keterangan"
                       value="<?= $keterangan ?>">

                <input type="submit"
                       value="Simpan Perubahan">
            </form>
        </div>
    </body>

</html>