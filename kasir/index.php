<?php
 session_start();
// koneksi
$conn = new mysqli('localhost', 'root', '', 'pos');
 
// simpan data
if (isset($_POST['submit'])) {

$nb = $_POST['nama_barang'];
$hrg = $_POST['harga'];
$qty = $_POST['qty'];
$byr = $_POST['bayar'];
$iduser = $_POST['id_user'];

$resultbar = mysqli_query($conn,"SELECT * FROM produk WHERE nama_produk = '$nb'");
$barangassoc = mysqli_fetch_assoc($resultbar);
$barangstok = $barangassoc['stok'];
$stok = $barangstok - $qty;
$q = mysqli_query($conn, "INSERT INTO produk_kasir (nama_barang, harga, qty, bayar,id_user) VALUES ('$nb', '$hrg', '$qty', '$byr','$iduser')");
$updatestok = mysqli_query($conn,"UPDATE produk SET stok='$stok' WHERE nama_produk = '$nb'");
if($q) {
header('Location: index.php');
} else {
echo "<script>alert('Gagal menambahkan data'); window.location.href = index.php;</script>";
}
}
 
?>

<!DOCTYPE html>
<html>

    <head>
        <!DOCTYPE html>
        <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, initial-scale=1.0">
                <title>Dashboard</title>
                <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                }

                .header {
                    background-color: #4e73df;
                    color: #fff;
                    padding: 20px;
                    text-align: center;
                }

                .feature {
                    display: inline-block;
                    margin: 0 10px;
                    color: #fff;
                    text-decoration: none;
                    font-weight: bold;
                }

                .feature:hover {
                    text-decoration: underline;
                }
                </style>
            </head>

    <body>
        <div class="header">
            <h1>Dashboard</h1>
            <a href="../admin/data-pelanggan.php"
               class="feature">Data Pelanggan</a>
            <a href="../admin/data-pembelian.php"
               class="feature">Pembelian</a>
            <a href="../admin/data-penjualan.php"
               class="feature">Penjualan</a>
            <a href="../admin/data-stok-barang.php"
               class="feature">Stok Barang</a>
            <a href="logout.php"
               class="feature">Logout</a>
        </div>
    </body>

</html>

<!-- Bootstrap -->
<link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5 mx-auto">
        <center>
            <h1>KASIR APP</h1>
            <hr />
        </center>

        <div class="card mt-5">
            <div class="card-body mx-auto">
                <form method="POST"
                      action=""
                      class="form-inline mt-3">
                    <label for="id_user">ID User&nbsp;</label>
                    <input type="text"
                           name="id_user"
                           id="id_user"
                           class="form-control mr-sm-2">
                    <label for="nama_barang">Nama Barang&nbsp;</label>
                    <select name="nama_barang"
                            id="nama_barang"
                            class="form-control mr-sm-2">
                        >
                        <?php 
                            $resultbarang = mysqli_query($conn,"SELECT * FROM produk");
                            while($d = mysqli_fetch_assoc($resultbarang)):
                        ?>
                        <option value="<?= $d['nama_produk'] ?>"><?= $d['nama_produk'] ?></option>
                        <?php endwhile ?>
                    </select>


                    <label for="harga">Harga&nbsp;</label>
                    <select type="number"
                            name="harga"
                            id="harga"
                            class="form-control mr-sm-2">
                        >
                        <?php 
                            $resultbarang = mysqli_query($conn,"SELECT * FROM produk");
                            while($d = mysqli_fetch_assoc($resultbarang)):
                        ?>
                        <option value="<?= $d['harga_jual'] ?>"><?= $d['harga_jual'] ?></option>
                        <?php endwhile ?>
                    </select>

                    <label>Qty&nbsp;</label>
                    <input type="number"
                           name="qty"
                           id="qty"
                           class="form-control mr-sm-2">
                    <button type="submit"
                            name="submit"
                            class="btn btn-primary">Input</button>
                    <label for="bayar">Bayar&nbsp;</label>
                    <input type="number"
                           name="bayar"
                           id="bayarinput"
                           class="form-control mr-sm-2">
                    <button type="button"
                            name="submit"
                            id='submitbayar'
                            class="btn btn-primary">Hitung</button>
                </form>
                <hr />

                <!--code menampilkan data-->
                <table class="table table-bordered mt-5">
                    <tr>
                        <th>#</th>
                        <th>id user</th>
                        <th>id penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>

                    <?php
// perintah tampil data
$q = mysqli_query($conn, "SELECT * FROM produk_kasir");
 
$total = 0;
$tot_bayar = 0;
$no = 1;
 
while ($r = $q->fetch_assoc()) {
// total adalah hasil dari harga x qty
$sisa = $r['bayar'] - $r['harga'];
$total = $r['harga'] * $r['qty'];
// total bayar adalah penjumlahan dari keseluruhan total
$tot_bayar += $total;
?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= ($r['id_user']) ?></td>
                        <td><?= ($r['id_penjualan']) ?></td>
                        <td><?= ucwords($r['nama_barang']) ?></td>
                        <td><?= $r['harga'] ?></td>
                        <td><?= $r['qty'] ?></td>

                        <td><?= $total ?></td>
                    </tr>

                    <?php
}
?>
                    <form method='post'
                          action='../admin/proses_tambah_penjualan.php'>
                        <input type='hidden'
                               name='id_user'
                               value='<?= $_SESSION['user_id']; ?>' />
                        <tr>
                            <th colspan="6">Total Bayar</th>
                            <th>
                                <input name='total_bayar'
                                       id='total_bayar'
                                       value=' <?= $tot_bayar ?> ' />
                            </th>

                        </tr>
                        <tr>
                            <th colspan="6"> Bayar</th>
                            <th>
                                <input name='jumlah_bayar'
                                       id='bayar'
                                       value='  ' />
                            </th>

                        </tr>

                        <tr>
                            <th colspan="6">Sisa</th>
                            <th>
                                <input value=''
                                       name='sisa'
                                       id='sisa' />
                            </th>

                        </tr>
                </table>
                <button type="submit"
                        name="submit"
                        class="btn btn-primary">SIMPAN</button>
                </form>
                <button type="submit"
                        name="submit"
                        class="btn btn-primary">DETAIL</button>

            </div>
        </div>
    </div>
    <script>
    const bayarinput = document.getElementById("bayarinput")
    const bayar = document.getElementById("bayar")
    const submitbayar = document.getElementById("submitbayar")
    const sisa = document.getElementById("sisa")
    const totalbayar = document.getElementById("total_bayar")

    submitbayar.onclick = () => {
        bayar.value = bayarinput.value
        sisa.value = bayarinput.value - totalbayar.value
    }
    </script>

</body>

</html>