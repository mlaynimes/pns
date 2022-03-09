<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assigns extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->library(array('session', 'form_validation'));
  }


  public function index(){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }

    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

    $this->load->model('assign_model');
    $query = $this->assign_model->set_get_assign($idSchool);
    $queryTotal = $this->assign_model->set_count_students($idSchool);
    $data = array(
          'title' => 'Teacher Assigned Classes',
          'main_content' => 'assign_manage',
          'infoAssign' => $query,
          'totalStudent' => $queryTotal
    );
    $this->load->view('masterII', $data);
  }

  public function get_assign($teacherID){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

    $this->load->model('assign_model');
    $classData = $this->assign_model->set_class_assign($idSchool);
    $standardData = $this->assign_model->set_standard_assign($idSchool);
    $teacherData = $this->assign_model->set_teacher_assign($teacherID);

    $data = array(
          'title' => 'Assign teacher class',
          'main_content' => 'assign',
          'classInfo' => $classData,
          'standardInfo' => $standardData,
          'teacherInfo' => $teacherData,
          'schoolInfo' => $idSchool
    );
    $this->load->view('masterII', $data);
  }



public function add_assign(){

  $this->load->library('form_validation');
  if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id

  //set form validation rule
  $this->form_validation->set_rules('ass_standard', 'Standard Level', 'required');
  $this->form_validation->set_rules('ass_class', 'Class Name', 'required');

  if($this->form_validation->run()===false){
    $data = array(
          'main_content' => 'assign',
          'title' => 'Teacher not assigned class successfully'
    );
    $this->load->view('masterII', $data);
    $controller = base_url('index.php/Teachers/manage_teachers');
    header("Refresh:2; url={$controller}");

  }else{
      $insert = array(
              'assign_class_id' => $this->input->post('ass_class'),
              'assign_standard_id'=> $this->input->post('ass_standard'),
              'assign_teacher_id'=> $this->input->post('teacher_id'),
              'assign_school_id' => $this->input->post('school_id')
      );

      $this->load->model('assign_model');
      $query = $this->assign_model->set_add_assign($insert);
      if($query){
        $data = array(
              'main_content' => 'assign',
              'title' => 'Teacher assigned to the class successfully',
              'message' => 'Teacher assigned to the class successfully'

        );
        $this->load->view('masterII', $data);
        $controller = base_url('index.php/Teachers/manage_teachers');
        header("Refresh:2; url={$controller}");

      }
  }
}

public function assign_student_class(){
  if($this->session->userdata('school_email') == ''){
    echo "please login to access the page";
    redirect(base_url('index.php/Schools'),'refresh:2');
}

$emailSchool = $this->session->userdata('school_email'); // school email
$idSchool = $this->session->userdata('school_id'); // school id

$this->load->model('assign_model');
$query = $this->assign_model->set_get_assign($idSchool);
$queryTotal = $this->assign_model->set_count_students($idSchool);
$data = array(
      'title' => 'Students classes',
      'main_content' => 'assign_students_class',
      'infoAssign' => $query,
      'totalStudent' => $queryTotal
);
$this->load->view('masterII', $data);

}

  public function delete_assign($ID){
    $this->load->model('assign_model');
    $query = $this->assign_model->set_delete_assign($ID);

    if($query){
      $data = array(
          'title' => 'Teacher Assigned to the class information Deleted',
          'main_content' => 'assign_manage'
      );
      redirect(base_url('index.php/Assigns'));
    }
  }

  public function edit_assign($ID){
    $this->load->library('form_validation');
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

    $this->load->model('assign_model');
    $query = $this->assign_model->set_assign_edit($ID, $idSchool);
    $classData = $this->assign_model->set_class_assign($idSchool);
    $standardData = $this->assign_model->set_standard_assign($idSchool);

    if($query){
      $data = array(
         'title' => 'Edit Teacher Assigned class',
         'main_content' => 'assign_edit',
         'assignData' => $query,
         'classInfo' => $classData,
         'standardInfo' => $standardData,
       );

       $this->load->view('masterII', $data);
    }
  }


  public function update_assign(){
    $this->load->library('form_validation');
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id


    //set form validation rule
    $this->form_validation->set_rules('ass_standard', 'Standard Level', 'required');
    $this->form_validation->set_rules('ass_class', 'Class Name', 'required');


    if($this->form_validation->run()===false){
      $data = array(
            'title' => 'Update Teacher Assigned class failed',
            'main_content' => 'assign_edit'
      );

      $this->load->view('masterII', $data);
      $controller = base_url('index.php/Assigns');
      header("Refresh:2; url={$controller}");
    }else{
      $IDassign = $this->input->post('assign_ID');
       $update = array(
                'assign_class_id' => $this->input->post('ass_class'),
                'assign_standard_id' => $this->input->post('ass_standard'),
       );

       $this->load->model('assign_model');
       $query = $this->assign_model->set_assign_update($update, $IDassign);

       if($query){
         $data = array(
              'title' => 'Teacher Assigned information Updated',
              'main_content' => 'assign_edit',
              'message' => 'Teacher Assigned information Update successfully!!'
         );

         $this->load->view('masterII', $data);
         $controller = base_url('index.php/Assigns');
         header("Refresh:2; url={$controller}");
       }
    }
  }

  public function assign_student($classid, $standardid){
    $this->load->library('form_validation');
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

    $this->load->model('standard_model');
    $this->load->model('class_model');
    $this->load->model('assign_model');
    $queryStandard = $this->standard_model->get_standard_list($idSchool);
    $queryClass = $this->class_model->get_class_list($idSchool);
    $queryStudent = $this->assign_model->set_assign_view_students($classid, $standardid);

    $data = array(
        'title' => 'View students assigned',
        'main_content'=> 'assign_students_view',
        'studentsData' => $queryStudent,
        'standardData' => $queryStandard,
        'classData' => $queryClass,
    );
    $this->load->view('masterII', $data);
  }

  public function assign_change_class(){
$cla = $this->uri->segment('3');
$sta = $this->uri->segment('4');
      $update = array(
          'students_classes_id' => $this->input->post('class'),
          'students_standard_id' => $this->input->post('standard'),
      );
      $studentid = $this->input->post('studentid');

      $this->load->model('assign_model');
      $query = $this->assign_model->set_assign_update_class($update, $studentid);

      if($query){
        redirect(base_url('index.php/Assigns/assign_student/'.$cla.'/'.$sta));
      }
  }
}
