<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['system_id'])) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}
$id = $_GET['id'];

$system = SubTable::find_by_id_dwssp($id);
if($system == false) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}

if(is_post_request()) {

  // Save record using post parameters
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

  $system->merge_attributes($args);
  $result = $system->update();

  if($result === true) {
    $session->message('The DWSSP was updated successfully.');
    redirect_to(url_for('/staff/watersystems/show.php?system_id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Water System'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div>
    <h2>Edit Water System</h2>

    <?php echo display_errors($system->errors); ?>

    <form action="<?php echo url_for('/staff/watersystems/edit.php?system_id=' . h(u($id))); ?>" method="post">

      <?php include('dwssp_form.php'); ?>

      <div id="operations">
        <input type="submit" value="Save" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
