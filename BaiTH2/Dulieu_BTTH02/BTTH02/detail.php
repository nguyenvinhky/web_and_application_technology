<?php
  require_once("model/danhmuc.php");
  require_once("model/database.php");
  require_once("model/mathang.php");

  if (isset($_GET["idmh"]) && isset($_GET["danhmuc_id"])) {
    $idmh = $_GET["idmh"];
    $getdanhmuc_id = $_GET["danhmuc_id"];
  }
  else{
      $idmh = $_GET["id"];
      $getdanhmuc_id = $_GET["danhmuc_id"];
  }

  $dm = new DANHMUC();
  $valuesDM = $dm->laydanhmuc();

  foreach ($valuesDM as $getdanhmuc) {
    # code...
    if ($getdanhmuc['id'] == $getdanhmuc_id) {
      # code...
      $namedanhmuc = $getdanhmuc['tendanhmuc'];
    }
  }


  $mh = new MATHANG();
  $valueMH = $mh->laymathang();

  foreach ($valueMH as $value) {
    if ($value['id'] == $idmh ) {
      # code...
      $getmh = $value;
    }
  }
  
  //Lượt click xem ảnh
  $valuelx = $getmh['luotxem'] + 1;
  $luotxem = $mh->updateluotxem($idmh, $valuelx);

  //Sắp xếp theo tăng dần lượt xem
  $sapxep = $mh->sapxeptheoluotxem();
  require_once("top.php");
?>

<!-- ================================== -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
              <div class="col-sm-4">
                  <h4 style="color:blue"><b>THÔNG TIN CHI TIẾT</b></h4>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        <a href=""><?php echo '<b>'.$getmh['tenmathang'].'</b>'; ?></a>
                      </div>
                  </div>
                  <div class="panel panel-body">
                      <a href=""><img src="<?php echo $getmh['hinhanh']; ?>" alt="" class="img-responsive fake"></a>
                      <div>Giá bán: <span class="text-danger"><?php echo number_format($getmh['giaban']).' VNĐ'; ?></span></div>
                  </div>
                  <div class="panel panel-footer" align="center">
                    <a href="" class="btn btn-info">Xem thêm</a>
                    <a href="" class="btn btn-danger">Chọn mua</a>
                  </div>
              </div>
            </div>

            <div class="row">
            <h4 style="color:blue"><b>SẢN PHẨM CÙNG LOẠI: <?php echo $namedanhmuc; ?></b></h4>
              <?php foreach ($valueMH as $objectMH) {
                        if($objectMH['danhmuc_id'] == $getdanhmuc_id && $objectMH['id'] != $idmh){?>
                <div class="col-sm-4">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                        <a href="<?php echo 'detail.php?idmh='.$objectMH['id'].'&danhmuc_id='.$objectMH['danhmuc_id']; ?>"><?php echo '<b>'.$objectMH['tenmathang'].'</b>'; ?></a>
                      </div>
                  </div>
                  <div class="panel panel-body">
                      <a href="<?php echo 'detail.php?idmh='.$objectMH['id'].'&danhmuc_id='.$objectMH['danhmuc_id']; ?>"><img src="<?php echo $objectMH['hinhanh']; ?>" alt="" class="img-responsive fake"></a>
                      <div>Giá bán: <span class="text-danger"><?php echo number_format($objectMH['giaban']).' VNĐ'; ?></span></div>
                  </div>
                  <div class="panel panel-footer" align="center">
                    <a href="" class="btn btn-info">Xem thêm</a>
                    <a href="" class="btn btn-danger">Chọn mua</a>
                  </div>
                </div>
              <?php }}?>
            </div>
        </div>
        <div class="col-md-4">
              <h3 style="color:blue"><b>SẢN PHẨM NỔI BẬT</b></h3>
              <?php foreach ($sapxep as $sort) {
                      ?>
                <div class="col-sm-10">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                        <a style="color:BLACK" href="<?php echo 'detail.php?idmh='.$sort['id'].'&danhmuc_id='.$sort['danhmuc_id']; ?>"><?php echo '<b>'.$sort['tenmathang'].'</b>'; ?></a>
                      </div>
                  </div>
                  <div class="panel panel-body">
                      <a href="<?php echo 'detail.php?idmh='.$sort['id'].'&danhmuc_id='.$sort['danhmuc_id']; ?>"><img src="<?php echo $sort['hinhanh']; ?>" alt="" class="img-responsive fake"></a>
                      <div>Giá bán: <span class="text-danger"><?php echo number_format($sort['giaban']).' VNĐ'; ?></span></div>
                  </div>
                </div>
              <?php }?>
        </div>
    </div>
</div>
<!-- ================================== -->
<?php
  include_once("bottom.php")
?>