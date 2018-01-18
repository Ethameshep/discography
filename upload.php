<?php
  // Redirect to login page if $_SESSION is not set to true
  session_start();
  if ($_SESSION['login'] != true) {
    header('Location: ./login.php');
    exit;
  }
  // End session when Logout button is clicked and redirect
  if (isset($_POST['logout'])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: ./index.php');
    exit;
  }

  // Insert data into database when submit button is clicked
  if (isset($_POST['submit'])) {
    include './includes/connection.php';
    // File upload handler
    if(isset($_FILES['album_cover'])) {
      $name = $_FILES['album_cover']['name'];
      $tmp_name = $_FILES['album_cover']['tmp_name'];
      move_uploaded_file($tmp_name, './images/'.$name);
    }
    // Define initial variables
    $conn = dbConnect('write');
    $stmt = $conn->stmt_init();
    $albumsAdded = 0;
    $album_title = $_POST['album_title'];
    $album_cover = $name;
    $track_title = $_POST['track_title'];
    $track_length = $_POST['track_length'];
    // Insert album data from form into albums table
    $insertAlbum = 'INSERT INTO albums (album_title, album_cover) VALUES (?, ?)';
    if ($stmt->prepare($insertAlbum)) {
      $stmt->bind_param('ss', $album_title, $album_cover);
      $stmt->execute();
      // Check if album was added successfully
      $albumsAdded = $stmt->affected_rows;
      if ($albumsAdded > 0) {
        // If so, check if there are tracks to be added to tracks table
        if (isset($_POST['track_title'])) {
          // If so, get the album's primary key
          $album_id = $stmt->insert_id;
          // $track_num, $track_title, and $track_length are all arrays, which need to be bound together and looped through
          // So now insert track data into tracks table by looping through everything
          $i = 0;
          foreach($_POST['track_num'] as $track_num) {
            $insertTracks = 'INSERT INTO tracks (album_id, track_num, track_title, track_length) VALUES (?, ?, ?, ?)';
            if ($stmt->prepare($insertTracks)) {
              $stmt->bind_param('iiss', $album_id, $track_num, $track_title[$i], $track_length[$i]);
              $stmt->execute();
            }
            $i++;
          }
        }
      }
    }
  }

?>
<?php include './includes/title.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <?php require './includes/head.php'; ?>
    <style>
      input{text-align: center;}
    </style>
  </head>
  <body>
    <section class="col-sm-6 col-sm-offset-3">
      <article class="text-center">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <fieldset>
              <h1 class="text-uppercase"><small>Cover</small></h1>
              <div class="text-center">
                <div><input type="file" class="col-sm-4 col-sm-offset-4 btn btn-default" name="album_cover" accept="image/*"></div><br>
              </div>
              <br>
              <h1 class="text-uppercase"><small>Title</small></h1>
              <div class="col-xs-6 col-xs-offset-3">
                <input class="form-control" type="text" name="album_title">
              </div>
              <br>
              <br>
              <h1 class="text-uppercase"><small>Tracks</small></h1>
              <div>
                <span>
                  <label for="track_num" class="control-label col-xs-2">#</label>
                  <label for="track_title" class="control-label col-xs-8">Title</label>
                  <label for="track_length" class="control-label col-xs-2">Length</label>
                </span>
                <div id="tracklist">
                  <span class="col-xs-2"><input class="form-control" type="number" min="1" max="50" name="track_num[]"></span>
                  <span class="col-xs-8"><input class="form-control" type="text" name="track_title[]"></span>
                  <span class="col-xs-2"><input class="form-control" type="text" name="track_length[]"></span>
                </div><!-- tracklist -->
              </div>
              <span>
                <input type="button" class="btn btn-default" id="addTrack" value="Add Track"></input>
                <input name="submit" type="submit" class="btn btn-default" value="Submit Album">
              </span>
            </fieldset>
          </div><!-- form-group -->
        </form>
        <form method="post" action="">
          <input name="logout" type="submit" class="btn btn-lg btn-primary" value="Log Out"><br><br>
          <a href="index.php">Back to Home</a>
        </form>
      </article>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#addTrack").click(function(){
          $("#tracklist").append('<div><span class="col-xs-2"><input class="form-control col-xs-4" type="number" min="1" max="50" name="track_num[]"></span><span class="col-xs-8"><input class="form-control col-xs-4" type="text" name="track_title[]"></span><span class="col-xs-2"><input class="form-control col-xs-4" type="text" name="track_length[]"></span></div>');
        });
      });
    </script>
  </body>
</html>
