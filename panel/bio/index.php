<?php
require_once("../view/header.php");
session_start();
if (isset($_SESSION["user"])) {
    website_head("bio information", true);
} else {
    header("location:../index.php");
}
if (isset($_SESSION["error"])) {
    $error_list = $_SESSION["error"];
    unset($_SESSION["error"]);
}
$back = $_SERVER["HTTP_REFERER"];
?>

<section class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 class="text-capitalize">bio information</h2>
            <p class="lead"><small>this page make you change the information of your website</small></p>
        </div>

        <h5>information form</h5>
        <?php
        if (isset($error_list)) {
            foreach ($error_list as $error) {
                if (gettype($error) == "string") {
                    echo "<h5 class='py-3' style='color:red;'>$error</h5>";
                }
            }
        }
        ?>
        <form method="POST" action="../handel/bio_handel.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Person Full Name</label>
                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">job Title</label>
                <input type="text" name="job" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">image</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="mytextarea" class="form-label">Bio Summary</label>
                <textarea row=3 name="summary" class="form-control" id="mytextarea"></textarea>
            </div>

            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="<?php echo $back; ?>" class="btn btn-outline-secondary">back</a>
        </form>
    </div>
</section>
</body>

</html>