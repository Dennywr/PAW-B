<?php 

  require "conn.php";

  $id = $_GET["id"];

  $query = "SELECT * FROM tbl_170 WHERE id_170 = $id";

  $result = mysqli_query($conn, $query);

  if (isset($_POST["submit"])) {

    $nama = $_POST["nama"];
    $email = $_POST["email"];

    $query = "UPDATE tbl_170 SET
              nama_170 = '$nama',
              email_170 = '$email'
              WHERE id_170 = $id";


    if (mysqli_query($conn, $query)) {
      echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
      </script>";
    } else {
      echo "<script>
        alert('Data gagal diubah');
        document.location.href = 'index.php';
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

    <title>CRUD</title>
  </head>
  <body>
    <div class="container mt-4">
      <h2 class="mb-3">Ubah Data Mahasiswa</h2>
      <?php while($mhs = mysqli_fetch_assoc($result)): ?>
        <form method="post" action="">
          <input type="hidden" name="id">
          <div class="row  mt-2">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama_170']; ?>">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="<?= $mhs['email_170']; ?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3 me-2" name="submit">Ubah Data</button>
          <a href="index.php" class="btn btn-danger mt-3">Batalkan</a>
        </form>
      <?php endwhile; ?>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
