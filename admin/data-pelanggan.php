<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Data Pelanggan</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4e73df;
            color: #fff;
            text-align: left;
            font-weight: normal;
        }

        td {
            color: #333;
        }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
            /* Add margin bottom for spacing */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #0056b3;
        }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Data Pelanggan</h2>
            <a href="tambah-pelanggan.php"><button class="btn btn-primary">Tambah Pelanggan</button></a>
            <table>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
                <?php 
            include "../koneksi.php";
            $result = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            while($d = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?= $d['id_pelanggan']?></td>
                    <td><?= $d['nama_pelanggan']?></td>
                    <td><?= $d['alamat']?></td>
                    <td><?= $d['no_hp']?></td>
                    <td><?= $d['created_at']?></td>
                    <td>
                        <a href="edit-pelanggan.php?id_pelanggan=<?= $d['id_pelanggan']?>"><button
                                    class="btn btn-primary">Edit</button></a>
                        <a href="delete-pelanggan.php?id_pelanggan=<?= $d['id_pelanggan']?>"
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><button
                                    class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                <?php endwhile ?>
            </table>
        </div>
    </body>

</html>