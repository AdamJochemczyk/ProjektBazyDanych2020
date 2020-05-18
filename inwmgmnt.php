<?php 
	session_start(); 

	if (isset($_GET['logout'])) 
    {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
    }

$conn = mysqli_connect(

    "localhost",
    "root",
    "root",
    "Projekt"

);


$sql = "SELECT * FROM `inwestycje`, typinwestycji where inwestycje.id_typ = typinwestycji.idTypInwestycji";

$result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Portal inwestycyjny </title>
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
  <div>
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

<div class="container" >
    <div class="row">
    <div class="col"></div>
    <div class="col">
    <center>
    <div class="table-responsive">
    <table class='table table-striped table-bordered table-hover'>
    <tr>
        <th>ID Inwestycji</th>
        <th>Nazwa</th>
        <th>Typ</th>
        <th>Koszt</th>
        <th>Stopa Zwrotu</th>
        <th>Data rozpoczęcia</th>
        <th>Data zakończenia</th>
        <th>Usuń</th>
        <th>Edytuj</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>"
            .$row["idInwestycje"]."</td><td>"
            .$row["nazwa"]."</td><td>"
            .$row["nazwaInw"]."</td><td>"
            .$row["koszt_inwestycji"]."</td><td>"
            .$row["PStopaZwrotu"]."</td><td>"
            .$row["Data_zakonczenia"]."</td><td>"
            .$row["Data_rozpoczecia"]."</td>";
            ?>
            <td>
            <form action="updateAndDelete.php" method="post">
            <input type="hidden" name="deleteId" value="<?php echo $row['idInwestycje']; ?>">
            <button class='btn btn-danger' type="submit" name="deleteInwBtn">Usuń</button>
            </form>
            </td>
            <td>
            <form action="usrmgmntEdit.php" method="post">
            <input type="hidden" name="editId" value="<?php echo $row['idInwestycje']; ?>">
            <button class='btn btn-success' type="submit" name="editBtn">Edytuj</button>
            </form>
            </td></tr>
            <?php
        }
      } else {
        echo "0 results";
      }
    ?>
    </table>
    </div>
    </center>
    </div>
    <div class="col"></div>
    </div>
</div>
</body>
</html>