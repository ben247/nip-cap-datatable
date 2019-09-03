<?php
include '../../../private/dbh.php';
require_once('../../../private/initialize.php');

require_login();

?>

<?php $page_title = 'Search'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div>
    <h2>Search for a Water System</h2>

    <form action="<?php echo url_for('/staff/watersystems/search_results.php'); ?>" method="POST">
      <input type="text" name="search" placeholder="Search" />
      <div id="operations">
        <input type="submit" name="submit-search" value="Search" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>