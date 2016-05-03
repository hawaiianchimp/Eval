<?php include 'inc/header.php' ?>

    <!-- auto-refresh page every 10 sec. -->
    <meta http-equiv="refresh" content="10">

<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Coaches </h3>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <?php
        if ($_GET['pid']) {
          include 'components/data-view-coaches.php';
        }
      ?>

    </div>
  </div>
<?php include 'inc/footer.php';?>