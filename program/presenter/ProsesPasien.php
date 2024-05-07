<?php

include("KontrakPresenter.php");


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
			$db_name = "db_mvp_php"; // nama basis data
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


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function prosesSomePasien($id)
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienById($id);
			$data = $this->tabelpasien->getResult();
			//ambil hasil query
			$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
			$pasien->setId($data['id']); //mengisi id
			$pasien->setNik($data['nik']); //mengisi nik
			$pasien->setNama($data['nama']); //mengisi nama
			$pasien->setTempat($data['tempat']); //mengisi tempat
			$pasien->setTl($data['tl']); //mengisi tl
			$pasien->setGender($data['gender']); //mengisi gender
			$this->data[] = $data; //tambahkan data pasien ke dalam list
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function add($request){
		$this->tabelpasien->open();
		$this->tabelpasien->add($request);
		$this->tabelpasien->close();
    
    header("location:index.php");
	}
	function update($id,$request){
		$this->tabelpasien->open();
		$this->tabelpasien->update($id,$request);
		$this->tabelpasien->close();
    
    header("location:index.php");
	}
	function delete($id){
		$this->tabelpasien->open();
		$this->tabelpasien->delete($id);
		$this->tabelpasien->close();
    
    header("location:index.php");
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
	function getEmail($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelp($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
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
	function getSize()
	{
		return sizeof($this->data);
	}
}
