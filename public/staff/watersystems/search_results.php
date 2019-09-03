<?php include '../../../private/dbh.php'; ?>

<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Search Results'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div>
    <h2>Results</h2>
    <?php

  if(isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM t01a_water_system WHERE system_name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    echo "There are " . $queryResult . " results!";

    if($queryResult > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<a href='view.php?system_name=" . $row['system_name'] . "'><p>" . $row['system_name'] . "</p></a>";
      }
    } else {
      echo "There are no results matching your search!";
    }
  }

?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>