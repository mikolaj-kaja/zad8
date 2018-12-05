<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Kaja</title>
		<style>
		table {
				width:100%;
		}
		</style>
</head>
<body>

<table>
  <tr><img src="background.jpg" alt="Background" style="width:100%;height:120px;"></tr>
    <td style="width:15%;background-color:lightgrey">
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pl', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
    		<a href=/zad8 />Strona główna</a>
				<br />
    		<a href=kontakt.php />Kontakt</a>
				<br />
    		<a href=mapa.php />Jak do nas dotrzeć</a>
				<br />
    		<a href=oferta.php />Oferta</a>
				<br />
    		<a href=chatbot.php />Chatbot</a>
				<br />
    		<a href=logowanie.php />Zaloguj się</a>
				<br />
				<a href=rejestracja.php />Zarejestruj się</a>
    </td>
    <td>
		<p>Chatbot</p><br/><br/>
		<?php

		$link = mysqli_connect(localhost, user,Password1, zad8);
		if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); exit(); }
		
		$lista=$_SESSION['pytania'];
		echo "<TABLE BORDER=1><TR><TD>Pytanie</TD><TD>Odpowiedź</TD></TR>";

		for ($row = 0; $row < count($lista); $row++) {
				echo "<TR><TD>" . $lista[$row][0] . "</TD><TD>". $lista[$row][1] . "</TD></TR>";
		}

		echo "</TABLE>
		<br/>
		<form method='post' action='dodaj_pytanie.php'>
		Zadaj pytanie: 	<input type='text' name='pytanie' maxlength='20' size='20'><br>
		<input type='submit' value='Wyślij'/>
		</form>";
		
		
		//mysqli_query($link, "INSERT INTO chatbot (pytanie, odpowiedz) VALUES ('$pytanie','$odpowiedz') ");
		//echo "<br/>Chatbot w budowie!<br/>";
		?>
    </td> 
  </tr>
</table>

</body>
</html>