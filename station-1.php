<?php include 'inc/header.php' ?>
<?php include 'inc/db.php' ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 main">
        <h1 class="sub-header">Station 1<small> Weight and Height</small></h1>
        <div class="table-responsive">
          <?php include 'components/player-table.php' ?>
        </div>
        <?php
          if ($_GET['pid']) {
            include 'components/data-entry-weight.php';
          }
        ?>
      </div>
    </div>
  </div>

<?php include 'inc/footer.php';?>