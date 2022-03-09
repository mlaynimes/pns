<br><br><br>
<?php error_reporting(0);
?>

<?php
if($attendanceData != Null){
foreach($attendanceData as $data){
  $school = $data->schools_name;
  $standard = $data->standards_name;
  $class = $data->class_name;
}
?>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <td colspan="32" class="text-center"><b>TODAY IS: <?php echo Date('j-m-Y');?></b></td>
    </tr>
    <tr>
      <td><b>School Name</b></td>
      <td colspan="32"><?php echo $school; ?></td>
    </tr>
    <tr>
      <td><b>Standard, Class</b></td>
      <td colspan="32"><?php echo $standard.', '.$class; ?></td>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullname</th>
      <?php
      for($i=1; $i<=31; $i++){
        echo "<th scope='col'>$i</th>";
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
  //  var_dump($attendanceData);
    $n=1;
    foreach ($attendanceData as $rows){?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->students_fname.' '.$rows->students_mname.' '.$rows->students_lname?></td>
      <td><?php echo $rows->d1; ?></td>
      <td><?php echo $rows->d2; ?></td>
      <td><?php echo $rows->d3; ?></td>
      <td><?php echo $rows->d4; ?></td>
      <td><?php echo $rows->d5; ?></td>
      <td><?php echo $rows->d6; ?></td>
      <td><?php echo $rows->d7; ?></td>
      <td><?php echo $rows->d8; ?></td>
      <td><?php echo $rows->d9; ?></td>
      <td><?php echo $rows->d10; ?></td>
      <td><?php echo $rows->d11; ?></td>
      <td><?php echo $rows->d12; ?></td>
      <td><?php echo $rows->d13; ?></td>
      <td><?php echo $rows->d14; ?></td>
      <td><?php echo $rows->d15; ?></td>
      <td><?php echo $rows->d16; ?></td>
      <td><?php echo $rows->d17; ?></td>
      <td><?php echo $rows->d18; ?></td>
      <td><?php echo $rows->d19; ?></td>
      <td><?php echo $rows->d20; ?></td>
      <td><?php echo $rows->d21; ?></td>
      <td><?php echo $rows->d22; ?></td>
      <td><?php echo $rows->d23; ?></td>
      <td><?php echo $rows->d24; ?></td>
      <td><?php echo $rows->d25; ?></td>
      <td><?php echo $rows->d26; ?></td>
      <td><?php echo $rows->d27; ?></td>
      <td><?php echo $rows->d28; ?></td>
      <td><?php echo $rows->d29; ?></td>
      <td><?php echo $rows->d30; ?></td>
      <td><?php echo $rows->d31; ?></td>
    </tr>
    <?php
    $n++;
  }
}
    ?>
    <?php if($attendanceData == Null) {?>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <td colspan="32" class="text-center"><b>TODAY IS: <?php echo Date('d-m-Y, l');?></b></td>
        </tr>
        <tr>
          <td><b>School Name</b></td>
          <td colspan="32"><?php echo $school; ?></td>
        </tr>
        <tr>
          <td><b>Standard, Class</b></td>
          <td colspan="32"><?php echo $standard.', '.$class; ?></td>
        </tr>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Fullname</th>
          <?php
          for($i=1; $i<=31; $i++){
            echo "<th scope='col'>$i</th>";
          }
          ?>
        </tr>
        <tr>
          <td colspan="33" class="text-center"><b>This monthly you have not school attendance to this class</b></td>
        </tr>
      </thead>
      <tbody>
        <?php
      }
        ?>
  </tbody>
</table>
