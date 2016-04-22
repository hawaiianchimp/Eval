<?php include 'inc/header.php' ?>
<?php include 'inc/db.php' ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 main">
        <h2 class="sub-header">Check in</h2>
        <div class="table-responsive">
          <?php include 'components/player-table.php' ?>
        </div>
        <?php
          if ($_GET['pid']) {
            include 'components/data-entry-bib.php';
          }
        ?>
      </div>
    </div>
  </div>

<?php include 'inc/footer.php';?>