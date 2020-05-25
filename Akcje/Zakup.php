<?php
session_start();

if (!isset($_SESSION['email']))
  {
  $_SESSION['msg'] = "Musisz się zalogować!";
  header('location: logowanie.php');
}
else{
$Identyfikator = $_POST["Identyfikator"];
$idInwestycje = $_POST["idInwestycje"];
$Wykupione = $_POST["Wykupione"];
$IDU=$_SESSION['idUzytkownik'];
    
$ID_INW = $_POST["ID_INW"];
$idInwestycje = $_POST["idInwestycje"];

$DATA_R = $_POST["DATA_R"];
$DATA_Z = $_POST["DATA_Z"];

$Server = "localhost";
$Login = "root";
$Password = "";
$Database = "mydb";

$Connection = new mysqli($Server, $Login, $Password, $Database);

$Query = "UPDATE inwestycje SET  Wykupione=1 WHERE idInwestycje=$Identyfikator";
$Query2 = "INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`) VALUES (NULL, '$IDU', '$Identyfikator', current_timestamp(), NULL);";
$Result = $Connection->query($Query);
$Result = $Connection->query($Query2);
}
header("Location: akcje.php");
?>
