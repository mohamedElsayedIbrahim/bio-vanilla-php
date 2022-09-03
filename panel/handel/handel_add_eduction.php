<?php
require_once "../functions/functions.php";
if(isset($_POST["btn_clicked"])){
    session_start();
    $start_date = $_POST["start_date"];
    $end_date = clean($_POST["end_date"]);
    $school = clean($_POST["school"]);
    $summary = clean($_POST["summary"]);

    $errors = [validate_text($school,"School name"),validate_text($summary,"summary"),validateDate($start_date,"start Date"),validateDate($end_date,"End date")];
    if(!check_error($errors)){
        $_SESSION["error"] = $errors;
        header("location:../education/add.php");
    }else{
        $con = connectDB();
        $command = "INSERT INTO education( EducationName, start_in, end_in, summary) VALUES ('$school','$start_date','$end_date','$summary')";
        if(!mysqli_query($con,$command)){
            $_SESSION["error"] = ["Data can not inserted"];
            header("location:../education/add.php");
        } else{
            mysqli_close($con);
            header("location:../education/index.php");
        }
    }
}else{
    header("location:../education/add.php");
}