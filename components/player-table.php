<?php
  $sortby = $_GET['sortby'];
  $pid = $_GET['pid'];
  $dir = ($_GET['dir'] === 'DESC') ? 'DESC': 'ASC';
  $dir_op = ($dir === 'DESC') ? 'ASC': 'DESC';
  $glyphicon = ($dir === 'ASC') ? 'glyphicon-triangle-bottom' : 'glyphicon-triangle-top';
  $search = $_GET['search'];

  $sql = "SELECT p.id, p.firstname, p.lastname, p.birthdate, m.height,
          m.weight, m.speed, m.leap, m.jump, m.stn, m.pu,
          MIN(m.datetime) AS measure_date
          FROM players AS p
          LEFT JOIN measurements AS m ON m.player_id = p.id
          GROUP BY m.player_id
          ORDER BY p.id ASC";

  $sql = "SELECT * FROM players";
  if ($search) {
    $sql .= " WHERE bib LIKE %".$search."% OR firstname LIKE %".$search."% OR lastname LIKE %".$search."% OR age LIKE %".$search."%";
  }
  if ($sortby) {
    $sql .= " ORDER BY ".$sortby." ".$dir;
  }

  $players = [];
  if (!$result = $mysqli->query($sql)) {
    console('Players: '.$mysqli->connect_errno, 'error');
    console('Players: '.$mysqli->connect_error, 'error');
  } else {
    $players = $result->fetch_all(MYSQLI_ASSOC);
  }
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th>
        <a href="?sortby=id&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'id') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>#</span>
        </a>
      </th>
      <th>
        <a href="?sortby=lastname&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'lastname') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Name</span>
        </a>
      </th>
      <th>
        <a href="?sortby=age&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'age') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Age</span>
        </a>
      </th>
      <th>
        <a href="?sortby=weight&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'weight') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Weight</span>
        </a>
      </th>
      <th>
        <a href="?sortby=height&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'height') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Height</span>
        </a>
      <th>
        Speed
      </th>
      <th>
        Jump
      </th>
      <th>
        Leap
      </th>
      <th>
        PU
      </th>
      <th>
        Stn 5
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($players as $player) { ?>
        <a>
          <tr onclick="window.document.location='?pid=<?php echo $player['id'] ?>'"
              class="clickable <?php echo ($pid === $player['id']) ? 'warning':''?>">
            <td><?php echo $player['id'] ?></td>
            <td><?php echo $player['lastname'].', '.$player['firstname'] ?></td>
            <td><?php echo $player['age'] ?></td>
            <td><?php echo $player['weight'] ?></td>
            <td><?php echo $player['height'] ?></td>
            <td><?php echo $player['speed'] ?></td>
            <td><?php echo $player['jump'] ?></td>
            <td><?php echo $player['leap'] ?></td>
            <td><?php echo $player['pu'] ?></td>
            <td><?php echo $player['stn'] ?></td>
          </tr>
        </a>
    <?php } ?>
  </tbody>
</table>