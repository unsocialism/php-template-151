<!Doctype>
<html>
<head>
	<title>Registrieren</title>
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
</head>
<body>
<div class="registrieren">
	<h1>Registrierung</h1>
	<form method="POST">
		<label>
			<input type="text" name="username" value="<?= (isset($username)) ? $username: "" ?>" class="form-control" placeholder="Username"/>
		</label></br>
		<label>
			<input type="email" name="email" value="<?= (isset($email)) ? $email: "" ?>" class="form-control" placeholder="Email"/>
		</label></br>
		<label>
			<input type="password" name="password" class="form-control" placeholder="Passwort"/>
		</label></br>
		<label>
			<input type="password" name="passwordRepeat" class="form-control" placeholder="Passwort wiederholen"/>
		</label></br>
		<input type="submit" name="registrieren" value="Registrieren" class="btn btn-default"/>
	</form>
	<a href="/login">zum Login</a>
</div>

</body>
</html>