<html>
<head>
<title>Мощь JavaScript</title> 
<meta http-equiv="content-type" content="text/html; charset=windows-1251" /> 
<script type="text/javascript"> 
function destroy()
{
if (confirm("Bы уверены, что хотите уничтожить эту страницу?")) 
alert("Неужели вы думаете, что я позволю сделать это!?");
else
alert("Вопрос закрыт!") ;
}
</script>
</head>
<body>
<div align="center">
<h1>Могучая сила JavaScript!</h1>
<hr />
<form action="#" method="get">
<input type="button" value="Уничтожить страницу" onclick="destroy();" ></form>
</div> 
</body> 
</html>