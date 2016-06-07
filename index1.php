<!--Дан файл (загрузка через форму). Каждая строка содержит имя, пароль и email,
разделенные символами ':' (двоеточие). Удалить строки с повторами email.
Удалить строки, в которых имена совпадают.-->

<!--комментарий-->

<!--комментарий 2-->

<form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
    <input type="file" name="regData"/>
    <input type="submit" value="Send File"/>
</form>
<?php
$uniqueString = [];
if (isset($_FILES['regData']) &&
    $_FILES['regData']['error'] == UPLOAD_ERR_OK)
{
    $file = fopen($_FILES['regData']['name'], 'r');
    while (!feof($file)) {
        $string = fgets($file);
        $arrayCheck = explode(":", $string);
        if (!in_array($arrayCheck[0], $uniqueString) &&
            !in_array($arrayCheck[2], $uniqueString)){
            array_push($uniqueString, $arrayCheck[0]);
            array_push($uniqueString, $arrayCheck[2]);
            file_put_contents("result.txt", $string, FILE_APPEND);
        }
    }
    fclose($file);
}

/*$emails = [];
$names = [];
$result = [];

if (isset($_FILES['regData']) && $_FILES['regData']['error'] == UPLOAD_ERR_OK) {
    $file = fopen($_FILES['regData']['name'], 'r');

    while (!feof($file)) {
        $string = fgets($file);
        $arrayCheck = explode(':', $string);

        if (in_array($arrayCheck[0], $names) || in_array($arrayCheck[2], $emails)) {
            continue;
        }

        $names[] = $arrayCheck[0];
        $emails[] = $arrayCheck[2];
        $result[] = $string;
    }

    file_put_contents('result.txt', implode("\n", $result));
    fclose($file);
}*/