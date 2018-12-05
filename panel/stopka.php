<?php
		if( !isset($_SESSION["user_name"]) || !isset($_SESSION["user_id"]) ){
				session_unset();
				header("Location: http://s4.mikolajkaja.pl/zad8/logowanie.php");
		}
?>