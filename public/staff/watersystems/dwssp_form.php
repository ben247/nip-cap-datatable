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
      <input type="text" name="system[system_id]" value="<?php echo h($system->system_id); ?>" />
    </dd>
</dl>

<dl>
  <dt>DWSSP ID</dt>
    <dd>
      <input type="text" name="system[dwssp_id]" value="<?php echo h($system->dwssp_id); ?>" />
    </dd>
</dl>

<dl>
  <dt>Facilitator</dt>
  <dd>
      <input type="text" name="system[dwssp_id]" value="<?php echo h($system->dwssp_id); ?>" />
    </dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd>
      <input type="text" name="system[email_cd00b]" value="<?php echo h($system->email_cd00b); ?>" />
    </dd>
</dl>

<dl>
  <dt>Date</dt>
  <dd>
    <input type="text" name="system[date_cd007]" value="<?php echo h($system->date_cd007); ?>" />
  </dd>
</dl>

<dl>
  <dt>Document</dt>
  <dd>
    <input type="text" name="system[document]" value="<?php echo h($system->document); ?>" />
  </dd>
</dl>

