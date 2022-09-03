<?php
require_once "../functions/functions.php";
session_start();
if(isset($_POST["clicked_btn"])){
    //clean
    $email = clean($_POST["email"]);
    $password = clean($_POST["pass"]);
    //validate
    $errors = [validate_email($email),validate_pass($password)];

    if(!check_error($errors)){
        $_SESSION["error"]=$errors;
        header("location:../index.php");
    }else{
        $con = connectDB();
        $command = "SELECT * FROM users WHERE email= '$email' AND password = '$password'";
        $result = mysqli_query($con,$command);
        if(mysqli_num_rows($result) == 0){
            $_SESSION["error"]=["Your creditional is not valid"];
            header("location:../index.php");
        } else{
            header("location:../system.php");
            $_SESSION["user"] = $email;
        }
        mysqli_close($con);
    }

}else{
    header("location:../index.php");
}