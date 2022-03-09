<br><br><br>
<?php
foreach($studentData as $d){
  $standard = $d->standards_name;
  $class = $d->class_name;
  $school = $d->schools_name;
}
?>
<div class="container">
<table class="table table9-bordered">
  <thead class="thead-dark">
    <tr>
      <th colspan="4" class="text-center">SEND ONE SMS TO ALL STUDENTS FOR STANDARD <?php echo strtoupper($standard.' '.$class); ?></th>
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
?>
<form method="post" action="<?php echo base_url('index.php/report/report_send/'.$assign_id);?>">
  <input type="hidden" name="schoolid_<?php echo $n; ?>" value="<?php echo $idSchool; ?>">
  <input type="hidden" name="studentid_<?php echo $n; ?>" value="<?php echo $idStudent; ?>">
  <input type="hidden" name="teacherid_<?php echo $n; ?>" value="<?php echo $idteacher?>">
    <input type="hidden" name="sc_<?php echo $n; ?>" value="<?php echo $schoolname; ?>">
    <input type="hidden" name="fullname_<?php echo $n; ?>" value="<?php echo $fname.' '.$mname.' '.$lname; ?>">
    <input type="hidden" name="rec_<?php echo $n; ?>" value="<?php echo $idStudent; ?>">
    <input type="hidden" name="fn_<?php echo $n; ?>" value="<?php echo $fn; ?>">
    <input type="hidden" name="sc_<?php echo $n; ?>" value="<?php echo $schoolname; ?>">
    <input type="hidden" name="cl_<?php echo $n; ?>" value="<?php echo $standard.', '.$class; ?>">
    <?php
    $n++;
  }
    ?>
    <tr>
      <td><b>Type your message:</b></td>
      <td><textarea id="field" onkeyup="countChar(this)" name="sms" rows="15" cols="120" maxlength="150"  required></textarea></td>
      <tr/>
      <tr>
      <td colspan="4">You text must not exceede:<span id="charNum" class="text-danger font-weight-bold">150</span></td>
    </tr>
    <tr>
    <td colspan="5"><input type="submit" class="btn btn-primary" name="submit" value="Send SMS "></td>
  </tr>
</form>
  </tbody>
</table>
</div>
