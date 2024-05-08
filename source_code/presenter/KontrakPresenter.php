<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	function tambahDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
	public function deleteDataPasien($id);
	function editDataPasien($id, $data);
	function getPasienById($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();

}
