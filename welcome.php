<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: FormLogin.php"); 
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Berhasil Login</title>
</head>

<body>
  <h1>kamu berhasil log in sebagai <?php echo ($_SESSION['user']) ?>!</h1>
  <p>Anda berhasil login menggunakan authencital sederhana</p>
    <a href="logout.php">Logout</a>



</h1>
</body>
</html>
