<br><br><br>
<?php
 //print_r($StudentData);
?>
<div class="container col-md-12 text-center">
<table class="table" id="dataTable">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="16" class="text-center bg-light text-dark table table-striped table-bordered">MANAGE STUDENTS</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Registration Number</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Standard Levels</th>
      <th scope="col">Class Name</th>
      <th scope="col">Year of entry</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Nationality</th>
      <th scope="col">Parent/Guardian Name</th>
      <th scope="col">Parent/Guardian Occupation</th>
      <th scope="col">Parent Mobile Number</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
<tbody>
  <?php
  if($StudentData != Null){
    $n = 1;
    foreach($StudentData as $data){
  ?>

    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $data->students_register_no;?></td>
      <td><?php echo $data->students_fname;?></td>
      <td><?php echo $data->students_mname;?></td>
      <td><?php echo $data->students_lname;?></td>
      <td><?php echo $data->students_gender;?></td>
      <td><?php echo $data->standards_name;?></td>
      <td><?php echo $data->class_name;?></td>
      <td><?php echo $data->students_year_entry;?></td>
      <td><?php echo $data->students_birthday;?></td>
      <td><?php echo $data->students_nationality;?></td>
      <td><?php echo $data->students_parent_name;?></td>
      <td><?php echo $data->students_parent_occupation;?></td>
      <td><?php echo $data->students_parent_fno;?></td>
      <td><a href="<?php echo base_url('index.php/Students/edit_student/').$data->students_id?>">Edit</a></td>
      <td><a href="<?php echo base_url('index.php/Students/delete_student/').$data->students_id?>">Delete</a></td>
    </tr>


    <?php
    $n++;
  }
  }else{
    ?>
    <tr>
      <th scope="row" colspan="9">School have not Database for students</th>
    </tr>
    <?php
  }
    ?>
  </tbody>
</table>
</div>
