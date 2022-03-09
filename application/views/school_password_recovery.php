<?php error_reporting(0)?>
<div class="container">
  <center>
<form method="POST" class="form-signin" action="<?php echo base_url('index.php/Schools/school_reset');?>">
<table class="col-md-10 table">
<tr>
<th colspan="3" class="h3 mb-3 font-weight-normal text-center">School Recovery Password</th>
</tr>
<tr>
<th>School Email:</th>
<td><input type="text" id="inputEmail" class="form-control" name="sc_email" placeholder="School Email"></td>
<td><?php echo form_error('sc_email');?></td>
</tr>
<tr>
<td ><a href="<?php echo base_url('index.php/Schools/');?>" class="h5">Return</a></td>
<td><input type="submit" class="btn btn-primary btn-lg col-sm-6" value="Reset Password"></td>
</tr>
<tr>
<td colspan="3" class="text-center text-danger" role="alert"><?php echo $message; ?></td>
</tr>
</table>
</form>
</div>
</center>
<
