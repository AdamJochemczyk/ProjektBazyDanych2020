<?php 
	session_start();

	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

    function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
	//połączenie do bazy
	$db = mysqli_connect('localhost', 'root', '', 'platforma_inwestycyjna');

	// REJESTROWANKO
	if (isset($_POST['reg_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['emailId']);
		$password = mysqli_real_escape_string($db, $_POST['passwordId']);
		$imie = mysqli_real_escape_string($db, $_POST['nameId']);
        $nazwisko = mysqli_real_escape_string($db, $_POST['surnameId']);
        $wiek = mysqli_real_escape_string($db, $_POST['ageId']);
		$kwota = mysqli_real_escape_string($db, $_POST['initialPaymentId']);

		if (empty($email)) { array_push($errors, "Email jest wymagany"); }
        if(!checkemail($email)) { array_push($errors, "Podany adres Email jest niepoprawny"); }
		if (empty($password)) { array_push($errors, "Hasło jest wymagane"); }
		if (strlen($password) < 6) { array_push($errors, "Podane hasło jest za krótkie!"); }
		if (empty($imie)) { array_push($errors, "Imie jest wymagane"); }
		if (empty($nazwisko)) { array_push($errors, "Nazwisko jest wymagane"); }
		if (empty($wiek)) { array_push($errors, "Wiek jest wymagany"); }
        if ($wiek<0) { array_push($errors, "Podany wiek jest niepoprawny!");}
        if ($wiek<18) { array_push($errors, "Podany wiek nie przekracza 18 lat!");}
		if (empty($kwota)||($kwota==0)) { $kwota=0; }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko) 
					  VALUES('$email', '$password', '2','$wiek','$kwota','$imie','$nazwisko')";
			mysqli_query($db, $query);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: mojportfel.php');

			


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
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "Zalogowano";
				if($row['nazwa_roli'] == "admin"){
					header('location: usrmgmnt.php');
                    $_SESSION['admin'] = true;
				}
				else{
					header('location: mojportfel.php');
				}
			}else {
				array_push($errors, "Niepoprawne dane logowania!");
			}
		}
	}

	//Admin
	if (isset($_POST['admin_usr'])) {
		$email = mysqli_real_escape_string($db, $_POST['emailId']);
		$password = mysqli_real_escape_string($db, $_POST['passwordId']);
		$imie = mysqli_real_escape_string($db, $_POST['nameId']);
        $nazwisko = mysqli_real_escape_string($db, $_POST['surnameId']);
        $wiek = mysqli_real_escape_string($db, $_POST['ageId']);
		$kwota = mysqli_real_escape_string($db, $_POST['initialPaymentId']);
		$rola = mysqli_real_escape_string($db, $_POST['roleId']);

		if (empty($email)) { array_push($errors, "Email jest wymagany"); }
		if (empty($password)) { array_push($errors, "Hasło jest wymagane"); }
		if (empty($imie)) { array_push($errors, "Imie jest wymagane"); }
		if (empty($nazwisko)) { array_push($errors, "Nazwisko jest wymagane"); }
		if (empty($wiek)) { array_push($errors, "Wiek jest wymagany"); }
		if (empty($kwota)||($kwota==0)) { $kwota=0; }
		if (empty($rola)) {array_push($errors, "Rola jest wymagana");}


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			if($rola == "user"){
			$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko) 
					  VALUES('$email', '$password', '2','$wiek','$kwota','$imie','$nazwisko')";
			}
			else if($rola == "admin"){
				$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko) 
					  VALUES('$email', '$password', '1','$wiek','$kwota','$imie','$nazwisko')";
			}
			mysqli_query($db, $query);
			header('location: usrmgmnt.php');

			


		}

	}


	//Inwestycja - dodawanie
	if(isset($_POST['admin_inw'])){
		$nazwa = mysqli_real_escape_string($db, $_POST['inwId']);
		$typSwitch = mysqli_real_escape_string($db, $_POST['typInwId']);
		$koszt = mysqli_real_escape_string($db, $_POST['kosztId']);
		$stopa = mysqli_real_escape_string($db, $_POST['stopaId']);
		$typ = "";
		

		if (empty($nazwa)) { array_push($errors, "Nazwa jest wymagana"); }
		if (empty($typSwitch)) { array_push($errors, "Typ jest wymagany"); }
		if (empty($koszt)) { array_push($errors, "Koszt jest wymagany"); }
		if (empty($stopa)) { array_push($errors, "Stopa jest wymagana"); }


		switch ($typSwitch) {
			case 'Lokaty': $typ="1"; break;				
			case 'n': $typ="2"; break;
			case 's': $typ="3"; break;
			case 'w': $typ="4"; break;
			case 'o': $typ="5"; break;
			case 'a': $typ="6"; break;
			default:  $typ="1"; break;
		}
		//Problem z id, brak autoinkrementacji
		//Dodać datetime picker
		if(count($errors)==0){
		$query = "INSERT INTO inwestycje (idInwestycje, nazwa, id_typ, koszt_inwestycji, PStopaZwrotu, Data_zakonczenia, Data_rozpoczecia)
				  VALUES ('3', '$nazwa', '$typ', '$koszt', '$stopa', NULL, NULL)";

		mysqli_query($db,$query);
		header('location: inwmgmnt.php');
		}

	}
?>