<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function add($request);
	public function update($id, $request);
	public function delete($id);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
}
