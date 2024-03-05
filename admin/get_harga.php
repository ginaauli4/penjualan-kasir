<?php 
include "../koneksi.php";

if(isset($_POST['nama_barang'])){
    $nb = $_POST['nama_barang'];

    $query = mysqli_query($koneksi,"SELECT * FROM barang_suplier WHERE nama_barang = '$nb'");
    if($query){
        $data = mysqli_fetch_assoc($query);
        echo $data['harga'];
    }
}

?>