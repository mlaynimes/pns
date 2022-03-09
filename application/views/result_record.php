      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
#student_name{
  outline:none;
  border:none;
  cursor:default;
}
</style>
<br><br><br>
<div class="container">
<table class="table">

  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullname</th>
      <th scope="col" colspan="">Add Record Result</th>
      <th scope="col">Status</th>
      <th><input type="checkbox" id="checkall" value=''>&nbsp;<input type="button" class="btn btn-primary" id="delete" value="Delete"></th>
    </tr>
  </thead>
  <tbody>
  <?php
//echo '<pre>', print_r($studentInfo);
  $n = 1;
  foreach($studentInfo as $rows){
      
  ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $rows->students_fname.', '.$rows->students_mname.' '.$rows->students_lname;?></td>

      <!--Bring your modal to trigger and add subject marks-->
      <td><a href="#" data-toggle="modal" class="add_record" data-studentclassid="<?php echo $rows->students_classes_id; ?>" data-studentstandardid="<?php echo $rows->students_standard_id; ?>" data-studentname="<?php echo $rows->students_fname.', '.$rows->students_mname.' '.$rows->students_lname;?>" data-studentid ="<?php echo $rows->students_id;?>" data-target="#staticBackdrop">Add Record Result</a></td>
      <!--End bring your modal to trigger and subject marks-->
    
    <?php
     $urlexamid = $this->uri->segment(3);
     $rows->result_exam_id;
   ?>
    <!--Bring your modal to trigger and view subject marks-->
    <td id="result_<?php echo $rows->result_student_id;?>" class="<?php echo ($rows->result_exam_id == $urlexamid) ? 'alert alert-success font-weight-bolder' : 'alert alert-danger font-weight-bolder'?>" role="alert"><?php echo ($rows->result_exam_id == $urlexamid) ? 'Recorded':'Not Recorded';?></td>
      <td><?php if($rows->result_exam_id == $urlexamid)  : ?><input type="checkbox" class="checkbox" name="delete"  value="<?php echo $rows->result_student_id;?>"/><input type="hidden" name="examID" value="<?php echo $rows->result_exam_id; ?>"/><?php else : ''; endif;?></td>
    <!--End Bring your modal to trigger and view subject marks-->

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
        <h5 class="modal-title" id="staticBackdropLabel">Add Record Result</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('index.php/result/add_record_result')?>">
        <table class="table table-bordered">
  <thead>
  <tr>
  <th scope="col" colspan="2">Student name:</th>
  <th scope="col" ><input type="text" name="" id="student_name" value="" readonly></th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subjects Name</th>
      <th scope="col">Subjects Mark</th>
    </tr>
  </thead>
  <tbody>
  <?php
  //print_r($examInfo);
  foreach($examInfo as $row){
    $examID = $row->exam_id;
  }
 
  ?>
  
    <?php //print_r($subjectInfo);
    $n =1;
  foreach($subjectInfo as $row){
  ?>
      <input type="hidden" id="student_class_id" name="student_class_id" value="" required/>
      <input type="hidden" id="student_standard_id" name="student_standard_id" value="" required/>
      <input type="hidden" name="exam_id" value="<?php echo $examID; ?>"/><!--exam id field-->
      <input type="hidden" id="student_id" name="student_id" value="" required/><!--student id field-->
  <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $row->subject_name;?></td>
      <input type="hidden" name="resultsubjectid<?php echo $n;?>" value="<?php echo $row->subject_id; ?>" required/><!--subject  id field-->
      <td><input type="number" name="resultmark<?php echo $n;?>" value="" min="0" max="100" required/></td><!--subject mark field-->     
    </tr>
  <?php 
  $total = 0;
  $sum = $total +$n;
  $n++; 
}


?>
<input type="hidden" name="count" value="<?php echo $sum;?>"><!--count data-->
<input type="hidden" name= "exam" value="<?php echo $this->uri->segment(3);?>"/><!--url exam id-->
<input type="hidden" name="assign" value="<?php echo $this->uri->segment(4);?>"/><!--url assign id-->
<input type="hidden" name="year" value="<?php echo $this->uri->segment(5);?>"/><!--url year-->
  </tbody> 
</table>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save Record">
      </div> 
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<script>
//get student id from add_record_result
$(document).on("click", ".add_record", function(){
  var studentID = $(this).data('studentid');
  var studentNAME = $(this).data('studentname');
  var studentCLASSID = $(this).data('studentclassid');
  var studentSTANDARDID = $(this).data('studentstandardid');
  $(".modal-body #student_id").val(studentID);
  $(".modal-body #student_name").val(studentNAME);
  $(".modal-body #student_standard_id").val(studentSTANDARDID);
  $(".modal-body #student_class_id").val(studentCLASSID);
});
//end get user id from add_record_result


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

$('#delete').click(function(){
  var examid = "<?php echo $this->uri->segment(3);?>"; //examid
  var assign = "<?php echo $this->uri->segment(4);?>"; //assignid
  var yearentry = "<?php echo $this->uri->segment(5);?>";

  var student_id_arr = [];
  $(".checkbox:checked").each(function(){
    var student_id = $(this).val();

    student_id_arr.push(student_id);
  });

  var length = student_id_arr.length; 
  if(length > 0){
    $.ajax({
      url: '<?= base_url()?>index.php/result/delete_result',
      type: 'post',
      data: {student_id: student_id_arr, exam_id: examid, assign_id: assign, year: yearentry},
      success: function(response){
          $(".checkbox:checked").each(function(){
            var studentid = $(this).val();
           // console.log(studentid);
            $('#result_'+studentid).empty().text('Not Recorded').removeClass('alert alert-success font-weight-bolder').addClass('alert alert-danger font-weight-bolder');
          });
      }  
    });
  }
});


//ende delete multiple
</script>
