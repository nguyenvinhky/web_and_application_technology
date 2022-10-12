<?php include("../view/top.php"); ?>

<h3>Quản lý mặt hàng</h3> 
<br>

<a href="index.php?action=them" class="btn btn-primary"><span ></span>Thêm mới</a>
<br><br>

<table class="table table-striped table-hover">
    <tr class="danger">
        <th>TÊN HÀNG</th>
        <th>GIÁ BÁN</th>
        <th>HÌNH ẢNH</th>
        <th>SỬA</th>
        <th>XÓA</th>
    </tr>

    <?php
        $stt = true;
        foreach($dataMH as $list)
        {
            if($stt == true)
            {
                echo '<tr class="success">
                <td>'.$list['tenmathang'].'</td>
                <td>'.$list['giaban'].'</td>
                <td><img src="../../'.$list['hinhanh'].'" class="img-thumbnail" width="60"></td>
                <td><a href="?action=sua&id='.$list['id'].'"><input type="submit" value="Sửa" class="btn btn-info"></a></td>
                <td><a href="?action=xoa&id='.$list['id'].'"><input type="submit" value="Xóa" class="btn btn-danger"></a></td>
                </tr>';
                $stt = false;
            }
            else{
                echo '<tr class="info">
                <td vertical-align=""midle>'.$list['tenmathang'].'</td>
                <td>'.$list['giaban'].'</td>
                <td><img src="../../'.$list['hinhanh'].'" class="img-thumbnail" width="60"></td>
                <td><a href="?action=sua&id='.$list['id'].'"><input type="submit" value="Sửa" class="btn btn-info"></a></td>
                <td><a href="?action=xoa&id='.$list['id'].'"><input type="submit" value="Xóa" class="btn btn-danger"></a></td>
                </tr>';
                $stt = true;
            }
            
        }
    ?>
</table>

<?php include("../view/bottom.php"); ?>
