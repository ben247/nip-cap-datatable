<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($system)) {
  redirect_to(url_for('/staff/watersystems/index.php'));
}
?>

<dl>
  <dt>System ID</dt>
    <dd>
      <input type="text" name="system[system_name]" value="<?php echo h($system->system_name); ?>" />
    </dd>
</dl>

<dl>
  <dt>DWSSP ID</dt>
  <dd>
    <select name="system[area_council]">
      <option value=""></option><?php foreach(WaterSystem::AREA_COUNCIL as $area_council) { ?>
      <option value="<?php echo $area_council; ?>" <?php if($system->area_council == $area_council) { echo 'selected'; } ?>><?php echo $area_council; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Facilitator</dt>
  <dd>
    <select name="system[island]">
      <option value=""></option><?php foreach(WaterSystem::ISLAND as $island) { ?>
      <option value="<?php echo $island; ?>" <?php if($system->island == $island) { echo 'selected'; } ?>><?php echo $island; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd>
    <select name="system[province]">
      <option value=""></option><?php foreach(WaterSystem::PROVINCE as $province) { ?>
      <option value="<?php echo $province; ?>" <?php if($system->province == $province) { echo 'selected'; } ?>><?php echo $province; ?></option><?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Date</dt>
  <dd>
    <input type="text" name="system[latitude]" value="<?php echo h($system->latitude); ?>" />
  </dd>
</dl>

<dl>
  <dt>Document</dt>
  <dd>
    <input type="text" name="system[longitude]" value="<?php echo h($system->longitude); ?>" />
  </dd>
</dl>

