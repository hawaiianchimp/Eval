<?php
  $pid = $_GET['pid'];

  $sql = "SELECT *
          FROM players
          WHERE bib IS NOT NULL";

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
      <th align="center">
        <span>Bib#</span>
      </th>
      <th>
        <span>Name</span>
      </th>
      <th align="center">
        <span>Age</span>
      </th>
      <th align="center">
        <span>Weight</span>
      </th>
      <th align="center">
        <span>Height</span>
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
        Stn 5
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($players as $person) { ?>
        <a>
          <tr onclick="window.document.location='?pid=<?php echo $person['id'] ?>'"
              class="clickable <?php echo ($pid === $person['id']) ? 'warning':''?>">
            <td align="center"><?php echo tripleDigit($person['bib']) ?></td>
            <td><?php echo $person['lastname'].', '.$person['firstname'] ?></td>
            <td align="center"><?php echo $person['age'] ?: '' ?></td>
            <td align="center"><?php echo round($person['weight']) ?: '' ?></td>
            <td align="center"><?php echo round($person['height']) ?: '' ?></td>
            <td align="center"><?php echo round($person['speed'],1) ?: '' ?></td>
            <td align="center"><?php echo round($person['jump'],1) ?: '' ?></td>
            <td align="center"><?php echo round($person['leap'],1) ?: '' ?></td>
            <td align="center"><?php echo round($person['pu']) ?: '' ?></td>
            <td align="center"><?php echo round($person['stn']) ?: '' ?></td>
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
      order: [[0, 'asc']],
      columns: [
        {
          name: 'bib',
          searchable: true
        },
        {
          name: 'full-name',
          searchable: true
        },
        {
          name: 'age',
          searchable: true
        },
        {
          name: 'weight',
          searchable: false
        },
        {
          name: 'height',
          searchable: false
        },
        {
          name: 'speed',
          searchable: false
        },
        {
          name: 'jump',
          searchable: false
        },
        {
          name: 'leap',
          searchable: false
        },
        {
          name: 'pushups',
          searchable: false
        },
        {
          name: 'stn-5',
          searchable: false
        },
      ]
    });
  });
</script>