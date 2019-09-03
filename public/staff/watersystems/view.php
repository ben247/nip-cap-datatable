

<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

// PHP > 7.0 - NULL coalescing operator. Return the first value that exists and is not NULL
// IF system_name is not set, then return false
$system_name = $_GET['system_name'] ?? false;

// Instantiate the class to access its methods

$watersystem = SubTable::find_by_left_join($system_name);

?>

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
        </tr>
      <?php } ?>
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

      <?php foreach($watersystem as $dwssp) { ?>
        <tr>
          <td><?php echo h($dwssp->system_id); ?></td>
          <td><?php echo h($dwssp->dwssp_id); ?></td>
          <td><?php echo h($dwssp->facilitator_cd00a); ?></td>
          <td><?php echo h($dwssp->email_cd00b); ?></td>
          <td><?php echo h($dwssp->date_cd007); ?></td>
          <td><a target="_blank" href="<?php echo h($dwssp->document); ?>">Link</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/edit_dwssp.php?system_id=' . h(u($dwssp->system_id))); ?>">Edit</a></td>
        </tr>
      <?php } ?>
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

      <?php foreach($watersystem as $wc) { ?>
        <tr>
          <td><?php echo h($wc->wc_id); ?></td>
          <td><?php echo h($wc->date_reg); ?></td>
          <td><?php echo h($wc->req_name); ?></td>
          <td><?php echo h($wc->no_men); ?></td>
          <td><?php echo h($wc->no_women); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Edit</a></td>
        </tr>
        <?php } ?>
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
        <th class="toggleDisplay">pH</th>
        <th class="toggleDisplay">Taste/Odor</th>
        <th class="toggleDisplay">Hardness</th>
        <th class="toggleDisplay">Fluoride</th>
        <th class="toggleDisplay">Arsenic</th>
        <th class="toggleDisplay">Copper</th>
        <th class="toggleDisplay">Lead</th>
        <th class="toggleDisplay">Iron</th>
        <th class="toggleDisplay">Ecoli Test</th>
        <th class="toggleDisplay">Ecoli</th>
        <th class="toggleDisplay">Total Ecoli</th>
        <th class="toggleDisplay">Faecalcoli</th>
        <th class="toggleDisplay">Comments</th>
        <th class="toggleDisplay">Shared</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($watersystem as $dwqt) { ?>
        <tr>
          <td><?php echo h($dwqt->s1a_sampleid); ?></td>
          <td><?php echo h($dwqt->s1a1_samplesiteid); ?></td>
          <td><?php echo h($dwqt->s1b_samplesitename); ?></td>
          <td><?php echo h($dwqt->s1c_area_council); ?></td>
          <td><?php echo h($dwqt->s1d_island); ?></td>
          <td><?php echo h($dwqt->s1e_province); ?></td>
          <td><?php echo h($dwqt->s1f_date); ?></td>
          <td><?php echo h($dwqt->s2a_latitude); ?></td>
          <td><?php echo h($dwqt->s2b_longitude); ?></td>
          <td><?php echo h($dwqt->s2c_elevation); ?></td>
          <td><?php echo h($dwqt->s2d_flowrate); ?></td>
          <td><?php echo h($dwqt->s2e_description); ?></td>
          <td><?php echo h($dwqt->s3a_sourcetype); ?></td>
          <td><?php echo h($dwqt->s3b_specsourcetype); ?></td>
          <td><?php echo h($dwqt->s3c_systemtype); ?></td>
          <td><?php echo h($dwqt->s4a_conductivity); ?></td>
          <td><?php echo h($dwqt->s4b_turbidity); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s4c_ph); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s4d_tasteodor); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s4e_hardness); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s5a_fluoride); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s5b_arsenic); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s5c_copper); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s5d_lead); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s5e_iron); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s6a0_ecolitest); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s6a_ecoli); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s6b_totalcoli); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s6c_faecalcoli); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s7a_comments); ?></td>
          <td class="toggleDisplay"><?php echo h($dwqt->s8a_shared); ?></td>
          <td id="expand">Expand</td>
          <td><a class="action" href="<?php echo url_for('/staff/watersystems/new.php'); ?>">Edit</a></td>
        </tr>
        <?php } ?>
    </table>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
