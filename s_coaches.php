<?php include 'inc/setup.php' ?>
<?php $ACCESS = array(ADMIN_USERNAME, VOLUNTEER_USERNAME, COACH_USERNAME); ?>
<?php require 'inc/authenticate.php' ?>
<?php include 'inc/header.php' ?>
<?php include 'inc/db.php' ?>
<?php
  if($_GET['pid']) {
    $sql = "SELECT * FROM players
            WHERE id = ".$_GET['pid'];
    $player = array();
    if (!$result = $mysqli->query($sql)) {
      console('Players: '.$mysqli->connect_errno, 'error');
      console('Players: '.$mysqli->connect_error, 'error');
    } else {
      $player = $result->fetch_assoc();
    }
  }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Coaches </h3>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <div>
      <?php
        if ($_GET['pid']) {
          include 'components/player-info.php';
          include 'components/player-data.php';
        }
      ?>
      </div>
    </div>
  </div>
</div>
<script>
  //refresh after 30 seconds
  setTimeout(function() {
    window.location = window.location.href;
  }, 30 * 1000);
</script>
<?php include 'inc/footer.php';?>