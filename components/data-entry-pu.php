<?php
  $sql = "SELECT * FROM players
          WHERE id = ".$_GET['pid'];
  $player = array();
  if (!$result = $mysqli->query($sql)) {
    console('Players: '.$mysqli->connect_errno, 'error');
    console('Players: '.$mysqli->connect_error, 'error');
  } else {
    $player = $result->fetch_assoc();
  }
?>

<div>
  <div class="col-xs-12 col-md-6">
    <?php include 'player-info.php' ?>
  </div>

  <div class="col-xs-12 col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Edit Pushups</h2>
      </div>
      <div class="panel-body">
      <form class="form form-pu">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
          <div class="form-group col-xs-12">
            <label for='pu'>Pushups</label>
            <div class="input-group input-group-lg">
              <input name="pu"
                      onfocus="this.select();"
                      onmouseup="return false;"
                      type="number"
                      step="1"
                      pattern="\d*"
                      class="form-control"
                      value="<?php echo $player['pu'] ?>"
                      placeholder="<?php echo $player['pu'] ?>"
                      aria-describedby="sizing-addon1">
              <span class="input-group-addon" id="sizing-addon1">cnt</span>
            </div>
            <span class="error help-block"></span>
          </div>
          <div class="form-group col-xs-12">
          <input name="save"
                      type="submit"
                      class="btn btn-lg btn-primary"
                      value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      formSetup($('.form-pu'), 'api/pu.php');
    });
  </script>
</div>