<?php
session_unset();
// Start the session
session_start();

function secure_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

		$password_status="";
if( !empty($_POST) )
{
		$user=secure_input($_POST['user']);
		$pass=secure_input($_POST['pass']);
		$ipaddress=$_SERVER["REMOTE_ADDR"];
		$user_agent=$_SERVER["HTTP_USER_AGENT"];
				$link = mysqli_connect(localhost, user,Password1, zad8);
				if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
				
				$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user' LIMIT 1");
				
				$rekord = mysqli_fetch_array($result);
				//Sprawdź blokadę i sprawdź czas od tej blokady
				if( $rekord[3] == '1' ){
						$czas=strtotime($rekord[4]);
						$czas2=strtotime(date("Y-m-d H:i:s"));
						$czas3=($czas-$czas2)-3540;
						if($czas3 < 60 && $czas3 > 0){
								echo "<br/><span id='error'>Nałożono blokadę $czas3 sekund!</span>";
								exit();
						}else{
								mysqli_query($link, "UPDATE users SET blokada=0 WHERE user='$user'");
								echo "Zaloguj się jeszcze raz";
								exit();
						}
				}
				$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user' LIMIT 1");
				$rekord = mysqli_fetch_array($result);
				
				//Jeśli hasło się zgadza to ...
				if( $rekord[2] === $pass ){
						$password_status = "<br/><span id='correct'>Zalogowano</span>";
						$_SESSION["user_name"]=$user;
						$_SESSION["user_id"]=$rekord[0];
						mysqli_query($link, "UPDATE users SET blokada=0 WHERE user='$user'");	
						mysqli_query($link, "INSERT INTO historia_logowan (user_name, time, IP_address, user_agent, correct_login) VALUES ('$user',now(),'$ipaddress', '$user_agent', 'Yes')");
						$_SESSION['bledne']=0;
						header("Location: http://s4.mikolajkaja.pl/zad8/panel/");
				}
				//Jeśli hasło jest błędne to ...
				else{
						//Jeśli to pierwsza próba to utwórz zmienną i ustaw wartość na 1 lub powiększ istniejącą o 1
								if( !isset($_SESSION['bledne']) ){
										$bledne=1;
								}else{
										$bledne=$_SESSION['bledne']+1;
								}
						echo "<br/><span id='error'>Błędne dane, próba $bledne</span>";
						$_SESSION['bledne']=$bledne;
						
						
						mysqli_query($link, "INSERT INTO historia_logowan (user_name, time, IP_address, user_agent, correct_login) VALUES ('$user',now(),'$ipaddress', '$user_agent', 'No' )");
						
						//Jeśli jest to trzecia błędna próba to dodaj flagę w bazie danych
								if($bledne === 3){
										//Usuń sesje
										session_unset();
										mysqli_query($link, "UPDATE users SET blokada=1, last_wrong=now() WHERE user='$user'");
										echo "<br/><span id='error'>Nałożono blokadę!</span>";
								}
				}
				mysqli_close($link);
}
?>