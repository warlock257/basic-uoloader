<?php

echo "parser.php started - ";


if (isset($_GET['name'])){
    
    $name = $_GET['name'];
    echo $name." is set";
        
    if(!empty($_FILES)){
        echo "$_FILES is no empty";
        
        $temp = $_FILES['file']['tmp_name'];
        $dir_separator = DIRECTORY_SEPARATOR;
        $folder = "uploads";
        $destination_path = dirname(__FILE__).$dir_separator.$folder.$dir_separator.$name.$dir_separator;

        if (!file_exists('uploads/$name')) {
            mkdir('uploads/$name', 0777, true);
            $target_path = $destination_path.$_FILES['file']['name'];
            move_uploaded_file($temp, $target_path);
        } else {
            echo "could not move into folder";
        }
    }
} else {
    echo "GET variable error";
}

?>