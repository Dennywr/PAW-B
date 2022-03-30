<?php 

  require "conn.php";

  $id = $_GET["id"];
  $query = "SELECT * FROM tbl_170 WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (isset($_POST["submit"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $fakultas = $_POST["fakultas"];

    $query = "UPDATE tbl_170 SET
              nim = '$nim',
              nama = '$nama',
              prodi = '$prodi',
              fakultas = '$fakultas'
              WHERE id = $id";

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
      <?php while($students = mysqli_fetch_assoc($result)): ?>
        <form method="post" action="">
          <div class="row">
            <div class="col-md-6">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" value="<?= $students["nim"]; ?>">
            </div>
          </div>
          <div class="row  mt-2">
            <div class="col-md-6">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $students["nama"]; ?>">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $students["prodi"]; ?>">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label for="fakultas" class="form-label">Fakultas</label>
              <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= $students["fakultas"]; ?>">
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
