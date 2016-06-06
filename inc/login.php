<?php require_once 'header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-xs-0 col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
      <form class="form-signin <?php echo $err ? 'has-error':'' ?> " method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="cname" class="sr-only">Name</label>
        <input name="cname" type="text" id="cname" class="form-control" placeholder="Name" required autofocus>
        <label for="username" class="sr-only">Username</label>
        <input name="username" type="text" id="username" class="form-control" placeholder="Account Type" required autofocus>
        <label for="psswrd" class="sr-only">Password</label>
        <input name="psswrd" type="password" id="psswrd" class="form-control" placeholder="Password" required>
        <input type="hidden" name="action" value="authenticate"/>
        <input class="btn btn-lg btn-primary btn-block" value="Sign in" type="submit"/>
        <span id="helpBlock2" class="help-block"><?php echo $err ?></span>
      </form>
    </div>
    <div class="col-xs-0 col-sm-3"></div>
  </div>
</div> <!-- /container -->