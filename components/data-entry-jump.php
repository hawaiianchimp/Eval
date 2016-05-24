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

<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Jump</h4>
    </div>
    <div class="panel-body">
      <form class="form form-jmp1">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
        <div class="form-group col-xs-12">
          <label for='jmp1'>First Jump</label>
          <div class="input-group input-group-lg">
            <input name="jmp1"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['jmp1'] ?>"
                    placeholder="<?php echo $player['jmp1'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">sec</span>
          </div>
        </div>

        <div class="form-group col-xs-12">
          <label for='jmp2'>Second Jump</label>
          <div class="input-group input-group-lg">
            <input name="jmp2"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['jmp2'] ?>"
                    placeholder="<?php echo $player['jmp2'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">sec</span>
          </div>
          <span class="error help-block"></span>
        </div>
        <div class="form-group col-xs-12">
          <div class="input-group input-group-lg">

          </div>
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
    var submitOnBlur = true;
    formSetup($('.form-jmp1'), 'api/jump.php', submitOnBlur);
  });
</script>