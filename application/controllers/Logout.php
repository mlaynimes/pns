<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }

  public function index(){
  echo  $emailSchool = $this->session->userdata('school_email'); // school email
  echo   $idSchool = $this->session->userdata('school_id'); // school id


	$this->session->unset_userdata($emailSchool);
	$this->session->unset_userdata($idSchool);
	$this->session->sess_destroy();
  redirect(base_url('index.php/Schools'));
  }
}
