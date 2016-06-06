<?php include 'inc/setup.php' ?>
<?php $ACCESS = array(ADMIN_USERNAME, VOLUNTEER_USERNAME); ?>
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
      <span style="float:right"><a href="s_check-in.php"> >>>SWITCH<<< </a> </span>
      <h3 class="sub-header" style="background-color:Red; line-height:150%">Check out </a> </span></h3>
      <div class="table-responsive">
        <?php include 'components/player-table-checkout.php' ?>
      </div>
      <script> enableFormRefreshOnSubmit = true; </script>
      <div>
        <?php
          if ($player['firstname']) {
            include 'components/player-info-checkin.php';
            include 'components/data-entry-bib.php';
          }
          include 'components/data-entry-create.php';
        ?>
      </div>
    </div>
  </div>
</div>
<?php include 'inc/footer.php';?>