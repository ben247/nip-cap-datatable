<?php require_once('../private/initialize.php'); ?>

<?php

  // Get requested ID

  $id = $_GET['id'] ?? false;

  if(!$id) {
    redirect_to('watersystem.php');
  }

  // Find watersystem using ID

  $system = WaterSystem::find_by_id($id);

?>

<?php $page_title = 'Detail: ' . $system->name(); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <a href="watersystem.php">Back to Water System list</a>

  <div id="page">

    <div class="detail">
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
        <dt>Latitude</dt>
        <dd><?php echo h($system->latitude); ?></dd>
      </dl>
      <dl>
        <dt>Longitude</dt>
        <dd><?php echo h($system->longitude); ?></dd>
      </dl>
      <dl>
        <dt>Elevation</dt>
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
        <dt>User Numbers</dt>
        <dd><?php echo h($system->number_users); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
