<?php
session_start();

function secure_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

if( !empty($_POST) )
{
				$link = mysqli_connect(localhost, user,Password1, zad8);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
		$pytanie=secure_input($_POST['pytanie']);
		$odpowiedz="";
		$pytanie_test=strtolower($pytanie);
		//$pytanie_test = utf8_encode($pytanie_test);

		switch($pytanie_test){
				case 'dzien dobry':
				case 'hejka':
				case 'siema':
				case 'witaj':
				case 'witam':
				case 'czesc':
				case 'cześć':
						$odpowiedz="Witaj Szanowny Kliencie!";
				break;
				case 'kontakt':
				case 'adres':
				case 'telefon':
						$odpowiedz="<br/>Adres firmy<br/>ul. Kwiatowa 6 Świdwin<br/>tel. 550 333 111<br/>poczta@swidwin.pl<br/>uslugiIT.swidwin.pl<br/>";
				break;
				case 'oferta':
				case 'promocja':
						$rezultat = mysqli_query($link, "SELECT * FROM oferta");
						while ($wiersz = mysqli_fetch_array ($rezultat)) {
								$tytul=$wiersz[1];
								$tresc=$wiersz[2];
								$odpowiedz = "$odpowiedz $tytul $tresc";
						}
				break;
				case '?':
				case 'pomoc':
				case 'h':
						$odpowiedz = "Witaj, jestem początkującym chatbotem i potrafię odpowiedzieć na tylko parę pytań.<br/>Potrafię się przywitać, podać Ci informacje kontaktowe naszej firmy oraz przedstawić Ci naszą ofertę. Słowa klucze - cześć, kontakt, adres, oferta";
				break;
				default:
						$odpowiedz="Jestem tylko początkującym botem i nie znam odpowiedzi na to pytanie.";
		}
		
		echo "<br/>".$pytanie_test." - ".$pytanie." - ".$odpowiedz."<br/>";
		
				if(empty($_SESSION['pytania'])){
						$_SESSION['pytania']=array();
				}
						array_push( $_SESSION['pytania'], array($pytanie, $odpowiedz) );
						mysqli_query($link, "INSERT INTO chatbot (pytanie, odpowiedz) VALUES ('$pytanie','$odpowiedz')");
						mysqli_close($link);

				/*Schemat tablicy 'pytania'
				$_SESSION['pytania']=array(
				array("Pytanie1","Odpoweidz1"),
				array("Pytanie2","Odpoweidz2"),
				array("Pytanie3","Odpoweidz3"),
				array("Pytanie4","Odpoweidz4"),
				);
				*/
}
		header("Location: http://s4.mikolajkaja.pl/zad8/chatbot.php");
?>