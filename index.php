<?php
	session_start();

	if (isset($_GET['logout']))
    {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
	}

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
<section>
<div>
  <div class="row pl-5">
  	<div class="col-lr-5 mr-5 text-center mt-5">
  		<h1 style="font-size: 2.5rem; line-height: 1.5;">
				Platforma inwestycyjna dostępna całą dobę
			</h1>
			<h2 style="font-size: 1.5rem; line-height: 1.5;" class="pt-3">
				Dołącz do naszych klientów i inwestuj - tanio i wygodnie
			</h2>
			<a href="rejestracja.php" class="btn btn-dark btn-lg mt-3">Zarejestruj się</a>
			<a href="logowanie.php" class="btn btn-dark btn-lg mt-3">Zaloguj się</a></br>
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container mt-5">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
  {
  "symbols": [
    {
      "description": "USD/PLN",
      "proName": "OANDA:USDPLN"
    },
    {
      "description": "CHF/PLN",
      "proName": "FOREXCOM:CHFPLN"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "pl"
}
  </script>
</div>
<div class="tradingview-widget-container mt-3">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://pl.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Notowania</span></a> od TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
  {
  "symbols": [
    {
      "description": "GBP/PLN",
      "proName": "OANDA:GBPPLN"
    },
    {
      "description": "EUR/PLN",
      "proName": "OANDA:EURPLN"
    }
  ],
  "colorTheme": "light",
  "isTransparent": false,
  "locale": "pl"
}
  </script>
</div>
<!-- TradingView Widget END -->
  	</div>
		<div class="col-lr-5 ml-5 pl-5 mr-0">
			<img src="swinka.jpg" alt="Obraz skarbonki" style="margin-left: 250px;"></img>
		</div>
  </div>
</section>
<?php
// pobieranie danych z NBP
/*$dane = file_get_contents('http://api.nbp.pl/api/exchangerates/rates/a/eur?format=json');
$json = json_decode($dane);
$mid = $json->rates[0]->mid;

echo $mid;
*/

 ?>
<footer class="page-footer font-small blue pt-4" style="color: white; background-color: #3f3f44;">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase">Platforma Inwestycyjna</h5>
        <p>Platforma stworzona na potrzeby zrealizowania projektu z baz danych na Politechnice Śląskiej.</p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Autorzy</h5>
        <ul class="list-unstyled" style="color: #ffc60b;">
          <li>
            Adam Jochemczyk
          </li>
          <li>
            Sebastian Szczypkowski
          </li>
          <li>
            Jakub Zawadzki
          </li>
          <li>
            Dawid Kańtoch
          </li>
        </ul>
      </div>
      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Links</h5>
        <ul class="list-unstyled">
          <li>
            <a href="rynek.php"><font color="#ffc60b">Rynek</font></a>
          </li>
          <li>
            <a href="mojportfel.php" style="text-decoration: none;"><font color="#ffc60b">Moj portfel</font></a>
          </li>
          <li>
            <a href="logowanie.php" style="text-decoration: none;"><font color="#ffc60b">Zaloguj sie</font></a>
          </li>
          <li>
            <a href="rejestracja.php" style="text-decoration: none;"><font color="#ffc60b">Zarejestruj sie</font></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="index.php">Platforma Inwestycyjna</a>
  </div>
</footer>
</div>
</body>
</html>
