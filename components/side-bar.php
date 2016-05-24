<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_check-in.php') !== false) ? 'active':''; ?>">
            <a href="s_check-in.php"><i class="fa fa-fw fa-dashboard"></i> Check In</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_weight.php') !== false) ? 'active':''?>">
            <a href="s_weight.php"><i class="fa fa-fw fa-bar-chart-o"></i> Weight</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_speed.php') !== false) ? 'active':''?>">
            <a href="s_speed.php"><i class="fa fa-fw fa-bar-chart-o"></i> Speed</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_jump.php') !== false) ? 'active':''?>">
            <a href="s_jump.php"><i class="fa fa-fw fa-table"></i> Jump</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_leap.php') !== false) ? 'active':''?>">
            <a href="s_leap.php"><i class="fa fa-fw fa-edit"></i> Leap</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_pu.php') !== false) ? 'active':''?>">
            <a href="s_pu.php"><i class="fa fa-fw fa-desktop"></i> PU</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_other.php') !== false) ? 'active':''?>">
            <a href="s_other.php"><i class="fa fa-fw fa-dashboard"></i> Other</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'],'/s_coaches.php') !== false) ? 'active':''?>">
            <a href="s_coaches.org.php"><i class="fa fa-fw fa-dashboard"></i> Coaches</a>
        </li>
    </ul>
</div>