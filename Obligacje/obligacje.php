<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rynek</title>
  <link rel="icon" href="../favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">
        <img src="../favicon.ico" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
        nwestycje
      </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="../rynek.php">Rynek</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="../mojportfel.php">Mój portfel</a>
      </li>
			</ul>
			<ul class="navbar-nav ml-auto">
      <li class="nav-item active mt-2">
        <?php  if (isset($_SESSION['email'])) : ?>
			Witaj <strong><?php echo $_SESSION['email']; ?></strong>
          </li>
        <li class="nav-item active">
			<a class="nav-link" href="../index.php?logout='1'">Wyloguj</a>
        </li>
          <?php endif ?>
      <li class="nav-item active">
          <?php  if (!isset($_SESSION['email'])) : ?>
        <a class="nav-link active" href="../logowanie.php">Logowanie</a>
          <?php endif ?>
      </li>
    </ul>
  </div>
</nav>
     
<section>
<?php
       

		$Connection = new mysqli('localhost', 'root', '', 'mydb');
		$Connection->set_charset("utf8");   
        $Query = "SELECT * FROM inwestycje WHERE id_typ=5";
		$Result = $Connection->query($Query);

		echo "<table>";
		echo "<tr><th>Identyfikator</th><th>Nazwa Inwestycji</th>
        <th>Koszt inwestycji</th>
        </tr>";
		if ($Result->num_rows > 0)
		{
			while ($Row = $Result->fetch_array())
			{
				echo "<tr><form method='post' action='update.php'>
				
				<td><input type='text' value='$Row[0]' name='Identyfikator'/></td>
				<td><input type='text' value='$Row[1]' name='Nazwa Inwestycji'/></td>
                <td><input type='text' value='$Row[3]' name='Koszt Inwestycji'/></td>
                
                
				<td><input type='submit' value='Zakup'/></td>
				
				</form></tr>";
			}

			
		}
		echo "</table>"; 

?>
    </section>

  
</body>
</html>
