<?php error_reporting(0)?>
<br><br><br>
<div class="container">
  <h5 class="text-center">Register Multiple Students With Template</h5>
    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('index.php/Students/save_students');?>">
    <div class="form-group">
      <input type="hidden" name="school_id" value="<?php echo $idSchool; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <label for="exampleFormControlSelect1">Standard Level:</label>
        <select class="form-control" name="st_stand" id="exampleFormControlSelect1">
          <option></option>
          <?php
          foreach($standardData as $data){
          ?>
          <option value="<?php echo $data->standards_id ?>"><?php echo $data->standards_name;?></option>
          <?php
        }
          ?>
        </select>
        <br><?php echo form_error('st_stand');?>
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Class Name:</label>
          <select class="form-control" name="st_class" id="exampleFormControlSelect1">

            <option></option>
            <?php
            foreach($classData as $data){
            ?>
            <option value="<?php echo $data->class_id;?>"><?php echo $data->class_name; ?></option>
            <?php
          }
            ?>
          </select>
          <br><?php echo form_error('st_class');?>
        </div>

        <div class="input-group mb-3">
          <input type="file" name="uploadFile">
        </div>
    <button type="submit" name="submit" class="btn btn-primary">Upload School's template</button><?php echo $message; ?>
  </form>

  <div class="row">
    <div class="col-md-12 text-center">
        <h5 class="text-center">Download School's template file below:</h5>
        <a href="<?=base_url ()?>index.php/FileController/download/SCHOOL_TEMPLATE.xlsx" class="btn btn-primary">Download Shool Template</a>
    </div>
</div>
</div>
