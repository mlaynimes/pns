<?php //print_r ($classLists); ?>
<br><br><br>
<div class="container">
<?php
  if($classLists != Null){
    $n=1;
?>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="10" class="text-center bg-light text-dark">MANAGE CLASSES NAME</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class Lists</th>
      <th scope="col" colspan="2" class="text-center">Options</th>
    </tr>
  </thead>

  <?php
foreach($classLists as $row){
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $row->class_name; ?></td>
      <td><a href="<?php echo base_url('index.php/Classes/edit_class/'.$row->class_id);?>">Edit</a></td>
      <td><a href="<?php echo base_url('index.php/Classes/delete_class/'.$row->class_id);?>">Delete</a></td>
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
      <th scope="col">Class Lists</th>
      <th scope="col" colspan="2" class="text-center">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="4" class="text-center">There are no records for School's Class Lists</td>
    </tr>
  </tbody>
  </table>
<?php
}
?>
</div>
