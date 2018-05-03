<?
function elments_page($pageon, $maxpicpage, $pic, $dir, $dirB, $endPic, $fsize) {
	($endPic <= ($pageon + $maxpicpage)) ? $endlist = $endPic : $endlist = ($pageon + $maxpicpage);
	for ($i = $pageon; $i <= $endlist; $i++) {
				$photoBig = $dirB . mb_substr($pic[$i], 6);
				$photo = $dir . $pic[$i];
				?>
				<div class="element">
				<a href=<? echo $photoBig ?> title="Увеличить" target="_blank">
				<img src=<? echo $photo ?> alt="увеличить">
				</a>
				<p>Название файла: <? echo $pic[$i] ?>. Размер файла: <? echo "$fsize[$i]"; ?> байт</p>
				</div><? 
			}
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