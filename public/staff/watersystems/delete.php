<?php

require_once('../../../private/initialize.php');

require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}

$id = $_GET['id'];
$system = WaterSystem::find_by_id($id);
if($system == false) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}

if(is_post_request()) {

  // Delete water system
  $result = $system->delete();

  $session->message('The water system was deleted successfully.');
  redirect_to(url_for('/staff/watersystems/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Delete'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h2>Delete Water System</h2>
    <p>Are you sure you want to delete this Water System?</p>
    <p class="item"><?php echo h($system->name()); ?></p>

    <form action="<?php echo url_for('/staff/watersystems/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
