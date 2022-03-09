<br/><br/><br/>
<div class="container col-md-10 ">
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="12" class="text-center bg-light text-dark">MANAGE TEACHERS</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Gender</th>
      <th scope="col">Role</th>
      <th scope="col" colspan="4">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if($teachersData != Null){
      $n = 1;
      foreach ($teachersData as $row){

    ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $row->teachers_fname; ?></td>
      <td><?php echo $row->teachers_mname; ?></td>
      <td><?php echo $row->teachers_lname; ?></td>
      <td><?php echo $row->teachers_email; ?></td>
      <td><?php echo $row->teachers_mobile; ?></td>
      <td><?php echo $row->teachers_gender; ?></td>
      <td><?php echo $row->teachers_roles; ?></td>
      <td><a href="<?php echo base_url('index.php/Teachers/edit_teachers/'.$row->teachers_id); ?>">Edit</a></td>
      <td><a href="<?php echo base_url('index.php/Teachers/delete_teachers/'.$row->teachers_id); ?>">Delete</a></td>
      <td><a href="<?php echo base_url('index.php/Teachers/password_teachers/'.$row->teachers_id)?>">Change Password</a></td>
      <td><a href="<?php echo base_url('index.php/Assigns/get_assign/'.$row->teachers_id);?>">Assign Class</a></td>
    </tr>
    <?php
    $n++;
  }
}else{
    ?>
<tr>
    <th scope="row" colspan="9" class="text-center">School have not a teacher's information in school's database</th>
</tr>
    <?php
}
    ?>
  </tbody>
</table>
</div>
