<div class="panel panel-default">
  <div class="panel-heading">
    <h4><?php echo $player['lastname'].', '.$player['firstname'] ?></h4>
  </div>
  <div class="panel-body">
    <dl>
      <dt>
        <strong><h3>Bib#:</h3></strong>
      </dt>
      <dd>
        <h3><?php echo tripleDigit($player['bib']) ?></h3>
      </dd>
      <dt>
        <strong><h3>Name:</h3></strong>
      </dt>
      <dd>
        <h3><?php echo $player['firstname'].' '.$player['lastname'] ?></h3>
      </dd>
      <dt>
        <strong><h3>Age:</h3></strong>
      </dt>
      <dd>
        <h3><?php echo $player['age'] ?></h3>
      </dd>
    </dl>
  </div>
</div>