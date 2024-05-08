<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();


// Cek apakah ada permintaan untuk menambahkan data pasien
if(isset($_GET['tambah'])) {
    $tp->tambah(); // Panggil fungsi tambah() untuk menambahkan data pasien
}else if(isset($_GET['id_edit'])) { // Cek apakah ada permintaan untuk mengubah data pasien
    $id_edit = $_GET['id_edit'];
    $tp->edit($id_edit);
}else{ 
    $data = $tp->tampil();
}

// Cek apakah ada permintaan untuk menghapus data pasien


