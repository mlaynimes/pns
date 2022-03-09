<br><br><br>
<?php
error_reporting(0);
//  print_r($schoolData);
  foreach($schoolData as $rows){
    $regn = $rows->schools_regno;
    $id = $rows->schools_id;
    $name = $rows->schools_name;
  }
?>
<div class="container">
  <h4 class="text-center">CHANGE SCHOOL INFO</h4>
<form method="POST" action="<?php echo base_url('index.php/Schools/school_info_update/')?>">
  <input type="hidden" name="sc-id" value="<?php echo $id;?>">
  <div class="form-group">
    <label for="exampleInputEmail1"><b>School Name:</b></label>
    <input type="text" class="form-control" name="sc_name" value="<?php echo $name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php echo form_error('sc_name'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>School Registration:</b></label>
    <input type="text" class="form-control" name="sc_reg" value="<?php echo $regn; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php  echo form_error('sc_reg');?>
  </div>
  <button type="submit" class="btn btn-primary">Update School Info</button> <?php echo $message; ?>
</form>
</div>
