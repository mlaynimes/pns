<style></style>
<br><br><br>
<?php error_reporting(0); //print_r($teacherData); ?>
<div class="container">
<div class="form-group">
<label for="exampleFormControlSelect2">Select exam/test type:</label>
    <select class="form-control"  id="test" name="form_select" onchange="showDiv('hidden_div', this)">
        <option value="0">Select exam/test to record</option>
        <?php //print_r($examData);
        foreach($examData as $rows){

        ?>
        <option value="<?php echo $rows->exam_id; ?>"><?php echo $rows->exam_info;?></option>
        <?php
        }
        ?>
    </select>
    </div>
    <div id="hidden_div" style="display: none">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Standard, Class</th>
      <th scope="col">Year of Entry</th>
      <th scope="col" colspan="4" class="text-center">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($teacherData as $row){
      $pass = $row->teachers_roles;
    }
    ?>

<?php
    if($pass == 'Admin'){
      ?>

    <?php
    if($teacherData != 0){
    ?>
    <?php
  //  echo 'date of today: '.$date = Date('m-Y').'<br>';
  //  echo 'Number of day: '.$day  = Date('j');
    $n = 1;
    foreach($teacherData as $rows){
    ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->standards_name.', '. $rows->class_name?></td>
      <td><?php echo $rows->students_year_entry ?></td>
      <td><a href="#<?php //echo base_url(''.$rows->assign_id.'/'.$rows->students_year_entry);?>" id="record_result" data-student_year_entry="<?php echo $rows->students_year_entry ?>" data-assign_id="<?php echo $rows->assign_id ?>">Record Result</a></td>
      <td><a href="#<?php //echo base_url(''.$rows->assign_id.'/'.$rows->students_year_entry);?>" id="view_result" data-student_year_entry="<?php echo $rows->students_year_entry ?>" data-assign_id="<?php echo $rows->assign_id ?>">View Result</a></td>
    </tr>
  <?php $n++; }?>

<?php } else{?>
  <tr>
    <td colspan="6" class="text-center">You are not assigned to the class yet</td>
  </tr>
<?php }}else{?>
  <tr>
      <td colspan="6" class="text-center">Soory!! You are not Admin to this tasks</td>
  </tr>
<?php }?>
  </tbody>
</table>
</div>
</div>

<script>
document.getElementById('test').addEventListener('change', function(){
  //hidden document 
    var style = this.value > 0 ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
//end of hidden document

//get value form selection option
    var selectBox = document.getElementById('test');
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  //end get value from selection option


//get page for record result
  $(document).on("click", "#record_result", function(){
    var url = "<?php echo base_url()?>";
    if(selectedValue != 0){
      var assign_id = $(this).data('assign_id');
      var student_year = $(this).data('student_year_entry');
      window.location = url+"index.php/result/record_result/"+selectedValue+"/"+assign_id+"/"+student_year;
    //alert(selectedValue);
  }
  });
//end get page for record result


//get page for view record result
$(document).on("click", "#view_result", function(){
    var url = "<?php echo base_url()?>";
    if(selectedValue != 0){
      var assign_id = $(this).data('assign_id');
      var student_year = $(this).data('student_year_entry');
      window.location = url+"index.php/result/view_result/"+selectedValue+"/"+assign_id+"/"+student_year;
    //alert(selectedValue);
  }
  });
//end page for view record result


});
</script>
