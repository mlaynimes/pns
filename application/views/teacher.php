<?php error_reporting(0);?>
<br><br><br>
<div class="container" style="background-color:#dee2e6">
<h4 class="text-center">TEACHERS REGISTRATION</h4>
<form method="POST" target="_top" action="<?php echo base_url('index.php/Teachers/teacher_register');?>">
  <div class="form-group">
    <input type="hidden" name="schools_id" value="<?php echo $schoolData; ?>">
    <label for="exampleFormControlInput1" class="font-weight-bold">First Name:</label>
    <input type="text" class="form-control" value="<?php echo set_value('te_firstname');?>" name="te_firstname" id="exampleFormControlInput1" placeholder="First Name">
    <br><?php echo form_error('te_firstname');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Middle Name:</label>
    <input type="text" class="form-control" value="<?php echo set_value('te_middlename');?>" name="te_middlename" id="exampleFormControlInput1" placeholder="Middle Name">
    <br><?php echo form_error('te_middlename');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Last Name:</label>
    <input type="text" class="form-control" value="<?php echo set_value('te_lastname');?>" name="te_lastname" id="exampleFormControlInput1" placeholder="Last Name">
    <br><?php echo form_error('te_lastname');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Mobile Number:</label>
    <input type="text" class="form-control" value="<?php echo set_value('te_mobilenumber');?>" name="te_mobilenumber" id="exampleFormControlInput1" placeholder="Mobile Number">
    <br><?php echo form_error('te_mobilenumber');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Email:</label>
    <input type="text" class="form-control" value="<?php echo set_value('te_email');?>" name="te_email" id="exampleFormControlInput1" placeholder="Email">
    <br><?php echo form_error('te_email');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1" class="font-weight-bold">Password:</label>
    <input type="password" class="form-control" value="<?php echo set_value('te_password');?>" name="te_password" id="exampleFormControlInput1" placeholder="Password">
    <br><?php echo form_error('te_password');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="font-weight-bold">Gender:</label>
    <select class="form-control" name="te_gender" id="exampleFormControlSelect1">
    <?php if(empty(set_value('gender'))){
      ?>
      <option></option>
<?php
    }else{
?>
      <option value="<?php echo set_value('gender')?>"><?php echo set_value('gender');?></option>
      <?php
    }?>
      <option></option>
      <option>Male</option>
      <option>Female</option>
    </select>
    <br><?php echo form_error('te_gender');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" class="font-weight-bold">Roles:</label>
    <select class="form-control" name="te_roles" id="exampleFormControlSelect1">
    <?php if(empty(set_value('te_roles'))){?>
    <option></option>
    <?php
    }else{
    ?>

<option value="<?php echo set_value('te_roles')?>"><?php echo set_value('te_roles');?></option>

    <?php
    }
    ?>
      <option></option>
      <option>Admin</option>
      <option>Normal</option>
    </select>
    <br><?php echo form_error('te_roles');?>
  </div>
   <button class="btn btn-primary" type="submit">Register Teacher</button>
   <?php echo $message; ?>
   <br></br>
</form>
</div
