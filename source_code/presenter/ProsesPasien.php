<?php

include ("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelp($row['telp']); //mengisi telp

				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function tambahDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		try {
			// Membuka koneksi ke tabel pasien
			$this->tabelpasien->open();

			// Menambahkan data pasien baru ke tabel pasien
			$this->tabelpasien->add(
				array(
					'nik' => $nik,
					'nama' => $nama,
					'tempat' => $tempat,
					'tl' => $tl,
					'gender' => $gender,
					'email' => $email,
					'telp' => $telp
				)
			);

			// Menutup koneksi
			$this->tabelpasien->close();

		} catch (Exception $e) {
			// Memproses error
			echo "Error: " . $e->getMessage();
		}
	}


	function deleteDataPasien($id)
	{
		try {
			// Membuka koneksi ke tabel pasien
			$this->tabelpasien->open();

			// Menghapus data pasien berdasarkan ID
			$this->tabelpasien->delete($id);

			// Menutup koneksi
			$this->tabelpasien->close();

		} catch (Exception $e) {
			// Memproses error
			echo "Error: " . $e->getMessage();
		}
	}

	function editDataPasien($id, $data)
	{
		try {
			// Membuka koneksi ke tabel pasien
			$this->tabelpasien->open();

			// Mengedit data pasien berdasarkan ID
			$this->tabelpasien->edit($id, $data);

			// Menutup koneksi
			$this->tabelpasien->close();

		} catch (Exception $e) {
			// Memproses error
			echo "Error: " . $e->getMessage();
		}
	}

	function getPasienById($id)
	{
		try {
			// Membuka koneksi ke tabel pasien
			$this->tabelpasien->open();

			// Mengambil data pasien berdasarkan ID
			$pasien = $this->tabelpasien->getById($id);

			// Menutup koneksi
			$this->tabelpasien->close();

			return $pasien;
		} catch (Exception $e) {
			// Memproses error
			echo "Error: " . $e->getMessage();
			return null;
		}
	}
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelp($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
