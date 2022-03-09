<?php
//  print_r($attendanceData);
  foreach($attendanceData as $data){
    $school = $data->schools_name;
    $standard = $data->standards_name;
    $class = $data->class_name;
    $date = $data->attendance_data;
    $image = $data->schools_image;
  }
?>

<style>
#th2{
  text-align: center;
}
#th1{
  text-align: center;
}
table{
     width: 100%;
}
 table, th, td{
   font-size: 12;
   font-family: 'Times New Roman';
   border: 1px solid black;
   border-collapse: collapse;
 }

</style>

<table>
  <thead>
    <tr>
      <th colspan="33" id="th2"><?php echo strtoupper($school);?> ATTENDANCE FOR MONTH-YEAR (<?php echo $date?>)</th>
    </tr>
    <tr>
      <th colspan="33" id="th1">STANDARD </b><?php echo strtoupper($standard).', '.strtoupper($class); ?></th>
    </tr>
    <tr>
      <th scope="col">No.</th>
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
      <td><?php echo ucwords(strtolower($rows->students_fname.' '.$rows->students_mname.' '.$rows->students_lname))?></td>
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
    ?>
  </tbody>
</table>
