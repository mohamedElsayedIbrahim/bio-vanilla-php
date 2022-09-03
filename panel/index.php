<?php
session_start();
require_once("./view/header.php");
if (isset($_SESSION["error"])) {
  $error_list = $_SESSION["error"];
  unset($_SESSION["error"]);
}
if(isset($_SESSION["user"])){
  header("location:system.php");
}
website_head("Panel | login");
?>


  <div class="container my-3">
    <?php
    if (isset($error_list)) {
      foreach ($error_list as $error) {
        if (gettype($error) == "string") {
          echo "<h5 style='color:red;'>$error</h5>";
        }
      }
    }
    ?>
    <form method="POST" action="./handel/login.php">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
      </div>

      <button type="submit" name="clicked_btn" class="btn btn-primary">Log in</button>
    </form>

  </div>

</body>

</html>