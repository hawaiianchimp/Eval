/*global $*/

// Default Focus
$('input:first()').focus();

function formSetup(options) {
  var $form = options.$form || $('form:first()');
  var successText = options.successText || 'Saved!';
  var refreshPath = options.refreshPath || window.location.pathname;
  var submitOnBlur = options.submitOnBlur;
  var apiUrl = options.url;
  var enableFirstFocus = options.enableFirstFocus;

  if (!$form.length) {
    console.error('No $form provided in formSetup()', $form);
  }
  // Default Focus in form
  if (enableFirstFocus) {
    $form.find('input[type!=hidden][type!=submit]:first()').focus();
  }

  // Submit when unfocusing on input
  if(submitOnBlur) {
    $form.find('input').blur(function(e) {
      e.preventDefault();
      submitForm($form, apiUrl);
      return false;
    });
  }

  // Submit on save key pressed
  $form.find('input[type=submit]').click(function(e) {
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
    $form.find('input[type=submit]').val(successText).removeClass('btn-primary').addClass('btn-success');
    setTimeout(function() {
      window.location = refreshPath;
    }, 500);
  }

  function errorHandler(xhr, status, error){
    var data = xhr.responseJSON;
    console.log(data);
    console.log(status);
    console.log(error);
    $form.find('input[type=submit]').val('Save').removeClass('btn-success').addClass('btn-primary');
    $form.find('.form-group').removeClass('has-success').addClass('has-error');
    $form.find('.error').text(data && data.error && data.error.message);
  }

  function submitForm($form, url, success, error) {
    $form.submit(function (e) {
      e.preventDefault();
      $.ajax({
        url: url,
        dataType: 'json',
        method: 'GET',
        data: $(this).serialize(),
        success: function(data) {
          console.info($form.attr('class') + " successfully submitted", data);
          if (success) {
            success(data);
          }
        },
        error: error
      });
      return false;
    });
    $form.submit();
  }
}