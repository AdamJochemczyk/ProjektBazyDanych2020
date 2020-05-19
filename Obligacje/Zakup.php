<?php
$idInwestycje = $_POST["idInwestycje"];
$Wykupione = $_POST["Wykupione"];

$Server = "localhost";
$Login = "root";
$Password = "";
$Database = "mydb";

$Connection = new mysqli($Server, $Login, $Password, $Database);

$Query = "UPDATE inwestycje SET  Wykupione=1 WHERE idInwestycje=$idInwestycje";
$Result = $Connection->query($Query);
header("Location: obligacje.php");
?>
