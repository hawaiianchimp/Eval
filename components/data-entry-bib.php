<?php
  $sql = "SELECT * FROM players
          WHERE id = ".$_GET['pid'];
          //Select only players who checked-in == bib id not empty
  $player = [];
  if (!$result = $mysqli->query($sql)) {
    console('Players: '.$mysqli->connect_errno, 'error');
    console('Players: '.$mysqli->connect_error, 'error');
  } else {
    $player = $result->fetch_assoc();
  }
?>

<div>
  <div class="col-xs-12 col-md-6">
    <?php include 'player-info-checkin.php' ?>
  </div>

  <div class="col-xs-12 col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Player Checkin</h4>
      </div>
      <div class="panel-body">
        <form class="form form-bib">
          <input name="pid"
                type="hidden"
                value="<?php echo $_GET['pid'] ?>">
          <div class="form-group col-xs-12">
            <label for='weight'>Bib ID</label>
            <div class="input-group input-group-lg">
              <input name="bib"
                      type="number"
                      pattern="\d*"
                      max='9999 '
                      min='0'
                      class="form-control"
                      onfocus="this.select();"
                      onmouseup="return false;"
                      value="<?php echo tripleDigit($player['bib']) ?>"
                      placeholder="<?php echo tripleDigit($player['bib']) ?>"
                      aria-describedby="sizing-addon1">
              <span class="input-group-addon" id="sizing-addon1">bib</span>
            </div>
            <span class="error help-block"></span>
          </div>
          <div class="form-group col-xs-12">
            <input name="save"
                      type="submit"
                      class="btn btn-lg btn-primary"
                      value="Save">
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  <script>
  $(document).ready(function() {
    formSetup($('.form-bib'), 'api/bib.php');
  });
  </script>
</div>