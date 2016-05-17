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
    $players = $result->fetch_all(MYSQLI_ASSOC);
  }
?>

<table id="players-table" class="display responsive nowrap table table-compact table-striped">
  <thead>
    <tr>
      <th align="center">
        <span>Bib#</span>
      </th>
      <th>
        <span>Name</span>
      </th>
      <th align="center">
        <span>DOB</span>
      </th>
      <th align="center">
        <span>L-Age</span>
      </th>
      <th align="center">
        <span>Wt</span>
      </th>
      <th align="center">
        <span>Ht</span>
      <th align="center">
        Spd
      </th>
      <th align="center">
        Jmp
      </th>
      <th align="center">
        Lp
      </th>
      <th align="center">
        PU
      </th>
      <th align="center">
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
            <td align="center"><?php echo $player['bib']  ?: '' ?></td>
            <td><?php echo $player['lastname'].', '.$player['firstname'] ?></td>
            <td align="center"><?php echo $player['birthday']  ?: '' ?></td>
            <td align="center"><?php echo $player['age']  ?: '' ?></td>
            <td align="center"><?php echo round($player['weight'])  ?: '' ?></td>
            <td align="center"><?php echo round($player['height'])  ?: '' ?></td>
            <td align="center"><?php echo round($player['speed'],1)  ?: '' ?></td>
            <td align="center"><?php echo round($player['jump'],1)  ?: '' ?></td>
            <td align="center"><?php echo round($player['leap'],1)  ?: '' ?></td>
            <td align="center"><?php echo round($player['pu'])  ?: '' ?></td>
            <td align="center"><?php echo round($player['stn'])  ?: '' ?></td>
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