x<br><br><br>
<?php error_reporting(0); ?>
<div class="container">
  <h4 class="text-center">STUDENTS REGISTRATION</h4>
  <form method="POST" id="myForm" action="<?php echo base_url('index.php/Students/add_student');?>">
    <input type="hidden" name="school_id" value="<?php echo $idSchool; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name:</label>
      <input type="text" name="st_fname" placeholder="Enter first Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_fname');?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Middle Name:</label>
      <input type="text" name="st_mname" placeholder="Enter Middle Name" class="form-control" id="exampleInputPassword1">
      <br><?php echo form_error('st_mname');?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Last Name:</label>
      <input type="text" name="st_lname" placeholder="Enter Last Name" class="form-control" id="exampleInputPassword1">
      <br><?php echo form_error('st_lname');?>
    </div>
    <div class="form-group">
  <label for="exampleFormControlSelect1">Gender:</label>
  <select class="form-control" name="st_gender"  id="exampleFormControlSelect1">
    <option></option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
    <div class="form-group">
  <label for="exampleFormControlSelect1">Year of Entry:</label>
  <select class="form-control" name="st_year"  id="exampleFormControlSelect1">
    <option></option>
<?php
  $i = Date('Y');
while($i>2000) {
  echo '<option>'.$i.'</option>';
  $i--;
}

?>
  </select>

</div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Standard Level:</label>
        <select class="form-control" name="st_stand" id="exampleFormControlSelect1">
          <option></option>
          <?php
          foreach($standardData as $data){
          ?>
          <option value="<?php echo $data->standards_id ?>"><?php echo $data->standards_name;?></option>
          <?php
        }
          ?>
        </select>
        <br><?php echo form_error('st_stand');?>
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Class Name:</label>
          <select class="form-control" name="st_class" id="exampleFormControlSelect1">

            <option></option>
            <?php
            foreach($classData as $data){
            ?>
            <option value="<?php echo $data->class_id;?>"><?php echo $data->class_name; ?></option>
            <?php
          }
            ?>
          </select>
          <br><?php echo form_error('st_class');?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Parent Mobile Number:</label>
          <input type="text" name="st_parentno" placeholder="Enter Parent Mobile start with +255 or 255" class="form-control" id="exampleInputPassword1">
          <br><?php echo form_error('st_parentno');?>
        </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Register Number:</label>
      <input type="text" name="st_register_no" placeholder="student register number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_register_no');?>
    </div>  
      <div class="form-group">
      <label for="exampleInputEmail1">Nationality:</label>
      <input type="text" name="st_nationality" placeholder="Student nationality" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_nationality');?>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Name of Parent/Guardian:</label>
      <input type="text" name="st_parent_name" placeholder="Name of parent" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_parent_name');?>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Occupation of Parent/Guardian:</label>
      <input type="text" name="st_parent_occupation" placeholder="Occupation of parent/guardian" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_parent_occupation');?>
    </div>
          <div class="form-group">
      <label for="exampleInputEmail1">Birthday:</label>
      <input type="date" name="st_birthday" placeholder="Birthday" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_birthday');?>
    </div>    
     <button type="submit" class="btn btn-primary">Register Student</button><?php echo $message; ?>
  </form>
</div>