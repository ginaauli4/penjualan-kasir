<?php
include '../koneksi.php';
 session_start();
// koneksi
$conn = new mysqli('localhost', 'root', '', 'pos');
 
// simpan data
if (isset($_POST['submit'])) {
$iduser = $_SESSION['id_user'];
$ns = $_POST['nama_suplier'];
$nb = $_POST['nama_barang'];
$qty = $_POST['qty'];
$hrg = (int)$_POST['harga'];
$byr = (int)$_POST['bayar'];
$sisa = $byr - $hrg;

$q = mysqli_query($conn, "INSERT INTO tambah_pembelian (nama_suplier, nama_produk, qty, harga, bayar, sisa) VALUES ('$ns','$nb', '$qty','$hrg', '$byr','$sisa')");

if($q) {
header('Location: tambah-pembelian.php');
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
                <title>Pembelian</title>
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
                <h1>PEMBELIAN</h1>
                <hr />
            </center>

            <div class="card mt-5">
                <div class="card-body mx-auto">
                    <form method="POST"
                          action=""
                          class="form-inline mt-3">
                        <label for="nama_suplier">Nama Supplier&nbsp;</label>
                        <select name="nama_suplier"
                                id="nama_suplier"
                                class="form-control mr-sm-2">
                            >
                            <?php 
                            $resultbarang = mysqli_query($conn,"SELECT * FROM suplier");
                            while($d = mysqli_fetch_assoc($resultbarang)):
                        ?>
                            <option value="<?= $d['nama_supplier'] ?>"><?= $d['nama_supplier'] ?></option>
                            <?php endwhile ?>
                        </select>


                        <label for="nama_barang">Nama Barang&nbsp;</label>
                        <select name="nama_barang"
                                id="nama_barang"
                                class="form-control mr-sm-2">
                            >

                        </select>


                        <label for="harga">Harga&nbsp;</label>
                        <input type="number"
                               name="harga"
                               id="harga"
                               class="form-control mr-sm-2" />

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
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>

                        <?php
// perintah tampil data
$q = mysqli_query($conn, "SELECT * FROM tambah_pembelian");
 
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
                            <td><?= ucwords($r['nama_produk']) ?></td>
                            <td><?= $r['harga'] ?></td>
                            <td><?= $r['qty'] ?></td>

                            <td><?= $total ?></td>
                        </tr>

                        <?php
}
?>
                        <form method='post'
                              action='../admin/proses_tambah_pembelian.php'>
                            <input type='hidden'
                                   name='id_user'
                                   value='<?= $_SESSION['user_id']; ?>' />
                            <tr>
                                <th colspan="4">Total Bayar</th>
                                <th>
                                    <input name='total_bayar'
                                           id='total_bayar'
                                           value=' <?= $tot_bayar ?> ' />
                                </th>

                            </tr>
                            <tr>
                                <th colspan="4"> Bayar</th>
                                <th>
                                    <input name='jumlah_bayar'
                                           id='bayar'
                                           value='' />
                                </th>

                            </tr>

                            <tr>
                                <th colspan="4">Sisa</th>
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
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        const selectharga = () => {
            var namaBarang = $('#nama_barang').val();
            console.log(namaBarang)
            $.ajax({
                url: 'get_harga.php',
                type: 'post',
                data: {
                    nama_barang: namaBarang
                },
                success: function(response) {
                    $('#harga').val(response);
                }
            });
        }
        const selectbarang = () => {
            var namaSuplier = $('#nama_suplier').val();
            console.log(namaSuplier)
            $.ajax({
                url: 'get_suplier.php',
                type: 'post',
                data: {
                    nama_suplier: namaSuplier
                },
                success: function(response) {
                    $('#nama_barang').html(response);
                }
            });
        }

        $('#nama_suplier').change(function() {
            selectbarang()
        })

        $('#nama_barang').change(function() {
            selectharga()
        })
        $(document).ready(function() {
            selectbarang()
            selectharga()
        });
        </script>
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