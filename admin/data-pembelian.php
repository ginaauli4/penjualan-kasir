<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'pos');

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data pembelian dari tabel pembelian
$sql = "SELECT * FROM pembelian";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Daftar Pembelian</title>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <h2 class="mt-5 mb-3">Data Pembelian</h2>
            <a href="tambah-pembelian.php"><button class="btn btn-primary">Tambah Pembelian</button></a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal Pembelian</th>
                        <th>Nama Supplier</th>
                        <th>Nama Produk</th>
                        <th>Qty</th>
                        <th>Harga Beli</th>
                        <th>Total Bayar</th>
                        <th>Bayar</th>
                        <th>Sisa</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["tanggal_pembelian"] . "</td>";
                        echo "<td>" . $row["nama_suplier"] . "</td>";
                        echo "<td>" . $row["nama_produk"] . "</td>";
                        echo "<td>" . $row["qty"] . "</td>";
                        echo "<td>Rp" . number_format($row["harga_beli"], 0, ',', '.') . "</td>";
                        echo "<td>Rp" . number_format($row["total_bayar"], 0, ',', '.') . "</td>";
                        echo "<td>Rp" . number_format($row["bayar"], 0, ',', '.') . "</td>";
                        echo "<td>Rp" . number_format($row["sisa"], 0, ',', '.') . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Tidak ada data pembelian</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

    </body>

</html>

<?php
// Tutup koneksi database
$conn->close();
?>