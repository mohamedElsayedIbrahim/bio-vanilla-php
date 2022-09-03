<?php
if(isset($_GET["code"])){
    require_once "../functions/functions.php";
    $id= $_GET["code"];
    $con = connectDB();
    $command = "DELETE FROM education where id = $id";
    if(!mysqli_query($con,$command)){
        header("location:./index.php");
    }else{
        header("location:./index.php");
    }
} else{
    header("location:./index.php");
}