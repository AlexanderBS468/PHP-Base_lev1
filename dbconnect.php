<?
	$servername = "localhost";
	$username = "u0037701_sadn";
	$password = "R8kqZ2Bc";
	$database = "u0037701_sadn";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);
	// Check connection
	if ($conn->connect_error) {
	    die("Ошибка соединения: " . $conn->connect_error);
	} else { echo "Соединениие установлено <br>"; }
?>