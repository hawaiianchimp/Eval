<?php
  $sql = "SELECT firstname, lastname, age, weight, height, bib, id FROM players
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
  <div class="col-xs-12 col-md-4">
    <div class="input-group input-group-lg">
      <h1><strong> <?php echo $player['lastname'].', '.$player['firstname'] ?></strong></h1>
      <h1> Bib: <?php echo tripleDigit($player['bib']) ?>
           Age: <?php echo $player['age'] ?></h1>
    </div>
  </div>

  <form class="form form-inline form-bib">
    <input name="pid"
          type="hidden"
          value="<?php echo $_GET['pid'] ?>">
    <div class="col-xs-12 col-md-8">
      <div class="form-group col-xs-12 col-sm-6">
        <label for='weight'>Bib ID</label>
        <div class="input-group input-group-lg">
          <input name="bib"
                  type="number"
                  pattern="\d*"
                  max='9999 '
                  min='0'
                  class="form-control"
                  value="<?php echo $player['bib'] ?>"
                  placeholder="<?php echo $player['bib'] ?>"
                  aria-describedby="sizing-addon1">
          <span class="input-group-addon" id="sizing-addon1">bib</span>
        </div>
        <span id="bib-error" class="help-block"></span>
      </div>
      <div class="form-group col-xs-12 col-sm-6">
      <input name="save"
                  type="submit"
                  class="btn btn-lg btn-primary"
                  value="Save">
      </div>
    </div>
  </form>
  <script>
    (function ($) {

      $('.form-bib input').blur(function(e) {
        e.preventDefault();
        submitForm($('.form-bib'), 'api/bib.php');
      });

      $('.form-bib input[name="save"]').click(function(e) {
        e.preventDefault();
        submitForm($('.form-bib'), 'api/bib.php', successHandler, errorHandler);
      });

      function successHandler(data) {
        console.log(data);
        $('.form-bib').find('.form-group').removeClass('has-error').addClass('has-success');
        $('#bib-error').text('');
        $('.form-bib input[name="save"]').val('Saved!').removeClass('btn-primary').addClass('btn-success');
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

      function submitForm(form, url, success, error){
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
</div>