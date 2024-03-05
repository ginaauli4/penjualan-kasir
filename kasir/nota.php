<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Cetak Struk Belanja</title>
        <style>
        /* CSS untuk gaya struk belanja */
        .receipt {
            border-collapse: collapse;
            width: 50%;
            /* Lebar struk diatur ke 50% dari lebar layar */
            margin: 0 auto;
            /* Untuk mengatur struk ke tengah */
        }

        .receipt th,
        .receipt td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .receipt th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
        }

        /* CSS untuk tombol cetak */
        .print-button {
            margin-top: 20px;
            display: block;
            /* Membuat tombol cetak berada di tengah */
            margin-left: auto;
            margin-right: auto;
            padding: 10px 20px;
        }
        </style>
    </head>

    <body>

        <?php
// Fungsi untuk mencetak struk belanja
function printReceipt($items) {
    $total = 0;
    ?>

        <table class="receipt">
            <tr>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>

            <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></td>
            </tr>
            <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>

            <tr>
                <th colspan="3">Total</th>
                <td>Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
            </tr>
        </table>

        <button class="print-button"
                onclick="printReceipt()">Cetak Struk</button>

        <?php
}

// Data belanja (contoh)
$items = array(
    array("name" => "Buku Tulis", "price" => 5000, "quantity" => 2),
    array("name" => "Pensil", "price" => 2000, "quantity" => 3),
    array("name" => "Penghapus", "price" => 1000, "quantity" => 1)
);

// Panggil fungsi untuk mencetak struk belanja
printReceipt($items);
?>

        <script>
        // Fungsi untuk mencetak struk belanja
        function printReceipt() {
            window.print();
        }
        </script>

    </body>

</html>