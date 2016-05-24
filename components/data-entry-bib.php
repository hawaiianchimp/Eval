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
          <label for='bib'>Bib ID</label>
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
    var $form = $('.form-bib');
    var options = {
      $form: $form,
      url: 'api/bib.php',
      submitOnBlur: !$form.find('input[type!=hidden][type!=submit]').filter(function(e){ return !!this.value }).length,
      refreshPath: refreshPath,
      enableFirstFocus: true,
      successText: 'Saved!'
    }
    formSetup(options);
  });
</script>