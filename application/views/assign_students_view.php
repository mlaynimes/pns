<br/><br/><br/>
<?php
//error_reporting(0);
//print_r($studentsData);
//print_r($standardData);
//print_r($classData);

foreach($studentsData as $row){
  $class = $row->class_name;
  $standard = $row->standards_name;
}

$cla = $this->uri->segment('3');
$sta = $this->uri->segment('4');
?>

<div class="container">
<table class="table table-bordered">
<form method="post" id="checkGroup" action="<?php echo base_url('index.php/Assigns/assign_change_class/'.$cla.'/'.$sta)?>">
  <thead class="thead-dark">
  <?php if(empty($studentsData)){?>
    <tr>
    <th scope="col" colspan="5" class="text-center bg-info text-white mydatatable" role="alert">STUDENTS ARE ALREADY UPDATED THERE ARE CLASSES</th>
  </tr>
  <?php
  }else{?>
    <tr>
    <th scope="col" colspan="5" class="text-center bg-light text-dark mydatatable">CLASS <?php echo strtoupper($standard.','.$class);?> STUDENTS</th>
  </tr>
 <?php }?>
  <tr>
  <th scope="col" colspan="4" class="text-center bg-light text-dark mydatatable">
  <select name="standard" required>
  <option value="">---Choose Standard Level--</option>
  <?php
  foreach($standardData as $standard){
    ?>
  <option value="<?php echo $standard->standards_id?>"><?php echo $standard->standards_name;?></option>
    <?php
  }
  ?>
  </select>
  <select name="class" required>
  <option value="">---Choose Class List--</option>
  <?php
  foreach($classData as $class){
    ?>

<option value="<?php echo $class->class_id; ?>"><?php echo $class->class_name;?></option>
    <?php
  }
  ?>
  </select>
  </th>
  <th scope="col" class="text-center bg-light text-dark mydatatable"><input type="submit" id="checkGroup" class="btn btn-primary" name="submit" value="Change Class Now"></th>
   </tr> 
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col"><input type="checkbox" id="checkall" value=''>&nbsp; Select All</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $n = 1;
    foreach($studentsData as $rows){
    ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->students_fname; ?></td>
      <td><?php echo $rows->students_mname; ?></td>
      <td><?php echo $rows->students_lname; ?></td>
      <td><input type="checkbox" class="checkbox" id="required_group" name="studentid[]"  value="<?php echo $rows->students_id;?>"/></td>
    </tr>
  <?php
$n++;
}
  ?>
</form>
  <tr>
    <td colspan="5"><a href="<?php echo base_url('index.php/assigns/assign_student_class')?>">Back to page</a></td>
  </tr>
  </tbody>
</table>
</div>
<script>
//delete multiple
$(document).ready(function(){
  $("#checkall").change(function(){

var checked = $(this).is(':checked');
if(checked){
   $(".checkbox").each(function(){
       $(this).prop("checked",true);
   });
}else{
   $(".checkbox").each(function(){
       $(this).prop("checked",false);
   });
}
});
});
      // Changing state of CheckAll checkbox 
      $(".checkbox").click(function(){

if($(".checkbox").length == $(".checkbox:checked").length) {
    $("#checkall").prop("checked", true);
} else {
    $("#checkall").prop("checked",false);
}
//end changing state of checkAll checkbox
});



//get check atleast checkbox selected
function validateGrp() {
  let things = document.querySelectorAll('#required_group')
  let checked = 0;
  for (let thing of things) {
    thing.checked && checked++
  }
  if (checked) {
    things[things.length - 1].setCustomValidity("");
    document.getElementById('checkGroup').submit();
  } else {
    things[things.length - 1].setCustomValidity("You must check at least one checkbox");
    things[things.length - 1].reportValidity();
  }
}

document.querySelector('[name=submit]').addEventListener('click', () => {
  validateGrp()
});
//end check atleast checkbox selected
</script>