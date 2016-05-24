<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Check in</h3>
      <div class="table-responsive">
        <?php include 'components/player-table-checkin.php' ?>
      </div>
      <div>
        <?php
          if ($_GET['pid']) {
            include 'components/player-info-checkin.php';
            include 'components/data-entry-bib.php';
          }
        ?>
      </div>
    </div>
  </div>
<?php include 'inc/footer.php';?>