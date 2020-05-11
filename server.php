<?php 
	session_start();

	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	//połączenie do bazy
	$db = mysqli_connect('localhost', 'root', 'root', 'Projekt');

	// REJESTROWANKO
	if (isset($_POST['reg_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['emailId']);
		$password = mysqli_real_escape_string($db, $_POST['passwordId']);
		$imie = mysqli_real_escape_string($db, $_POST['nameId']);
        $nazwisko = mysqli_real_escape_string($db, $_POST['surnameId']);
        $wiek = mysqli_real_escape_string($db, $_POST['ageId']);
        $kwota = mysqli_real_escape_string($db, $_POST['initialPaymentId']);

		if (empty($email)) { array_push($errors, "Email jest wymagany"); }
		if (empty($password)) { array_push($errors, "Hasło jest wymagane"); }
		if (empty($imie)) { array_push($errors, "Imie jest wymagane"); }
		if (empty($nazwisko)) { array_push($errors, "Nazwisko jest wymagane"); }
		if (empty($wiek)) { array_push($errors, "Wiek jest wymagany"); }
		if (empty($kwota)||($kwota==0)) { $kwota=0; }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko) 
					  VALUES('$email', '$password', '2','$wiek','$kwota','$imie','$nazwisko')";
			mysqli_query($db, $query);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	//LOGOWANKO
	if (isset($_POST['log_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['emailId']);
		$password = mysqli_real_escape_string($db, $_POST['passwordId']);

		if (empty($email)) {
			array_push($errors, "Email jest wymagany");
		}
		if (empty($password)) {
			array_push($errors, "Hasło jest wymagane");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM uzytkownik WHERE email='$email' AND haslo='$password'";
			
			$roleCheck = "SELECT nazwa_roli FROM rola, uzytkownik where uzytkownik.id_roli = rola.id_roli AND uzytkownik.email = '$email'";
			$checkResult = mysqli_query($db,$roleCheck);
			$row = mysqli_fetch_assoc($checkResult);

			$results = mysqli_query($db, $query);
			

			if (mysqli_num_rows($results) == 1) {
                echo("AAAAAAAAAA");
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "Zalogowano";
				if($row['nazwa_roli'] == "admin"){
					header('location: usrmgmnt.php');
				}
				else{
					header('location: index.php');
				}
			}else {
				array_push($errors, "Niepoprawne dane logowania!");
			}
		}
	}

?>