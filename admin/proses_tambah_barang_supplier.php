<?php
// Pastikan Anda telah melakukan koneksi ke database sebelumnya
include "../koneksi.php";

// Periksa apakah data telah dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan melalui formulir
    $kategori = $_POST["kategori"];
    $nama_barang = $_POST["nama_barang"];
    $harga = $_POST["harga"];
    $id_suplier = $_POST["id_suplier"];
    $querysuplier = mysqli_query($koneksi,"SELECT * FROM suplier WHERE id_supplier='$id_suplier'");
    $catchsuplier = mysqli_fetch_assoc($querysuplier);
    $namasuplier = $catchsuplier['nama_supplier'];
    // Contoh query untuk menyimpan data ke database
    //$query = "INSERT INTO suplier (kategori, nama_barang, harga) VALUES ('$kategori', '$nama_barang', '$harga')";
    $sql2 = "INSERT INTO barang_suplier (nama_suplier,nama_barang,kategori,harga) VALUES ('$namasuplier','$nama_barang','$kategori','$harga')";
    $resultBarang = mysqli_query($koneksi,$sql2);
    // Eksekusi query
    if ($resultBarang) {
        // Jika penyimpanan berhasil, alihkan kembali ke halaman sebelumnya atau halaman lain
        header("Location: detail-supplier.php?id_supplier=$id_suplier");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah mengalihkan
    } else {
        // Jika terjadi kesalahan dalam penyimpanan data, tampilkan pesan kesalahan
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database (jika diperlukan)
    mysqli_close($koneksi);
}
?>