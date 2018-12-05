<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Kaja</title>
		<style>
		table {
				width:100%;
		}
		#oferta {
				text-decoration: overline;
				text-indent: 50px;
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
		<p>Oferta naszej firmy</p><br/><br/>
		<?php
		
		$link = mysqli_connect(localhost, user,Password1, zad8);
		if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); exit(); }
		$rezultat = mysqli_query($link, "SELECT * FROM oferta");
				while ($wiersz = mysqli_fetch_array ($rezultat)) {
						$tytul=$wiersz[1];
						$tresc=$wiersz[2];
						echo "$tytul $tresc";
				}
		
		?>
    </td> 
  </tr>
</table>

</body>
</html>