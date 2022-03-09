<?php error_reporting(0);?>
<br><br><br>
<div class="container">
    <h5 class="text-center">ADD CLASSES NAME</h5>
<form method="POST" action="<?php echo base_url('index.php/Classes/add_classes');?>">
  <input type="hidden" name="school_id" value="<?php echo $SchoolData; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Add Classes:</label>
    <input type="text" name="classes_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/><br><?php echo form_error('classes_name');?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <button type="submit" class="btn btn-primary">Add Classes</button>
  <a href="<?php echo base_url('index.php/Classes/manage_classes');?>">view classes</a>
</form>
<?php echo $message; ?>
