<?php
$connect = mysqli_connect('localhost','root','','studenti');

if(!$connect)
{
  die(mysqli_connect_error());
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
      table {
        border-collapse: collapse;
        width: 100%;
        font-family: Arial, sans-serif;
      }
      th, td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #232121;
      }
      th {
        background-color: #4CAF50;
        color: white;
      }
      tr:hover {
        background-color: #1a7cb5;
      }
    </style>
      <meta charset="UTF-8">
      <title>Lista Studenti</title>
</head>
<body>
<div>
     <div class="wave"></div>
     <div class="wave"></div>
     <div class="wave"></div>
  </div>
<center> 
    <h1 style="font-family: 'Courier New', Courier, monospace;" >Lista de Studenți  </h1>
</center>

<table>
      <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Data nașterii</th>
        <th>Anul de studiu</th>
        <th>Stergere</th>
      </tr>


<?php
$sql = "SELECT * FROM lista_studenti " ;
$result = mysqli_query($connect, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($rows as $row) {
  echo "<tr>";
  echo "<td>".$row['id']."</td>";
  echo "<td>".$row['nume']."</td>";
  echo "<td>".$row['prenume']."</td>";
  echo "<td>".$row['data_nasterii']."</td>";
  echo "<td>".$row['an_studiu']."</td>";
  echo "<td><form method='POST' action='sterge.php'>
          <input type='hidden' name='id' value='".$row['id']."'>
          <button type='submit' name='sterge'>Sterge</button>
      </form>
      </td>";
  echo "</tr>";
}


              ?>
</table>
<!-- Form pt insert -->

<div style="display:flex; justify-content: center; align-items: center;">
  <div style="font-family: 'Courier New', Courier, monospace; color: rgb(119, 23, 134); text-align: center;">
    <h1 style="font-size: 24pt;">Adauga student</h1>
  </div>
</div>

    <div style="display:flex; justify-content: space-between;">
  <form id="formular-1" action="signup.php" method="POST">
    <input class="form__input" type="text" name="nume" placeholder="Nume student"> 
    <label class="form__label" for="nume">Nume student</label>
    <input class="form__input" type="text" name="prenume" placeholder="Prenume">
    <label class="form__label" for="prenume">Prenume</label>
    <input class="form__input" type="text" name="data_nasterii" placeholder="Data nasterii">
    <label class="form__label" for="data_nasterii">Data nasterii</label>
    <input class="form__input" type="text" name="an_studiu" placeholder="Anul studiului">
    <label class="form__label" for="an_studiu">Anul studiului</label>
    <input type="submit" name="trimite" value="Adauga Student">
  </form>
</div>
<style>
#formular-1 {
  width: 400px;
  margin: 0 auto;
  text-align: left;
}

#formular-1 .form__label {
  font-family: 'Roboto', sans-serif;
  font-size: 0.7rem;
  margin-left: 2rem;
  margin-top: 0.7rem;
  display: block;
  transition: all 0.3s;
  transform: translateY(0rem);
}

#formular-1 .form__input {
  font-family: 'Roboto', sans-serif;
  color: #333;
  float: left;
  font-size: 0.7rem;
  margin: 0 auto;
  padding: 1.5rem 2rem;
  border-radius: 0.2rem;
  background-color: rgb(255, 255, 255);
  border: none;
  width: 90%;
  display: block;
  border-bottom: 0.3rem solid transparent;
  transition: all 0.3s;
}

#formular-1 .form__input:placeholder-shown + .form__label {
  opacity: 0;
  visibility: hidden;
  -webkit-transform: translateY(-4rem);
  transform: translateY(-4rem);
}
</style>



</body>
