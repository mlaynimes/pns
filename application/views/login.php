<?php error_reporting(0);
  //echo date("d-M-Y");
?>
<div class="container">
  <center>
<form method="POST" class="form-signin" action="<?php echo base_url('index.php/Schools/school_login');?>">
<table class="col-md-10 table">
<tr>
<th colspan="2" class="h3 mb-3 font-weight-normal text-center">School login page</th>
</tr>
<tr>
<th>School Email:</th>
<td><input type="text" id="inputEmail" class="form-control" name="sc_email" value="<?php echo set_value('sc_email');?>" placeholder="School Email"></td>
<td><?php echo form_error('sc_email');?></td>
</tr>
<tr>
<th>School Password:</th>
<td><input type="password" id="inputPassword" class="form-control" value="<?php echo set_value('sc_password');?>" placeholder="School Password" name="sc_password"></td>
<td><?php echo form_error('sc_password');?></td>
</tr>
<tr>
<td ><a href="<?php echo base_url('index.php/Schools/register');?>" class="h5">Register</a></td>
<td><input type="submit" class="btn btn-primary btn-lg col-sm-6" value="Login">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('index.php/Schools/school_password_recovery')?>">reset school password</a></td>
</tr>
<tr>
<td colspan="2" class="text-center text-danger" role="alert"><?php echo $message; ?></td>
</tr>
</table>
</form>
<span class="font-weight-bold"><a href="<?php echo base_url('index.php/Teachers/login_teacher')?>" class="text-decoration-none text-hover-red">login as teacher</a></span>
</div>
</center>

