<br><br><br>
<?php error_reporting(0); ?>
<div class="container">
    <?php
  foreach ($studentData as $row) {
    $row->students_id;
    $row->students_fname;
    $row->students_mname;
    $row->students_lname;
    $row->students_parent_fno;
    $row->students_register_no;
    $row->students_birthday;
    $row->students_parent_occupation;
    $row->students_year_entry;
    $row->students_nationality;
    $row->students_parent_name;
    $row->students_gender;
    $row->standards_id;
    $row->standards_name;
    $row->class_id;
    $row->class_name;

  }
 // print_r($studentData);
  ?>
  <h4 class="text-center">UPDATE STUDENT REGISTRATION</h4>
  <form method="POST" id="myForm" action="<?php echo base_url('index.php/Students/update_student');?>">
    <input type="hidden" name="students_id" value="<?php echo $row->students_id?>">
    <input type="hidden" name="school_id" value="<?php echo $idSchool; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div class="form-group">
      <label for="exampleInputEmail1">First Name:</label>
      <input type="text" name="st_fname" value="<?php echo $row->students_fname ?>" placeholder="Enter first Name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_fname');?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Middle Name:</label>
      <input type="text" name="st_mname" value="<?php echo $row->students_mname ?>" placeholder="Enter Middle Name" class="form-control" id="exampleInputPassword1">
      <br><?php echo form_error('st_mname');?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Last Name:</label>
      <input type="text" name="st_lname" value="<?php echo $row->students_lname ?>" placeholder="Enter Last Name" class="form-control" id="exampleInputPassword1">
      <br><?php echo form_error('st_lname');?>
    </div>
    <div class="form-group">
  <label for="exampleFormControlSelect1">Gender:</label>
  <select class="form-control" name="st_gender"  id="exampleFormControlSelect1">
    <option><?php echo $row->students_gender ?></option>
    <option>Male</option>
    <option>Female</option>
  </select>
</div>
    <div class="form-group">
  <label for="exampleFormControlSelect1">Year of Entry:</label>
  <select class="form-control" name="st_year"   id="exampleFormControlSelect1">
    <option><?php echo $row->students_year_entry ?></option>
<?php
  $i = 2025;
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
          <option value="<?php echo $row->standards_id?>"><?php echo $row->standards_name?></option>
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

            <option value="<?php echo $row->class_id?>"><?php echo $row->class_name?></option>
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
          <input type="text" name="st_parentno" value="<?php echo $row->students_parent_fno?>" placeholder="Enter Parent Mobile start with +255 or 255" class="form-control" id="exampleInputPassword1">
          <br><?php echo form_error('st_parentno');?>
        </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Register Number:</label>
      <input type="text" name="st_register_no" value="<?php echo $row->students_register_no ?>" placeholder="student register number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_register_no');?>
    </div>  
      <div class="form-group">
      <label for="exampleInputEmail1">Nationality:</label>
      <input type="text" name="st_nationality" value="<?php echo $row->students_nationality ?>" placeholder="Student nationality" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_nationality');?>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Name of Parent/Guardian:</label>
      <input type="text" name="st_parent_name" value="<?php echo $row->students_parent_name?>" placeholder="Name of parent" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_parent_name');?>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Occupation of Parent/Guardian:</label>
      <input type="text" name="st_parent_occupation" value="<?php echo $row->students_parent_occupation?>" placeholder="Occupation of parent/guardian" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_parent_occupation');?>
    </div>
          <div class="form-group">
      <label for="exampleInputEmail1">Birthday:</label>
      <input type="date" name="st_birthday" value="<?php echo $row->students_birthday?>" placeholder="Birthday" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <br><?php echo form_error('st_birthday');?>
    </div>    
     <button type="submit" class="btn btn-primary">Register Student</button><?php echo $message; ?>
  </form>
</div>