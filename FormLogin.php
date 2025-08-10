<?php
session_start ();
if(isset ($_SESSION['user'])) {
  header (header: "Location: Welcome.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
</head>


<body>

  <div class="login-container">
    <div class="login-box">
      <h3>Login</h3>
      <?php if (isset($_GET['error'])): ?>
      <p class="error">Username atau password salah!</p>
    <?php endif; ?>
    
      <form action="auth.php" method="POST">
        <label for="username">Username</label>
        <div class="input-group">
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>

        <label for="password">Password</label>
        <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
      <div>
        <a href="index.php" class="back-btn">Back</a>
        </div>
      </div>
      </form>
    </div>
  </div>

  
</body>
</html>