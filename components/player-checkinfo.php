<div class="input-group input-group-lg">
  <h1><strong> <?php echo $player['lastname'].', '.$player['firstname'] ?></strong></h1>
  <dl class="dl-horizontal">
    <dt>
      <h2>Age: </h2>
    </dt>
    <dd>
      <h2><?php echo $player['age']; ?></h2>
    </dd>
    <dt>
      <h2>DOB: </h2>
    </dt>
    <dd>
      <h2><?php echo date("m/d/y",$player['birthday']) ?></h2>
    </dd>
  </dl>
</div>