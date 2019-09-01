<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

// PHP > 7.0 - NULL coalescing operator. Return the first value that exists and is not NULL
// IF system_name is not set, then return 1
$system_name = $_GET['system_name'] ?? false;

// Instantiate the class to access its methods

$system = SubTable::find_by_left_join($system_name);

?>

<?php print_r($system); ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

<a class="back-link" href="<?php echo url_for('/staff/watersystems/index.php'); ?>">&laquo; Back to List</a>

  <div>
    <div class="title">
      <h2>NIP-CAP Database</h2>
      <h3>T01A Water System</h3>
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
    <div class="title">
      <h3>T04 DWSSP</h3>
    </div>

    <table id="staff-table">
      <tr>
        <th>System ID</th>
        <th>DWSSP ID</th>
        <th>Facilitator</th>
        <th>Email</th>
        <th>Date</th>
        <th>Document</th>
        <th>&nbsp;</th>
      </tr>

        <tr>
          <td><?php echo h($system->system_id); ?></td>
          <td><?php echo h($system->dwssp_id); ?></td>
          <td><?php echo h($system->facilitator_cd00a); ?></td>
          <td><?php echo h($system->email_cd00b); ?></td>
          <td><?php echo h($system->date_cd007); ?></td>
          <td><a target="_blank" href="<?php echo h($system->document); ?>">Link</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/edit_dwssp.php?system_id=' . h(u($system->system_id))); ?>">Edit</a></td>
        </tr>
    </table>

  </div>
  
  <div>
    <div class="title">
      <h3>T02 Water Committee</h3>
    </div>
    <table id="staff-table">
      <tr>
        <th>Water Committee ID</th>
        <th>Date Registered</th>
        <th>Requested Name</th>
        <th>Number of Men</th>
        <th>Number of Women</th>
        <th>&nbsp;</th>
      </tr>

        <tr>
          <td><?php echo h($system->wc_id); ?></td>
          <td><?php echo h($system->date_reg); ?></td>
          <td><?php echo h($system->req_name); ?></td>
          <td><?php echo h($system->no_men); ?></td>
          <td><?php echo h($system->no_women); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Edit</a></td>
    	  </tr>
    </table>
  </div>
  <div>
    <div class="title">
      <h3>T03 DWQT</h3>
    </div>
    <table id="staff-table">
      <tr>
        <th>Sample ID</th>
        <th>Sample Site ID</th>
        <th>Sample Site Name</th>
        <th>Area Council</th>
        <th>Island</th>
        <th>Province</th>
        <th>Date</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Elevation</th>
        <th>Flow Rate</th>
        <th>Description</th>
        <th>Source Type</th>
        <th>Spec Source Type</th>
        <th>System Type</th>
        <th>Conductivity</th>
        <th>Turbidity</th>
        <th>pH</th>
        <th>Taste/Odor</th>
        <th>Hardness</th>
        <th>Fluoride</th>
        <th>Arsenic</th>
        <th>Copper</th>
        <th>Lead</th>
        <th>Iron</th>
        <th>Ecoli Test</th>
        <th>Ecoli</th>
        <th>Total Ecoli</th>
        <th>Faecalcoli</th>
        <th>Comments</th>
        <th>Shared</th>
        <th>&nbsp;</th>
      </tr>

        <tr>
          <td><?php echo h($system->s1a_sampleid); ?></td>
          <td><?php echo h($system->s1a1_samplesiteid); ?></td>
          <td><?php echo h($system->s1b_samplesitename); ?></td>
          <td><?php echo h($system->s1c_area_council); ?></td>
          <td><?php echo h($system->s1d_island); ?></td>
          <td><?php echo h($system->s1e_province); ?></td>
          <td><?php echo h($system->s1f_date); ?></td>
          <td><?php echo h($system->s2a_latitude); ?></td>
          <td><?php echo h($system->s2b_longitude); ?></td>
          <td><?php echo h($system->s2c_elevation); ?></td>
          <td><?php echo h($system->s2d_flowrate); ?></td>
          <td><?php echo h($system->s2e_description); ?></td>
          <td><?php echo h($system->s3a_sourcetype); ?></td>
          <td><?php echo h($system->s3b_specsourcetype); ?></td>
          <td><?php echo h($system->s3c_systemtype); ?></td>
          <td><?php echo h($system->s4a_conductivity); ?></td>
          <td><?php echo h($system->s4b_turbidity); ?></td>
          <td><?php echo h($system->s4c_ph); ?></td>
          <td><?php echo h($system->s4d_tasteodor); ?></td>
          <td><?php echo h($system->s4e_hardness); ?></td>
          <td><?php echo h($system->s5a_fluoride); ?></td>
          <td><?php echo h($system->s5b_arsenic); ?></td>
          <td><?php echo h($system->s5c_copper); ?></td>
          <td><?php echo h($system->s5d_lead); ?></td>
          <td><?php echo h($system->s5e_iron); ?></td>
          <td><?php echo h($system->s6a0_ecolitest); ?></td>
          <td><?php echo h($system->s6a_ecoli); ?></td>
          <td><?php echo h($system->s6b_totalcoli); ?></td>
          <td><?php echo h($system->s6c_faecalcoli); ?></td>
          <td><?php echo h($system->s7a_comments); ?></td>
          <td><?php echo h($system->s8a_shared); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Edit</a></td>
        </tr>
    </table>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
