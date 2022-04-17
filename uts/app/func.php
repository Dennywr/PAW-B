<?php 

  $conn = mysqli_connect("localhost", "root", "", "cagas");

  function query($query) {
    global $conn;
    $temp = [];
    $result = mysqli_query($conn, $query);
    while($student = mysqli_fetch_assoc($result)) {
      $temp[] = $student;
    }
    return $temp;
  }

  function addedData($data) {
    global $conn;

    $judulTugas = $data["judul-tugas"];
    $deskripsiTugas = $data["deskripsi-tugas"];
    $matakuliah = $data["matakuliah"];
    $kelas = $data["kelas"];
    $deadline = $data["deadline"];

    $tugasQuery = "INSERT INTO tugas
              VALUES ('', '$judulTugas', '$deskripsiTugas', '$deadline')";

    $matakuliahQuery = "INSERT INTO matakuliah
              VALUES ('', '$matakuliah', '$kelas')";

    mysqli_query($conn, $tugasQuery);
    mysqli_query($conn, $matakuliahQuery);

    return mysqli_affected_rows($conn);
  }

  function changeData($data) {
    global $conn;

    $id = $data["id"];
    $judulTugas = $data["judul-tugas"];
    $deskripsiTugas = $data["deskripsi-tugas"];
    $matakuliah = $data["matakuliah"];
    $kelas = $data["kelas"];
    $deadline = $data["deadline"];

    $tugasQuery = "UPDATE tugas SET
              judulTugas = '$judulTugas',
              deskripsiTugas = '$deskripsiTugas',
              deadline = '$deadline'
              WHERE id = $id";

    $matakuliahQuery = "UPDATE matakuliah SET
              namaMk = '$matakuliah',
              kelas = '$kelas'
              WHERE id = $id";

    mysqli_query($conn, $tugasQuery);
    mysqli_query($conn, $matakuliahQuery);

    return mysqli_affected_rows($conn);
  }

  function removeData($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tugas WHERE id = $id");
    mysqli_query($conn, "DELETE FROM matakuliah WHERE id = $id");

    return mysqli_affected_rows($conn);
  }

?>