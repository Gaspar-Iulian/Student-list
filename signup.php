<?php
$connect = mysqli_connect('localhost','root','','studenti');

if(!$connect)
{
  die(mysqli_connect_error());
};


$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$data_nasterii = $_POST['data_nasterii'];
$an_studiu = $_POST['an_studiu'];
$sql = "INSERT INTO lista_studenti (nume, prenume, data_nasterii,an_studiu) VALUES('$nume','$prenume','$data_nasterii','$an_studiu')";
$result = mysqli_query($connect, $sql);
header("Location: studentiphp.php");


?>