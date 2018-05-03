<?php
// Create database
function create_db() {

if (!$link = mysql_connect("localhost", "u0037701_sadn", "R8kqZ2Bc"))
	{ echo "‹br›He могу соединиться с сервером базы данных‹br›"; exit(); }
echo "‹br›Соединение с сервером базы данных произошло успешно‹br›";
$str_sql_query = "CREATE DATABASE test_db";
if (!mysql_query($str_sql_query, $link))
	{ echo "‹br›He могу выполнить запрос‹br›"; exit(); }
echo "‹br›Создание базы данных произошло успешно‹br›";

	// $sql = "CREATE DATABASE u0037701_sadn";
	// 	if ($conn->query($sql) === TRUE) {
	// 	    echo "База mmit успешно создана\n";
	// 	} else {
	// 	    echo "Ошибка при создании базы данных: " . $conn->error;
	// 	}	
}

function createtable() {
	$sql = "
	CREATE TABLE images(
	id_image INT  NOT NULL AUTO_INCREMENT, 
	name_big VARCHAR(255) NULL DEFAULT '',
	name_small VARCHAR(255) NULL DEFAULT '',
	src_big VARCHAR(255) NULL DEFAULT '',
	src_small VARCHAR(255) NULL DEFAULT '',
	type_file VARCHAR(4) NULL DEFAULT '',
	size_file INT,
	hits INT,
	PRIMARY KEY (`id_image`)
	)
	";

	$result = mysqli_query($GLOBALS['conn'], $sql) or die("Ошибка " . mysqli_error($conn));
	if($result)
		{ echo "Создание таблицы прошло успешно"; }

}

function droptable() {
	
	$sql = "DROP TABLE images";

	$result = mysqli_query($conn, $sql) or die("Ошибка " . mysqli_error($conn));
	if($result)
		{ echo "Удаление таблицы прошло успешно"; }

}

function insert_data($name_big, $name_small, $src_big, $src_small, $type_file, $size_file) {
	
	$sql = "
		INSERT INTO images (name_big, name_small, src_big, src_small, type_file, size_file)
		VALUES ('".$name_big."', '".$name_small."', '".$src_big."', '".$src_small."', '".$type_file."', '".$size_file."')
	";

	$result = mysqli_query($GLOBALS['conn'], $sql) or die("Ошибка " . mysqli_error($conn));
	if($result)
		{ echo "Данные успешно занесены"; }

	// $conn->close();
}

// create_db();
// createtable();
// insert_data('big','small','src_big','src_small','type_file', 111);
// droptable();
?>