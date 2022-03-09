<br><br><br>
<?php error_reporting(0);
//print_r($schoolData);
foreach($schoolData as $data){
  $id = $data->schools_id;

}
?>
<div class="container">
<form method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php/Schools/school_profile_update');?>">
  <input type="hidden" name="sc-id" value="<?php echo $id; ?>">
  <div class="form-group">
    <img src="<?php echo base_url('uploads/'.$data->schools_image);?>" class="img-thumbnail" width="10%">
    <?php echo form_error('sc_name'); ?>
  </div>


<div class="form-group">
  <label for="exampleInputEmail1"><b>School Upload Image:</b></label>
  <input type="file" class="form-control" name="sc_file" value="<?php echo $name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div>
<button type="submit" class="btn btn-primary">Update School Profile</button> <?php echo $message; ?>
</form>
