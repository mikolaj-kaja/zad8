<?php
session_start();
if( isset($_SESSION["user_name"]) || isset($_SESSION["user_id"]) ){
		header("Location: http://s4.mikolajkaja.pl/zad8/panel");
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Kaja</title>
		<style>
		#error {
			color: red;
		}
		#correct {
			color: green;
		}
		</style>
</head>
<body>
<a href=/zad8 />Strona główna</a>
<br />
<p>Formularz logowania do systemu plików</p>
<p>Panel administratora login:hasło admin:admin</p>
<form method="post" action="weryfikuj.php">
Login:	<input type="text" name="user" maxlength="20" size="20"><br>
Hasło:	<input type="password" name="pass" maxlength="20" size="20"><br>
<input type="submit" value="Send"/>
<?php if(!$password_status=="") { echo $password_status; } ?>
</form>

</body>
</html>