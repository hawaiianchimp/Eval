<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3><?php echo $player['lastname'].', '.$player['firstname'].'    ('.$player['age'].')' ?></h3>
    </div>
    <div class="panel-body">
      <dl>
        <dt style="color:blue;">
          <strong><h3>Birthday: </h3></strong>
        </dt>
        <dd>
          <h3><?php echo $player['birthday'] ?></h3>
        </dd>
        <dt>
          	<strong><h3>Wristband: </h3></strong>
        </dt>
        <dd>
          	<strong><h3>
        <?php
        switch ($player['age']) {
         	case 6-9 :
        	echo "Yellow" ;
				break;

				  case 10 :
        		echo "Green" ;
				break;
          case 11 :
        		echo "Orange" ;
				break;
         	case 12 :
        		echo "Blue" ;
				break;
         	case 13-14 :
        		echo "Red" ;
				break;
        	default :
        		echo "Error" ;
         }
		 ?>
        </h3></strong>
    	</dd>
      </dl>
    </div>
  </div>
</div>