<br><br><br>
<?php 
error_reporting(0);
//echo '<pre>', print_r($result);
foreach($result as $data)
      $combine = explode("||", $data->subjectResult);
      foreach($combine as $tex){
      $id_split = explode(",", trim($tex));    
      }   
     $colspan = count($combine)+3;
?>

<div class="container">
<table class="table table-bordered text-center">
  <thead>
  <?php if(empty($result)):?>
  <tr>
  <th scope="col" colspan="7" class="text-center alert alert-danger" role="alert">NO STUDENT RESULT RECORDED</th>
  </tr>
  <?php else: foreach($result as $data)?>
  <tr>
  <?php //print_r($result);?>
  <th colspan="2">Standard : <?php echo $data->standards_name ?></th>
  <th colspan="<?php echo $colspan; ?>">Exams : <?php echo $data->exam_info;?></th>
  <?php
  $examid = $this->uri->segment('3');
  $standardid = $this->uri->segment('4');
  $year = $this->uri->segment('5');
?>
  <th><a href="<?php echo base_url('index.php/panel/panel_result_pdf/'.$examid.'/'.$standardid.'/'.$year);?>">save as PDF</a></th>
  <th><a href="#" data-toggle="modal" data-target="#staticBackdrop">parent SMS</a></th>
  </tr>
  <?php endif;?>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full name</th>
      <th scope="col">Std/Cls</th>
      <?php foreach($result as $data){}
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
  foreach($result as $rows){?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->students_fname.' '.$rows->students_mname.', '.$rows->students_lname;?></td>
      <td><?php echo $rows->standards_name.'/'.$rows->class_name;?></td>
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



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Send Result SMS to parent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method ="post" action="<?php echo base_url('index.php/panel/panel_sms/'.$examid.'/'.$standardid.'/'.$year);?>">
<?php 
//echo '<pre>', print_r($result);
foreach($result as $rows){}
$sum = count($result);
?>
<input type="hidden" name="studentTotal" value="<?php echo $sum; ?>">
<input type="hidden" name="schoolname" value="<?php echo $rows->schools_name;?>">
<p class="card-text">Parent Notification System will send message to <?php echo $sum; ?> parents/guardians</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Send SmS">
        </form>
      </div>
    </div>
  </div>
</div>
</div>