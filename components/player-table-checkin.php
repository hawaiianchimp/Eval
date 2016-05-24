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
      <th><span>Bib#</span></th>
      <th><span>Name</span></th>
      <th><span>DOB</span></th>
      <th><span>L-Age</span></th>
      <th><span>Wt</span></th>
      <th><span>Ht</span></th>
      <th><span>Spd</span></th>
      <th><span>Jmp</span></th>
      <th><span>Lp</span></th>
      <th><span>PU</span></th>
      <th><span>Stn5</span></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($players as $person) { ?>
        <a>
          <tr onclick="window.document.location='?pid=<?php echo $person['id'] ?>'"
              class="clickable <?php echo ($pid === $person['id']) ? 'info selected':''?>">
            <td><?php echo $person['bib']  ?: '' ?></td>
            <td><?php echo $person['lastname'].', '.$person['firstname'] ?></td>
            <td><?php echo $person['birthday']  ?: '' ?></td>
            <td><?php echo $person['age']  ?: '' ?></td>
            <td><?php echo round($person['weight'])  ?: '' ?></td>
            <td><?php echo round($person['height'])  ?: '' ?></td>
            <td><?php echo round($person['speed'],1)  ?: '' ?></td>
            <td><?php echo round($person['jump'],1)  ?: '' ?></td>
            <td><?php echo round($person['leap'],1)  ?: '' ?></td>
            <td><?php echo round($person['pu'])  ?: '' ?></td>
            <td><?php echo round($person['stn'])  ?: '' ?></td>
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
    //default focus on search bar
    $('input:first()').focus();
  });
</script>