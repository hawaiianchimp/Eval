<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Leap</h4>
    </div>
    <div class="panel-body">
      <form class="form form-lp1">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
        <div class="form-group col-xs-12">
          <label for='lp1'>First Leap</label>
          <div class="input-group input-group-lg">
            <input name="lp1"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    class="form-control"
                    value="<?php echo $player['lp1'] ?>"
                    placeholder="<?php echo $player['lp1'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">sec</span>
          </div>
        </div>

        <div class="form-group col-xs-12">
          <label for='lp1'>Second Leap</label>
          <div class="input-group input-group-lg">
            <input name="lp2"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['lp2'] ?>"
                    placeholder="<?php echo $player['lp2'] ?>"
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
    var $form = $('.form-lp1');
    var submitOnBlur = !$form.find('input[type!=hidden][type!=submit]').filter(function(e){ return !!this.value }).length;
    var refreshPath = window.location.pathname;
    formSetup($form, 'api/leap.php', submitOnBlur, refreshPath);
  });
</script>