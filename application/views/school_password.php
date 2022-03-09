<br><br><br>
<?php
error_reporting(0);
//  print_r($schoolData);
  foreach($schoolData as $rows){
    $regn = $rows->schools_regno;
    $id = $rows->schools_id;
    $name = $rows->schools_name;
  }
?>
<div class="container">
  <h4 class="text-center">CHANGE PASSWORD</h4>
<form method="POST" action="<?php echo base_url('index.php/Schools/school_password_update/')?>">
  <input type="hidden" name="sc-id" value="<?php echo $id;?>">
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Change Password:</b></label>
    <input type="password" class="form-control" name="sc_pass" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php echo form_error('sc_pass'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Confirm Password:</b></label>
    <input type="password" class="form-control" name="sc_cpass" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php  echo form_error('sc_cpass');?>
  </div>
  <button type="submit" class="btn btn-primary">Update Password</button> <?php echo $message; ?>
</form>
</div>
