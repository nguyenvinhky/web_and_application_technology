<?php
  require_once("model/danhmuc.php");
  require_once("model/database.php");
  require_once("model/mathang.php");

  $dm = new DANHMUC();
  $valuesDM = $dm->laydanhmuc();


  $mh = new MATHANG();
  $valueMH = $mh->laymathang();
?>

<!-- ================================== -->

<div class="container">

  <?php foreach ($valuesDM as $dm) {
    // code...
  ?>
  <h3><a href="<?php echo 'group.php?id='.$dm['id']; ?>"><?php echo $dm['tendanhmuc'] ?><span class="glyphicon glyphicon-triangle-right"></span></a></h3>
  <div class="row">
    <?php 
        foreach($valueMH as $mh){
          if ($dm['id'] == $mh['danhmuc_id']) {
            // code...
          
    ?>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <a style="color:white" href="">
            <?php echo $dm['tendanhmuc'] ?>
          </a>  
        </div>
        <div class="panel-body"><a href="<?php echo 'detail.php?idmh='.$mh['id'].'&danhmuc_id='.$mh['danhmuc_id']; ?>"><img src="<?php echo $mh['hinhanh'] ?>" class="img-responsive fake" alt="Tên hàng"></a>
        </div>
        <div class="panel-footer"><a href="<?php echo 'detail.php?idmh='.$mh['id'].'&danhmuc_id='.$mh['danhmuc_id']; ?>"><?php echo $mh['tenmathang'] ?></a></div>
      </div>
    </div>
    <?php } ?>
    <?php }?>
  </div>
<?php } ?>
</div>