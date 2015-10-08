<?php

if (!empty($_FILES)) {

    $tempPath = $_FILES['file']['tmp_name'];
    $newName = $_GET['kode'] . "-" . $_FILES['file']['name'];

    $uploadPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . $_GET['folder'] . DIRECTORY_SEPARATOR . $newName;

    move_uploaded_file($tempPath, $uploadPath);

    $answer = array('answer' => 'File transfer completed', 'name' => $newName);
    $json = json_encode($answer);

    echo $json;
} else {

    echo 'No files';
}
?>
