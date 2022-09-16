<div class="container">

  <div class="row">
      <div class="col-sm-2">

      </div>

      <div class="col-sm-8">
        <h1>
          THÊM SINH VIÊN
        </h1>
        <form action="add.php" method="post">
          <div class="form-group">
            <label for="txtmssv">Mã số sinh viên: </label>
            <input type="text" name="txtmssv" id="txtmssv" class="form-control">
          </div>
          <div class="form-group">
            <label for="txthoten">Họ tên: </label>
            <input type="text" name="txthoten" id="txthoten" class="form-control">
          </div>
          <div class="form-group">
            <label for="txtemail">Email: : </label>
            <input type="email" name="txtemail" id="txtemail" class="form-control">
          </div>
          <div class="form-group">
            <label for="optlop">Lớp: </label>
            <select name="optlop" id="optlop" class="form-control">
              <?php
                  // Kết nối CSDL
                  $conn = mysqli_connect("localhost", "root", "vertrigo", "quanlysinhvien");
                  // Thực hiện truy vấn
                  $sql = "SELECT * FROM lop";
                  $lop = mysqli_query($conn, $sql);
                  // Duyệt và xuất kết quả
                  if(mysqli_num_rows($lop) > 0){
                      while($l = mysqli_fetch_assoc($lop))
                      {
                        echo "<option value=\". $l[id] .\">".$l["lop"]."</option>";
                      }
                  }
              ?>
            </select>
            <div class="form-group">
            <button type="button" class="btn btn-success">
              <?php
                  $conn = mysqli_connect("localhost", "root", "vertrigo", "quanlysinhvien");
                  $sql = INSERT INTO `sinhvien`(`id`, `mssv`, `hoten`, `email`, `lopid`) VALUES ('txtmssv', '$txthoten', '$txtemail', '$optlop')
                ?>
            </button>
          </div>
          </div>
        </form>
      </div>
  </div>

</div>