<?php
session_start();

$Identyfikator = $_POST["Identyfikator"];
$idInwestycje = $_POST["idInwestycje"];
$Wykupione = $_POST["Wykupione"];
$IDU=$_SESSION['idUzytkownik'];
$ID_INW = $_POST["ID_INW"];
$kwota=$_SESSION["kwota"];
$idUzytkownik = $_POST["idUzytkownik"];
$DATA_R = $_POST["DATA_R"];
$DATA_Z = $_POST["DATA_Z"];

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

$Connection = new mysqli($Server, $Login, $Password, $Database);
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
else{

   if($bank>=$kosztinw)
 {  
$Query = "UPDATE inwestycje SET  Wykupione=1 WHERE idInwestycje=$Identyfikator";
// obligacja roczna
$d=strtotime("+12 Months");
$nextyear=date("Y-m-d", $d);
$Query2 = "INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`, `kwotaSprzedazy`,`kwotaZakupu`)
 VALUES (NULL, '$IDU', '$Identyfikator', current_timestamp(), '$nextyear', NULL, '$kosztinw');";
$Query4="UPDATE uzytkownik SET  kwota=kwota-'$kosztinw' WHERE idUzytkownik=$IDU"; 
$Result1 = $Connection->query($Query);
$Result2 = $Connection->query($Query2);
$Result4 = $Connection->query($Query4);
       
}
else{
  $_SESSION['msg'] = "Masz za mało środków!";
  header('location: mojportfel.php');
    }
}
    
header("Location: obligacje.php");
?>
