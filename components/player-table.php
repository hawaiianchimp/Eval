<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($players as $player) { ?>
      <tr>
        <td><?php echo $player['id'] ?></td>
        <td><?php echo $player['firstname'] ?></td>
        <td><?php echo $player['lastname'] ?></td>
        <td><?php echo $player['age'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>