<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row row-no-gutters">
                <div class="col">
                    <div class="col-sm-2">
                        <h3>LỚP</h3>
                        <div class="list-group">
                            <?php
                            // Kết nối CSDL
                            $conn = mysqli_connect("localhost", "root", "vertrigo", "quanlysinhvien");
                            if (!$conn)
                            {
                                die("Lỗi kết nối: ". mysqli_connect_error());
                            }
                            // Thực hiện truy vấn
                            
                            $sql = "SELECT * FROM lop";
                            $lop = mysqli_query($conn, $sql);
                            // Duyệt và xuất kết quả
                            if(mysqli_num_rows($lop) > 0){
                                while($l = mysqli_fetch_assoc($lop)){
                                    echo "<a class=\"list-group-item\" href=\"index.php?id=" . $l["id"] . "\">" . $l["lop"] . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
      
                    <div class="col-sm-8">
                        <h3>DANH SÁCH SINH VIÊN</h3>
                        <table class="table table-hover">
                        <tr><th>MSSV</th><th>Họ tên</th><th>Email</th><th>Thao tác</th></tr>
                            <?php
                            $sql = "select sv.*, l.lop from sinhvien sv, lop l where sv.lopid = l.id ";
                            if(isset ($_GET["id"])){
                                $sql=$sql . "and lopid=" . $_GET["id"];
                            }

                            $sinhvien = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($sinhvien) > 0){
                                while($sv = mysqli_fetch_assoc($sinhvien)){
                                    echo "<tr>";
                                    echo "<td>". $sv["mssv"] ."</td>";
                                    echo "<td>". $sv["hoten"] . "</td>";
                                    echo "<td>". $sv["email"] . "</td>";
                                    echo "<td>". $sv["lop"] . "</td>";
                                    echo "<td><a href=\"index.php\"><button type=\"button\" class=\"btn btn-success\">Xóa</button></a></td>";
                                    echo "<td><a href=\"index.php\"><button type=\"button\" class=\"btn btn-warning\">Sửa</button></a></td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                    </div>
                    <a href="add.php"><button type="button" class="btn btn-primary">Thêm</button></a>
                </div>
            </div>
        </div>
    </body>
</html>