<?php
  require_once("model/danhmuc.php");
  require_once("model/database.php");
  require_once("model/mathang.php");


  if (isset($_GET["id"])) {
      $iddm = $_GET["id"];
  }
  else{
      $iddm = $_GET["id"];
  }

  $dm = new DANHMUC();
  $valuesDM = $dm->laydanhmuc();

  foreach($valuesDM as $getdm)
  {
    if ($getdm['id'] == $iddm) {
      $getnamedm = $getdm['tendanhmuc'];
    }
  }


  $mh = new MATHANG();
  $valueMH = $mh->laymathang();

  include_once("top.php");
?>

<!-- ================================== -->
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <h3>Các sản phẩm thuộc danh mục <?php echo $getnamedm; ?></h3>
      <div class="row">
        <?php foreach ($valueMH as $valid) { 
            if($valid['danhmuc_id'] == $iddm){
          ?>
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <a href="<?php echo 'detail.php?idmh='.$valid['id'].'&danhmuc_id='.$valid['danhmuc_id']; ?>"><?php echo $valid['tenmathang'] ?></a>
            </div>
            <div class="panel-body">
              <a href="<?php echo 'detail.php?idmh='.$valid['id'].'&danhmuc_id='.$valid['danhmuc_id']; ?>"><img src="<?php echo $valid['hinhanh']; ?>" class="img-responsive fake" alt="Tên hàng"></a>
              <div>Giá bán: <span class="text-danger"><?php echo number_format($valid['giaban']).'VNĐ' ?></span></div>
            </div>
            <div class="panel-footer" align="center">
                <a href="" class="btn btn-info">Xem thêm</a>
                <a href="" class="btn btn-danger">Chọn mua</a>
            </div>
          </div>
        </div>
      <?php }}?>
      </div>
    </div>
  </div>
</div>

<!-- ================================== -->
<?php
  include_once("bottom.php")
?>