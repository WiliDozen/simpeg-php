<?php  

require "config/core.php"; //panggil file config/core.php

$id_bidang = (int)$_GET['id_bidang'];

// fungsi hapus bidang
 if (hapus_bidang($id_bidang) > 0) {
        // pesan berhasil
        echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = 'daftar-bidang.php';
        </script>";
    } 
    else {
    	//pesan gagal
        echo "<script>
        alert('Data Berhasil Gagal Dihapus');
        document.location.href = 'daftar-bidang.php';
        </script>";
	 }