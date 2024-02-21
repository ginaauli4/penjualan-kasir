<?php
require '../koneksi.php';
session_start();
session_destroy();
?>
<script>
alert('Anda Berhasil Logout');
window.location.assign("../login.php");
</script>