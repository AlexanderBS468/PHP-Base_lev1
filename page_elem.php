<?
function elments_page($pageon, $maxpicpage, $pic, $dir, $dirB, $endPic, $fsize) {
	$sql = "SELECT * FROM images WHERE hits > 0 ORDER BY hits DESC";
	$result = mysqli_query($GLOBALS['conn'], $sql) or die("Ошибка " . mysqli_error($GLOBALS['conn']));
	while($row = mysqli_fetch_assoc($result))
	{ $table['images'] = $row; ?>
	<div class="element">
		<a href=<? echo 'wiev.php' . '?id=' . $table['images']['id_image'] ?> title="Увеличить" target="_blank">
		<img src=<? echo $table['images']['src_small'] ?> alt="увеличить">
		</a>
		<p>Название файла: <? echo $table['images']['src_big'] ?>. Размер файла: <? echo $table['images']['size_file']; ?> байт Просмотры: <? echo $table['images']['hits']; ?> </p>
	</div> <?
	}
// ($endPic <= ($pageon + $maxpicpage)) ? $endlist = $endPic : $endlist = ($pageon + $maxpicpage);
// for ($i = $pageon; $i <= $endlist; $i++) {
// 	if ($table['images']['id_image'] == $i) { $big = $table['images']['src_big']; }
// 	if ($table['images']['id_image'] == $i) { $small = $table['images']['src_small']; }
// 	echo $table['images'][$i];
	/*
	<div class="element">
		<a href=<? echo $dirB . $pic[$i] ?> title="Увеличить" target="_blank">
		<img src=<? echo $dir . $pic[$i] ?> alt="увеличить">
		</a>
		<p>Название файла: <? echo $pic[$i] ?>. Размер файла: <? echo "$fsize[$i]"; ?> байт</p>
	</div>
	*/
// }


}
function navig_page($beginpage, $maxpicpage, $begin, $endPic, $style_name, $navig, $pageon) {
	$beginrew = $pageon - $maxpicpage - 1;
	$beginfw = $pageon + ($maxpicpage + 1);
	$aback = '<a href=' . $PHP_SELF . '?page=' . $beginrew . '>Назад</a>';
	$aforward = '<a href=' . $PHP_SELF . '?page=' . $beginfw . '>Вперед</a>';
	$navig = $aback . ' <---> ' . $aforward;
	if ($pageon <= 1) { $navig = $aforward; }
	if ($beginfw >= ($endPic + $maxpicpage)) { $navig = $aback; }	
	echo "<p align=center class= $style_name> $navig </p>";
	echo "<p align=center class= number>";
	for ($page = 1; $page <= ($endPic / $maxpicpage); $page++) {
		$beginpage = ($page-1)*($maxpicpage+1);
			echo ' <a href=' . $PHP_SELF . '?page=' . $beginpage . '> ' . $page . ' </a> ';
	}
	echo "</p>";
}
?>