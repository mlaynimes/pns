<br><br><br>
<?php //print_r ($infoAssign); ?>
<div class= 'container'>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="5" class="text-center bg-light text-dark">TEACHERS ASSIGNED CLASSES</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full name</th>
      <th scope="col">Standard, Class</th>
      <th scope="col" colspan="2">Option</th>
    </tr>
  </thead>
  <tbody>
  <?php
    if($infoAssign != Null){
      $n = 1;
      foreach($infoAssign as $data){

  ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $data->teachers_fname.' '.$data->teachers_mname.', '.$data->teachers_lname?></td>
      <td><?php echo $data->standards_name.', '.$data->class_name?></td>
      <td><a href="<?php echo base_url('index.php/Assigns/edit_assign/'.$data->assign_id);?>">Edit</a></td>
      <td><a href="<?php echo base_url('index.php/Assigns/delete_assign/'.$data->assign_id);?>">Delete</a></td>
    </tr>
    <?php
    $n++;
  }
}else{
    ?>
    <tr>
    <th scope="row" colspan="5" class="text-center">The School have no records for Teachers assigned classes</th>
  </tr>
    <?php
  }
    ?>
  </tbody>
</table>
</div>
