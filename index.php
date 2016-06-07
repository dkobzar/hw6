<!--Даны два файлы со словами (нужно создать форму для их загрузки), разделенными пробелами.
Вывести строки, которые встречаются в обоих файлах. Оформить функцию.-->

<form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
    <input name="userfile1" type="file"/>
    <input name="userfile2" type="file"/>
    <input type="submit" value="Send File"/>
</form>
<?php
if (isset($_FILES['userfile1']) &&
    $_FILES['userfile1']['error'] == UPLOAD_ERR_OK &&
    isset($_FILES['userfile2']) &&
    $_FILES['userfile1']['error'] == UPLOAD_ERR_OK
) {
    $arrayFile1 = file($_FILES['userfile1']['name']);
    $arrayFile2 = file($_FILES['userfile2']['name']);
    $arrayResult = array_intersect($arrayFile1, $arrayFile2);
    echo "Строки, которые встречаются в обоих файлах: " . "<br>\n";
    foreach ($arrayResult as $key => $value) {
        echo $arrayResult[$key] . "<br>\n";
    }
}
?>