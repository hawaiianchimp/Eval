<?php
  $pid = $_GET['pid'];

  $sql = "SELECT *
          FROM players
          WHERE bib IS NULL";

  $players = array();
  if (!$result = $mysqli->query($sql)) {
    console('Players: '.$mysqli->connect_errno, 'error');
    console('Players: '.$mysqli->connect_error, 'error');
  } else {
    while ($row = $result->fetch_assoc()) {
      array_push($players, $row);
    }
  }
?>

<table id="players-table" class="display responsive nowrap table table-compact table-striped">
  <thead>
    <tr>
      <th>
        <span>Bib#</span>
      </th>
      <th>
        <span>Name</span>
      </th>
      <th>
        <span>DOB</span>
      </th>
      <th>
        <span>L-Age</span>
      </th>
      <th>
        <span>Wt</span>
      </th>
      <th>
        <span>Ht</span>
      <th>
        Spd
      </th>
      <th>
        Jmp
      </th>
      <th>
        Lp
      </th>
      <th>
        PU
      </th>
      <th>
        Stn5
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($players as $player) { ?>
        <a>
          <tr onclick="window.document.location='?pid=<?php echo $player['id'] ?>'"
              class="clickable <?php echo ($pid === $player['id']) ? 'warning':''?>">
            <td><?php echo $player['bib']  ?: '' ?></td>
            <td><?php echo $player['lastname'].', '.$player['firstname'] ?></td>
            <td><?php echo $player['birthday']  ?: '' ?></td>
            <td><?php echo $player['age']  ?: '' ?></td>
            <td><?php echo round($player['weight'])  ?: '' ?></td>
            <td><?php echo round($player['height'])  ?: '' ?></td>
            <td><?php echo round($player['speed'],1)  ?: '' ?></td>
            <td><?php echo round($player['jump'],1)  ?: '' ?></td>
            <td><?php echo round($player['leap'],1)  ?: '' ?></td>
            <td><?php echo round($player['pu'])  ?: '' ?></td>
            <td><?php echo round($player['stn'])  ?: '' ?></td>
          </tr>
        </a>
    <?php } ?>
  </tbody>
</table>

<script>
  $(document).ready(function() {
    $datatable = $('#players-table').DataTable({
        dom: '<f<t>>',
        responsive: true,
        paging: false,
        scrollY: "240px",
        scrollCollapse: true,
        tabIndex: -1,
        colReorder: true,
        order: [[0, 'asc']]
    });
  });
</script>