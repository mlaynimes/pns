<?php 
error_reporting(0);
foreach($resultData as $data)
      $combine = explode("||", $data->subjectResult);
      foreach($combine as $tex){
        $id_split = explode(",", trim($tex));
      
      }   
      $colspan = count($combine)+7;
?>
<br><br><br>
<style>
table{
  width:100%;
}
table,th,td{
  border:1px solid black;
  border-collapse:collapse;
  text-align:center;
}

th, td{
  padding:10px;
}

</style>
<table class="table table-bordered">
  <thead>
  <?php foreach($resultData as $data){
     $image = $data->schools_image;
  }?>
  <tr>
  <th colspan="<?php echo $colspan;?>"><?php echo strtoupper($data->schools_name);?></th>
  </tr>

  <tr>
  <th colspan="<?php echo $colspan;?>">Standard : <?php echo $data->standards_name?></th>
  </tr>
  <tr>
  <th colspan="<?php echo $colspan;?>">Exams : <?php echo $data->exam_info. ' ||  Date :'.date('M / d / Y');?></th>
  </tr>

    <tr>
      <th scope="col">No:</th>
      <th scope="col">Full name</th>
      <th scope="col">Std/Cls</th>
      <?php foreach($resultData as $data){}
          $combine = explode("||", $data->subjectResult);
          foreach($combine as $tex){
            $id_split = explode(",", trim($tex));        
          ?>
      
      <th scope="col"><?php echo $id_split[0];?></th>
      <?php }?>
      <th scope="col">Total</th>
      <th scope="col">Average</th>
      <th scope="col">Grade</th>
      <th scope="col">Position</th>
     </tr>

  </thead>
  <tbody>
  <?php 
  $n = 1;
  $sum = 0;
  foreach($resultData as $rows){?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->students_fname.' '.$rows->students_mname.', '.$rows->students_lname;?></td>
      <td><?php echo $rows->standards_name.'/'.$rows->class_name?></td>
      <?php 
      $combine = explode("||", $rows->subjectResult);
      foreach($combine as $tex){
        $id_split = explode(",", trim($tex));
      ?>
      <td ><?php echo $id_split[1]?></td>
      <?php
      }
      
?>
    <td><?=$rows->totalMark?></td>
    <td><?=$rows->avgMark?></td>
    <!--Find grade-->
    <?php
    $grade = $rows->avgMark;
    switch($grade){
      case $grade >= 81 and $grade <= 100:
        $add = 'A';
      break;
      
      case $grade >= 61 and $grade <= 80:
        $add = 'B';
      break;

      case $grade >= 41 and $grade <= 60:
        $add = 'C';
      break;

      case $grade >= 21 and $grade <= 40:
        $add = 'D';
      break;

      default:
      $add = 'F';
    }
    ?>
    <td><?=$add; ?></td>
    
    <!--End find grade-->

    <!--Find Position-->
     <td><?php echo $rows->ranking;?></td>
    <!--End Find Position-->
    </tr>
  <?php
  $n++;
 }?>
  </tbody>
</table>