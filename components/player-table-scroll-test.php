<!--
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

  $sql = "SELECT *
          FROM players
          GROUP BY id";
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
      <th align="center">
        <a href="?sortby=bib&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'bib') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Bib#</span>
        </a>
      </th>
      <th>
        <a href="?sortby=lastname&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'lastname') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Name</span>
        </a>
      </th>
      <th align="center">
        <a href="?sortby=age&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'age') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Age</span>
        </a>
      </th>
      <th align="center">
        <a href="?sortby=weight&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'weight') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Weight</span>
        </a>
      </th>
      <th align="center">
        <a href="?sortby=height&dir=<?php echo $dir_op ?>">
          <?php $glyph = ($sortby === 'height') ? $glyphicon : '' ?>
          <span class="glyphicon <?php echo $glyph ?>" aria-hidden="true"></span>
          <span>Height</span>
        </a>
      </th>
      <th align="center">
        Speed
      </th>
      <th align="center">
        Jump
      </th>
      <th align="center">
        Leap
      </th>
      <th align="center">
        Push Ups
      </th>
      <th align="center">
        Other
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($players as $player) { ?>
        <a>
          <tr onclick="window.document.location='?pid=<?php echo $player['id'] ?>'"
              class="clickable <?php echo ($pid === $player['id']) ? 'warning':''?>">
            <td align="center"><?php echo tripleDigit($player['bib']) ?></td>
            <td><?php echo $player['lastname'].', '.$player['firstname'] ?></td>
            <td align="center"><?php echo $player['age'] ?></td>
            <td align="center"><?php echo $player['weight'] ?></td>
            <td align="center"><?php echo $player['height'] ?></td>
            <td align="center"><?php echo @min(array_filter([$player['spd1'],$player['spd2']])) ?></td>
            <td align="center"><?php echo @min(array_filter([$player['jmp1'],$player['jmp2']])) ?></td>
            <td align="center"><?php echo @min(array_filter([$player['lp1'],$player['lp2']])) ?></td>
            <td align="center"><?php echo $player['pu'] ?></td>
            <td align="center"><?php echo $player['stn'] ?></td>
          </tr>
        </a>
    <?php } ?>
  </tbody>
</table>


<!--
// Change the selector if needed
var $table = $('table table-striped'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });
}).resize(); // Trigger resize handler
-->

<div id="constrainer">
    <div class="scrolltable">
      <table class'header'><thead><th>foo</th><th>foo</th><th>foo</th></thead></table>
       <div class="body">
           <table>
              <tbody>
                <tr><td>foo</td><td>foo</td><td>foo</td><td>foo</td></tr>
              </tbody>
            </table>
        </div>
      
    </div>
</div>        