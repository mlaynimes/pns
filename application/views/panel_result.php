<br><br><br>
<?php //echo '<pre>', print_r($viewResult);?>
<div class ="container">
<form method="post" action="<?php echo base_url('index.php/panel/add_exam');?>">
<div class="bg-light">
<div class="form-group text-center">
    <h6>ADD EXAM TYPES:</h6>
</div>
  <div class="form-group bg-light">
    <label for="exampleInputEmail1">Exam Type:</label>
    <input type="text" class="form-control" name="exam" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo form_error('exam');?>
    </div>
   <input type="submit" value="Add Exam" class="btn btn-primary"/>
   </div>
</form>

<br>
<table class="table table-bordered text-center">
  <thead>
  <tr>
  <th scope="col" colspan="6" class="text-center">View Result Panel</th>
  </tr>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Exam Type</th>
      <th scope="col">Standard</th>
      <th scope="col">student Year Entry</th>
      <th scope="col" colspan="2">Option</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $n =1;
    foreach($viewResult as $rows){
        $examid = $rows->exam_id;
        $examinfo = $rows->exam_info;
        $standardid = $rows->standards_id;
        $classid = $rows->class_id;
        $year = $rows->students_year_entry;
        $resultexam = $rows->result_exam_id;

  ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $rows->exam_info; ?></td>
      <?php
      if($resultexam != 0){?>
      
      
       <td><?php echo $rows->standards_name;?></td> 
       <td><?php echo $rows->students_year_entry;?></td>
       <td><a href="#" id="exam_dialog" data-examid="<?php echo $examid; ?>" data-examinfo="<?php echo $examinfo;?>" data-toggle="modal" data-target="#staticBackdrop">Edit</a></td>
       <td><a href="<?php echo base_url('index.php/panel/panel_view_result/'.$examid.'/'.$standardid.'/'.$year)?>">View Result</a></td>
      <?php }else{?>
       
       <td colspan ="2" role="alert" class="alert alert-danger font-weight-bold">No result recorded</td>
       <td><a href="#" id="exam_dialog" data-examid="<?php echo $examid; ?>" data-examinfo="<?php echo $examinfo;?>" data-toggle="modal" data-target="#staticBackdrop">Edit</a></td>
       <td><a href="<?php echo base_url('index.php/panel/delete_exam/'.$examid);?>">Delete</a></td>
      
     
    <?php
      }
        $n++;
    }
    
    ?>
    </tr>
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form method="post" action="<?php echo base_url('index.php/panel/update_exam')?>">
      </div>
      <div class="modal-body">
      <input type="hidden" id="exam_id" name="exam_id" value="" required>
      <label for="exampleInputEmail1">Exam Type:</label>
    <input type="text" class="form-control" id="exam_info" name="exam" value="" id="exampleInputEmail1" aria-describedby="emailHelp" required><?php echo form_error('exam');?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update"/>
      </div>
    </div>
    </form>
  </div>
</div>
</div>

<script>
//get value from edit exam
$(document).on("click", "#exam_dialog", function(){
 var examID = $(this).data('examid');
 var examINFO = $(this).data('examinfo');
 $(".modal-body #exam_id").val(examID);
 $(".modal-body #exam_info").val(examINFO);
});
//end get value from edit exam
</script>