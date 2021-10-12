<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
 
if (sizeof($_FILES)!=0){
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['filename']['name']);
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
       echo"Файл завантажений! " . basename($_FILES['filename']['name'])."";
    }
    else {
        echo "Файл завантажити не вдалося!";
		//echo ' Хьюстон! У нас проблеми!';
		//echo ' Зовите экзорциста!';
    }
}

/*
if(isset($_FILES['filename']) && $_FILES['filename']['error'] == 0){
    // Директория для закачивания
    $dir = '/img/'; 
    // Допустимые MIME-типы
    $arrType = array('img/jpeg','img/gif','img/png',);
    // Допустимые расширения
    $arrExt = array('png', 'jpg', 'jpeg', 'sql');
    // Получаем расширение файла
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    // 1. Проверка MIME-тип файла и расширение
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $type = $finfo->file($_FILES['filename']['tmp_name']);
    if (in_array($type, $arrType) && in_array($ext, $arrExt)){
        // 2. Генерирование уникального имени и пути файла
        $filepath = $dir.uniqid().'.'.$ext;
        if(move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$filepath)){
            // Если файл загружен, то можем вывести его на экран
            echo '<img src="'.$filepath.'" alt="">';            
        } else {
            echo 'Хьюстон! У нас проблемы!';
        }
    }
}
*/
?>