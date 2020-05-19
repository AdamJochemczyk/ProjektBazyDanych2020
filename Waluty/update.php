<?php
session_start();

$ID_INW = $_POST["ID_INW"];
$idUzytkownik = $POST["idUzytkownika"];
$idInwestycje = $_POST["idInwestycji"];
$DATA_R = $_POST["DATA_R"];
$DATA_Z = $_POST["DATA_Z"];


$Server = "localhost";
$Login = "root";
$Password = "";
$Database = "mydb";

$Connection = new mysqli($Server, $Login, $Password, $Database);
$QUERYID="SELECT idUzytkownika FROM uzytkownik WHERE email="$_SESSION['email'];
$Query = "UPDATE inwestycjeuzytkownika SET  idUzytkownik = '$idUzytkownik', idInwestycje = $idInwestycje,DATA_R='$DATA_R',DATA_Z='$DATA_Z' WHERE idUzytkownika = ";
$Result = $Connection->query($Query);

header("Location: waluty.php");
?>


