<br><br><br>
<?php
 //print_r($StudentData);
?>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="11" class="text-center bg-light text-dark">MANAGE STUDENTS</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Standard Levels</th>
      <th scope="col">Class Name</th>
      <th scope="col">Parent Phone No</th>
      <th scope="col">Other Parent Phone No</th>
      <th scope="col" colspan="2">Option</th>
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
      <td><?php echo $data->students_fname;?></td>
      <td><?php echo $data->students_mname;?></td>
      <td><?php echo $data->students_lname;?></td>
      <td><?php echo $data->students_gender;?></td>
      <td><?php echo $data->standards_name;?></td>
      <td><?php echo $data->class_name;?></td>
      <td><?php echo $data->students_parent_fno;?></td>
      <td><?php echo $data->students_parent_sno;?></td>
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
