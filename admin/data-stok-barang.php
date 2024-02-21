<!-- Data stok Barang -->
<div class="container-fluid">

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, initial-scale=1.0">
            <title>Data Barang</title>
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
                background-color: #4e73df;
                color: #fff;
            }

            button {
                padding: 5px 10px;
                margin-right: 5px;
            }
            </style>
        </head>

        <body>

            <h2>Data Stok Barang</h2>
            <a href="tambah-barang.php"><button class="btn btn-primary"></button></a>

            <table border="1">
                <tr>
                    <th>stok</th>
                    <th>id produk</th>
                    <th>id toko</th>
                    <th>nama produk</th>
                    <th>id kategori</th>
                    <th>satuan</th>
                    <th>harga beli</th>
                    <th>harga jual</th>
                    <th>created at</th>
                    <th>aksi</th>
                </tr>
                <?php 
    include "../koneksi.php";
    $result = mysqli_query($koneksi,"SELECT * FROM produk");
    while($d = mysqli_fetch_assoc($result)):
?>
                <tr>
                    <td><?= $d['stok']?></td>
                    <td><?= $d['id_produk']?></td>
                    <td><?= $d['id_toko']?></td>
                    <td><?= $d['nama_produk']?></td>
                    <td><?= $d['id_kategori']?></td>
                    <td><?= $d['satuan']?></td>
                    <td><?= $d['harga_beli']?></td>
                    <td><?= $d['harga_jual']?></td>
                    <td><?= $d['created_at']?></td>
                    <td>
                        <a href="edit-barang.php?id_produk=<?= $d['id_produk']?>"><button
                                    class="btn btn-primary">Edit</button></a>
                        <a href="delete-barang.php?id_produk=<?= $d['id_produk']?>"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                    class="btn btn-danger">Delete</button></a>
                    </td>


                </tr>
                <?php endwhile ?>
            </table>

        </body>

    </html>
</div>

<!-- End Data stok Barang -->