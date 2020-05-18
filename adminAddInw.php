<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rejestracja</title>
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
        <a class="nav-link" href="usrmgmnt.php">Zarządzaj użytkownikami</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="inwmgmnt.php">Zarządzaj inwestycjami</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminAddUser.php">Dodaj użytkownika</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminAddInw.php">Dodaj inwestycję</a>
      </li>
    </ul>
  </div>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item mt-2">
        <?php  if (isset($_SESSION['email'])) : ?>
			Witaj <strong><?php echo $_SESSION['email']; ?></strong>
          </li>
        <li class="nav-item ">
			<a class="nav-link" href="index.php?logout='1'">Wyloguj</a>
        </li>
          <?php endif ?>
    </ul>
  </div>
        <div>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item ">
        <?php  if (!isset($_SESSION['email'])) : ?>
        <a class="nav-link" href="logowanie.php">Logowanie</a>
          <?php endif ?>
      </li>
    </ul>
  </div>
</nav>
    <center>
        <div class="div-center col-sm-3 shadow p-3 mb-5 bg-white rounded mt-5">
             <form method="post" action="adminAddInw.php">
                 <?php include('errors.php'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Nazwa inwestycji</label>
                <input type="text" class="form-control" name="inwId" aria-describedby="emailHelp" placeholder="Wprowadź nazwę">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Typ inwestycji</label>
                <select class="form-control" name="typInwId">
                <option value="l">Lokaty</option>
                <option value="n">Nieruchomości</option>
                <option value="s">Surowce</option>
                <option value="w">Waluty</option>
                <option value="o">Obligacje</option>
                <option value="a">Akcje</option>
                </select>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Koszt inwestycji</label>
                <input type="text" class="form-control" name="kosztId" aria-describedby="emailHelp" placeholder="Wprowadź koszt">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Stopa zwrotu</label>
                <input type="text" class="form-control"  name="stopaId" aria-describedby="emailHelp" placeholder="Wprowadź stopę zwrotu">
              </div>  
              <button type="submit" class="btn btn-primary" name="admin_inw">Dodaj inwestycje</button>
            </form>
            </div>
    </center>

</body>
</html>
