  </head>
  <body class="dashboard">
    <div id="wrapper">
          <?php
            $pagename = $_SERVER[‘REQUEST_URI’];
            echo $pagename;
            if($pagename == '/s_coaches.php') {
            // do nothing
            } else {
            include 'components/nav-bar.php' ;
             }
          ?>
        <div id="page-wrapper">