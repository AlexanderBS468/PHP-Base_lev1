<html>
    <head>
        <meta charset="utf-8" />

<script type="text/javascript"> 
function destroy() {
    if (confirm("Bы уверены, что хотите уничтожить этот FEEDBACK?")) 
        {
        var xhr = new XMLHttpRequest();
        var body = 'ID_MSG=' + encodeURIComponent( {{ID_MSG}} );
        xhr.open("POST", '/submit', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(body);
        alert(body);
        }
}
function makeField(id) {
    display = document.getElementById(id).style.display;
    if (display == 'none') {
       document.getElementById(id).style.display = 'block';
    } else {
       document.getElementById(id).style.display = 'none';
    }
}
</script>
<!--
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
-->
 
    </head>
    <body>
        <form method="post">
            <p><input type="text" name="name" />Имя</p>
            <p><input type="textbox" name="review" />Текст</p>
            <p><input type="submit" name="post" value="Отправить" /></p>
        </form>
        <!-- <div style="border: 2px solid red; width: 490px; padding: 10px; margin-bottom: 10px;" class="feedback_del">
            <p>Удаление отзыва, укажите сообщение</p>
            <form method="post">
                <p><input type="text" name="ID_MSG" />номер</p>
                <p><input type="submit" name="del" value="Удалить" /></p>
            </form>
        </div> -->
<!--         <div style="border: 2px solid #909015; width: 490px; padding: 10px;" class="feedback_edit">
            <p>Редактирование отзыва, укажите сообщение</p>
            <form method="post">
                <p><input type="text" name="ID_MSG_EDIT" value {{ID_MSG}} />номер</p>
                <p><input type="submit" name="read" value="Выбрать" />
            </form>
            <form method="post">
                <p><input type="hidden" name="ID_MSG_EDITx" value {{ID_MSG}} />номер</p>
                <p><input type="text" name="retext" value {{TEXT_BODY}} />Текст</p>
                <p><input type="submit" name="edit" value="Редактировать" /></p>
            </form>
        </div> -->
        <div class="feedback_response">
            <p>{{RESPONSE}}</p>
        </div>

        <div class="feedback_feed">
            {{FEEDBACKFEED}}
        </div>
    </body>
</html>