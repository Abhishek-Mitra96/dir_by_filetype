<?php

$total = count($_FILES['fileToUpload']['name']);
//echo $total;

for($i=0; $i<$total; $i++) {

$dir1 = "images";
$dir2="doc";
$dir3="audio";
$dir4="video";

if( is_dir($dir1) === false )
{
    mkdir($dir1);
}
if( is_dir($dir2) === false )
{
    mkdir($dir2);
}
if( is_dir($dir3) === false )
{
    mkdir($dir3);
}
if( is_dir($dir4) === false )
{
    mkdir($dir4);
}

$target_dir = "images/";
$tar1="doc/";
$tar2="audio/";
$tar3="video/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
$target1= $tar1 . basename($_FILES["fileToUpload"]["name"][$i]);
$target2= $tar2 . basename($_FILES["fileToUpload"]["name"][$i]);
$target3= $tar3 . basename($_FILES["fileToUpload"]["name"][$i]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$image=1;
$doc=1;
$audio=1;
$video=1;
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
    //echo "Not a JPG, JPEG, PNG & GIF";
    $image=0;
}

if($imageFileType != "txt" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf") {
    //echo "Not a Document";
    $doc=0;
}

if($imageFileType != "mp3") {
    //echo "Not a music";
    $audio=0;
}

if($imageFileType != "mp4" && $imageFileType != "avi") {
    //echo "Not a music";
    $video=0;
}

if($image==0 && $doc==0 && $audio==0 && $video==0){
    $uploadOk=0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. Please try correct format";
// if everything is ok, try to upload file
} 
else{
    if($image!=0){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
        } else {
            echo "1Sorry, there was an error uploading your file.";
        }
    }
    else if($doc!=0){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target1)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
        } else {
        echo "2Sorry, there was an error uploading your file.";
        }
    }
    else if($audio!=0){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target2)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
        } else {
        echo "3Sorry, there was an error uploading your file.";
        }
    }
    else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target3)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
        } else {
        echo "4Sorry, there was an error uploading your file.";
        }
    }
}
}
?>