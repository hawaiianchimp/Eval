<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Speed<small> Entry</small></h3>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <?php
        if ($_GET['pid']) {
          include 'components/data-entry-speed.php';
        }
      ?>
    </div>
  </div>
<?php include 'inc/footer.php';?>