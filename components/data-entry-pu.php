<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Pushups</h4>
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
  var $form = $('.form-pu');
  var options = {
    $form: $form,
    url: 'api/pu.php',
    submitOnBlur: !$form.find('input[type!=hidden][type!=submit]').filter(function(e){ return !!this.value }).length,
    refreshPath: refreshPath,
    enableFirstFocus: true,
    successText: 'Saved!'
  }
  formSetup(options);
</script>