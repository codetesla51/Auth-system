<?php
require "../controller/AuthController.php";
ob_start();
if (isset($_SESSION["id"]) && isset($_SESSION["email"])) {
  $id = $_SESSION["id"];
  $email = $_SESSION["email"];
} else {
  echo "No user found. Please log in.";
  exit();
}

if (isset($_POST["logout"])) {
  $connect = new AuthUser($email, "");
  $connect->logoutUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome Page</title>
   <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
<link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <div class="welcome">
    <h1>Welcome User <?php echo $id; ?></h1>
    <h5>Your Email: <?php echo $email; ?></h5>
    <div class="butns">
      <form action="qr.php" method="post">
    <button>Enable Two-Factor Authentication</button>
    </form>
    <form method="post">
      <button name="logout" type="submit">Logout</button>
    </form>
    </div>
  </div>
</body>
</html>
