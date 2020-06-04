<?php

$conn = mysqli_connect(

    "localhost",
    "root",
    "",
    "mydb"

);
session_start();
if (!isset($_SESSION['email']))
  {
  $_SESSION['msg'] = "Musisz się zalogować!";
  header('location: logowanie.php');
}
else 
{
  //pobieranie danych do tabeli
  $mail=$_SESSION['email'];
  $sql = "SELECT inwestycje.nazwa, inwestycje.koszt_inwestycji, inwestycjeuzytkownik.DATA_R, inwestycjeuzytkownik.DATA_Z
   FROM inwestycje, inwestycjeuzytkownik, uzytkownik
    WHERE inwestycje.idInwestycje=inwestycjeuzytkownik.idInwestycje AND
     uzytkownik.idUzytkownik=inwestycjeuzytkownik.idUzytkownik AND uzytkownik.email='$mail'";
  $result = $conn->query($sql);
    
    //do iteracji
  $i=1;
        $pobranieKwota = "SELECT kwota FROM uzytkownik WHERE email='$mail'";
        $resultMoney = mysqli_query($conn, $pobranieKwota);
        if ($resultMoney->num_rows > 0)
        {
          while($Row=$resultMoney->fetch_array())
          {
              $money=$Row[0];
          }
        }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Moj portfel</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg mb-5">
    <a class="navbar-brand" href="index.php">
        <img src="favicon.ico" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        nwestycje
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="rynek.php">Rynek</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="mojportfel.php">Mój portfel</a>
      </li>
      </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active mt-2">
        <?php  if (isset($_SESSION['email'])) : ?>
			Witaj <strong><i><?php echo $_SESSION['email']; ?></i> [<?php echo $money;?> zł]</strong>
          </li>
        <li class="nav-item active">
			<a class="nav-link" href="index.php?logout='1'">Wyloguj</a>
        </li>
          <?php endif ?>
      <li class="nav-item active">
        <?php  if (!isset($_SESSION['email'])) : ?>
        <a class="nav-link" href="logowanie.php">Logowanie</a>
          <?php endif ?>
      </li>
    </ul>
  </div>
</nav>
  <div class="row" style="padding: 3%;">
    <div class="col-lr-6" style="font-size: 1.5rem; margin: 0 5% 0 0;">
      <label>W portfelu: </label>
      <?php
        $sqlpk="SELECT kwota FROM uzytkownik WHERE email='$mail';";
        $sqlpkodp = $conn->query($sqlpk);
        $posiadanakwota;
        if($row = $sqlpkodp->fetch_assoc()) {
        echo $row['kwota']."<br>";
        $posiadanakwota=$row['kwota'];
      }
       ?>
    </div>
  <div class="col-lr-2">
    <form method="post" action="mojportfel.php">
      <div class="form-group">
        <label>Zasil konto:</label>
        <input type="text" class="form-control" name="kwotazasilenia" placeholder="Wprowadź kwotę"></br>
        <button type="submit" class="btn btn-primary" name="zasil">Zasil</button>
      </div>
    </form>
    <?php
    $errors = array();
      if (isset($_POST['zasil'])) {
        $doladowanie=mysqli_real_escape_string($conn, $_POST['kwotazasilenia']);
          if (empty($doladowanie)||($doladowanie==0)) { $doladowanie=0; }
          if (count($errors) == 0) {
      			$zasil = "UPDATE uzytkownik SET kwota = $posiadanakwota+$doladowanie WHERE  email='$mail';";
      			$conn->query($zasil);
            header("Refresh:0");
          }
        }
     ?>
  </div>
  <div class="col-lr-2 ml-5 pl-5">
  <a href="raport.php" class="btn btn-dark btn-lg">Generuj raport inwestycyjny</a>
  </div>
  <div class="col-lr-2 ml-5 pl-5" style="margin-left: 10px;">
  <a href="userpanel.php" class="btn btn-dark btn-lg">Panel użytkownika</a>
  </div>
</div>
<div class="row" style="padding: 0 5% 0 5%;">
  <table class="table col-lr-6 table-bordered shadow-lg">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Koszt inwestycji</th>
      <th scope="col">Data zakupu</th>
      <th scope="col">Data zakończenia</th>
      <th scope="col">Akcja</th>
    </tr>
  </thead>
  <tbody>
<?php  while($row = $result->fetch_assoc()) {
            echo "<tr><th>".$i."</th><td>".$row['nazwa']."</td>";
            echo "<td>" . $row['koszt_inwestycji'] ."</td>";
            echo "<td>". $row['DATA_R'] ."</td>";
            echo "<td>". $row['DATA_Z'] ."</td>";
            if($row['DATA_Z']==null)
            {
            echo "<td><form action='server.php' method='POST'>Kwota sprzedaży: <input type='number' name='kwotasprzedazy'>";
            echo "<button type='submit' name='sprzedajbtn' class='btn btn-dark btn-lg' value=".$row['nazwa'].">Sprzedaj</button></form></td></tr>";
            }
            else {
              echo "</td></form><td>Aktywo sprzedane</td></tr>";
            }
            $i++;
        } 
        ?>
      </tbody>
   </table>
 </div>
</body>
</html>
