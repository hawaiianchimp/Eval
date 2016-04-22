<?php
  $sql = "SELECT firstname, lastname, age, weight, height, bib, id FROM players
          WHERE id = ".$_GET['pid'];
  $measurements = [];
  if (!$result = $mysqli->query($sql)) {
    console('Players: '.$mysqli->connect_errno, 'error');
    console('Players: '.$mysqli->connect_error, 'error');
  } else {
    $measurements = $result->fetch_assoc();
  }
?>

<div>
  <div class="col-xs-12 col-md-4">
    <div class="input-group input-group-lg">
      <h1><strong> <?php echo $measurements['lastname'].', '.$measurements['firstname'] ?></strong></h1>
      <h1> ID: <?php echo tripleDigit($measurements['id']) ?>
           Age: <?php echo $measurements['age'] ?></h1>
    </div>
  </div>

  <form class="form form-inline form-weight">
    <input name="pid"
          type="hidden"
          value="<?php echo $_GET['pid'] ?>">
    <div class="col-xs-12 col-md-8">
      <div class="form-group col-xs-12 col-sm-4 col-md-4">
        <label for='weight'>Weight</label>
        <div class="input-group input-group-lg">
          <input name="weight"
                  type="number"
                  step="0.01"
                  pattern="\d*"
                  class="form-control"
                  value="<?php echo $measurements['weight'] ?>"
                  placeholder="<?php echo $measurements['weight'] ?>"
                  aria-describedby="sizing-addon1">
          <span class="input-group-addon" id="sizing-addon1">lb</span>
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-4 col-md-4">
        <label for='weight'>Height</label>
        <div class="input-group input-group-lg">
          <input name="height"
                  type="number"
                  step="0.01"
                  pattern="\d*"
                  class="form-control"
                  value="<?php echo $measurements['height'] ?>"
                  placeholder="<?php echo $measurements['height'] ?>"
                  aria-describedby="sizing-addon1">
          <span class="input-group-addon" id="sizing-addon1">in</span>
        </div>
      </div>
      <div class="form-group col-xs-12 col-sm-4 col-md-4">
        <div class="input-group input-group-lg">

        </div>
      </div>
      <div class="form-group col-xs-12 col-sm-4 col-md-4">
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
        $('.form-weight').find('.form-group').addClass('has-success');
        $('.form-weight input[name="save"]').val('Saved!').removeClass('btn-primary').addClass('btn-success');
      }

      function errorHandler(xhr, status, error){
        console.log(status);
        console.log(error);
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