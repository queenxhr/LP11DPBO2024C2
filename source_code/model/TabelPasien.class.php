<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getById($id)
	{
		// Query mysql select data pasien berdasarkan ID
		$query = "SELECT * FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		$this->execute($query);
		// Mengambil hasil kueri sebagai array asosiatif
		return $this->getResult2();
	}

	function add($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
		$query = "insert into pasien values ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function delete($id)
	{
		$query = "DELETE FROM pasien WHERE id = '$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function edit($id, $data)
	{
		$query = "UPDATE pasien SET 
                  nik = '{$data['nik']}', 
                  nama = '{$data['nama']}', 
                  tempat = '{$data['tempat']}', 
                  tl = '{$data['tl']}', 
                  gender = '{$data['gender']}', 
                  email = '{$data['email']}', 
                  telp = '{$data['telp']}' 
                  WHERE id = '$id'";

		// Eksekusi query untuk mengupdate data
		return $this->execute($query);
	}
}
