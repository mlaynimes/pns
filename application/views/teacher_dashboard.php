<?php
//  print_r($schoolData);
foreach($teacherData as $data)
{
$data->teachers_id;
$data->teachers_fname;
$data->teachers_mname;
$data->teachers_lname;
$data->teachers_mobile;
$data->teachers_gender;
$data->teachers_roles;
$data->teachers_email;
$data->schools_name;
}
?>
<br><br><br>
<div class="container px-lg-5">
<div class="col-sm-9">
  <h4 class="text-center">Teacher Dashboard Info</h4>
  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Teacher First Name</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_fname; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Teacher Middle Name</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_mname; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Teacher Last Name</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_lname; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Mobile Number</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_mobile; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Gender</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_gender; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Role</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_roles; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">Email</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->teachers_email; ?></div>
  </div>

  <div class="row mx-lg-n5">
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold">School From</div>
    <div class="col py-3 px-lg-5 border bg-light font-weight-bold"><?php echo $data->schools_name; ?></div>
  </div>
</div>
</div>
