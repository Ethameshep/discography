<?php include './includes/title.php'; ?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <?php require './includes/head.php'; ?>
    <style>.warning{color:red;}</style>
  </head>
  <body class="container">
    <header>
      <?php require './includes/navbar.php'; ?>
      <?php include './includes/carousel.php'; ?>
      <p class="text-center">Foo Fighters is a rock band that got started in 1994 and is still touring today. The band has released 9 albums and currently has 6 members</p>
    </header>
    <section><!-- start album section -->
      <h1 class="text-center text-uppercase" id="albums">Albums Releases</h1>
      <p class="text-center"><a href="upload.php">Add an Album</a></p>
      <div class="row">
        <?php include './includes/albums.php' ?>
      </div><!-- row -->
    </section><!-- end album section -->
    <section><!-- start member section -->
      <h1 class="text-center text-uppercase bold" id="members">Band Members</h1>
      <div class="row">
        <?php include './includes/bandmember.php' ?>
      </div><!-- row -->
    </section> <!-- end member section -->
    <section><!-- start signup section -->
      <h1 class="text-center text-uppercase" id="form">Register for our mailing list</h1>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <?php require './includes/form.php'; ?>
        </div><!-- col-md-6 col-md-offset-3 -->
      </div><!-- row -->
    </section><!-- end signup section -->
    <?php include './includes/footer.php'; ?>
  </body>
</html>
