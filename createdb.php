<?php
$servername = "localhost";
$username = "u0037701_sadn";
$password = "R8kqZ2Bc";
$database = "u0037701_sadn";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
} 

// Create database
function createdb() {
	// $sql = "CREATE DATABASE mmit";
	// if ($conn->query($sql) === TRUE) {
	//     echo "База mmit успешно создана\n";
	// } else {
	//     echo "Ошибка при создании базы данных: " . $conn->error;
	// }	
if (!$link = mysql_connect("localhost", "u0037701_sadn", "R8kqZ2Bc"))
	{
  		echo "‹br›He могу соединиться с сервером базы данных‹br›";
  		exit();
	}
echo "‹br›Соединение с сервером базы данных произошло успешно‹br›";
$str_sql_query = "CREATE DATABASE test_db";
if (!mysql_query($str_sql_query, $link))
	{
  		echo "‹br›He могу выполнить запрос‹br›";
  		exit();
	}
echo "‹br›Создание базы данных произошло успешно‹br›";

}

function createtable() {
	$sql = "
	CREATE TABLE images(
	id_image INT (100) NOT NULL AUTO_INCREMENT,
	name_big VARCHAR(255) NULL DEFAULT '',
	name_small VARCHAR(255) NULL DEFAULT '',
	src_big VARCHAR(255) NULL DEFAULT '',
	src_small VARCHAR(255) NULL DEFAULT '',
	type_file VARCHAR(255) NULL DEFAULT '',
	size_file int() NULL DEFAULT '',
	PRIMARY KEY (`id_employee`)
	);
	";
	if ($conn->query($sql) === TRUE) {
    echo "успешно\n";
} else {
    echo "Ошибка" . $conn->error;
}

}

#createtable();
createdb();

$conn->close();
?>