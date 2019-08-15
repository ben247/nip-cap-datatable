<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['system'];

  // $args = [];
  // $args['system_name'] = $_POST['system_name'] ?? NULL;
  // $args['area_council'] = $_POST['area_council'] ?? NULL;
  // $args['island'] = $_POST['island'] ?? NULL;
  // $args['province'] = $_POST['province'] ?? NULL;
  // $args['latitude'] = $_POST['latitude'] ?? NULL;
  // $args['longitude'] = $_POST['longitude'] ?? NULL;
  // $args['elevation'] = $_POST['elevation'] ?? NULL;
  // $args['resource_type'] = $_POST['resource_type'] ?? NULL;
  // $args['system_type'] = $_POST['system_type'] ?? NULL;
  // $args['improved'] = $_POST['improved'] ?? NULL;
  // $args['functionality'] = $_POST['functionality'] ?? NULL;
  // $args['number_users'] = $_POST['number_users'] ?? NULL;
  // $args['improved'] = $_POST['improved'] ?? NULL;


  $system = new WaterSystem($args);
  $result = $system->create();

  if($result === true) {
    $new_id = $system->id;
    $_SESSION['message'] = 'The bicycle was created successfully.';
    redirect_to(url_for('/staff/watersystems/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $system = new WaterSystem;
}

?>

<?php $page_title = 'Create Bicycle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Bicycle</h1>

    <?php echo display_errors($system->errors); ?>

    <form action="<?php echo url_for('/staff/watersystems/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bicycle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
