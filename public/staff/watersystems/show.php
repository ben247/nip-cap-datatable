<?php require_once('../../../private/initialize.php'); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$system = WaterSystem::find_by_id($id);

?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle show">

    <h1>Bicycle:</h1>

    <div class="attributes">
      <dl>
        <dt>System Name</dt>
        <dd><?php echo h($system->system_name); ?></dd>
      </dl>
      <dl>
        <dt>Area Council</dt>
        <dd><?php echo h($system->area_council); ?></dd>
      </dl>
      <dl>
        <dt>Island</dt>
        <dd><?php echo h($system->island); ?></dd>
      </dl>
      <dl>
        <dt>Province</dt>
        <dd><?php echo h($system->province); ?></dd>
      </dl>
      <dl>
        <dt>System Latitude</dt>
        <dd><?php echo h($system->latitude); ?></dd>
      </dl>
      <dl>
        <dt>System Longitude</dt>
        <dd><?php echo h($system->longitude); ?></dd>
      </dl>
      <dl>
        <dt>Elevatione</dt>
        <dd><?php echo h($system->elevation); ?></dd>
      </dl>
      <dl>
        <dt>Resource Type</dt>
        <dd><?php echo h($system->resource_type); ?></dd>
      </dl>
      <dl>
        <dt>System Type</dt>
        <dd><?php echo h($system->system_type); ?></dd>
      </dl>
      <dl>
        <dt>Improved</dt>
        <dd><?php echo h($system->improved); ?></dd>
      </dl>
      <dl>
        <dt>Functionality</dt>
        <dd><?php echo h($system->functionality); ?></dd>
      </dl>
      <dl>
        <dt>User Number</dt>
        <dd><?php echo h($system->number_users); ?></dd>
      </dl>
    </div>

  </div>

</div>
