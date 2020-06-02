<?php

session_start();

$IDU=$_SESSION['idUzytkownik'];
$Identyfikator = $_POST["Identyfikator"];
$idInwestycje = $_GET["idInwestycje"];
$Wykupione = $_POST["Wykupione"];

$ID_INW = $_POST["ID_INW"];
$idInwestycje = $_POST["idInwestycje"];

$DATA_R = $_POST["DATA_R"];
$DATA_Z = $_POST["DATA_Z"];
$kwota=$_SESSION["kwota"];
$Server = "localhost";
$Login = "root";
$Password = "";
$Database = "mydb";

$Connection = new mysqli($Server, $Login, $Password, $Database);

$Query5="SELECT kwota FROM uzytkownik WHERE idUzytkownik='$IDU';";
$Result5 = $Connection->query($Query5);
$bank;
 if ($Result5->num_rows > 0)
		{
          while($Row2=$Result5->fetch_array())
          {
              $bank=$Row2[0];
          }
    }

$Query3="SELECT koszt_inwestycji FROM inwestycje WHERE idInwestycje='$Identyfikator';";
$Result3 = $Connection->query($Query3);
$kosztinw;
 if ($Result3->num_rows > 0)
		{
          while($Row1=$Result3->fetch_array())
          {
              $kosztinw=$Row1[0];
          }
    }


if (!isset($_SESSION['email']))
  {
  $_SESSION['msg'] = "Musisz się zalogować!";
  header('location: logowanie.php');
}
else
{


 if(($bank-$kowsztinw)>0)
 {


$Query = "UPDATE inwestycje SET  Wykupione=1 WHERE idInwestycje=$Identyfikator";
$Query2 = "INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`) VALUES (NULL, '$IDU', '$Identyfikator', current_timestamp(), NULL);";
$Query4="UPDATE uzytkownik SET  kwota=kwota-'$kosztinw' WHERE idUzytkownik=$IDU";   
$Result = $Connection->query($Query);
$Result = $Connection->query($Query2);
$Result4 = $Connection->query($Query4);
     
}
    else{
        $_SESSION['msg'] = "Masz za mało środków!";
  header('location: mojportfel.php');
    }
}

header("Location: waluty.php");
?>

