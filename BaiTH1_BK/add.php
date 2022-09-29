<?php 
	$conn = mysqli_connect("localhost", "root", "vertrigo", "quanlysinhvien");
	if(isset($_POST["txtmssv"] && $_POST["txthoten"] && $_POST["txtemail"] && $_POST["optlop"]))
  {
		$mssv = $_POST["txtmssv"];
		$hoten = $_POST["txthoten"];
		$email = $_POST["txtemail"];
		$idlop = $_POST["optlop"];
		$sql = "INSERT INTO sinhvien VALUES ($mssv, $hoten, $email, $idlop)";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="container" >
 <div class = "row">
  <div class = "col-sm-8">
	<h1>THÊM SINH VIÊN</h1>
	<form action="add.php" method = "post">
	  <div class="form-group">
		<label for="txtmssv">MSSV:</label>
		<input type="text" class="form-control" id="txtmssv" name="txtmssv">
	  </div>
	  <div class="form-group">
		<label for="txthoten">Ho ten:</label>
		<input type="text" class="form-control" id="txthoten" name="txthoten">
	  </div>
	  <div class="form-group">
		<label for="txtemail">Email:</label>
		<input type="email" class="form-control" id="txtemail" name="txtemail">
	  </div>
	  <div class = "form-group">
		<label for="optlop"> Lop </label>
		<select class = "form-control" id= "optlop" name = "optlop">
			<?php
			  $conn = mysqli_connect("localhost", "root", "vertrigo", "quanlysinhvien");
			  if(!$conn){
				die("Connect failed: ". mysqli_connect_error());
			  }    

			  $sql = "Select * from lop";
			  $lop = mysqli_query($conn, $sql);

			  if(mysqli_num_rows($lop) >0){
          while($l = mysqli_fetch_assoc($lop)){
            echo "<option value = \"" . $l["id"] . "\">" . $l["lop"] . "</option>;";
          }
			  }
			?>
		</select>
	  </div>
	  <button type="submit" class="btn btn-default">THÊM</button>
	</form>
  </div>
 </div>
</div>
</body>
</html>