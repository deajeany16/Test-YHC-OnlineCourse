<?php

require 'function.php';
session_start();

if (!isset($_SESSION['username'])) {
    echo "
			<script>
				alert('You must login first');
				document.location.href = 'login.html';
			</script>
		";
}

// ambil data di URL 
$id = $_GET["id"];

$data = query("SELECT * FROM kursus WHERE id = $id")[0];

// cek tombol submit sdh ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil di ubah atau tidak
	if (edit_kursus($_POST) > 0) {
		echo "
				<script>
					alert('data berhasil diubah!');
					document.location.href = 'index.php';
				</script>
		";
	} else {
		echo "
		<script>
					alert('data gagal diubah!');
					document.location.href = 'index.php';
				</script>
		";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kursus  | Online Course</title>
	<link rel="shortcut icon" href="img/logo.PNG" type="image">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container panel panel-default" style="display:block; margin-top:40px; 
		margin-left: auto; margin-right: auto; width:80%;">
		<div class="text-center">
            <h3>Edit Data Kursus</h3>
			<br>
        </div>
		<form method="POST" action=""> 
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input type="text" name="judul" class="form-control"
					required value="<?php echo $data["judul"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<textarea cols="30" rows="10" type="text" name="deskripsi" class="form-control"><?php echo $data["deskripsi"]; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Durasi</label>
				<div class="col-sm-10">
					<input type="text" name="durasi" class="form-control"
					required value="<?php echo $data["durasi"]; ?>">
				</div>
			</div>
			<div class="text-right">
				<button type="submit" name="submit" class="btn btn-primary" style="width: 120px;">Submit</button>
			</div>
		</form>
		<br><br>
		<button class="btn btn-secondary"><a href="index.php" style="text-decoration:none; color:#3498db;"><< Kembali</a></button>
		<br><br>
	</div>
</body>
</html>