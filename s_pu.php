<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h2 class="sub-header">Pushups<small> Entry</small></h2>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <?php
        if ($_GET['pid']) {
          include 'components/data-entry-pu.php';
        }
      ?>
    </div>
  </div>
<?php include 'inc/footer.php';?>