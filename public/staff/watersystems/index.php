<?php require_once('../../../private/initialize.php'); ?>

<?php
  
// Find all bicycles;
$watersystem = WaterSystem::find_all();
  
?>
<?php $page_title = 'Bicycles'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <h1>Bicycles</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Add Bicycle</a>
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
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

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
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/show.php?id=' . h(u($system->id))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/edit.php?id=' . h(u($system->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/delete.php?id=' . h(u($system->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
