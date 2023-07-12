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

$data = query("SELECT * FROM kursus");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Online Course</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/logo.PNG" type="image">
</head>
<body>
    <!-- Navbar -->
        <nav class="navbar navbar-default navbar-inverse" >
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="img/logo.png" alt="" class="navbar-brand">
                </div>

                <div class="collapse navbar-collapse" id="example-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Data Kursus<span class="sr-only">(current)</span></a></li>
                        <li><a href="materi.php">Data Materi</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
		        </div>
            </div>
        </nav>

    <div class="container text-center">
        <div>
            <br>
            <h1>Daftar Kursus</h1>
            <br>
        </div>
            <div>
                <h4 class="text-right"><a href="insert_kursus.php">[ + ] Tambah Kursus</a></h4>
                <table border=1 class="table table-striped table-bordered">
                    <tr>
                        <th scope="col">No.</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $no=1;
                        foreach($data as $row){ ?>
                    <tr>    
                            <td><?php echo $no++;?></td>
                            <td><?php echo $row['judul'];?></td>
                            <td class="text-left" width="500px"><?php echo $row['deskripsi'];?></td>
                            <td><?php echo $row['durasi'];?></td>
                            <td width="200px" >
                                <a href="edit_kursus.php?id=<?php echo $row['id'];?>">
                                    <button type="button" class="btn btn-secondary"> Edit </button>
                                </a>
                                <a href="delete_kursus.php?id=<?php echo $row['id'];?>">
                                    <button type="button" class="btn btn-danger"> Hapus </button>
                                </a>
                                <a href="detail_materi.php?id=<?php echo $row['id'];?>">
                                    <button style="margin-top:5px;" type="button" class="btn btn-primary"> Lihat Daftar Materi </button>
                                </a>
                            </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
    </div>
        
    <div class="footer footer-index text-center container-fluid" style="margin-top: 20px; background:black;">
        <img src="img/logo.png" width="150px" style="margin-top:20px;"/>
        <br><br>
        <p class="copyright" style="color:white;">GuruInovatif © 2023</p>
        <p style="color:white;">All Right Reserved</p>
        <br>
    </div>    
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</html>