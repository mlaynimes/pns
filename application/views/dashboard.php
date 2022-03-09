<?php
//  print_r($schoolData);
foreach($schoolData as $data)
{
  $data->schools_id;
  $data->schools_name;
  $data->schools_regno;
  $data->schools_pass;
  $data->schools_image;
  $data->schools_email;
}
?>
<br><br>
<div class="container px-lg-5">
  <div class="col-sm-9">

    <div class="row mx-lg-n5">
      <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><img src="<?php echo base_url('uploads/'.$data->schools_image);?>" alt="School Logo" class="img-thumbnail"></div>
    </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">School Name</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->schools_name; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">School Registration Number</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->schools_regno; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">School Email</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->schools_email; ?></div>
  </div>

</div>
</div>
