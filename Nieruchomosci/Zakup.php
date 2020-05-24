<?php
$Identyfikator = $_POST["Identyfikator"];
$idInwestycje = $_POST["idInwestycje"];
$Wykupione = $_POST["Wykupione"];

$ID_INW = $_POST["ID_INW"];
$idInwestycje = $_POST["idInwestycje"];
$idUzytkownik = $_POST["idUzytkownik"];
$DATA_R = $_POST["DATA_R"];
$DATA_Z = $_POST["DATA_Z"];


$Server = "localhost";
$Login = "root";
$Password = "";
$Database = "mydb";

$Connection = new mysqli($Server, $Login, $Password, $Database);

$Query = "UPDATE inwestycje SET  Wykupione=1 WHERE idInwestycje=$Identyfikator";
$Query2 = "INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`) VALUES (NULL, '5', '$Identyfikator', current_timestamp(), NULL);";
$Result = $Connection->query($Query);
$Result = $Connection->query($Query2);


header("Location: nieruchomosci.php");
?>
