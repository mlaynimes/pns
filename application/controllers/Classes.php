<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }


  public function index(){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }

      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id
    $data = array(
      'title' => 'Add Classes to the system',
      'main_content' => 'class',
      'SchoolData' => $idSchool

    );
    $this->load->view('masterII', $data);
  }


  public function add_classes(){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }

      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id


      $this->form_validation->set_rules('classes_name', 'Class Name', 'required');

      if($this->form_validation->run()==false){
        $data = array(
              'main_content' => 'class',
              'SchoolData' => $idSchool,
              'title' => 'Classes name required'

        );
        $this->load->view('masterII', $data);
      }else{
        $insert = array(
              'class_name' => $this->input->post('classes_name'),
              'class_school_id' => $this->input->post('school_id')
        );

        $this->load->model('class_model');
        $query = $this->class_model->set_classses($insert);

        if($query){
                $data = array(
            'main_content' => 'class',
            'title' => 'Class inserted',
            'SchoolData' => $idSchool,
            'message' => 'Standard level inserted successfully!!'
          );
          $this->load->view('masterII', $data);
        }
      }

  }


  public function manage_classes()
  {
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }

    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

    $this->load->model('class_model');
    $classData = $this->class_model->set_manage_classes($idSchool);

    $data = array(
          'title' => 'Manage standard',
          'main_content' => 'class_manage',
          '$SchoolData' => $idSchool,
          'classLists' => $classData
    );

    $this->load->view('masterII', $data);
  }



  public function edit_class($classID){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id


  $this->load->model('class_model');
  $classInfo = $this->class_model->set_edit_class($classID);

  $data = array(
          'title' => 'Edit Classs',
          'main_content' => 'class_edit',
          'info' => $classInfo
  );

  $this->load->view('masterII', $data);
}



public function update_class(){
  if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id


  $this->form_validation->set_rules('class_name', 'Class Name', 'required');

  if($this->form_validation->run()==false){
    $data = array(
          'title' => 'Update failde to the system',
          'main_content' => 'class_edit'
    );
    $this->load->view('masterII', $data);
  }else{
    $ID = $this->input->post('class_id');
  $update = array(
        'class_name' => $this->input->post('class_name'),
  );

    $this->load->model('class_model');
    $query = $this->class_model->set_update_classs($update, $ID);

    if($query){
        $data = array(
                'title' => 'Class update to the system',
                'main_content' => 'class_edit',
                'message' => 'Class information update successfully!!'
        );
        $this->load->view('masterII', $data);
        $controller = base_url('index.php/Classes/manage_classes');
        header("Refresh:2; url={$controller}");

    }
  }
}

  public function delete_class($id){
    $this->load->model('class_model');
    $query =  $this->class_model->set_delete_class($id);

    if($query){
        $data = array(
                'title' => 'Class Deleted to the system',
                'main_content' => 'manage_classes'
        );
        redirect(base_url('index.php/classes/manage_classes'));
    }
  }
}
