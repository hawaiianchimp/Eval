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

  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Admin</h3>
      <div class="table-responsive">
        <?php include 'components/player-table-admin.php' ?>
      </div>
      <div>
        <?php
          if ($player['firstname']) {
            include 'components/player-info-checkin.php';
            include 'components/player-info.php';
            include 'components/player-data.php';
            include 'components/data-entry-bib.php';
            include 'components/data-entry-jump.php';
            include 'components/data-entry-leap.php';
            include 'components/data-entry-pu.php';
            include 'components/data-entry-speed.php';
            include 'components/data-entry-weight.php';
            include 'components/data-entry-delete.php';
          }
          include 'components/data-entry-create.php';
        ?>
      </div>
    </div>
  </div>
<?php include 'inc/footer.php';?>