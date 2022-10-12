<?php 
require("../../model/database.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$iddmUpdate = '';

switch($action){
    case "xem":
        $dataDM = $dm -> laydanhmuc();      
        include("main.php");
        break;

    case "them":
        $add = $_POST['txtten'];
        if (isset($add)) {
            $dm -> themdanhmuc($add);
        }
        $dataDM = $dm -> laydanhmuc();
        include("main.php");
        break;

    case "xoa":
        $id = $_GET['id'];
        if (isset($id)) {
            $dm -> xoadanhmuc($id);
        }
        $dataDM = $dm -> laydanhmuc();
        include("main.php");
        break;

    case "sua":
        if(isset($_GET["iddm"])){
            $iddmUpdate = $_GET["iddm"];
        }
        $dataDM = $dm->laydanhmuc();
        include("main.php");
        break;

    case "capnhat":
        if(isset($_POST["txtId"]) && isset($_POST["txtTextUpdate"])){
            $dm->suadanhmuc($_POST["txtId"], $_POST["txtTextUpdate"]);
        }
        $dataDM = $dm->laydanhmuc();
        include("main.php");
        break;
    
    default:
        break;
}
?>
