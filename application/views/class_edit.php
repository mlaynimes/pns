<br><br><br>
<?php
error_reporting(0);
//print_r($info);
foreach ($info as $info){
  $info->class_id;
  $info->class_name;
}
?>
<div class="container">
  <h5 class="text-center">Update Class Information</h5>
<form method="POST" action="<?php echo base_url('index.php/Classes/update_class');?>">
  <input type="hidden" name="class_id" value="<?php echo $info->class_id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Class:</label>
    <input type="text" name="class_name" value="<?php echo $info->class_name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/><br><?php echo form_error('class_name');?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary">Update Class</button>
</form>
<?php echo $message; ?>
</div>
