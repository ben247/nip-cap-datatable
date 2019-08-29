<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>

<?php

// pagination
$current_page = $_GET['page'] ?? 1;
$per_page = 5;
$total_count = WaterSystem::count_all();

$pagination = new Pagination($current_page, $per_page, $total_count);

// find all water systems;
// use pagination instead
// $watersystem = WaterSystem::find_all();
  
$sql = "SELECT * FROM t01a_water_system ";
$sql .= "LIMIT {$per_page} ";
$sql .= "OFFSET {$pagination->offset()}";

$watersystem = WaterSystem::find_by_sql($sql);

?>

<?php $page_title = 'NIP-CAP Water Systems'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="bicycles listing">
    <div class="intro">
      <h2>NIP-CAP Database</h2>
      <h3>T01A Water System</h3>
    </div>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Add new Water System</a>
    </div>

  	<table id="staff-table">
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
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/view.php?system_name=' . h(u($system->system_name))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/edit.php?id=' . h(u($system->id))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/delete.php?id=' . h(u($system->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
    </table>
    
<?php
$url = url_for('/staff/watersystems/index.php');
echo $pagination->page_links($url);
?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
