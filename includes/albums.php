<?php
  require_once 'connection.php';
  $conn = dbConnect('write');
  $counter = 0;
  $getAlbums = 'SELECT * FROM albums';
  $albums = $conn->query($getAlbums);
  if (!$albums) {
      $error = $conn->error;
  } else {
    while ($album = $albums->fetch_assoc()) {
      $counter++;
      $albumTitle = $album['album_title'];
      $albumCover = $album['album_cover'];
      $getTracklists = "SELECT * FROM tracks JOIN albums USING (album_id) WHERE album_title = '$albumTitle'";
      $tracklists = $conn->query($getTracklists);?>
      <article class="album col-md-4 col-sm-6">
        <h2 class="text-center"><small><?php echo $albumTitle ?></small></h2>
        <img class="img-rounded album-photo" src="./images/<?=$albumCover;?>" alt="<?=$albumTitle;?>">
        <table class="table table-condensed">
          <?php while ($track = $tracklists->fetch_assoc()) { ?>
            <tr>
              <td><?= $track['track_num'] ?></td>
              <td><?= $track['track_title'] ?></td>
              <td class="text-right"><?= $track['track_length'] ?></td>
            </tr>
          <?php } ?>
        </table>
      </article>
      <?php
      if ($counter % 2 == 0) {
        echo '<div class="clearfix hidden-md hidden-lg"></div>';
      }
      if ($counter % 3 == 0) {
        echo '<div class="clearfix hidden-sm hidden-xs"></div>';
      }
    }
  }
  ?>







