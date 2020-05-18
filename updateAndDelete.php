<?php 
	session_start(); 

	if (isset($_GET['logout'])) 
    {
		session_destroy();
		unset($_SESSION['email']);
		header("location: index.php");
    }

    $errors = array(); 


$conn = mysqli_connect(

    "localhost",
    "root",
    "root",
    "Projekt"

);  
?>
<?php
if(isset($_POST['updateBtn'])){

        $id = mysqli_real_escape_string($conn, $_POST['editId']);
        $email = mysqli_real_escape_string($conn, $_POST['emailId']);
		$haslo = mysqli_real_escape_string($conn, $_POST['passwordId']);
		$imie = mysqli_real_escape_string($conn, $_POST['nameId']);
        $nazwisko = mysqli_real_escape_string($conn, $_POST['surnameId']);
        $wiek = mysqli_real_escape_string($conn, $_POST['ageId']);
		$kwota = mysqli_real_escape_string($conn, $_POST['initialPaymentId']);

        if (empty($email)) { array_push($errors, "Email jest wymagany"); }
		if (empty($haslo)) { array_push($errors, "Hasło jest wymagane"); }
		if (empty($imie)) { array_push($errors, "Imie jest wymagane"); }
		if (empty($nazwisko)) { array_push($errors, "Nazwisko jest wymagane"); }
        if (empty($wiek)) { array_push($errors, "Wiek jest wymagany"); }
        if ($wiek<0) { array_push($errors, "Wiek nie moze być ujemny"); }
        if (empty($kwota)||($kwota==0)||($kwota<0)) { $kwota=0; }
        
        if (count($errors) == 0) {
            $sql = "UPDATE uzytkownik SET email='$email', haslo='$haslo', Imie='$imie', Nazwisko='$nazwisko', wiek='$wiek', kwota='$kwota' where idUzytkownik='$id'";
            $result = $conn->query($sql);

    if($result){
        header('Location: usrmgmnt.php');
    }
}
else{
    header('Location: usrmgmnt.php');
}
}
?>

<?php
if(isset($_POST['deleteBtn'])){
    $id = $_POST['deleteId'];

    $sql = "DELETE FROM uzytkownik WHERE idUzytkownik = '$id'";
    $result = $conn->query($sql);

    if($result){
        header('Location: usrmgmnt.php');
    }
}
else{
    header('Location: usrmgmnt.php');
}
?>

<?php
if(isset($_POST['deleteInwBtn'])){
    $id = $_POST['deleteId'];

    $sql = "DELETE FROM inwestycje WHERE idInwestycje = '$id'";
    $result = $conn->query($sql);

    if($result){
        header('Location: inwmgmnt.php');
    }
}
else{
    header('Location: inwmgmnt.php');
}
?>

<?php
if(isset($_POST['updateInwBtn'])){
    $id = $_POST['updateId'];

    $sql = "DELETE FROM inwestycje WHERE idInwestycje = '$id'";
    $result = $conn->query($sql);

    if($result){
        header('Location: inwmgmnt.php');
    }
}
else{
    header('Location: inwmgmnt.php');
}
?>