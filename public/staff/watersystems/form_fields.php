<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($system)) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}
?>

<dl>
  <dt>System Name</dt>
    <dd>
      <input type="text" name="system[system_name]" value="<?php echo h($system->system_name); ?>" />
    </dd>
</dl>

<dl>
  <dt>Area Council</dt>
  <dd>
    <select name="system[area_council]">
      <option value=""></option><?php foreach(WaterSystem::AREA_COUNCIL as $area_council) { ?>
      <option value="<?php echo $area_council; ?>" <?php if($system->area_council == $area_council) { echo 'selected'; } ?>><?php echo $area_council; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Island</dt>
  <dd>
    <select name="system[island]">
      <option value=""></option><?php foreach(WaterSystem::ISLAND as $island) { ?>
      <option value="<?php echo $island; ?>" <?php if($system->island == $island) { echo 'selected'; } ?>><?php echo $island; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Province</dt>
  <dd>
    <select name="system[province]">
      <option value=""></option><?php foreach(WaterSystem::PROVINCE as $province) { ?>
      <option value="<?php echo $province; ?>" <?php if($system->province == $province) { echo 'selected'; } ?>><?php echo $province; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>System Latitude</dt>
  <dd>
    <input type="text" name="system[latitude]" value="<?php echo h($system->latitude); ?>" />
  </dd>
</dl>

<dl>
  <dt>System Longitude</dt>
  <dd>
    <input type="text" name="system[longitude]" value="<?php echo h($system->longitude); ?>" />
  </dd>
</dl>

<dl>
  <dt>Elevation</dt>
    <dd>
      <input type="text" name="system[elevation]" value="<?php echo h($system->elevation); ?>" />
    </dd>
</dl>

<dl>
  <dt>Resource Type</dt>
    <dd>
      <select name="system[resource_type]">
        <option value=""></option><?php foreach(WaterSystem::RESOURCE_TYPE as $resource_type) { ?>
        <option value="<?php echo $resource_type; ?>" <?php if($system->resource_type == $resource_type) { echo 'selected'; } ?>><?php echo $resource_type; ?></option><?php } ?>
      </select>
    </dd>
</dl>

<dl>
  <dt>System Type</dt>
    <dd>
      <select name="system[system_type]">
        <option value=""></option><?php foreach(WaterSystem::SYSTEM_TYPE as $system_type) { ?>
        <option value="<?php echo $system_type; ?>" <?php if($system->system_type == $system_type) { echo 'selected'; } ?>><?php echo $system_type; ?></option><?php } ?>
      </select>
    </dd>
</dl>

<dl>
  <dt>Improved</dt>
    <dd>
      <input type="text" name="system[improved]" value="<?php echo h($system->improved); ?>" />
    </dd>
</dl>

<dl>
  <dt>Functionality</dt>
    <dd>
      <input type="text" name="system[functionality]" value="<?php echo h($system->functionality); ?>" />
    </dd>
</dl>

<dl>
  <dt>User Number</dt>
    <dd>
      <input type="text" name="system[number_users]" value="<?php echo h($system->number_users); ?>" />
    </dd>
</dl>