<?php
    include "../koneksi.php";
    session_start();
    $id_suplier = $_GET['id_supplier'];
?>

<!-- Data Supplier -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Data Barang Supplier</title>
        <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            margin-right: 5px;
        }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <h2>Data Barang Supplier</h2><a href="tambah-barang-supplier.php?id_suplier=<?= $id_suplier ?>"><button
                        class="btn btn-primary">Tambah
                    Barang Supplier</button></a>
            <table border="1">
                <tr>
                    <th>No.</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                </tr>
                <?php 
                $resultsuplier = mysqli_query($koneksi,"SELECT * FROM suplier WHERE id_supplier = '{$_GET['id_supplier']}'");
                $fetchsupplier = mysqli_fetch_assoc($resultsuplier);
                $namasupplier = $fetchsupplier['nama_supplier'];
                $result=mysqli_query($koneksi, "SELECT * FROM barang_suplier WHERE nama_suplier = '$namasupplier'");
        $no=1;
        while ($d=mysqli_fetch_assoc($result)) : ?><tr>
                    <td><?=$no++?></td>
                    <td><?=$d['kategori'] ?></td>
                    <td><?=$d['nama_barang'] ?></td>
                    <td><?=$d['harga'] ?></td>
                </tr><?php endwhile ?>
            </table>
        </div>
    </body>

</html>