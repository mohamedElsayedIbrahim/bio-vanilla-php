<?php
require_once("../view/header.php");
session_start();
if (isset($_SESSION["user"])) {
    website_head("bio information", true);
} else {
    header("location:../index.php");
}

?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">Education information</h2>
            <p class="lead"><small>this page make you change the information of your website</small></p>
        </div>

        <nav style="--bs-breadcrumb-divider: '>'; background-color:#efefef; padding:1rem;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://localhost/bio/panel/system.php">panel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Education</li>
            </ol>
        </nav>

        <div class="py-5">
        <a type="button" class="btn btn-outline-dark" href="./add.php">Add new record</a>
        </div>
        <?php
        require_once "../functions/functions.php";
        $con = connectDB();
        $command = "SELECT * FROM education";
        $result = mysqli_query($con,$command);

        if($result === false){
            echo"<h4>There are no data</h4>";
        }else{
            if(mysqli_num_rows($result) > 0){
                echo'
                <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">School</th>
                    <th scope="col">Start year</th>
                    <th scope="col">Ended year</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
            ';
            $counter = 1;
            while($row = mysqli_fetch_assoc($result)){
                echo'

                <tr>
                    <th scope="row">'.$counter.'</th>
                    <td>'.$row["EducationName"].'</td>
                    <td>'.$row["start_in"].'</td>
                    <td>'.$row["end_in"].'</td>
                    <td><a type="button" href="./edit.php?code='.$row["id"].'" class="btn btn-primary">Edit</a> <a type="button" href="./delete.php?code='.$row["id"].'" class="btn btn-danger">Delete</a></td>
                </tr>
                ';
                $counter++;
            }
            echo"</tbody>
            </table>";
            }else{
                echo"<h4>There are no data</h4>";   
            }
        }
?>
        
                


            

    </div>
</section>
</body>

</html>