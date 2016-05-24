<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Speed</h4>
    </div>
    <div class="panel-body">
      <form class="form form-spd1">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
        <div class="form-group col-xs-12">
          <label for='spd1'>First Run</label>
          <div class="input-group input-group-lg">
            <input name="spd1"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    class="form-control"
                    value="<?php echo $player['spd1'] ?>"
                    placeholder="<?php echo $player['spd1'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">sec</span>
          </div>
        </div>
        <div class="form-group col-xs-12">
          <label for='spd1'>Second Run</label>
          <div class="input-group input-group-lg">
            <input name="spd2"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['spd2'] ?>"
                    placeholder="<?php echo $player['spd2'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">sec</span>
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
    var $form = $('.form-spd1');
    var submitOnBlur = !$form.find('input[type!=hidden][type!=submit]').filter(function(e){ return !!this.value }).length;
    var refreshPath = window.location.pathname;
    formSetup($form, 'api/speed.php', submitOnBlur, refreshPath);
  });
</script>