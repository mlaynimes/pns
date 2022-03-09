<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller

{
    public function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('session');
    }

    public function index()
    {

if($this->session->userdata('school_email') == ''){
    echo "please login to access the page";
    redirect(base_url('index.php/Schools'),'refresh:2');
}

  $emailSchool = $this->session->userdata('school_email'); // school email
  $idSchool = $this->session->userdata('school_id'); // school id

  $this->load->model('dashboard_model');
  $this->dashboard_model->set_school_id($idSchool);

    $data = array(
        'title' => 'Dashboard Page',
        'main_content' => 'dashboard',
        'schoolData'  => $this->dashboard_model->set_school_id($idSchool)

    );
    $this->load->view('masterII', $data);


    }
}
?>
