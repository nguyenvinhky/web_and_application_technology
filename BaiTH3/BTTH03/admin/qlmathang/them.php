<?php include("../view/top.php"); ?>

<h3>Theem mặt hàng</h3> 
<br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="xulythem">
    <div class="form-group">
        <label for="">Danh muc</label>
        <select name="optdanhmuc" class="form-control" id="">
            <?php foreach ($dataDM as $dm){?>
                <option value="<?php echo $dm["id"]; ?>"> <?php echo $dm["tendanhmuc"]; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">TÊN HÀNG</label>
        <input type="text" class="form-control" name="txttenhang" require>
    </div>

    <div class="form-group">
        <label for="">MÔ TẢ</label>
        <input type="textarea" class="form-control" name="txtmota" require>
    </div>

    <div class="form-group">
        <label for="">GIÁ BÁN</label>
        <input type="number" class="form-control" name="txtgiaban" require>
    </div>

    <div class="form-group">
        <label for="">HÌNH ẢNH</label>
        <input type="file" class="form-control" name="filehinhanh" require>
    </div>

    <div class="form-group">
        <input type="submit" value="LƯU" class="btn btn-primary">
        <input type="reset" value="HỦY" class="btn btn-warning">
    </div>
</form>

<?php include("../view/bottom.php"); ?>