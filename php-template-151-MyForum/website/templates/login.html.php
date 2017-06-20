<!Doctype>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="stylesheets/stylesheet.css">
	<!-- Import Ajax From Google Servers -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!---------------------------------------------------------------------------------------->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php 
if (isset($_SESSION["username"]))
{
	echo "<h1><center>Sie sind bereits eingeloggt</br></br><a href='/'>Zurück zur Seite</a></center></h1>";
}
else 
{
?>
<div class="login">
	<h1>Login</h1>
	<form method="POST">
		<label>
			<input type="text" name="email" value="<?= (isset($email)) ? $email: "" ?>" class="form-control" placeholder="Email oder Username"/>
		</label>
		</br>
		<label>
			<input type="password" name="password" class="form-control" placeholder="Passwort"/>
		</label>
		</br>
		<input type="submit" name="login" value="Login" class="btn btn-default"/>
	</form>
	<a href="/registrieren">zum Registrieren</a>
</div>
<?php 
}
?>
</body>
</html>