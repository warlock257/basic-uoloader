<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
<!--      links to dropzone-->
      <script src="dropzone.js"></script>
      <link rel="stylesheet" type="text/css" href="dist/dropzone.css"> 
      
  <!--      my style sheet-->
      <link rel="stylesheet" type="text/css" href="styles.css"> 


    <title>Dell Productions Content Uploader</title>
  </head>
  <body>
      
    <div>
        
      <div class="header">
          <img src="dell-logo-sm.png" class="logo">
          <h1>Photo / Video upload</h1>
      </div>
        
        <div class="instructionsAndGuidelines">
            <div class="row">
                <div class="col-md-6 instructions">
                <h3>Instructions</h3>
                    <ul>
                        <li>Enter your <strong>last name</strong> in the field below</li>
                        <li>Click "Set Name"</li>
                        <li>If you are returning from a previous session, make sure the name is consistant</li>
                        <li>Make you see your name below before uploading </li>
                    </ul>
                </div>
                <div class="col-md-6 guidlines">
                    <h3>Guidelines</h3>
                    <ul>
                        <li>-Our software will only read the order of pictures by it’s 
                        filename. Ordering in programs like Apple Photos will not
                        translate over to our system</li>
                        <li>-Ideally, the file names should have a catagoy and number:<br>
                       family001.jpg, Chrono002, friends003.jpg, etc</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="nameSection">
        
        <form>
            <label for="name">Last Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name here">
            
            <br>
            <button class="btn btn-primary">Set Name</button>
            <br>
            <br>
            <h3>Your name is set to :
            <?php 
                                
                if(isset($_GET['name'])){
                    echo "<font color='blue'>".$_GET['name']."</font>"; 
                } else {
                    echo "<font color='red'>None</font>";
                }
                
            ?>
            </h3> 
   
        </form>
        
        </div>
        
    </div>
      
      <div class="dropzoneSection">
          
          <h3>Current files: 386</h3>
            <div id="dropzone" class="myDropzone">
                <form action="parser.php" class="dropzone needsclick" id="demo-upload" method="post">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <br>
                <div class="dz-message needsclick">
                    Drop files here or click to upload<br />
                </div>
                    
                </form>
            </div>
      </div>
      
      
      
      
      
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


<?php

if(isset($_GET['name'])){
    $name = $_GET['name'];
    echo '<script>console.log("$name is set within main file")</script>';
}

?>