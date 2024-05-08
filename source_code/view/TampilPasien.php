<?php


include ("KontrakView.php");
include ("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil()
    {
        if (isset($_GET['id_hapus'])) {
            $id_hapus = $_GET['id_hapus'];
            $this->prosespasien->deleteDataPasien($id_hapus);
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
            // Ambil data yang dikirimkan melalui formulir
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl = $_POST['tl'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];

            // Panggil metode tambahDataPasien() untuk menambahkan data pasien baru
            $this->prosespasien->tambahDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);

        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
            // Ambil data yang dikirimkan melalui formulir
            $id = $_POST['id']; // ID pasien yang akan diubah
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $tl = $_POST['tl'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
        
            // Panggil metode editDataPasien() untuk mengedit data pasien
            $this->prosespasien->editDataPasien($id, [
                'nik' => $nik,
                'nama' => $nama,
                'tempat' => $tempat,
                'tl' => $tl,
                'gender' => $gender,
                'email' => $email,
                'telp' => $telp
            ]);
        }
        
        $this->prosespasien->prosesDataPasien();
        $data = null;

        // Semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosespasien->getNik($i) . "</td>
                <td>" . $this->prosespasien->getNama($i) . "</td>
                <td>" . $this->prosespasien->getTempat($i) . "</td>
                <td>" . $this->prosespasien->getTl($i) . "</td>
                <td>" . $this->prosespasien->getGender($i) . "</td>
                <td>" . $this->prosespasien->getEmail($i) . "</td>
                <td>" . $this->prosespasien->getTelp($i) . "</td>
                <td><a href='index.php?id_edit=" . $this->prosespasien->getId($i) . "' class='btn btn-warning'>Ubah</a><a href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger'>Hapus</a></td>";
        }

        // Tambahkan tombol Tambah Data
        $addData = '<a href="index.php?tambah" type="button" class="btn btn-primary nav-link active">Tambah Data</a><br>';
        $mainTitle = 'Data Pasien';
        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);
        $this->tpl->replace("ADD_DATA", $addData);
        $this->tpl->replace("MAIN_TITLE", $mainTitle);
        // Menampilkan ke layar
        $this->tpl->write();
    }

    function tambah()
    {

        // Jika bukan metode POST, tampilkan formulir tambah
        $operasi = 'Tambah';
        $title = 'Pasien';

        $form = '
                <form action="index.php" method="POST">
             
                <br><br><div class="card">
                
                <div class="card-header bg-primary">
                <h1 class="text-white text-center">  Tambah Pasien </h1>
                </div><br>
        
                <label> NIK: </label>
                <input type="text" name="nik" class="form-control"> <br>
    
                <label> NAMA: </label>
                <input type="text" name="nama" class="form-control"> <br>
    
                <label> TEMPAT: </label>
                <input type="text" name="tempat" class="form-control"> <br>
    
                <label> TANGGAL LAHIR: </label>
                <input type="date" name="tl" class="form-control"> <br>
    
                <label> GENDER: </label>
                <input type="text" name="gender" class="form-control"> <br>
    
                <label> EMAIL: </label>
                <input type="text" name="email" class="form-control"> <br>
    
                <label> TELP: </label>
                <input type="text" name="telp" class="form-control"> <br>
                
                <button class="btn btn-success" type="submit" name="tambah"> Submit </button><br>
                <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>
        
                </div>
                </form>';
        $mainTitle = 'Tambah Pasien';
        
        $view = new Template("templates/form.html");
        $view->replace("FORM", $form);
        $view->replace("MAIN_TITLE", $mainTitle);
        $view->replace("TITLE", $title);
        $view->replace("OPERASI", $operasi);
        $view->write();

    }

    function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $pasien = $this->prosespasien->getPasienById($id);

        // Jika bukan metode POST, tampilkan formulir edit
        $operasi = 'Ubah';
        $title = 'Pasien';

        $form = '
        <form action="index.php" method="POST">
        <input type="hidden" name="id" value="' . $id . '"> <!-- Tambahkan input tersembunyi untuk menyimpan ID -->
        <br><br><div class="card">
        
        <div class="card-header bg-primary">
        <h1 class="text-white text-center">  Ubah Pasien </h1>
        </div><br>

        <label> NIK: </label>
        <input type="text" name="nik" class="form-control" value="' . $pasien['nik'] . '"> <br>

        <label> NAMA: </label>
        <input type="text" name="nama" class="form-control" value="' . $pasien['nama'] . '"> <br>

        <label> TEMPAT: </label>
        <input type="text" name="tempat" class="form-control" value="' . $pasien['tempat'] . '"> <br>

        <label> TANGGAL LAHIR: </label>
        <input type="date" name="tl" class="form-control" value="' . $pasien['tl'] . '"> <br>

        <label> GENDER: </label>
        <input type="text" name="gender" class="form-control" value="' . $pasien['gender'] . '"> <br>

        <label> EMAIL: </label>
        <input type="text" name="email" class="form-control" value="' . $pasien['email'] . '"> <br>

        <label> TELP: </label>
        <input type="text" name="telp" class="form-control" value="' . $pasien['telp'] . '"> <br>
        
        <button class="btn btn-success" type="submit" name="edit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

        </div>
        </form>';
        $mainTitle = 'Ubah Pasien';
 
        $view = new Template("templates/form.html");
        $view->replace("FORM", $form);
        $view->replace("MAIN_TITLE", $mainTitle);
        $view->replace("TITLE", $title);
        $view->replace("OPERASI", $operasi);
        $view->write();
    }
}
