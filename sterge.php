<?php
$connect = mysqli_connect('localhost', 'root', '', 'studenti');

if (!$connect) {
  die(mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];

  $sql = "DELETE FROM lista_studenti WHERE id = $id";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    header("Location: studentiphp.php");
    exit;
  } else {
    echo "A intervenit o eroare la ștergerea studentului.";
  }
}

mysqli_close($connect);
?>