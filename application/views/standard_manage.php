<?php //print_r ($standardLevel); ?>
<br><br><br>
<div class="container">
<?php
  if($standardLevel != Null){
    $n=1;
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="10" class="text-center bg-light text-dark">MANAGE STANDARD LEVELS</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Standard Levels</th>
      <th scope="col" colspan="2" class="text-center">Options</th>
    </tr>
  </thead>

  <?php
foreach($standardLevel as $row){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $row->standards_name; ?></td>
      <td><a href="<?php echo base_url('index.php/Standards/edit_standard/'.$row->standards_id);?>">Edit</a></td>
      <td><a href="<?php echo base_url('index.php/Standards/delete_standard/'.$row->standards_id);?>">Delete</a></td>
    </tr>
  </tbody>

  <?php
  $n++;
}
  ?>

</table>
<?php
}else{
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Standard Levels</th>
      <th scope="col" colspan="2" class="text-center">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4">There are no records for School's Standard levels</td>
    </tr>
  </tbody>
  </table>
<?php
}
?>
</div>
