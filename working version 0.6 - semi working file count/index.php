<?php
//index.php
session_start();
?>

<!--Created by David Courtemanche-->
<!--Help from this tutorial:  https://www.youtube.com/watch?v=J90EPfHvb-8    -->

<!DOCTYPE html>
<html>
 <head>
  <title>Dell Production file upload</title>
     
<!--     bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
<!--     dropzone-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
     
     <!--      my style sheet-->
      <link rel="stylesheet" type="text/css" href="styles.css"> 

 </head>
    
 <body>
   
    <div class="header">
        <img src="dell-logo-sm.png" class="logo">
        <h1>Photo / Video upload</h1>
    </div>
     
         <div class="instructionsAndGuidelines">
            <div class="row">
                <div class="col-md-3 guidlines"></div>
                <div class="col-md-6 instructions">
                <h3><u>Instructions</u></h3>
                    <ol>
                        <li>Enter your <strong>last name</strong> in the field below</li>
                        <li>Click "Set Name"</li>
                        <li>If you are returning from a previous session, make sure the name is consistant</li>
                        <li>Make sure you see your name below before uploading </li>
                        <li>Click or drag your files into the temperary box</li>
                        <li>Click <strong>Upload</strong>. Multiple presses may be nessessary</li>
                        <li>When images appear in the lowest section, they have been recived by us</li>
                    </ol>
                    
                    <h3><u>Guidelines</u></h3>
                    <ul>
                        <li>Our software will only read the order of pictures by it’s 
                        filename. Ordering in programs like Apple Photos will not
                        translate over to our system</li>
                        <li>Ideally, the file names should have a catagoy and number:<br>
                       family001.jpg, Chrono002, friends003.jpg, etc</li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
     
             <div class="nameSection">
        
        <form>
            <label for="name" class="nameLabel">Last Name</label>
            <input type="text" name="name" class="form-control nameInput" id="name" placeholder="Enter last name here">
            
            <br>
            <button class="btn btn-primary">Set Name</button>
            <br>
            <br>
            <h3>Your name is set to :
            <?php 
                                
                if(isset($_GET['name'])){
                    echo "<font color='blue'>".$_GET['name']."</font>"; 
                    $_SESSION['name'] = $_GET['name'];
                } else {
                    echo "<font color='red'>None</font>";
                }
                
            ?>
            </h3> 
   
        </form>
        
        </div>
     
     
  <div class="container">
   <br />
   <h3 align="center"> Drag files into the temporary box below, or click it, then hit upload</h3>
   <br />
   
   <form action="upload.php" class="dropzone" id="dropzoneFrom">

   </form>
   
    
   
   <br />
   <br />
   <div align="center">
    <button type="button" class="btn btn-info uploadButton" id="submit-all">Upload</button>
   </div>
   <br />
   <br />
      <div class="previewArea">
          
          <h3 align="center">
              <?php 
                if(isset($_GET['name'])){
                    $subdir = $_GET['name'].'/';
                    $dir = "upload/";
                    $files = scandir($dir.$subdir);
                    $numFiles = count($files)-2;
                    echo "Number of files received: ".$numFiles;
                }
              ?>
          </h3>
          
           <div id="preview"></div>
           <br />
           <br />
      </div>
  </div>
     
 </body>
</html>

<script>

$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"upload.php",
   success:function(data){
    $('#preview').html(data);
   }
  });
 }

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"upload.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  })
 });
 
});
</script>
