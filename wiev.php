<?
Require('dbconnect.php');

$sql = "SELECT * FROM images WHERE id_image = " . $_GET['id'];
$result = mysqli_query($GLOBALS['conn'], $sql) or die("Ошибка " . mysqli_error($GLOBALS['conn']));
while($row = mysqli_fetch_assoc($result))
	{ $table['images'] = $row;
	}
?>
	<img src=<? echo $table['images']['src_big'] ?> alt="увеличить">
	<p>Название файла: <? echo $table['images']['src_big'] ?>. Размер файла: <? echo $table['images']['size_file']; ?> байт Просмотры: <? echo $table['images']['hits']; ?> </p>
<?
	$i = $table['images']['hits'] + 1;
	$sql = " UPDATE images SET hits='" . $i . "' WHERE id_image = " . $_GET['id'];
	$result = mysqli_query($GLOBALS['conn'], $sql) or die("Ошибка " . mysqli_error($conn));
	if($result)	{ echo "Данные успешно занесены"; }
$GLOBALS['conn']->close();
?>