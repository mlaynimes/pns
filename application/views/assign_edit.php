
<br><br><br>
<div class="container">
<?php
error_reporting(0);
//echo print_r ($assignData);
foreach($assignData as $do){
  $do->teachers_fname;
  $do->teachers_lname;
  $do->teachers_mname;
  $do->standards_name;
  $do->standards_id;
  $do->class_name;
  $do->class_id;
  $do->assign_id;
}
?>
<h5 class="text-center">Update Assign Teacher Classes</h5>
<form method="POST" action="<?php echo base_url('index.php/Assigns/update_assign')?>">
  <input type="hidden" name="assign_ID" value="<?php echo $do->assign_id;?>">
<div class="form-group">
  <label for="exampleFormControlInput1">Teacher Name:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $do->teachers_fname." ".$do->teachers_mname.", ".$do->teachers_lname?>" readonly>
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">Select Standard Level:</label>
  <select name="ass_standard" class="form-control" id="exampleFormControlSelect1">
    <option value="<?php echo $do->standards_id; ?>"><?php echo $do->standards_name; ?></option>

    <?php
    foreach($standardInfo as $info){
    ?>
    <option value="<?php echo $info->standards_id; ?>"><?php echo $info->standards_name; ?></option>
    <?php
  }
    ?>
  </select>
  <?php echo form_error('ass_class');?>
</div>
<div class="form-group">
  <label for="exampleFormControlSelect1">Select Classes Name:</label>
  <select name="ass_class" class="form-control" id="exampleFormControlSelect1">
    <option value="<?php echo $do->class_id; ?>"><?php echo $do->class_name;?></option>
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
<button type="submit" class="btn btn-primary">Update Teacher Class</button>
</form>
<?php echo $message; ?>
</div>
