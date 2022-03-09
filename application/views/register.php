<?php error_reporting(0)?>
<div class="container">
  <center>
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php/Schools/school_register');?>">
<table class="col-md-12 table">
<tr>
<th colspan="3" class="h3 mb-3 font-weight-normal text-center">School registration page</th>
</tr>
<tr>
<th>School Name:</th>
<td><input type="text" class="form-control" value="<?php echo set_value('sc_name');?>" name="sc_name" placeholder="School Name"></td>
<td class="text-danger"><?php  echo form_error('sc_name');?></td>
</tr>
<tr>
<th>School Registration Number:</th>
<td><input type="text" class="form-control" value="<?php echo set_value('sc_reg');?>" name="sc_reg" placeholder="School Registration Number"></td>
<td class="text-danger"><?php  echo form_error('sc_reg');?></td>
</tr>
<tr>
<th>School Upload Image:</th>
<td><input type="file" class="form-control" value="<?php echo set_value('sc_file');?>" name="sc_file" placeholder="School Profile"></td>
<td class="text-danger"><?php  echo form_error('sc_file');?></td>
</tr>
<tr>
<th>School Email:</th>
<td><input type="text" class="form-control" value="<?php echo set_value('sc_email');?>" name="sc_email" placeholder="School Email"></td>
<td class="text-danger"><?php  echo form_error('sc_email');?></td>
</tr>
<tr>
<th>School Password:</th>
<td><input type="password" class="form-control" value="<?php echo set_value('sc_password');?>" name="sc_password" placeholder="School Password"></td>
<td class="text-danger"><?php  echo form_error('sc_password');?></td>
</tr>
<tr>
<th>School Confirm Password:</th>
<td><input type="password" class="form-control" value="<?php echo set_value('sc_cpassword');?>" name="sc_cpassword" placeholder="Schoool Confirm Password"></td>
<td class="text-danger"><?php  echo form_error('sc_cpassword');?></td>
</tr>
<tr>
<td><a href="<?php echo base_url('index.php/Schools/');?>" class="h5">Login</a></td>
<td><input type="submit" class="btn btn-primary btn-lg col-md-7" value="Register"></td>
</tr>
<tr>
<td colspan="3" class="text-center text-success" role="alert"><?php echo $message; ?></td>
</tr>
</table>
</form>
</center>
</div>
