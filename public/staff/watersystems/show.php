<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$system = WaterSystem::find_by_id($id);

?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

<div id="content">
  <div class="bicycles listing">
    <div class="intro">
      <h2>NIP-CAP Water Systems</h2>
      <h3>table - t01a_water_system</h3>
    </div>

  	<table class="list">
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
      </tr>

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
    	  </tr>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
