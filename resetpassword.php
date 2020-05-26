<?php
include('server.php');
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
                   $new_password = "Twoje hasło : "+ (string)$new_password;
                   //$comunicate = "Twoje nowe hasło to : "+$new_password+". Możesz się teraz zalogować z nowym hasłem!";
                  // array_push($errors, $new_password);
                echo $new_password;
               }
			}
            else
            {
				array_push($errors, "Nie istnieje konto z podanym adresem e-mail!");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Zaloguj się</title>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="favicon.ico" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        nwestycje
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="rynek.php">Rynek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="mojportfel.php">Mój portfel</a>
      </li>
      </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="logowanie.php">Logowanie</a>
      </li>
    </ul>
  </div>
</nav>
    <center>
        <div class="div-center col-sm-2 shadow-lg p-3 mb-5 bg-white rounded mt-5">
             <form method="post" action="resetpassword.php">
                 <?php include('errors.php'); ?>
              <div class="form-group">
                <label for="exampleInputEmail1" >Podaj twój adres e-mail</label>
                <input type="email" class="form-control" name="emailId" aria-describedby="emailHelp" placeholder="Wprowadz email">
              </div>
              <button type="submit" class="btn btn-primary" name="reset_password">Zresetuj hasło</button>
            </form>

        </div>
    </center>

</body>
</html>
