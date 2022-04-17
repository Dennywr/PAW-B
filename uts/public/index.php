<?php 

  session_start();

  if(!isset($_SESSION["login"])) {
    header("Location: ../app/login.php");
    exit;
  }

  $conn = mysqli_connect('localhost', 'root', '', 'cagas');

  $query = mysqli_query($conn, "SELECT * FROM tugas NATURAL JOIN matakuliah WHERE tugas.id=matakuliah.id");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;800&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>To Do List</title>
    <style>
      * {
        font-family: 'Poppins', sans-serif;
      }
      span {
        color: #FFC107;
      }
      .navbar-nav > li{
        padding-left:30px;
        padding-right:30px;
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <div class="container mt-4">
      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
          <a class="navbar-brand fs-3 fw-bold" href="#">CA<span>GAS</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-uppercase">
              <li class="nav-item" >
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#about-us">About</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#todo-list">To Do List</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="../app/logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!-- End Navbar -->
    
    <!-- Jumbotron -->
    <div class="container" style="margin-top: 7rem;">
      <div class="row">
        <div class="col-md-6 jumbotron-text" style="margin-top: 8rem; text-transform: uppercase;" data-aos="fade-right">
          <h1 class="fw-bold lh-3" style="font-size: 50px;">Take notes on tasks and do them before the deadline</h1>
          <a href="../app/add-todo-list.php" class="btn btn-warning rounded-pill text-uppercase text-white px-5 py-2 mt-2">Create</a>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5 mt-5 jumbotron-img" data-aos="fade-left">
          <img src="img/jumbotron-people.png" class="img-fluid w-70" alt="...">
        </div>
      </div>
    </div>
    <!-- End Jumbotron -->

    <!-- About -->
    <div id="about-us"></div>
    <div class="container text-center mx-auto" style="margin-top: 12rem;">
      <div class="row" data-aos="fade-down">
        <div class="col-md">
          <h2 class="text-center text-uppercase fw-bold">About <span>Us</span></h2>
        </div>
      </div>
      <div class="row mt-5" data-aos="flip-up">
        <div class="col-md">
          <img src="img/about.png" class="img-fluid d-block mx-auto" alt="...">
        </div>
      </div>
      <div class="row mt-5" data-aos="fade-down">
        <div class="col-md-3"></div>
        <div class="col-md-6 fs-5 mt-4">
          <p class="text-center">Cagas is a website that can be used to record your tasks or work so you don't forget and can be completed on time. This website is also flexible and easy to use.</p>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <!-- End About -->

    <!-- Why -->
    <div id="why"></div>
    <div class="container text-center" style="margin-top: 10rem; margin-bottom: 8rem;" id="why-cagas">
      <div class="row" data-aos="fade-down">
        <div class="col-md">
          <h2 class="text-center text-uppercase fw-bold">Why Ca<span>Gas</span></h2>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4" data-aos="fade-right">
          <div class="card">
            <img src="img/Icon3.png" class="img-fluid card-img-top d-block mt-3 mx-auto w-25 h-25" alt="...">
            <div class="card-body">
              <h5 class="card-title">Easy to Use</h5>
              <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-down">
          <div class="card">
            <img src="img/Icon2.png" class="img-fluid card-img-top d-block mt-3 mx-auto w-25 h-25" alt="...">
            <div class="card-body">
              <h5 class="card-title">Flexible</h5>
              <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-left">
          <div class="card">
            <img src="img/Icon1.png" class="img-fluid card-img-top d-block mt-3 mx-auto w-25 h-25" alt="...">
            <div class="card-body">
              <h5 class="card-title">Easy to Operate</h5>
              <p class="card-text mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Why -->

    <!-- To Do List -->
    <div id="todo-list"></div>
    <div class="container" style="margin-top: 13rem;" id="todo-list">
      <h2 class="text-center text-uppercase fw-bold" data-aos="fade-down">To Do <span>List</span></h2>
      <div class="row mt-5">
      <?php while($row = mysqli_fetch_assoc($query)): ?>
        <div class="col-md-4"  data-aos="flip-right">
          <div class="card mb-3">
            <div class="card-body">
              <div class="heading d-flex">
                <h5><?= $row["judulTugas"]; ?>&nbsp;</h5>
                <h5 class="card-title"> <?= $row["namaMk"]; ?> <?= $row["kelas"]; ?></h5>
              </div>
              <small><p>Deadline : <?= $row["deadline"]; ?></p></small>
              <p class="card-text"><?= $row["deskripsiTugas"]; ?></p>
              <a href="../app/edit-todo-list.php?id=<?= $row['id']; ?>" class="btn btn-warning text-light" type="submit" name="edit">edit</a>
              <a href="../app/delete-todo-list.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin sudah selesai?');" class="btn btn-success text-light" type="submit" name="finished">Finished</a>
            </div>
          </div>
          </div>
        <?php endwhile; ?>
      </div>
      <a href="../app/add-todo-list.php" class="btn btn-warning rounded-pill text-uppercase text-white px-5 py-2 mt-4 d-block mx-auto w-25">Create</a>
    </div>
    <!-- End To Do List -->

    <!-- footer -->
    <div class="container text-center" style="margin-top: 10rem;">
      <footer class="p-3">Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://github.com/Dennywr/" target="_blank" class="text-dark">Dennywr</a></footer>
    </div>
    <!-- End Footer -->

  <!-- Initialize AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../public/js/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>