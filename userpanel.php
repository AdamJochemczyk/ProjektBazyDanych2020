<?php
include('server.php');
if (!isset($_SESSION['email']))
  {
  $_SESSION['msg'] = "Musisz się zalogować!";
  header('location: logowanie.php');
}
else {
    $mail=$_SESSION['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Zaloguj się</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    function showPassword()
        {
          var x = document.getElementById("passwordId");
          if (x.type === "password")
          {
            x.type = "text";
          }
          else
          {
            x.type = "password";
          }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
			Witaj <strong><?php echo $_SESSION['email']; ?></strong>
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
<div class="row justify-content-md-center">
    <div class="col-sm-3 shadow p-3 mb-5 bg-white rounded mt-5">
             <form method="post" action="userpanel.php">
             <?php include('errors.php'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Zmien adres email</label>
                <input type="email" class="form-control" name="emailIdchange" aria-describedby="emailHelp" placeholder="Wprowadź nowy email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Zmień hasło</label>
                <input type="password" class="form-control" name="passwordIdchange" id="passwordId" placeholder="Wprowadź nowe hasło">
                <input type="checkbox" onclick="showPassword()"> Pokaż hasło
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Imię</label>
                <input type="text" class="form-control" name="nameIdch" aria-describedby="emailHelp" placeholder="Wprowadź Imię">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nazwisko</label>
                <input type="text" class="form-control"  name="surnameIdch" aria-describedby="emailHelp" placeholder="Wprowadź Nazwisko">
              </div>
              <button type="submit" class="btn btn-primary" name="change_data">Zmień dane</button>
            </form>
            </div>
</div>
</body>
</html>
