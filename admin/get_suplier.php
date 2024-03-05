<?php 
include "../koneksi.php";

if(isset($_POST['nama_suplier'])){
    $ns = $_POST['nama_suplier'];

    $query = mysqli_query($koneksi,"SELECT * FROM barang_suplier WHERE nama_suplier = '$ns'");
    if($query){
        while($data = mysqli_fetch_assoc($query)){
            echo "<option value='{$data['nama_barang']}'>{$data['nama_barang']}</option>";
        }
    }
}

?>