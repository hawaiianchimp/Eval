<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
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
      <h2 class="sub-header">Four Courners<small> (data entry)</small></h2>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <script> enableFormRefreshOnSubmit = true; </script>
      <?php
        if ($player['firstname']) {
          include 'components/player-info.php';
          include 'components/data-entry-pu.php';
        }
      ?>
    </div>
  </div>
</div>
<?php include 'inc/footer.php';?>