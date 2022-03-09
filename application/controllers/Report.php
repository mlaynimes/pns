<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->library('form_validation');
  }
	function report_pdf($assign_id, $attendance_data){
    if($this->session->userdata('teacher_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('report_model');
    $query =  $this->report_model->set_generate_pdf($assign_id, $attendance_data, $idSchool);

    $data = array(
      'main_content' => 'teacher_report_pdf',
      'title' => 'Teacher Report Pdf',
      'attendanceData' => $query
    );
		$this->load->view('masterIV', $data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("School Attendance.pdf", array("Attachment"=> 0));
	}


  public function report_sms($assign_id, $students_year_entry){
    if($this->session->userdata('teacher_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('teacher_model');
    $query = $this->teacher_model->set_student_attendance($assign_id, $students_year_entry, $idSchool);

    $data = array(
            'main_content' => 'report_sms',
            'title' => 'Send SMS to all students',
            'idteacher' => $idTeacher,
            'studentData' => $query
    );

    $this->load->view('masterIII', $data);
  }

  public function report_send($assign_id){
    if($this->session->userdata('teacher_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('teacher_model');
    $query = $this->teacher_model->set_student_attendance($assign_id, $idSchool);

    //print_r($query);
    $sum = 0;
    foreach($query as $data)
    {
      $sum +=0;
      $sum++;
    }
    $sum;

    for($k=1; $k <= $sum; $k++){
      //data information from database
      $usersms[$k] = array(
        'receiptId' => $this->input->post('rec_'.$k),
        'fullname' => $this->input->post('fullname_'.$k), //student fullname
        'firstnumber' => $this->input->post('fn_'.$k),
        'secondnumber' => $this->input->post('sn_'.$k),
        'schoolname' => $this->input->post('sc_'.$k), //school name
      //  'attendance' => $this->input->post('attend_'.$k),
      //  'class' => $this->input->post('cl_'.$k)
      );

    }

    //($usersms);
    $message = $this->input->post('sms');
    if($message != null){

      foreach($usersms as $sms){
        $receiptId = $sms['receiptId'];
        $fullname = $sms['fullname'];
        $firstnumber = $sms['firstnumber'];
        $schoolname = $sms['schoolname'];
      $api_key='bee982b307ad6c89';
      $secret_key = 'MzNhMzNiZWVjNTYxYmMyNmU3ZmI3MmYxMGRkYzlkNTU3NjFmYTNmNDFjOWFjY2IzMDkyODMwODA1MzYxZjIyMQ==';
      // The data to send to the API
      $postData = array(
          'source_addr' => 'PNSNOTIFIER',
          'encoding'=>0,
          'schedule_time' => '',
          'message' => "Message from $schoolname \nParent or Guardian of $fullname \nREPORT CONCERN ABOUT: $message \nThank for reading this message!!",
          'recipients' => [array('recipient_id' => $receiptId,'dest_addr'=>$firstnumber)]
      );
      //.... Api url
      $Url ='https://apisms.bongolive.africa/v1/send';

      // Setup cURL
      $ch = curl_init($Url);
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt_array($ch, array(
          CURLOPT_POST => TRUE,
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_HTTPHEADER => array(
              'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
              'Content-Type: application/json'
          ),
          CURLOPT_POSTFIELDS => json_encode($postData)
      ));

      // Send the request
      $response = curl_exec($ch);

      // Check for errors
      if($response === FALSE){
              echo $response;

          die(curl_error($ch));
      }

  //  var_dump($response);
    //  print_r($response);
      echo "<script>alert('Message Sent successfully'); window.location.href='../../Teachers/teacher_task'</script>";
    }

  }
 }

 public function report_result_pdf($examid, $assign_id, $student_year){
  if($this->session->userdata('teacher_email') == ''){
    echo "please login to access the page";
    redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
  }
  $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
  $idTeacher = $this->session->userdata('teacher_id'); // teacher id
  $idSchool = $this->session->userdata('schools_id'); // school id

  $this->load->model('result_model');
  $query= $this->result_model->set_view_result($examid, $assign_id, $student_year, $idSchool);
  $data = array(
      'main_content' => 'teacher_result_report_pdf',
      'title' => 'Teacher Result Report PDF',
      'resultData' => $query
  ); 

  $this->load->view('masterIV', $data);
  $html = $this->output->get_output();

  //load pdf library
  $this->load->library('pdf');
  $this->pdf->loadHtml($html);
  $this->pdf->setPaper('A4', 'landscape');
  $this->pdf->setBasePath("uploads/");
  $this->pdf->render();

  //Output the generated PDF (1 = download and 0 = preview)
 
  $this->pdf->stream("teacher_school_result", array("Attachment"=>0));
        
}

  }
