<br><br><br>
<?php
error_reporting(0);
//print_r($EditTeacherID);
foreach($EditTeacherID as $row){
  $row->teachers_id;
  $row->teachers_fname;
  $row->teachers_mname;
  $row->teachers_lname;
  $row->teachers_mobile;
  $row->teachers_gender;
  $row->teachers_roles;
  $row->teachers_email;
  $row->teachers_password;
}
?>
<div class="container" style="background-color:#dee2e6">
<form method="POST" target="_top" action="<?php echo base_url('index.php/Teachers/update_teachers');?>">
  <div class="form-group">
    <input type="hidden" name="teachers_id" value="<?php echo $row->teachers_id; ?>">
    <label for="exampleFormControlInput1" class="font-weight-bold">First Name:</label>
    <input type="text" class="form-control" name="te_firstname" id="exampleFormControlInput1" placeholder="First Name" value="<?php echo $row->teachers_fname ?>">
    <br><?php echo form_error('te_firstname');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Middle Name:</label>
    <input type="text" class="form-control" name="te_middlename" id="exampleFormControlInput1" placeholder="Middle Name" value="<?php echo $row->teachers_mname ?>">
    <br><?php echo form_error('te_middlename');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Last Name:</label>
    <input type="text" class="form-control" name="te_lastname" id="exampleFormControlInput1" placeholder="Last Name" value="<?php echo $row->teachers_lname ?>" >
    <br><?php echo form_error('te_lastname');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Mobile Number:</label>
    <input type="text" class="form-control" name="te_mobilenumber" id="exampleFormControlInput1" placeholder="Mobile Number" value="<?php echo $row->teachers_mobile?>" >
    <br><?php echo form_error('te_mobilenumber');?>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1" class="font-weight-bold">Gender:</label>
    <select class="form-control" name="te_gender" id="exampleFormControlSelect1">
      <option value="<?php echo $row->teachers_gender?>"><?php echo $row->teachers_gender?></option>
      <option>Male</option>
      <option>Female</option>
    </select>
    <br><?php echo form_error('te_gender');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="font-weight-bold">Roles:</label>
    <select class="form-control" name="te_roles" id="exampleFormControlSelect1">
      <option value="<?php echo $row->teachers_roles?>"><?php echo $row->teachers_roles?></option>
      <option>Admin</option>
      <option>Normal</option>
    </select>
    <br><?php echo form_error('te_roles');?>
  </div>
   <button class="btn btn-primary" type="submit">Update Teacher</button>
   <?php echo $message; ?>
   <br></br>
</form>
</div
