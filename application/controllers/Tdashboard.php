<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tdashboard extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

    public function index(){
      if($this->session->userdata('teacher_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
      }


        $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
        $idTeacher = $this->session->userdata('teacher_id'); // teacher id
        $idSchool = $this->session->userdata('schools_id'); // school id

      $this->load->model('tdashboard_model');
      $this->tdashboard_model->set_teacher_id($idTeacher);

        $data = array(
            'title' => 'Dashboard Page',
            'main_content' => 'teacher_dashboard',
            'teacherData'  => $this->tdashboard_model->set_teacher_id($idTeacher)

        );
        $this->load->view('masterIII', $data);


        }
    }
