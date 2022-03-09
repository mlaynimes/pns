  <!doctype html>
  <html lang="en">
    <head>
      <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Custom CSS -->
      <link rel="stylesheet" href="<?php echo base_url('css/styleII.css')?>">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
      <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>

      <title><?php echo $title; ?></title>
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-light  fixed-top" style="background-color: #006c6c;">
  <a class="navbar-brand" href="#" style="color: white;">Parents Notification System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/dashboard');?>" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Streams</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/Classes');?>">Add Classes</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Classes/manage_classes');?>">Manage Classes</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Standards');?>">Add Standards</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Standards/manage_standard');?>">Manage Standards</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Teachers</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/Teachers');?>">Register Teacher</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Teachers/manage_teachers');?>">Manage Teacher</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Students</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/Students')?>">Register Students</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Students/multiple_students')?>">Register Multiple Students</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Students/manage_students')?>">Manage Students</a>
        </div>
      </li>
            </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Subjects</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/subjects')?>">Add Subjects</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Assign</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/assigns');?>">Class Teachers</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/assigns/assign_student_class');?>">Student's Classes</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Results</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?php echo base_url('index.php/panel');?>">Result Panel</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">Settings</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01" >
          <a class="dropdown-item" href="<?php echo base_url('index.php/Schools/school_profile')?>">Update Profile</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Schools/school_info')?>">Update Info</a>
          <a class="dropdown-item" href="<?php echo base_url('index.php/Schools/school_password')?>">Change Password</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/Logout');?>" tabindex="-1" aria-disabled="true" style="color: white;">Logout</a>
      </li>
    </ul>
  </div>
</nav>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  <script>
  $(document).ready(function(){
   $('#dataTable').dataTable({
     "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
   });
   });
  </script>
