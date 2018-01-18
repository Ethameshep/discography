<?php
  error_reporting(0);
  session_start();
  $errorMsg = "";
  $validUser = $_SESSION["login"] === true;
  if (isset($_POST["login"])) {
    $validUser = $_POST["username"] == "admin" && $_POST["password"] == "instructor";
    if (!$validUser){
      $errorMsg = "Invalid username or password.";
    } else {
      $_SESSION["login"] = true;
    }
  if ($validUser) {
    header("Location: ./upload.php");
    die();
  }
}
?>
<?php include './includes/title.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <?php require './includes/head.php'; ?>
    <style>
      section {display:table;height:100vh;margin:0 auto;}
      article {display:table-cell;vertical-align:middle;}
      input {text-align:center;width:250px;}
      label {padding-top:.5rem;}
      section p, p {color:red;text-align:center}
      a {padding: 8px;}
    </style>
  </head>
  <body>
    <section>
      <article class="text-center">
        <?php
        if ($errorMsg) {
          echo "<p>$errorMsg</p>";
        } ?>
        <form method="post" action="">
          <span>
            <label for="username">Username:</label>
          </span>
          <div>
            <input class="form-control" type="text" name="username">
          </div>
          <span>
            <label for="password">Password:</label>
          </span>
          <div>
            <input class="form-control" type="password" name="password">
          </div><br>
          <input type="submit" name="login" class="btn btn-primary" value="Log In"><br><br>
          <a href="index.php">Back to Home</a>
        </form>
      </article>
    </section>
  </body>
</html>
