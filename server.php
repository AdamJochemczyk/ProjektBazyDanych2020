<?php
	session_start();

	$email    = "";
	$idUzytkownik    = "";
	$errors = array();
	$_SESSION['success'] = "";

    function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
	//połączenie do bazy
	$db = mysqli_connect('localhost', 'root', '', 'mydb');

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
			$password_hashed = md5($password);
			$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko)
					  VALUES('$email', '$password_hashed', '2','$wiek','$kwota','$imie','$nazwisko')";
			mysqli_query($db, $query);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: mojportfel.php');

		}

	}

	//LOGOWANKO
	if (isset($_POST['log_user']))
    {
		$email = mysqli_real_escape_string($db, $_POST['emailId']);
		$password = mysqli_real_escape_string($db, $_POST['passwordId']);

		if (empty($email))
        {
			array_push($errors, "Email jest wymagany");
		}

		if (empty($password))
        {
			array_push($errors, "Hasło jest wymagane");
		}

		if (count($errors) == 0)
        {
					$password = md5($password);
			$query = "SELECT * FROM uzytkownik WHERE email='$email' AND haslo='$password'";
			$results = mysqli_query($db, $query);

			$roleCheck = "SELECT nazwa_roli FROM rola, uzytkownik where uzytkownik.id_roli = rola.id_roli AND uzytkownik.email = '$email'";
			$checkResult = mysqli_query($db,$roleCheck);
			$row = mysqli_fetch_assoc($checkResult);



            $pobranieIDkwerenda = "SELECT idUzytkownik FROM uzytkownik WHERE email='$email'";
            $wyslaniekwerendy = mysqli_query($db,$pobranieIDkwerenda);
            $pobierzID = mysqli_fetch_assoc($wyslaniekwerendy);

			if (mysqli_num_rows($results) == 1)
            {
               $idUzytkownik = $pobierzID['idUzytkownik'];

        $_SESSION['idUzytkownik']=$idUzytkownik;
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "Zalogowano";
				if($row['nazwa_roli'] == "admin")
                {
					header('location: usrmgmnt.php');
                    $_SESSION['admin'] = true;
				}
				else
                {
					header('location: mojportfel.php');
				}
			}
            else
            {
				array_push($errors, "Niepoprawne dane logowania!");
			}
		}
	}
	if (isset($_POST['reset_password']))
	{
			$email = mysqli_real_escape_string($db, $_POST['emailId']);
			if (empty($email))
	        {
				array_push($errors, "Email jest wymagany");
			}

			if (count($errors) == 0)
	        {
				$query = "SELECT * FROM uzytkownik WHERE email='$email';";
				$results = mysqli_query($db, $query);

				if (mysqli_num_rows($results) == 1)
	            {
	                $new_password = rand(999,99999);
	                $new_password_hash = md5($new_password);

	                $query = "UPDATE uzytkownik SET haslo='$new_password_hash' WHERE email='$email';";
				    $go_update = mysqli_query($db, $query);

	               if($go_update)
	               {
	                   $new_password = "Twoje nowe hasło to : $new_password";
	                   //$comunicate = "Twoje nowe hasło to : "+$new_password+". Możesz się teraz zalogować z nowym hasłem!";
	                   array_push($errors, $new_password);

	               }
				}
	            else
	            {
					array_push($errors, "Nie istnieje konto z podanym adresem e-mail!");
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
				$password_hashed = md5($password);
			$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko)
					  VALUES('$email', '$password_hashed', '2','$wiek','$kwota','$imie','$nazwisko')";
			}
			else if($rola == "admin"){
				$password_hashed = md5($password);
				$query = "INSERT INTO uzytkownik (email, haslo,id_roli,wiek,kwota,Imie,Nazwisko)
					  VALUES('$email', '$password_hashed', '1','$wiek','$kwota','$imie','$nazwisko')";
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
		$typ = "";


		if (empty($nazwa)) { array_push($errors, "Nazwa jest wymagana"); }
		if (empty($typSwitch)) { array_push($errors, "Typ jest wymagany"); }
		if (empty($koszt)) { array_push($errors, "Koszt jest wymagany"); }


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
		if(count($errors)==0){
		$query = "INSERT INTO inwestycje (idInwestycje, nazwa, id_typ, koszt_inwestycji)
				  VALUES (NULL,'$nazwa', '$typ', '$koszt')";

		mysqli_query($db,$query);
		header('location: inwmgmnt.php');
		}

	}
//Zmiana danych w userpanel
if (isset($_POST['change_data'])) {
	$email=$_SESSION['email'];
	$emailch = mysqli_real_escape_string($db, $_POST['emailIdchange']);
	$passwordch = mysqli_real_escape_string($db, $_POST['passwordIdchange']);
	$namech = mysqli_real_escape_string($db, $_POST['nameIdch']);
	$surnamech = mysqli_real_escape_string($db, $_POST['surnameIdch']);
	if (empty($emailch)) { array_push($errors, "Email jest wymagany"); }
	if (empty($passwordch)) { array_push($errors, "Hasło jest wymagane"); }
	if (empty($namech)) { array_push($errors, "Imie jest wymagane"); }
	if (empty($surnamech)) { array_push($errors, "Nazwisko jest wymagane"); }
	if (count($errors) == 0) {
		$password_hashed = md5($passwordch);
		$query = "UPDATE uzytkownik SET email='$emailch', haslo='$password_hashed', Imie='$namech', Nazwisko='$surnamech' WHERE email='$email';";
		mysqli_query($db, $query);
	}

}
?>
