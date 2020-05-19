<?php
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

$Query = "UPDATE inwestycjeuzytkownika SET  idUzytkownik = '$idUzytkownik', idInwestycje = $idInwestycje,DATA_R='$DATA_R',DATA_Z='$DATA_Z' WHERE ID_INW = $ID_INW";
$Result = $Connection->query($Query);

header("Location: lokaty.php");
?>