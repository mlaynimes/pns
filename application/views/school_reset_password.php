<?php error_reporting(0)?>
<div class="container">
  <center>
<form method="POST" class="form-signin" action="<?php echo base_url('index.php/Schools/school_reset_confirm/'.$this->uri->segment('3'));?>">
<table class="col-md-10 table">
<tr>
<th colspan="3" class="h3 mb-3 font-weight-normal text-center">School Recovery Password</th>
</tr>
<input type="hidden" name="email" value="<?php echo $this->uri->segment('3')?>"/>
<tr>
<th>New School Password:</th>
<td><input type="password" id="inputEmail" class="form-control" name="pass" placeholder="New School Password"><?php echo form_error('pass');?></td>
</tr>
<tr>
<th>Confirm School Password:</th>
<td><input type="password" id="inputEmail" class="form-control" name="cpass" placeholder="Confirm School Password"><?php echo form_error('cpass');?></td>
</tr>
<tr>
<td ><a href="<?php echo base_url('index.php/Schools/');?>" class="h5">Return</a></td>
<td><input type="submit" class="btn btn-primary btn-lg col-sm-6" value="Change Password"></td>
</tr>
<tr>
<td colspan="3" class="text-center text-danger" role="alert"><?php echo $message; ?></td>
</tr>
</table>
</form>
</div>
</center>

<?php //echo $this->uri->segment('3');?>
