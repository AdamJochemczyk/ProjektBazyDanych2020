<?php
	session_start();

	if (isset($_GET['logout']))
    {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
	}
    else
    {
        $db = mysqli_connect('localhost', 'root', '', 'mydb');
        $emailSession = $_SESSION['email'];
        $pobranieKwota = "SELECT kwota FROM uzytkownik WHERE email='$emailSession'";
        $result = mysqli_query($db, $pobranieKwota);
        if ($result->num_rows > 0)
        {
          while($Row=$result->fetch_array())
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
  <title>Rynek</title>
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
      <li class="nav-item">
        <a class="nav-link active" href="rynek.php">Rynek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="mojportfel.php">Mój portfel</a>
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
        <a class="nav-link active" href="logowanie.php">Logowanie</a>
          <?php endif ?>
      </li>
    </ul>
  </div>
</nav>




  <div class="container">
    <h1 class="text-center">Oferty inwestycyjne</h1>
    <div class="card-deck mb-3 text-center mt-3">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Lokaty</h4>
        </div>
        <div class="card-body">
         Utwórz lokatę w banku na korzystny procent.
<a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="lokaty/lokaty.php">Zainwestuj</a>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Nieruchomości</h4>
        </div>
        <div class="card-body">
          Zainwestuj środki w silny rynek nieruchomości: mieszkania, domy, działki.
            <a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="nieruchomosci/nieruchomosci.php">Zainwestuj</a>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Surowce</h4>
        </div>
        <div class="card-body">
          Zakup jednostki najpopularnieszych surowców, takich jak złoto, srebro i ropa.
            <a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="Surowce/surowce.php">Zainwestuj</a>
        </div>
      </div>
    </div>
  </div>



  <div class="container">
    <div class="card-deck mb-3 text-center mt-3">
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Waluty</h4>
        </div>
        <div class="card-body">
          Zainwestuj w najsilniejsze waluty dostępne na rynku, jak dolar amerykański, frank szwajcarski i euro.
            <a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="Waluty/waluty.php">Zainwestuj</a>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Obligacje</h4>
        </div>
        <div class="card-body">
          Pożycz państwu pieniądze na dobry procent. Dostępne obligacje: 3-miesięczne, 1-roczne, 2-roczne i 5-letnie.
            <a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="Obligacje/obligacje.php">Zainwestuj</a>
        </div>
      </div>
      <div class="card mb-4 shadow-sm">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Akcje</h4>
        </div>
        <div class="card-body">
          Kup udziały w najpopularniejszych spółkach dostępnych na WIG, S&P500, NASDAQ, DAX.
            <a class="btn  btn-block btn-primary btn-lg active" role="button" aria-pressed="true" href="Akcje/akcje.php">Zainwestuj</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
