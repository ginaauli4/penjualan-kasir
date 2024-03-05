<!-- Data stok Barang -->
<div class="container-fluid">

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, initial-scale=1.0">
            <title>Data Stok Barang</title>
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
            <a href="tambah-barang.php"></a>

            <table border="1">
                <tr>
                    <th>No.</th>
                    <th>Nama produk</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga beli</th>
                    <th>Harga jual</th>
                    <th>Created at</th>
                </tr>
                <?php 
    include "../koneksi.php";
    $result = mysqli_query($koneksi,"SELECT * FROM produk");
     $no = 1;
    while($d = mysqli_fetch_assoc($result)):
?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $d['nama_produk']?></td>
                    <td><?= $d['satuan']?></td>
                    <td><?= $d['stok']?></td>
                    <td><?= $d['harga_beli']?></td>
                    <td><?= $d['harga_jual']?></td>
                    <td><?= $d['created_at']?></td>


                </tr>
                <?php endwhile ?>
            </table>

        </body>

    </html>
</div>

<!-- End Data stok Barang -->