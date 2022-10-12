<?php include("../view/top.php"); ?>

<h3>Sửa mặt hàng</h3> 
<br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="xulysua">


    <div class="form-group">
        <label for="">Danh muc</label>
        <select name="optdanhmuc" class="form-control" id="">
            <?php foreach ($danhmuc as $dm){?>
                <option value="<?php echo $dm["id"]; ?>" <?=$dm["id"] == $mathang["danhmuc_id"] ? ' selected="selected"' : '';?>> <?php echo $dm["tendanhmuc"]; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Ten hang</label>
        <input type="text" class="form-control" name="txttenhang"  require value="<?php echo $mathang["tenmathang"]; ?>">
    </div>

    <div class="form-group">
        <label for="">Mo ta</label>
        <input type="textarea" class="form-control" name="txtmota" require value="<?php echo $mathang["mota"]; ?>">
    </div>

    <div class="form-group">
        <label for="">Gia ban</label>
        <input type="number" class="form-control" name="txtgiaban" require value="<?php echo $mathang["giaban"]; ?>">
    </div>

    <div class="form-group">
        <label for="">Hinh anh</label>
        <input type="file" class="form-control" name="filehinhanh" require>
    </div>

    <div class="form-group">
        <input type="submit" value="Luu" class="btn btn-primary">
        <input type="reset" value="Huy" class="btn btn-warning">
    </div>
    

</form>


<?php include("../view/bottom.php"); ?>