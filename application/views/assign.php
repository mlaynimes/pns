<br><br><br>
<?php
error_reporting(0);
  foreach($teacherInfo as $info){
    $info->teachers_id;
    $info->teachers_fname;
    $info->teachers_mname;
    $info->teachers_lname;
  }
?>
<div class="container">
  <h5 class="text-center">Assign Teacher Classes</h5>
<form method="POST" action="<?php echo base_url('index.php/Assigns/add_assign')?>">
  <input type="hidden" name="school_id" value="<?php echo $schoolInfo;?>">
  <input type="hidden" name="teacher_id" value="<?php echo $info->teachers_id?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Teacher Name:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $info->teachers_fname." ".$info->teachers_mname.", ".$info->teachers_lname?>" readonly>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Standard Level:</label>
    <select name="ass_standard" class="form-control" id="exampleFormControlSelect1">
      <option></option>

      <?php
      foreach($standardInfo as $info){
      ?>
      <option value="<?php echo $info->standards_id?>"><?php echo $info->standards_name; ?></option>
      <?php
    }
      ?>
    </select>
    <?php echo form_error('ass_class');?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Classes Name:</label>
    <select name="ass_class" class="form-control" id="exampleFormControlSelect1">
      <option></option>
      <?php
      foreach($classInfo as $info){

      ?>
      <option value="<?php echo $info->class_id?>"><?php echo $info->class_name?></option>
      <?php
    }
      ?>

    </select>
    <?php echo form_error('ass_standard');?>
  </div>
  <button type="submit" class="btn btn-primary">Assign Teacher Class</button>
</form>
<?php echo $message; ?>
</div>
