<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'pos');

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data produk dari tabel produk_kasir
$sql = "SELECT penjualan.*,produk.* FROM penjualan INNER JOIN produk ON penjualan.nama_barang = produk.nama_produk";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Daftar Penjualan</title>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
              integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
              crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <h2 class="mt-5 mb-3">Data Penjualan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if ($result->num_rows > 0) {
                    // Output data dari setiap baris
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_penjualan"] . "</td>";
                        echo "<td>" . $row["nama_barang"] . "</td>";
                        echo "<td>Rp" . number_format($row["harga_jual"], 0, ',', '.') . "</td>";
                        echo "<td>" . $row["qty"] . "</td>";
                        echo "<td>" . $row["total"] . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4 '>Tidak ada produk</td></tr>";
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