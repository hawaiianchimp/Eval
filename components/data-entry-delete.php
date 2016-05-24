<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Delete Player <?php echo $player['lastname'].', '.$player['firstname']; ?></h4>
    </div>
    <div class="panel-body">
      <form class="form form-delete">
        <input name="pid"
              type="hidden"
              value="<?php echo $_GET['pid'] ?>">
        <div class="alert alert-danger">
          You are about to delete <strong><?php echo $player['lastname'].', '.$player['firstname']; ?></strong>
        </div>
        <div class="form-group col-xs-12">
          <input name="delete"
                    type="submit"
                    class="btn btn-lg btn-danger"
                    value="Delete">
          <span class="error help-block"></span>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    var $form = $('.form-delete');
    var options = {
      $form: $form,
      url: 'api/delete.php',
      submitOnBlur: false,
      enableFormRefreshOnSubmit: enableFormRefreshOnSubmit,
      enableFirstFocus: false,
      successText: 'Deleted!'
    }
    formSetup(options);
  });
</script>