<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$system_name = $_GET['system_name'] ?? 1; // PHP > 7.0

$system = Dwssp::find_by_left_join($system_name);

// left join


?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

<div id="content">
  <div class="bicycles listing">
    <div class="intro">
      <h2>NIP-CAP Water Systems</h2>
      <h3>table - t01a_water_system</h3>
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

  <div>

  <table id="staff-table">
      <tr>
        <th>System ID</th>
        <th>DWSSP ID</th>
        <th>Facilitator</th>
        <th>Email</th>
        <th>Date</th>
        <th>Document</th>
      </tr>

        <tr>
          <td><?php echo h($system->system_id); ?></td>
          <td><?php echo h($system->dwssp_id); ?></td>
          <td><?php echo h($system->facilitator_cd00a); ?></td>
          <td><?php echo h($system->email_cd00b); ?></td>
          <td><?php echo h($system->date_cd007); ?></td>
          <td><?php echo h($system->document); ?></td>
    	  </tr>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
