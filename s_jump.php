<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Jump<small> Entry</small></h3>
      <div class="table-responsive">
        <?php include 'components/player-table.php' ?>
      </div>
      <?php
        if ($_GET['pid']) {
          include 'components/data-entry-jump.php';
        }
      ?>
    </div>
  </div>
<?php include 'inc/footer.php';?>