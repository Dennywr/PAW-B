<?php

  session_start();
  
  require "func.php";
  
  if(!isset($_SESSION["login"])) {
    header("Location: ../app/login.php");
    exit;
  }

  $id = $_GET["id"];

  $query = mysqli_query($conn, "SELECT * FROM tugas NATURAL JOIN matakuliah WHERE id=$id");

  if(isset($_POST["edit"])) {
    
    if(changeData($_POST) > 0) {
      echo "<script>
        alert('Data berhasil diubah');
        document.location.href = '../public/index.php#todo-list';
      </script>";
    } else {
      echo "<script>
        alert('Data gagal diubah');
        document.location.href = '../public/index.php#todo-list';
      </script>";
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

    <title>Edit To Do List</title>

    <link rel="stylesheet" href="../public/css/insert.css">

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

      span {
        color: #FFC107;
      }
      
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </head>
  
    <body class="text-center">
      <main class="form-signin" data-aos="zoom-in">
        <form method="POST" action="">
          <h1 class="h3 mb-3 fw-bold">EDIT TO <span>DO LIST</span></h1>
          
          <?php while($row = mysqli_fetch_assoc($query)): ?>
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <div class="form-floating mb-2">
              <input type="text" class="form-control" id="judul-tugas" placeholder="Judul Tugas" name="judul-tugas" value="<?= $row['judulTugas']; ?>">
              <label for="judul-tugas">Judul tugas</label>
            </div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Deskripsi Tugas" id="deskripsi-tugas" style="height: 100px" name="deskripsi-tugas"><?= $row['deskripsiTugas']; ?></textarea>
              <label for="deskripsi-tugas">Deskripsi tugas</label>
            </div>
            <div class="form-floating mb-2">
              <input type="text" class="form-control" id="matakuliah" placeholder="Matakuliah" name="matakuliah"  value="<?= $row['namaMk']; ?>">
              <label for="matakuliah">Matakuliah</label>
            </div>
            <div class="form-floating mb-2">
              <input type="text" class="form-control" id="kelas" placeholder="Kelas" name="kelas"   value="<?= $row['kelas']; ?>">
              <label for="kelas">Kelas</label>
            </div>
            <div class="form-floating mb-2">
              <input type="date" class="form-control" id="deadline" placeholder="Deadline" name="deadline" value="<?= $row['deadline']; ?>">
              <label for="deadline">Deadline</label>
            </div>
            
            <button class="btn btn-lg btn-warning btn-outline-secondary text-light mt-2" type="submit" name="edit">Edit</button>
            &nbsp;&nbsp;
            <a href="../public/index.php" class="btn btn-lg btn-danger btn-outline-secondary text-light mt-2" type="submit">Cancel</a>
          <?php endwhile; ?>
        </form>
      </main>

  <!-- Initialize AOS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../public/js/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
