<div>
  <div class="col-xs-12 col-md-6">
    <?php include 'player-info.php' ?>
  </div>

  <div class="col-xs-12 col-md-6">
    <?php include 'player-data.php' ?>
  </div>

<!--
  <form class="form form-inline form-weight">
    <input name="pid"
          type="hidden"
          value="<?php // echo $_GET['pid'] ?>">
    <div class="col-xs-12 col-md-8">
      <div class="form-group col-xs-12 col-sm-4 col-md-4">
        <label for='weight'>Weight</label>
        <div class="input-group input-group-lg">
          <input name="weight"
                  type="number"
                  step="0.01"
                  pattern="\d*"
                  class="form-control"
                  value="<?php // echo $player['weight'] ?>"
                  placeholder="<?php // echo $player['weight'] ?>"
                  aria-describedby="sizing-addon1">
          <span class="input-group-addon" id="sizing-addon1">lb</span>
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-4">
        <label for='height'>Height</label>
        <div class="input-group input-group-lg">
          <input name="height"
                  type="number"
                  step="0.01"
                  pattern="\d*"
                  class="form-control"
                  value="<?php // echo $player['height'] ?>"
                  placeholder="<?php // echo $player['height'] ?>"
                  aria-describedby="sizing-addon1">
          <span class="input-group-addon" id="sizing-addon1">in</span>
        </div>
      </div>
      <div class="form-group col-xs-12 col-sm-4">
        <div class="input-group input-group-lg">

        </div>
      </div>
      <div class="form-group col-xs-12 col-sm-4">
      <input name="save"
                  type="submit"
                  class="btn btn-lg btn-primary"
                  value="Save">
      </div>
    </div>
  </form>
  <script>
    (function ($){

      $('.form-weight input').blur(function(e) {
        e.preventDefault();
        submitForm($('.form-weight'), 'api/weight-and-height.php');
      });

      $('.form-weight input[name="save"]').click(function(e) {
        e.preventDefault();
        submitForm($('.form-weight'), 'api/weight-and-height.php', successHandler, errorHandler);
      });

      function successHandler(data) {
        console.log(data);
        $('.form-bib').find('.form-group').removeClass('has-error').addClass('has-success');
        $('#bib-error').text('');
        $('.form-bib input[name="save"]').val('Saved!').removeClass('btn-primary').addClass('btn-success');

        window.location.reload();
      }

      function errorHandler(xhr, status, error){
        var data = xhr.responseJSON;
        console.log(data);
        console.log(status);
        console.log(error);
        $('.form-bib input[name="save"]').val('Save').removeClass('btn-success').addClass('btn-primary');
        $('.form-bib').find('.form-group').removeClass('has-success').addClass('has-error');
        $('#bib-error').text(data.error && data.error.message);
      }

      function submitForm(form, url, success, error) {
        form.submit(function (e) {
          e.preventDefault();
          $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET',
            data: $(this).serialize(),
            success: success,
            error: error
          });
        });
        form.submit();
      }
    })(jQuery);
  </script>
-->
</div>