<?php
//upload.php
session_start();

$folder_name = 'upload/';
$output = '';

if (isset($_SESSION['name'])){

    $name = $_SESSION['name'];

    if(!empty($_FILES))
    {
        
    if(!file_exists("upload/$name")){
    mkdir("upload/$name");
    echo "Named folder was created";
    } 
        
    $folder_name .= $name.'/';
        
     $temp_file = $_FILES['file']['tmp_name'];
     $location = $folder_name . $_FILES['file']['name'];
     move_uploaded_file($temp_file, $location);
    }

    if(isset($_POST["name"]))
    {
     $filename = $folder_name.$_POST["name"];
     unlink($filename);
    }

    $result = array();
    
    $files = array();
    if(file_exists("upload/$name")){
        $files = scandir('upload/'.$name);
    }
    $output = '<div class="row">';

    if(false !== $files)
    {
     foreach($files as $file)
     {
      if('.' !=  $file && '..' != $file)
      {
       $output .= '
       <div class="col-md-2">
        <img src="'.$folder_name.$name.'/'.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
        <button type="button" style="color:white;" class="btn btn-link remove_image" id="'.$name.'/'.$file.'">Remove</button>
       </div>
       ';
      }
     }
    }
} else {
    echo "'Name' is not set";
}
$output .= '</div>';
echo $output;

?>

