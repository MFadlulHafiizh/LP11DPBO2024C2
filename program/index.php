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
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'add':
            $tp->toForm();
        break;
        case 'edit':
            $tp->toForm($_GET['id']);
        break;

        case 'delete':
            $tp->delete($_GET['id']);
        break;
    }

}else if(isset($_POST['submit'])){
    if($_POST['id'] != null){
        $tp->update($_POST['id'], $_POST);
    }else{
        $tp->add($_POST);
    }
}
else{
    $data = $tp->tampil();
}
