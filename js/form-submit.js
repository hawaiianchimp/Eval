/*global $*/
function formSetup($form, apiUrl) {
  if (!$form.length) {
    console.error('No $form provided in formSetup()', $form);
  }
  // Default Focus
  $form.find('input[type=number]:first()').focus();

  // Submit when unfocusing on input
  $form.find('input').blur(function(e) {
    e.preventDefault();
    submitForm($form, apiUrl);
    return false;
  });

  // Submit on save key pressed
  $form.find('input[name="save"]').click(function(e) {
    e.preventDefault();
    submitForm($form, apiUrl, successHandler, errorHandler);
    return false;
  });

  // Submit on return key pressed
  $form.submit(function(e) {
    e.preventDefault();
    if (e.keyCode == 13) {
      submitForm($form, apiUrl, successHandler, errorHandler);
    }
    return false;
  });

  function successHandler(data) {
    console.log(data);
    $form.find('.form-group').removeClass('has-error').addClass('has-success');
    $form.find('.error').text('');
    $form.find('input[name="save"]').val('Saved!').removeClass('btn-primary').addClass('btn-success');
    setTimeout(function(){
      window.location = window.location.pathname;
    }, 500);
  }

  function errorHandler(xhr, status, error){
    var data = xhr.responseJSON;
    console.log(data);
    console.log(status);
    console.log(error);
    $form.find('input[name="save"]').val('Save').removeClass('btn-success').addClass('btn-primary');
    $form.find('.form-group').removeClass('has-success').addClass('has-error');
    $form.find('.error').text(data && data.error && data.error.message);
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
      return false;
    });
    form.submit();
  }
}