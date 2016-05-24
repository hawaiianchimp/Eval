<div class="col-xs-12 col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3><?php echo $player['lastname'].', '.$player['firstname'] ?></h3>
    </div>
    <div class="panel-body">
      <dl>
        <dt style="color:blue;">
          <strong><h3>Birthday: </h3></strong>
        </dt>
        <dd>
          <h3><?php echo $player['birthday'] ?></h3>
        </dd>
        <!--
        <dt>
          <strong><h3>Name:</h3></strong>
        </dt>
        <dd>
          <h3><?php //echo $player['firstname'].' '.$player['lastname'] ?></h3>
        </dd>
        -->
        <dt style="color:blue;">
          <strong><h3>League Age: </h3></strong>
        </dt>
        <dd>
          <h3><?php echo $player['age'] ?></h3>
        </dd>
      </dl>
    </div>
  </div>
</div>