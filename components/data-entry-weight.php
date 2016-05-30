<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Edit Weight and Height</h4>
    </div>
    <div class="panel-body">
      <form class="form form-weight">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
        <div class="form-group col-xs-12">
          <label for='weight'>Weight</label>
          <div class="input-group input-group-lg">
            <input name="weight"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['weight'] ?>"
                    placeholder="<?php echo $player['weight'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">lb</span>
          </div>
        </div>

        <div class="form-group col-xs-12">
          <label for='height'>Height</label>
          <div class="input-group input-group-lg">
            <input name="height"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    value="<?php echo $player['height'] ?>"
                    placeholder="<?php echo $player['height'] ?>"
                    aria-describedby="sizing-addon1">
            <span class="input-group-addon" id="sizing-addon1">in</span>
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
  var $form = $('.form-weight');
  var options = {
    $form: $form,
    url: 'api/weight-and-height.php',
    submitOnBlur: !$form.find('input[type!=hidden][type!=submit]').filter(function(e){ return !!this.value }).length,
    enableFormRefreshOnSubmit: enableFormRefreshOnSubmit,
    enableFirstFocus: true,
    successText: 'Saved!'
  }
  formSetup(options);
</script>