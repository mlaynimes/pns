<?php error_reporting(0);
?>
<br><br><br>
<?php //print_r($EditPassword);
  foreach($EditPassword as $rows){
    $teacherid = $rows->teachers_id;
    $teacherfname = $rows->teachers_fname;
    $teachermname = $rows->teachers_mname;
    $teacherlname = $rows->teachers_lname;
  }
?>
<div class="container" style="background-color:#dee2e6">
<h4 class="text-center">CHANGE TEACHER PASSWORD</h4>
<form method="POST" target="_top" action="<?php echo base_url('index.php/Teachers/update_password_teacher');?>">
  <input type="hidden" name="tc_id" value="<?php echo $teacherid; ?>">

  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Teacher Full Name:</label>
    <input type="text" class="form-control" value="<?php echo $teacherfname.' '.$teachermname.' '.$teacherlname?>" name="full name" id="exampleFormControlInput1" placeholder="Confirm Teacher Password" readonly>
    <br><?php echo form_error('tc_cpassword');?>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Teacher Password:</label>
    <input type="password" class="form-control" name="tc_password" id="exampleFormControlInput1" placeholder="Teacher Password">
    <br><?php echo form_error('tc_password');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Confirm Teacher Password:</label>
    <input type="password" class="form-control" name="tc_cpassword" id="exampleFormControlInput1" placeholder="Confirm Teacher Password">
    <br><?php echo form_error('tc_cpassword');?>
  </div>
   <button class="btn btn-primary" type="submit">Change Teacher Password</button>
   <?php echo $message; ?>
   <br></br>
</form>
</div
