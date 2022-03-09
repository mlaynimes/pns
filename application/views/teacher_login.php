<?php error_reporting(0)?>
<div class="container">
  <center>
<form method="POST" class="form-signin" action="<?php echo base_url('index.php/Teachers/teacher_login_ac');?>">
<table class="col-md-10 table">
<tr>
<th colspan="2" class="h3 mb-3 font-weight-normal text-center">Teacher Login Page</th>
</tr>
<tr>
<th>Teacher Email:</th>
<td><input type="text" id="inputEmail" class="form-control" value="<?php echo set_value('tc_email');?>" name="tc_email" placeholder="Teacher Email"></td>
<td><?php echo form_error('tc_email');?></td>
</tr>
<tr>
<th>Teacher Password:</th>
<td><input type="password" id="inputPassword" class="form-control" placeholder="Teacher Password" value="<?php echo set_value('tc_password');?>" name="tc_password"></td>
<td><?php echo form_error('tc_password');?></td>
</tr>
<tr>
<td ><span class="font-weight-bold"><a href="<?php echo base_url('index.php/Schools')?>" class="text-decoration-none text-hover-red">Login School Page</a></span></td>
<td><input type="submit" class="btn btn-primary btn-lg col-sm-10" value="Login"></td>
</tr>
<tr>
<td colspan="2" class="text-center text-danger" role="alert"><?php echo $message; ?></td>
</tr>
</table>
</form>
</center>
