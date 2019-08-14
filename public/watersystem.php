<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>System Name</th>
        <th>Area Council</th>
        <th>Island</th>
        <th>Province</th>
        <th>System Latitude</th>
        <th>System Longitude</th>
        <th>Elevation</th>
        <th>Resource Type</th>
        <th>System Type</th>
        <th>Improved</th>
        <th>Functionality</th>
        <th>User Numbers</th>
        <th>&nbsp;</th>
      </tr>

<?php

$watersystem = WaterSystem::find_all();

?>
      <?php foreach($watersystem as $system) { ?>
      <tr>
        <td><?php echo h($system->system_name); ?></td>
        <td><?php echo h($system->area_council); ?></td>
        <td><?php echo h($system->island); ?></td>
        <td><?php echo h($system->province); ?></td>
        <td><?php echo h($system->latitude); ?></td>
        <td><?php echo h($system->longitude); ?></td>
        <td><?php echo h($system->elevation); ?></td>
        <td><?php echo h($system->resource_type); ?></td>
        <td><?php echo h($system->system_type); ?></td>
        <td><?php echo h($system->improved); ?></td>
        <td><?php echo h($system->functionality); ?></td>
        <td><?php echo h($system->number_users); ?></td>
        <td><?php echo h($system->functionality); ?></td>
        <td><a href="detail.php?id=<?php echo $system->id; ?>">View</a></td>
      </tr>
      <?php } ?>

    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>