<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Add a New Player</h4>
    </div>
    <div class="panel-body">
      <form class="form form-create">
        <div class="form-group col-xs-12">
          <label for='firstname'>First Name</label>
            <input name="firstname"
                    type="text"
                    class="form-control input-lg"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    placeholder="First name"
                    required>
        </div>
        <div class="form-group col-xs-12">
          <label for='lastname'>Last Name</label>
            <input name="lastname"
                    type="text"
                    class="form-control input-lg"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    placeholder="Last name"
                    required>
        </div>
        <div class="form-group col-xs-12">
          <label for='birthday'>birthday</label>
            <input name="birthday"
                    type="date"
                    max="<?php echo date('Y-m-d');?>"
                    class="form-control input-lg"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    placeholder="birthday"
                    required>
        </div>
        <div class="form-group col-xs-12">
          <label for='age'>Leage Age</label>
          <div class="input-group input-group-lg">
            <input name="age"
                    type="number"
                    step="0.1"
                    pattern="\d*"
                    class="form-control"
                    onfocus="this.select();"
                    onmouseup="return false;"
                    placeholder="League age"
                    aria-describedby="sizing-addon-years"
                    required>
            <span class="input-group-addon" id="sizing-addon-years">years</span>
          </div>
        </div>
        <div class="form-group col-xs-12">
          <input name="create"
                    type="submit"
                    class="btn btn-lg btn-primary"
                    value="Create">
          <span class="error help-block"></span>
        </div>

    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    var $form = $('.form-create');
    var options = {
      $form: $form,
      url: 'api/create.php',
      submitOnBlur: false,
      enableFormRefreshOnSubmit: true,
      enableFirstFocus: false,
      successText: 'Created!'
    }
    formSetup(options);
  });
</script>