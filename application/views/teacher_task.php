<br><br><br>
<?php error_reporting(0); //print_r($teacherData); ?>
<div class="container">
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
      <td><a href="<?php echo base_url('index.php/Teachers/teacher_attendance/'.$rows->assign_id.'/'.$rows->students_year_entry);?>">Take Attendance</a></td>
      <td><a href="<?php echo base_url('index.php/Teachers/teacher_view/'.$rows->assign_id.'/'.$rows->students_year_entry);?>">View attendance</a></td>
      <td><a href="<?php echo base_url('index.php/report/report_sms/'.$rows->assign_id.'/'.$rows->students_year_entry);?>">Report SmS</a></td>
      <td><a href="<?php echo base_url('index.php/Teachers/teacher_report/'.$rows->assign_id.'/'.$rows->students_year_entry);?>">Report PDF</a></td>
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
