<?php error_reporting(0); ?>
<br><br><br>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col" colspan="6" class="text-center bg-light text-dark">TOTAL STUDENTS  IN CLASSES</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Standard, Class</th>
      <th scope="col">Students Year Entry</th>
      <th scope="col">Year of Studies</th>
      <th scope="col">Total students</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>

    <?php
      //print_r($totalStudent);
       $year_current = date("Y");

      if($totalStudent != 0){
        $n = 1;
      foreach($totalStudent as $tot){
        $total = $tot->total;
        $standard = $tot->standards_name;
        $class = $tot->class_name;
        $year_entry = $tot->students_year_entry;

        $duration = ($year_current - $year_entry)+1;

    ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $standard.', '.$class; ?></td>
      <td><?php echo $year_entry; ?></td>
      <td><?php echo $duration. ' Year'; ?></td>
      <td><?php echo $total;?></td>
      <td><a href="<?php echo base_url('index.php/Assigns/assign_student/'.$tot->class_id.'/'.$tot->standards_id)?>">View Students</a></td>
    </tr>

    <?php
    $n++;
  }
}else{
    ?>

    <tr>
      <td colspan="3" class="text-center">School have not any students</td>
    </tr>

    <?php
  }
    ?>
  </tbody>
</table>
</div>