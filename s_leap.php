<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Leap<small> Entry</small></h3>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <?php
        if ($_GET['pid']) {
          include 'components/player-info.php';
          include 'components/data-entry-leap.php';
        }
      ?>
    </div>
  </div>
<?php include 'inc/footer.php';?>