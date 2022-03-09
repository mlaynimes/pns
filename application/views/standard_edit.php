<br><br><br>
<?php
error_reporting(0);
//print_r($info);
foreach ($info as $info){
  $info->standards_id;
  $info->standards_name;
}
?>
<div class="container">
  <h5 class="text-center">Update Standard Level Information</h5>
<form method="POST" action="<?php echo base_url('index.php/Standards/update_standard');?>">
  <input type="hidden" name="standard_id" value="<?php echo $info->standards_id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Update Standard Levels:</label>
    <input type="text" name="standard_name" value="<?php echo $info->standards_name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/><br><?php echo form_error('standard_name');?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary">Update Standard</button>
</form>
<?php echo $message; ?>
</div>
