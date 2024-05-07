<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

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
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>
                  <a href='index.php?action=edit&id=" . $this->prosespasien->getId($i) .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?action=delete&id=" . $this->prosespasien->getId($i) . "' class='btn btn-danger' '>Hapus</a>
			</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function toForm($id=null){
		if($id !=null){
			$this->prosespasien->prosesSomePasien($id);
		}
		// echo "<pre>";
		// print_r($id);
		// echo "</pre>";
		$tpl = new Template("templates/skinform.html");
		$tpl->replace("VALUE_ID", @$this->prosespasien->getId(0));
		$tpl->replace("VALUE_NIK", "'" . @$this->prosespasien->getNik(0) . "'");
		$tpl->replace("VALUE_NAMA", "'" . @$this->prosespasien->getNama(0) . "'");
		$tpl->replace("VALUE_EMAIL", "'" . @$this->prosespasien->getEmail(0). "'");
		$tpl->replace("VALUE_TELP", "'" . @$this->prosespasien->getTelp(0). "'");
		$tpl->replace("VALUE_TEMPAT", "'" . @$this->prosespasien->getTempat(0). "'");
		$tpl->replace("VALUE_TL", "'" . @$this->prosespasien->getTl(0). "'");
		$tpl->replace("VALUE_GENDER", "'" . @$this->prosespasien->getGender(0). "'");
		$tpl->write();
	}

	function add($request){
		$this->prosespasien->add($request);
	}
	function update($id, $request){
		$this->prosespasien->update($id,$request);
	}
	function delete($id){
		$this->prosespasien->delete($id);
	}
	
}
