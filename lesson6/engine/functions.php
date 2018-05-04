<?php

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);

/*
* Обрабатывает указанный шаблон, подставляя нужные переменные
*/
function renderPage($page_name, $variables = [])
{
    $file = TPL_DIR . "/" . $page_name . ".tpl";

    if (!is_file($file)) {
        echo 'Template file "' . $file . '" not found';
        exit(ERROR_NOT_FOUND);
    }

    if (filesize($file) === 0) {
        echo 'Template file "' . $file . '" is empty';
        exit(ERROR_TEMPLATE_EMPTY);
    }

    // если переменных для подстановки не указано, просто
    // возвращаем шаблон как есть
    if (empty($variables)) {
          $templateContent = file_get_contents($file);
    }
    else {
        $templateContent = file_get_contents($file);

        // заполняем значениями
        $templateContent = pasteValues($variables, $page_name, $templateContent);
    }

    return $templateContent;
}

function pasteValues($variables, $page_name, $templateContent){
    foreach ($variables as $key => $value) {
            // собираем ключи
            $p_key = '{{' . strtoupper($key) . '}}';

            if(is_array($value)){
                // замена массивом
                $result = "";
                foreach ($value as $value_key => $item){
                    $itemTemplateContent = file_get_contents(TPL_DIR . "/" . $page_name ."_".$key."_item.tpl");

                    foreach($item as $item_key => $item_value){
                        $i_key = '{{' . strtoupper($item_key) . '}}';

                        $itemTemplateContent = str_replace($i_key, $item_value, $itemTemplateContent);
                    }

                    $result .= $itemTemplateContent;
                }
            }
            else
                $result = $value;

            $templateContent = str_replace($p_key, $result, $templateContent);
    }

    return $templateContent;
}

function prepareVariables($page_name){
    $vars = [];
    switch ($page_name){
        case "feedback":
            if(!empty($_POST['ID_MSG'])) { $vars["response"] = remFeedback(); }
            if(!empty($_POST['ID_MSG_EDIT'])) { $vars["TEXT_BODY"] = editFeedback(); $vars["ID_MSG"] ='=' . $_POST['ID_MSG_EDIT']; }
            if((!empty($_POST['retext']))and(!empty($_POST['ID_MSG_EDITx']))) { $vars["response"] = updateFeedback(); }
            if(isset($_POST['name'])) { $vars["response"] = setFeedback(); }
                else
                    $vars["response"] = "";

            $vars["feedbackfeed"] = getFeedbacksFeed();
            break;
    }

    return $vars;
}

function _log($s, $suffix='')
    {
        if (is_array($s) || is_object($s)) $s = print_r($s, 1);
        $s="### ".date("d.m.Y H:i:s")."\r\n".$s."\r\n\r\n\r\n";

        if (mb_strlen($suffix))
            $suffix = "_".$suffix;
            
              _writeToFile($_SERVER['DOCUMENT_ROOT']."/_log/logs".$suffix.".log",$s,"a+");

        return $s;
    }

function _writeToFile($fileName, $content, $mode="w")
    {
        $dir=mb_substr($fileName,0,strrpos($fileName,"/"));
        if (!is_dir($dir))
        {
            _makeDir($dir);
        }

        if($mode != "r")
        {
            $fh=fopen($fileName, $mode);
            if (fwrite($fh, $content))
            {
                fclose($fh);
                @chmod($fileName, 0644);
                return true;
            }
        }

        return false;
    }

function _makeDir($dir, $is_root = true, $root = '')
        {
            $dir = rtrim($dir, "/");
            if (is_dir($dir)) return true;
            if (mb_strlen($dir) <= mb_strlen($_SERVER['DOCUMENT_ROOT'])) 
                return true;
            if (str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir) == $dir) 
                return true;

            if ($is_root)
            {
                $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
                $root = $_SERVER['DOCUMENT_ROOT'];
            }
            $dir_parts = explode("/", $dir);

            foreach ($dir_parts as $step => $value)
            {
                if ($value != '')
                {
                    $root = $root . "/" . $value;
                    if (!is_dir($root))
                    {
                        mkdir($root, 0755);
                        chmod($root, 0755);
                    }
                }
            }
            return $root;
        }


function getFeedbacksFeed(){
    $sql = "SELECT * FROM feedback";
    $feed = getAssocResult($sql);

    return $feed;
}

function setFeedback(){
    $response = "";
    $db_link = getConnection();

    $feedback_user = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['name'])));
    $feedback_body = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['review'])));

    $sql = "INSERT INTO feedback (feedback_body, feedback_user) VALUES ('$feedback_body', '$feedback_user')";
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв добавлен";

    return $response;
}

function remFeedback(){
    $response = "";
    $db_link = getConnection();

    $id_mesg = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['ID_MSG'])));

    $sql = "DELETE FROM feedback WHERE id_msg=" . $id_mesg;
    $res = executeQuery($sql, $db_link);

    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв удален";

    return $response;
}

function editFeedback(){
    $db_link = getConnection();
    $id_mesg_edit = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['ID_MSG_EDIT'])));

    $sql = "SELECT * FROM feedback WHERE id_msg=" . $id_mesg_edit;
    $result = $db_link->query($sql);
    while($row = $result->fetch_assoc()) {
        $feed = $row['feedback_body'];
    }
    $text = '= ' . $feed;
    return $text;
}

function updateFeedback(){
    $response = "";
    $db_link = getConnection();
    
    $feedback_body = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['retext'])));
    $feedback_user = mysqli_real_escape_string($db_link, (string)htmlspecialchars(strip_tags($_POST['ID_MSG_EDITx'])));

    $sql = 'UPDATE feedback SET feedback_body = "' . $feedback_body . '" WHERE id_msg = ' . $feedback_user;
    //echo $sql;
    $res = executeQuery($sql, $db_link);
    if(!$res)
        $response = "Произошла ошибка!";
    else
        $response = "Отзыв Отредактирован";

    return $response;
}