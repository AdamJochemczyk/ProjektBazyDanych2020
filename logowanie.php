<?php include('server.php') ?>
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
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="favicon.ico" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        nwestycje
      </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="rynek.php">Rynek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mojportfel.php">Mój portfel</a>
      </li>
      </ul>
  </div>
  <div>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item ">
        <a class="nav-link" href="logowanie.php">Logowanie</a>
      </li>
    </ul>
  </div>
</nav>
    <center>
        <div class="div-center col-sm-3 shadow p-3 mb-5 bg-white rounded mt-5">
             <form method="post" action="logowanie.php">
                 <?php include('errors.php'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1" >Adres Email</label>
                <input type="email" class="form-control" name="emailId" aria-describedby="emailHelp" placeholder="Wprowadz email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Hasło</label>
                <input type="password" class="form-control" name="passwordId" placeholder="Wprowadz hasło">
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label" for="exampleCheck1">Nie wylogowywuj mnie</label>
              </div>
              <button type="submit" class="btn btn-primary" name="log_user">Zaloguj</button>
            </form>
                <br/>
                <a href="rejestracja.php" ><button class="btn btn-primary">Zarejestruj się</button></a>
            </div>
    </center>

</body>
</html>
