<?php 
include "../koneksi.php";

if(isset($_POST['nama_barang'])){
    $nb = $_POST['nama_barang'];

    $query = mysqli_query($koneksi,"SELECT * FROM produk WHERE nama_produk = '$nb'");
    if($query){
        $data = mysqli_fetch_assoc($query);
        echo $data['harga_jual'];
    }
}

?>