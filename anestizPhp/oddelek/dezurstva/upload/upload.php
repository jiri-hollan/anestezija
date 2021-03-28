<!DOCTYPE html>
<html lang="sl-SI">
<body>

<?php

echo "Naložen bo: " . $_POST["meseci"]. "<br>";
$target_dir = "../mesPdf/";
$target_fileIme = $_POST["meseci"];
$target_file = $target_dir . $target_fileIme;
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {

echo $target_file . " že obstaja.<br> ";
   if (!empty($_POST["obstojeca"] )){
	   $uploadOk = $_POST["obstojeca"] ;
	
   }else{
  $uploadOk = 0;
   }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

 //Check for pdf format
            if (!empty($_FILES['fileToUpload']['tmp_name'])) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $_FILES['fileToUpload']['tmp_name']);
                if (($mime != 'application/pdf') && ($mime != 'image/jpg') && ($mime != 'image/jpeg') && ($mime != 'image/gif') && ($mime != 'image/png')) {

                    $uploadOk = 0;
                    echo "<div class=\"alert alert-danger\" role=\"alert\"><strong>This file is not a valid file.</strong></div>";

                    //exit();

                }} //this bracket was missing I think
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded as: " . $target_fileIme;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>


</body>
</html>