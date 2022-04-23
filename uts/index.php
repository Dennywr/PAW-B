<?php 

  require "conn.php";

  $ind = 0;
  $result = mysqli_query($conn, "SELECT * FROM tbl_170");

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

    <div class="container mt-5">
      <h2>Mahasiswa Teknik Informatika</h2>
      <a href="create.php" class="btn btn-primary mt-3">Tambah Data</a>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
          <tbody>
            <?php while($mhs = mysqli_fetch_assoc($result)): ?>
              <tr>
                <th scope="row"><?= $ind+=1; ?></th>
                <td><?= $mhs['nama_170']; ?></td>
                <td><?= $mhs['email_170']; ?></td>
                <td>
                  <a href="update.php?id=<?= $mhs['id_170']; ?>" class="badge bg-warning text-decoration-none">Edit</a> |
                  <a href="delete.php?id=<?= $mhs['id_170']; ?>" class="badge bg-danger text-decoration-none" onclick="return confirm('Yakin?');">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>