<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standards extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'form'));
    $this->load->library(array('session', 'form_validation'));

  }

  public function index()
  {
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }

      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

      $data = array(
          'title' => 'Add Standards to the system',
          'main_content' => 'standard',
          'SchoolData' => $idSchool
      );

      $this->load->view('masterII', $data);
  }

  public function add_standard(){
    if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id
     //set form validation rules
     $this->form_validation->set_rules('standard_name', 'Standard Name', 'required');

     if($this->form_validation->run()===false){
        $data =  array (
            'main_content' => 'standard',
            'title' => 'Standard name required',
            'SchoolData' => $idSchool
        );
        $this->load->view('masterII', $data);
     }else{
       $insert = array(
            'standards_name' => $this->input->post('standard_name'),
            'standards_schools_id' => $this->input->post('school_id')
       );
       $this->load->model('standard_model');
       $standardData = $this->standard_model->set_standard($insert);

       if($standardData){
            $data = array(
                'main_content' => 'standard',
                'title' => 'Standard level inserted',
                'SchoolData' => $idSchool,
                'message' => 'Standard level inserted successfully'
            );
            $this->load->view('masterII', $data);
       }
     }
}



public function manage_standard(){
  if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }

  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id

  $this->load->model('standard_model');
  $standardData = $this->standard_model->get_standard($idSchool);

  $data = array(
      'title' => 'Manage standard',
      'main_content' => 'standard_manage',
      'SchoolData' => $idSchool,
      'standardLevel' => $standardData
  );

  $this->load->view('masterII', $data);
}


public function edit_standard($standardID){
  if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id

  $this->load->model('standard_model');
  $standardInfo = $this->standard_model->set_edit_standard($standardID);

  $data = array(
          'title' => 'Edit Standard',
          'main_content' => 'standard_edit',
          'info' => $standardInfo

  );

  $this->load->view('masterII', $data);
}



public function update_standard(){
  if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id


  //set form validation rule
  $this->form_validation->set_rules('standard_name', 'Standard Name', 'required');

  if($this->form_validation->run()==false){
    $data = array (
          'title' => 'Update Failed',
          'main_content' => 'standard_edit'
    );

    $this->load->view('masterII', $data);
    $controller = base_url('index.php/Standards/manage_standard');
    header("Refresh:2; url={$controller}");

  }else{
      $ID = $this->input->post('standard_id');
      $update = array(
              'standards_name' => $this->input->post('standard_name')
      );

      $this->load->model('standard_model');
    $query = $this->standard_model->set_update_standard($update, $ID);

    if($query){
        $data = array(
            'title' => 'Standard Updated to the system',
            'main_content' => 'standard_edit',
            'message' => 'Standard information updated successfully!!'
        );

        $this->load->view('masterII', $data);
        $controller = base_url('index.php/Standards/manage_standard');
        header("Refresh:2; url={$controller}");

    }
  }
}

  public function delete_standard($id){
    $this->load->model('standard_model');
    $query = $this->standard_model->set_delete_standard($id);

    if($query){
      $data = array(
            'title' => 'Standard Deleted to the system',
            'main_content' => 'manage_standard'
      );
      redirect(base_url('index.php/Standards/manage_standard'));
    }
  }
}
