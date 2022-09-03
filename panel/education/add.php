<?php
require_once("../view/header.php");
session_start();


if (isset($_SESSION["error"])) {
    $error_list = $_SESSION["error"];
    unset($_SESSION["error"]);
  }

if (isset($_SESSION["user"])) {
    website_head("bio information", true);
} else {
    header("location:../index.php");
}
$back = $_SERVER["HTTP_REFERER"];
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
                <li class="breadcrumb-item"><a href="http://localhost/bio/panel/education/index.php">Eduction</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>

        <?php
    if (isset($error_list)) {
      foreach ($error_list as $error) {
        if (gettype($error) == "string") {
          echo "<h5 style='color:red;'>$error</h5>";
        }
      }
    }
    ?>

        <form method="POST" action="../handel/handel_add_eduction.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">School Name</label>
                <input type="text" name="school" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Start date</label>
                <input type="date" name="start_date" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">End date</label>
                <input type="date" name="end_date" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Bio Summary</label>
                <textarea row=3 name="summary" class="form-control" id="exampleInputPassword1"></textarea>
            </div>

            <button type="submit" name="btn_clicked" class="btn btn-primary">save info</button>
            <a type="button" href="<?php echo $back; ?>" class="btn btn-outline-secondary">back</a>
        </form>

    </div>
</section>
</body>

</html>