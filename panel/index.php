<?php
session_start();
if( isset($_POST["logout"])) session_unset();
require_once('stopka.php');
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
		<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
		$user = $_SESSION["user_name"];
		$link = mysqli_connect(localhost, user,Password1, zad8);
		if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); exit(); }
		$user=$_SESSION["user_name"];
		$result = mysqli_query($link, "SELECT time FROM `historia_logowan` WHERE user_name LIKE '$user' AND correct_login LIKE 'No' ORDER BY `time` DESC LIMIT 1");
		$rekord = mysqli_fetch_array($result);
		$bledne=$rekord[0];
		if($bledne == ""){
				$bledne="brak";
		}
?>

<p>Panel administracyjny</p>
<a href="/zad8">Przejdź do strony głównej</a>
<?php
		echo "<br/>Witaj " . $user . "!"; 
		echo "<br/><br/>Ostatnie błędne logowanie: $bledne";
?>

<form method="post">
		<input type="hidden" name="logout">
		<input type="submit" value="Wyloguj się">
</form>

<?php
//Zmień tło firmy
echo '<br/><br/>Zmień tło - usuń pamięć cache żeby zobaczyć zmiany<br/><br/>
<form method="POST" ENCTYPE="multipart/form-data">
<input type="file" name="plik"/>
<input type="hidden" name="wyslano" value="1" />
<input type="submit" value="Wyślij plik"/> </form>
';

if (is_uploaded_file($_FILES['plik']['tmp_name']) ){
				echo '<br/><br/>Odebrano plik: '.$_FILES['plik']['name'].' odświerz stronę główną dwa razy i usuń pamięć cache aby zobaczyć aktualizację<br/><br/>';
				unlink("/var/www/utp/zad8/background.jpg");
				move_uploaded_file($_FILES['plik']['tmp_name'], "/var/www/utp/zad8/background.jpg");
} else if(isset($_POST['wyslano'])){
		echo '<br/><br/>Błąd przy przesyłaniu danych!<br/><br/>';
}

if(!isset($_POST['nowa_oferta'])){
		$result = mysqli_query($link, "SELECT tresc FROM oferta WHERE ID LIKE '1' LIMIT 1");
		$rekord = mysqli_fetch_array($result);
		$tresc_oferty1=$rekord[0];
		
		$result = mysqli_query($link, "SELECT tresc FROM oferta WHERE ID LIKE '2' LIMIT 1");
		$rekord = mysqli_fetch_array($result);
		$tresc_oferty2=$rekord[0];
}else{
		$tresc_oferty1=$_POST['editor1'];
		$tresc_oferty2=$_POST['editor2'];
		
		mysqli_query($link, "UPDATE oferta SET tresc='$tresc_oferty1' WHERE ID LIKE 1 ");
		mysqli_query($link, "UPDATE oferta SET tresc='$tresc_oferty2' WHERE ID LIKE 2 ");
}

//Dodaj nową ofertę
?>
<br/><br/>
<form method="POST">
Treść oferty podstawowej<br/>
<textarea name="editor1" id="editor1"> <?php echo $tresc_oferty1; ?></textarea>
<script> CKEDITOR.replace( 'editor1' ); </script>
<br/>
Treść oferty rozszerzonej<br/>
<textarea name="editor2" id="editor1"> <?php echo $tresc_oferty2; ?> </textarea>
<script> CKEDITOR.replace( 'editor2' ); </script>
		
<input type="hidden" name="nowa_oferta" value="1" />
<br/>
<input type="submit" value="Zmień oferty"/>
</form>
<br/><br/><br/><br/>

</body>
</html>