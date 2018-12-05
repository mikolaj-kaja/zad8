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
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
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
		<p>Mapa dojazdu do naszej firmy</p><br/><br/>

    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: -25.344, lng: 131.036};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 8, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_T7IfA6teZW1LGAJ11-IhyEDFpKujzH8&callback=initMap">
    </script>

    </td> 
  </tr>
</table>

</body>
</html>