<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subjects extends CI_Controller
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

        $this->load->model('standard_model');
        $standardData = $this->standard_model->get_standard($idSchool);

        $this->load->model('subject_model');
        $query = $this->subject_model->set_subject_get($idSchool);


      $data = array(
      		'title' => 'subjects',
      		'main_content' => 'subject',
          'standardInfo' => $standardData,
          'subjects' => $query,

      );

      $this->load->view('masterII', $data);
  }
  

  public function add_subject(){
    if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id

  if(!empty($this->input->post('addmore'))){
  
    foreach ($this->input->post('addmore') as $key => $value) {

      $data=$value;
      $data['subject_standard_id'] = $this->input->post('standardid');
      $data['subject_school_id'] = $idSchool;
      //print_r($data);
      $this->load->model('subject_model');
      $this->subject_model->set_subject_add($data);
    }        
}

echo '<script>
        alert(Subject Created successfully);
        </script>';
      redirect(base_url('index.php/subjects'));
}



public function update_subject(){
  if($this->session->userdata('school_email') == ''){
    echo "please login to access the page";
    redirect(base_url('index.php/Schools'),'refresh:2');
}
$emailSchool = $this->session->userdata('school_email'); // school email
$idSchool = $this->session->userdata('school_id'); // school id


  $IDsubject = $this->input->post('IDsubject');
  $update = array(
     'subject_name' => $this->input->post('subject-name'),
  );
  $this->load->Model('subject_model');
 $query = $this->subject_model->set_update_subject($IDsubject, $update);
 
 if($query){
  echo '<script>
  alert(Subject Updated successfully);
  </script>';
redirect(base_url('index.php/subjects'));
 }
}

public function delete_subject($IDsubject){
  $this->load->model('subject_model');
  $query = $this->subject_model->set_delete_subject($IDsubject);
  if($query){
    redirect(base_url('index.php/subjects'));
  }
}
}