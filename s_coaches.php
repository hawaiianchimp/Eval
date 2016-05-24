<?php include 'inc/header.php' ?>

<!-- auto-refresh page every n seconds., n = content value -->
    <meta http-equiv="refresh" content="1000">

<!--
substituting: include 'inc/header-close.php' with code that strips the nav-bar
-->
</head>
  <body>
    <div>
      <div id="page-wrapper">



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
<?php include 'inc/footer.php';?>