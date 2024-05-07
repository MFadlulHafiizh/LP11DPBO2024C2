<?php

interface KontrakView{
	public function tampil();
	public function toForm($id);
	public function add($request);
	public function update($id, $request);
	public function delete($id);
}

?>