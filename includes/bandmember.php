<?php
  require_once 'connection.php';
  $conn = dbConnect('write');
  $getMembers = 'SELECT * FROM members';
  $members = $conn->query($getMembers);
  while ($member = $members->fetch_assoc()) {
    $memberName = $member['member_name'];
    $memberPicture = $member['member_picture'];
    $memberRole = $member['member_role']; ?>

      <article class="member col-md-4 col-sm-6">
        <h2 class="text-center"><?php echo $memberName ?></h2>
        <img class="img-rounded" src="./images/<?=$memberPicture;?>" alt="<?=$memberName;?>">
        <p class="text-center"><?php echo $memberRole ?></p>
      </article>

<?php
  }
?>





