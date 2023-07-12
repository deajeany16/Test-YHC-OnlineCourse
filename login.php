<?php
// variable pendefinisian kredensial
$usernamelogin = 'admin';
$passwordlogin = 'admin123';

// memulai session
session_start();

// mengambil isian dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// pengecekan kredensial login
if ($username == $usernamelogin && $password == $passwordlogin) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    echo "
			<script>
				alert('Username/Password salah!');
				document.location.href = 'login.html';
			</script>
		";
}

?>