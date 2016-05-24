<?php include 'inc/header.php' ?>
<?php include 'inc/header-close.php' ?>
<?php include 'inc/db.php' ?>
  <div class="row">
    <div class="col-xs-12 main">
      <h3 class="sub-header">Admin</h3>
      <div class="table-responsive">
        <?php include 'components/player-table-admin.php' ?>
      </div>
      <div>
        <?php
          if ($_GET['pid']) {
            include 'components/player-info-checkin.php';
            include 'components/player-info.php';
            include 'components/player-data.php';
            include 'components/data-entry-create.php';
            include 'components/data-entry-bib.php';
            include 'components/data-entry-jump.php';
            include 'components/data-entry-leap.php';
            include 'components/data-entry-pu.php';
            include 'components/data-entry-speed.php';
            include 'components/data-entry-weight.php';
          }
        ?>
      </div>
    </div>
  </div>
<?php include 'inc/footer.php';?>