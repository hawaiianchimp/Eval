<!-- Static navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo TITLE ?></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Stations <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Stations</li>
              <li><a href="check-in.php">Check in</a></li>
              <li><a href="station-1.php">Station 1</a></li>
              <li><a href="station-2.php">Station 2</a></li>
              <li><a href="station-3.php">Station 3</a></li>
              <li><a href="station-4.php">Station 4</a></li>
              <li><a href="station-5.php">Station 5</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="admin.php">Admin</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>