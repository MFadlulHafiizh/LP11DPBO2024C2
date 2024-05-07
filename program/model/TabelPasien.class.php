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
    function getPasienById($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function add($request){
        $nik = $request['nik'];
        $nama = $request['nama'];
        $tempat = $request['tempat'];
        $tl = $request['tl'];
        $gender = $request['gender'];
        $email = $request['email'];
        $telp = $request['telp'];
        $query = "INSERT INTO pasien VALUES('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        return $this->executeAffected($query);
    }
	function update($id, $request){
		$nik = $request['nik'];
        $nama = $request['nama'];
        $tempat = $request['tempat'];
        $tl = $request['tl'];
        $gender = $request['gender'];
        $email = $request['email'];
        $telp = $request['telp'];

        $query = "update pasien set nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' where id='$id'";
        return $this->executeAffected($query);
    }
	function delete($id){
        $query = "DELETE from `pasien` where id=$id";
        return $this->executeAffected($query);
    }
}
