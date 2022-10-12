<?php 
require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$mh = new MATHANG();
$dm = new DANHMUC();


switch($action){
    case "xem":
        $dataMH = $mh -> laymathang();      
        include("main.php");
        break;

    case "them":
        $dataDM = $dm -> laydanhmuc();
        include("them.php");
        break;

    case "xulythem":
        $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);
        $duongdan = "../../" . $hinhanh;
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        $ten = $_POST["txttenhang"];
        $mota = $_POST["txtmota"];
        $giaban = $_POST["txtgiaban"];
        $danhmuc_id = $_POST["optdanhmuc"];

        $mh->themmathang($ten, $giaban, $mota, $danhmuc_id, $hinhanh);

        $dataMH = $mh->laymathang();
        include("main.php");
        break;

    case "xoa":
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mh -> xoamathang($id);
        }
        $dataMH = $mh -> laymathang();
        include("main.php");
        break;

    case "sua":
        if (isset($_GET["id"])) {
            $mathang = $mh->laymathangtheoid($_GET["id"]);
        }
        $danhmuc = $dm->laydanhmuc();
        include("sua.php");
        break;

    case "xulysua":

        $hinhanh = "images/" . basename($_FILES["filehinhanh"]["name"]);
        $duongdan = "../../" . $hinhanh;
        move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);

        $ten = $_POST["txttenhang"];
        $mota = $_POST["txtmota"];
        $giaban = $_POST["txtgiaban"];
        $danhmuc_id = $_POST["optdanhmuc"];

        $mh->suamathang( $_GET["id"] ,$ten, $giaban, $mota, $danhmuc_id, $hinhanh);

        $dataMH = $mh->laymathang();
        include("main.php");

        break;
    
    default:
        break;
}
?>
