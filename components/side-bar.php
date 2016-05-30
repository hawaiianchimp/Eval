<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <?php if(!$_SESSION['access']) { ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/index.php') !== false) ? 'active':''; ?>">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Login</a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['access'], ['admin'])) { ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_admin.php') !== false) ? 'active':''; ?>">
            <a href="s_admin.php"><i class="fa fa-fw fa-user-md"></i> Admin</a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['access'], ['admin', 'volunteer'])) { ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_check-in.php') !== false) ? 'active':''; ?>">
            <a href="s_check-in.php"><i class="fa fa-fw fa-check-square-o"></i> Check In</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_weight.php') !== false) ? 'active':''?>">
            <a href="s_weight.php"><i class="fa fa-fw fa-male"></i> Weigh-in</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_speed.php') !== false) ? 'active':''?>">
            <a href="s_speed.php"><i class="fa fa-fw fa-tachometer"></i> 30 yd</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_jump.php') !== false) ? 'active':''?>">
            <a href="s_jump.php"><i class="fa fa-fw fa-table"></i> Brd Jump</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_leap.php') !== false) ? 'active':''?>">
            <a href="s_leap.php"><i class="fa fa-fw fa-long-arrow-up"></i> Vertical</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_pu.php') !== false) ? 'active':''?>">
            <a href="s_pu.php"><i class="fa fa-fw fa-th-large"></i> 4 Corners</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_other.php') !== false) ? 'active':''?>">
            <a href="s_other.php"><i class="fa fa-fw fa-heart"></i> Burpees</a>
        </li>
        <?php } ?>
        <?php if(in_array($_SESSION['access'], ['admin', 'volunteer', 'coach'])) { ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_coaches.php') !== false) ? 'active':''?>">
            <a href="s_coaches.php"><i class="fa fa-fw fa-users"></i> Coaches</a>
        </li>
        <?php } ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/logout.php') !== false) ? 'active':''?>">
            <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
        </li>
    </ul>
</div>