<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class result extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library(array('session', 'form_validation'));
    }
    

    public function index(){
        if($this->session->userdata('teacher_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('teacher_model');
    $query = $this->teacher_model->set_teacher_task($idTeacher);
    $this->load->model('exam_model');
    $info = $this->exam_model->set_exam($idSchool);

    $data = array(
        'title' => 'Record result',
        'main_content' => 'result',
        'teacherData' => $query,
        'examData' => $info,
    );

        $this->load->view('masterIII', $data);
    }

    public function record_result($examid, $assign_id, $student_year){
        if($this->session->userdata('teacher_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('assign_model');
    $this->load->model('exam_model');
    $student = $this->assign_model->set_assign_student($examid, $assign_id, $student_year);
    $subject = $this->assign_model->set_assign_subject($assign_id);
    $exam = $this->exam_model->set_exam_one($examid);
    $viewResult = $this->assign_model->set_assign_view_record($assign_id, $student_year, $examid);
        $data = array(
            'title' => 'Record Result',
            'main_content' => 'result_record',
            'studentInfo' => $student,
            'subjectInfo' => $subject,
            'examInfo' => $exam,
            'viewResult' => $viewResult,
        
        );

        $this->load->view('masterIII', $data);
    }

    public function add_record_result(){
        $exam = $this->input->post('exam');
        $assign = $this->input->post('assign');
        $year = $this->input->post('year');

        if($this->session->userdata('teacher_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    if(!empty($this->input->post())){
        $examid = $this->input->post('exam_id');
        $studentid = $this->input->post('student_id');

        for($z=1; $z<=($this->input->post('count')); $z++){
            $insert[$z] = array(
                'result_subject_id' => $this->input->post('resultsubjectid'.$z),
                'result_marks' => $this->input->post('resultmark'.$z),
                'result_exam_id' => $this->input->post('exam_id'),
                'result_class_id' => $this->input->post('student_class_id'),
                'result_standard_id' => $this->input->post('student_standard_id'),
                'result_student_id' => $this->input->post('student_id'),
                'result_school_id' => $idSchool,
            );        
        }
        $this->load->model('result_model');
        $query = $this->result_model->set_record_result_delete($studentid, $examid);
        if($query){
            $query = $this->result_model->set_record_result_add($insert);
            if($query){
                redirect(base_url('index.php/result/record_result/'.$exam.'/'.$assign.'/'.$year));
            }
        }
    }else{
        redirect(base_url('index.php/result/record_result/'.$exam.'/'.$assign.'/'.$year));
       // echo "empty";
    }
     }


     public function delete_result(){
        //post value
        $student_ids = $this->input->post('student_id'); //student id
        $exam_ids = $this->input->post('exam_id'); //exam id
        $assign_ids = $this->input->post('assign_id'); // assign id
        $year = $this->input->post('year');

        $this->load->model('result_model');
        $query = $this->result_model->set_delete_multiple($student_ids, $exam_ids);

        if($query){
            redirect(base_url('index.php/result/record_result/'.$exam_ids.'/'.$assign_ids.'/'.$year));
        }
     }


     public function view_result($examid, $assign_id, $student_year){
        if($this->session->userdata('teacher_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
    }
    $emailTeacher = $this->session->userdata('teacher_email'); // teacher email
    $idTeacher = $this->session->userdata('teacher_id'); // teacher id
    $idSchool = $this->session->userdata('schools_id'); // school id

    $this->load->model('result_model');
    $result = $this->result_model->set_view_result($examid, $assign_id, $student_year, $idSchool);
    
    $data = array(
        'main_content' => 'result_view',
        'title' => 'view result',
        'result' => $result,
    );
    $this->load->view('masterIII', $data);
     }
}