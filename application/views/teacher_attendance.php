<br><br><br>
<?php
error_reporting(0);
foreach($studentData as $d){
  $standardid = $d->standards_id;
  $classid = $d->class_id;
  $standard = $d->standards_name;
  $class = $d->class_name;
  $school = $d->schools_name;
}
?>
<div class="container">
<table class="table table9-bordered">
  <thead class="thead-dark">
    <tr>
      <td><b>School Name</b></td>
      <td colspan="4"><?php echo $school; ?></td>
    </tr>
    <tr>
      <td><b>Standard, Class</b></td>
      <td colspan="4"><?php echo $standard.', '.$class; ?></td>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Fullname</th>
      <th scope="col" colspan="3" class="text-center">Attendance Option</th>
    </tr>
  </thead>
  <tbody>

    <?php
      $n = 1;
      foreach($studentData as $r){
        $assign_id = $r->assign_id;
        $fname = $r->students_fname;
        $mname = $r->students_mname;
        $lname = $r->students_lname;
        $idStudent = $r->students_id;
        $idSchool = $r->schools_id;
        $schoolname = $r->schools_name;
        $fn = $r->students_parent_fno;
        $class = $r->class_name;
        $standard = $r->standards_name;
        $students_year_entry = $r->students_year_entry;
?>
<form method="post" action="<?php echo base_url('index.php/Teachers/teacher_submit/'.$assign_id.'/'.$students_year_entry);?>">
  <input type="hidden" name="schoolid_<?php echo $n; ?>" value="<?php echo $idSchool; ?>">
  <input type="hidden" name="studentid_<?php echo $n; ?>" value="<?php echo $idStudent; ?>">
  <input type="hidden" name="teacherid_<?php echo $n; ?>" value="<?php echo $idteacher?>">
  <input type="hidden" name="standardid_<?php echo $n; ?>" value="<?php echo $standardid?>">
  <input type="hidden" name="classid_<?php echo $n; ?>" value="<?php echo $classid?>">
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $fname.' '.$mname.' '.$lname ?></td>
      <td><input type="radio" id="input" name="attend_<?php echo $n; ?>" value="V" required checked> Present</td>
      <td><input type="radio" id="input" name="attend_<?php echo $n; ?>" value="X" required> Absent</td>
      <td><input type="radio" id="input" name="attend_<?php echo $n; ?>" value="R" required> Report</td>

    </tr>
    <input type="hidden" name="sc_<?php echo $n; ?>" value="<?php echo $schoolname; ?>">
    <input type="hidden" name="fullname_<?php echo $n; ?>" value="<?php echo $fname.' '.$mname.' '.$lname; ?>">
    <input type="hidden" name="rec_<?php echo $n; ?>" value="<?php echo $idStudent; ?>">
    <input type="hidden" name="fn_<?php echo $n; ?>" value="<?php echo $fn; ?>">
    <input type="hidden" name="sn_<?php echo $n; ?>" value="<?php echo $sn; ?>">
    <input type="hidden" name="sc_<?php echo $n; ?>" value="<?php echo $schoolname; ?>">
    <input type="hidden" name="cl_<?php echo $n; ?>" value="<?php echo $standard.', '.$class; ?>">
    <?php
    $n++;
  }
    ?>
    <tr>
    <td colspan="5"><input type="submit" class="btn btn-primary" name="submit" value="Take Attandance"></td>
  </tr>
  <form>
  </tbody>
</table>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("input");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("take attendancent to this student");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
</script>
