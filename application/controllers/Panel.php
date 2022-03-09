<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class panel extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('session', 'form_validation'));
    }

    public function index(){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }
        
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id

          $this->load->model('panel_model');
          $query = $this->panel_model->set_view_exam_result($idSchool);
        
          $data = array(
              'title' => 'result panel',
              'main_content' => 'panel_result',
              'viewResult' => $query
          );
          $this->load->view('masterII', $data);
    }

    public function add_exam(){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id
          $this->load->model('panel_model');
          $query = $this->panel_model->set_view_exam_result($idSchool);

          //set form validation rules
          $this->form_validation->set_rules('exam', 'exam', 'required');  
          if($this->form_validation->run()===false){
                $data = array(
                    'title' => 'result panel',
                    'main_content' => 'panel_result',
                    'viewResult' => $query
                );
                $this->load->view('masterII', $data);
          }else{
              $insert = array(
                  'exam_school_id' => $idSchool,
                  'exam_info' => $this->input->post('exam'),
              );
              $query = $this->panel_model->set_add_exam($insert);
              if($query){
                redirect(base_url('index.php/panel'));
              }
          }
    }

    public function delete_exam($delete){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id
          $this->load->model('panel_model');
          
          $query = $this->panel_model->set_delete_exam($delete);
          if($query){
            redirect(base_url('index.php/panel'));
          }
    }

    public function update_exam(){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id
          $this->load->model('panel_model');
          
          $examid = $this->input->post('exam_id');
          $update = array(
              'exam_info' => $this->input->post('exam'),
          );

          $query = $this->panel_model->set_update_exam($update, $examid);
          if($query){
            
            redirect(base_url('index.php/panel'));
            
          }
    }

    public function panel_view_result($examid, $standardid, $year){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id
          $this->load->model('panel_model');
          $query = $this->panel_model->set_panel_view_record($examid, $standardid, $year);
          $data = array(
            'title' => 'Panel Result',
            'main_content' => 'panel_view_result',
            'result' => $query
        );
        $this->load->view('masterII', $data);
    }

    public function panel_sms($examid, $standardid, $year){
        //get url locator
        $examid = $this->uri->segment('3');
        $standardid = $this->uri->segment('4');
        $year = $this->uri->segment('5');
        //end get url locator

        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id

        $this->load->model('panel_model');
        $query = $this->panel_model->set_panel_view_record($examid, $standardid, $year);
        $check = $this->panel_model->set_limit_reduce($idSchool);
        foreach ($check as $row){
          $limitid = $row->limit_id;
          $limitstatus = $row->limit_status;
        }
           
        
        if($limitstatus !=0){
          
            
        $totalStudent = $this->input->post('studentTotal');
        $schoolname = $this->input->post('schoolname');

        foreach($query as $rows){
             $studentid = $rows->students_id;
             $fullname = $rows->students_fname.' '.$rows->students_mname.', '.$rows->students_lname;
             $classroom = $rows->standards_name.'/'.$rows->class_name;
             $mobile = $rows->students_parent_fno;
             $exam = $rows->exam_info;

            //get subject result
            
            $combine = explode("||", $rows->subjectResult);

           $subject =array_values($combine);
           strip_tags($subject2 = implode('//',$subject));
         
             //end get subject result 
           
             $totalmark = $rows->totalMark;
             $avgmark = $rows->avgMark;
             $position = $rows->ranking;

            //get grade position
            $grade = $rows->avgMark;
            switch($grade){
              case $grade >= 81 and $grade <= 100:
                $add = 'A';
              break;
              
              case $grade >= 61 and $grade <= 80:
                $add = 'B';
              break;
        
              case $grade >= 41 and $grade <= 60:
                $add = 'C';
              break;
        
              case $grade >= 21 and $grade <= 40:
                $add = 'D';
              break;
        
              default:
              $add = 'F';
            }
            $grade = $add;
            //end grade position
            

             //message setup
               $message ="Message from: $schoolname \nYour son/daughter: $fullname \n classroom: $classroom \n CONCERN ABOUT:\n $exam result exam \n______________\n $subject2 ______________ \ntotal subject marks: $totalmark \naverange subject marks: $avgmark \ngrade averange subject: $grade \nhis/her position: $position\namong of total student: $totalStudent\n\nThank for receiving a message!!";

             //end message setup
    
//.... replace <api_key> and <secrete_key> with the valid keys obtained from the platform, under profile>authentication information
$api_key='bee982b307ad6c89';
$secret_key = 'MzNhMzNiZWVjNTYxYmMyNmU3ZmI3MmYxMGRkYzlkNTU3NjFmYTNmNDFjOWFjY2IzMDkyODMwODA1MzYxZjIyMQ==';
// The data to send to the API
$postData = array(
    'source_addr' => 'PNSNOTIFIER',
    'encoding'=>0,
    'schedule_time' => '',
    'message' => $message,
    'recipients' => [array('recipient_id' => $studentid,'dest_addr'=>$mobile)]
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

$response2 = json_decode($response);
 $success = $response2->successful;
 $requestid = $response2->request_id;
 $code = $response2->code;
 $message = $response2->message;
 $valid = $response2->valid;
 $invalid = $response2->invalid;
 $duplicate = $response2->duplicates;
 
 $status ="message: $message ";

        }
        $limitstatus = $limitstatus-1;
        $update = array(
                'limit_status' => $limitstatus,
        );
        $this->panel_model->set_limit_update($limitid, $update);

        $url = base_url('index.php/panel/panel_view_result/'.$examid.'/'.$standardid.'/'.$year);
       echo "<script>
alert('".$message."');
window.location.href='".$url."';
</script>";


    
        }else{
        $url = base_url('index.php/panel/panel_view_result/'.$examid.'/'.$standardid.'/'.$year);
            echo "<script>
                    alert('you have reached the limit to send sms per day');
                    window.location.href='".$url."';
                    </script>";
        }
    
  }

    public function panel_result_pdf($examid, $standardid, $year){
        if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }   
          $emailSchool = $this->session->userdata('school_email'); // school email
          $idSchool = $this->session->userdata('school_id'); // school id

        $this->load->model('panel_model');
        $query = $this->panel_model->set_panel_view_record($examid, $standardid, $year);

        $data = array(
            'main_content' => 'school_result_report_pdf',
            'title' => 'School Result Report PDF',
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
                $this->pdf->stream("school_result", array("Attachment"=>0));
              
      }
}
?>