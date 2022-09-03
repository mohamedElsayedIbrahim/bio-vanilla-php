<?php
require_once "../functions/functions.php";
session_start();
if(isset($_POST["btn_clicked"])){
    $image = $_FILES["image"];

    $name = clean($_POST["fullname"]);
    $job = clean($_POST["job"]);
    $summary = clean($_POST["summary"]);
    

    $imageName = $image["name"];
    $imageType = $image["type"];
    $iamgeTemp = $image["tmp_name"];
    $iamgeSize = $image["size"];
    $imageError = $image["error"];
    $imageExt=strtolower(pathinfo($imageName,PATHINFO_EXTENSION));
    $image_new_name = uniqid().".$imageExt";

    $errors = [validate_text($name,"Person Full Name"),validate_text($job,"job"),validate_text($summary,"summary"),validate_image($imageExt,$iamgeSize,$imageError)];
    if(!check_error($errors)){
        $_SESSION["error"] = $errors;
        header("location:../bio/index.php");
    }else{

        $con = connectDB();
        $command = "Insert into person (fullname,job,summary,imagepath) Values ('$name','$job','$summary','$image_new_name')";
        if(!mysqli_query($con,$command)){
            $_SESSION["error"] = ["Data can not inserted"];
            mysqli_close($con);
            header("location:../bio/index.php");
        } else{
            move_uploaded_file($iamgeTemp,"../../img/upload/$image_new_name");
            mysqli_close($con);
            header("location:../bio/index.php");
        }
    }

}else{
    header("location:../bio/index.php");
}