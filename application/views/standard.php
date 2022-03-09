<?php error_reporting(0);?>
<br><br><br>
<div class="container">
  <h5 class="text-center">ADD STANDARD LEVEL</h5>
<form method="POST" action="<?php echo base_url('index.php/Standards/add_standard');?>">
  <input type="hidden" name="school_id" value="<?php echo $SchoolData; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Add Standard Levels:</label>
    <input type="text" name="standard_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/><br><?php echo form_error('standard_name');?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary">Add Standard</button>
  <a href="<?php echo base_url('index.php/Standards/manage_standard');?>">view standard</a>
</form>
<?php echo $message; ?>
