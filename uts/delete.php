<?php 

  require "conn.php";

  $id = $_GET["id"];

  $query = "DELETE FROM tbl_170 WHERE id_170 = $id";

  if (mysqli_query($conn, $query)) {
    echo "<script>
      alert('Data berhasil dihapus');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
      alert('Data gagal dihapus');
      document.location.href = 'index.php';
    </script>";
  }

?>