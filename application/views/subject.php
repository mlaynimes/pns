<br><br><br>
<div class="container">
<table class="table">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="4" class="text-center bg-light text-dark table table-striped table-bordered">ADD SUBJECT</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Class</th>
      <th scope="col">Class Subjects</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //print_r($standardInfo);
    $n=1;
    foreach($standardInfo as $standardData){
      $standard_name = $standardData->standards_name;
      $standard_id = $standardData->standards_id;

      
    ?>
    <tr>
      <th scope="row"><?php echo $n; ?></th>
      <td><?php echo $standard_name; ?></td>
      <td><a href="<?php echo base_url('subjects/add_subject/'.$standard_id)?>" data-standardid="<?php echo $standard_id; ?>" data-standardname="<?php echo $standard_name; ?>" data data-toggle="modal" data-target="#exampleModal" class="user_dialog">add subject</a></td>
    </tr>
    <?php
    $n++;
  }
  ?>
  </tbody>
</table>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD SUBJECTS TO THE CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url('index.php/subjects/add_subject');?>">
        <div class="table-responsive">  
        <table class="table table-bordered" id="dynamic_field">  
        <input type="hidden" name="standardid" id="standard_id" value="" readonly>
        <tr>
        <td>Class Name:</td>
        <td><input type="text" name="standardname" id="standard_name" class="form-control name_list" readonly></td>
        </tr>
<tr>  

    <td><input type="text" name="addmore[][subject_name]" placeholder="Enter Subject Name" class="form-control name_list" required="" /></td>  

    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

</tr>  

</table>  

<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />

          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<table class="table border">
  <thead class="thead-dark">
  <tr>
    <th scope="col" colspan="12" class="text-center bg-light text-dark table table-striped table-bordered">LIST OF SUBJECTS CREATED</th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Standard</th>
      <th scope="col" colspan="10">Subject</th>
    </tr>
  </thead>
  <tbody>
  <?php //echo print_r($subjects); 
  
  if($subjects > 0){
    $n = 1; 
    foreach($subjects as $data){


  ?>
    <tr>
      <th scope="row"><?php echo $n;?></th>
      <td><?php echo $data->standards_name; ?></td>
      <?php 
      $combine = explode("||", $data->subject);
      foreach($combine as $tex){
        $id_split = explode(",", trim($tex));

        echo "<td><ul class=list-group list-group-horizontal-sm><li class=list-group-item><a class=subject_dialog data-subjectid=$id_split[0] data-subjectname=$id_split[1] data-standardname=$data->standards_name data-toggle=modal data-target=#exampleModalCenter href=#$id_split[0]>$id_split[1]</a></li></ul><br></td>";
      }
      ?>
    </tr>
    <?php
    $n++;
    }
    }else{
?>
<tr>
<td colspan="3" class="text-center font-weight-bold">THERE ARE NO SUBJECTS CREATED </td>
</tr>
<?php
    }
    ?>
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update & Delete Class Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url('index.php/subjects/update_subject');?>">
      <input type="hidden" name="IDsubject" id="subject_id">
      <div class="form-group">
    <label for="exampleInputEmail1">Class Name:</label>
    <input type="text" class="form-control" id="standard_name" aria-describedby="emailHelp" placeholder="Enter Class Name" readonly>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Subject Name:</label>
    <input type="text" name="subject-name" class="form-control" id="subject_name" aria-describedby="emailHelp" placeholder="Enter subject name">
  </div>
  <div class="form-group">
  <a  id="confirm-delete" class="btn btn-secondary">Delete</a>
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      -->
    </div>
  </div>
</div>



</div>


<script type="text/javascript">
//delete subject data
$("#confirm-delete").click(function(){
  var url = "<?php echo base_url()?>";
  var id = document.getElementById('subject_id').value;
  //alert(id);
  var r = confirm("Do you want to delete it?");
  if(r== true)
  window.location = url+"index.php/subjects/delete_subject/"+id;
  else
  return false;
});
//end delete subject data

//get value from subject click modal
$(document).on("click", ".subject_dialog", function(){
  var subjectID = $(this).data('subjectid');
  var subjectNAME = $(this).data('subjectname');
  var standardNAME = $(this).data('standardname');
  $(".modal-body #subject_id").val(subjectID);
  $(".modal-body #subject_name").val(subjectNAME);
  $(".modal-body #standard_name").val(standardNAME);
});
//end get value from subject click modal

//get value from add subject modal 
$(document).on("click", ".user_dialog", function(){
   var standardID = $(this).data('standardid');
   var standardName = $(this).data('standardname');
   $(".modal-body #standard_id").val(standardID);
   $(".modal-body #standard_name").val(standardName);
});
//end get value from add subject modal


//add multiple field input by click the button
$(document).ready(function(){      
var i=1;  
$('#add').click(function(){  
     i++;  
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="addmore[][subject_name]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
});
$(document).on('click', '.btn_remove', function(){  
     var button_id = $(this).attr("id");   
     $('#row'+button_id+'').remove();  
});  
}); 
//end multiple field input by clicking the button
</script>