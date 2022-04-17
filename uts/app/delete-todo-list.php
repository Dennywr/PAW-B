<?php

  session_start();
    
  require "func.php";
  
  if(!isset($_SESSION["login"])) {
    header("Location: ../app/login.php");
    exit;
  }

  $id = $_GET["id"];

  if(removeData($id) > 0) {
    echo "<script>
    alert('Tugas dihapus, karena sudah selesai dikerjakan!');
    document.location.href = '../public/index.php#todo-list';
    </script>";
  } else {
    echo "<script>
    alert('Tugas gagal dihapus!');
    document.location.href = '../public/index.php#todo-list';
    </script>";
  }

?>