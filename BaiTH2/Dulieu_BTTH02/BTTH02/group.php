<?php
  require_once("model/danhmuc.php");
  require_once("model/database.php");
  require_once("model/mathang.php");


  if (isset($_GET['id'])) {
      $iddm = $_GET['id'];
  }
  else{
      $iddm = $_GET['id'];
  }

  $mh = new MATHANG();
  $mathang = $mh->laymathangtheodanhmuc($iddm);

  if (isset($mathang)) {
    $mathang = $mh->laymathangtheodanhmuc($iddm);
  }
  

  include_once("top.php");
?>

<!-- ================================== -->
<div class="container">
  <div class="row">
    <div class="col-sm-9">
      <h3>Các sản phẩm thuộc danh mục </h3>
      <div class="row">
        <?php foreach ($mathang as $valid) { ?>
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <a href=""><?php echo $valid['tendanhmuc'] ?></a>
            </div>
            <div class="panel-body">
              <a href=""><img src="<?php echo isset($valid['hinhanh']); ?>" class="img-responsive fake" alt="Tên hàng"></a>
              <div>Giá bán: <span class="text-danger"><?php echo number_format($valid['giaban'.VNĐ]) ?></span></div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- ================================== -->
<?php
  include_once("bottom.php")
?>