<?php 
    include_once("../view/top.php");

?>

<h3>Quản lý danh mục</h3> 
<br>

<table class="table">
    <tr class="danger">
        <th>TÊN DANH MỤC</th>
        <th>SỬA</th>
        <th>XÓA</th>
    </tr>

    <?php
        $stt = true;
        foreach($dataDM as $list)
        {
            if ($iddmUpdate == $list['id']) {
                if ($stt == true) {
                    echo '<form method="post">
                        <tr class="success">
                            <td>
                                <input type="hidden" name="txtId" value="'.$list["id"].'">
                                <input type="text" name="txtTextUpdate" value="'.$list['tendanhmuc'].'">
                                <input type="hidden" name="action" value="capnhat">
                            </td>
                            <td><input type="submit" value="Cập nhật" class="btn btn-info"></td>
                            <td><input type="submit" value="Xóa" class="btn btn-danger"></td>
                        </tr>
                    </form>';
                    $stt = false;
                }
                else{
                    echo '<form method="post">
                        <tr class="success">
                            <td>
                                <input type="hidden" name="txtId" value="'.$list["id"].'">
                                <input type="text" name="txtTextUpdate" value="'.$list['tendanhmuc'].'">
                                <input type="hidden" name="action" value="capnhat">
                            </td>
                            <td><input type="submit" value="Cập nhật" class="btn btn-info"></td>
                            <td><input type="submit" value="Xóa" class="btn btn-danger"></td>
                        </tr>
                    </form>';
                    $stt = true;
                }
                
            }
            else{
                if($stt == true)
                {
                    echo '<tr class="success">
                    <td>'.$list['tendanhmuc'].'</td>
                    <td><a href="?action=sua&iddm='.$list['id'].'"><input type="submit" value="Sửa" class="btn btn-info"></a></td>
                    <td><a href="?action=xoa&id='.$list['id'].'"><input type="submit" value="Xóa" class="btn btn-danger"></a></td>
                    </tr>';
                    $stt = false;
                }
                else{
                    echo '<tr class="info">
                    <td>'.$list['tendanhmuc'].'</td>
                    <td><a href="?action=sua&iddm='.$list['id'].'"><input type="submit" value="Sửa" class="btn btn-info"></a></td>
                    <td><a href="?action=xoa&id='.$list['id'].'"><input type="submit" value="Xóa" class="btn btn-danger"></a></td>
                    </tr>';
                    $stt = true;
                }
            }
        }
    ?>
</table>

<div>
<form class="form-inline" method="post">
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm danh mục</button>
    <div id="demo" class="collapse">
        <input type="text" id="usr" name="txtten" placeholder="Tên danh mục">
        <input type="hidden" name="action" value="them">
        <input type="submit" value="Lưu" class="btn btn-success">
    </div>
</form>
</div>


<?php include_once("../view/bottom.php"); ?>
