<?php 

  session_start();

  require "func.php";

  if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1) {

      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])) {
        // set session
        $_SESSION["login"] = true;
        
        header("Location: ../public/index.php");
        exit;
      }
      
    }

  }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;800&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Login</title>

    <link rel="stylesheet" href="../public/css/login.css">

    <style>
      * {
        font-family: 'Poppins', sans-serif;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </head>
  
    <body class="text-center">
      <main class="form-signin w-50" data-aos="zoom-in">
        <form method="POST" action="">
          <h1 class="h3 mb-3 fw-bold">LOGIN</h1>

          <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            <label for="username">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
          </div>

          <button class="w-100 btn btn-lg btn-warning text-light" type="submit" name="login">Login</button>
        </form>
      </main>

  <!-- Initialize AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../public/js/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
  </body>
</html>
