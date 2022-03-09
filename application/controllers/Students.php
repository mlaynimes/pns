<?php
require_once( APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
  public function __construct(){
    parent:: __construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('session', 'pagination'));
    $this->load->model('student_model');
  }


  public function index()
  {
    if($this->session->userdata('school_email') == ''){
    		    echo "please login to access the page";
    		    redirect(base_url('index.php/Schools'),'refresh:2');
    		}

    		$emailSchool = $this->session->userdata('school_email'); // school email
    		$idSchool = $this->session->userdata('school_id'); // school id

    $classData = $this->student_model->set_class($idSchool);
    $standardData = $this->student_model->set_standard($idSchool);
    $data = array(
        'main_content' => 'student',
        'title' => 'Student page',
        'idSchool' => $idSchool,
        'classData' => $classData,
        'standardData' => $standardData
    );

    $this->load->view('masterII', $data);
  }


  public function add_student(){
    if($this->session->userdata('school_email') == ''){
    		    echo "please login to access the page";
    		    redirect(base_url('index.php/Schools'),'refresh:2');
    		}

    		$emailSchool = $this->session->userdata('school_email'); // school email
    		$idSchool = $this->session->userdata('school_id'); // school id

      //set form validation rules
      $this->form_validation->set_rules('st_fname', 'First name', 'required');
      $this->form_validation->set_rules('st_mname', 'Middle name', 'required');
      $this->form_validation->set_rules('st_lname', 'Last Name', 'required');
      $this->form_validation->set_rules('st_stand', 'Standard Level', 'required');
      $this->form_validation->set_rules('st_class', 'Class Name', 'required');
      $this->form_validation->set_rules('st_gender', 'Student Gender', 'required');
      $this->form_validation->set_rules('st_parentno', 'Parent Mobile Number', 'required');
      $this->form_validation->set_rules('st_year','Year of entry','required');
      $this->form_validation->set_rules('st_nationality','student nationality','required');
      $this->form_validation->set_rules('st_parent_name','Parent/guardian name','required');
      $this->form_validation->set_rules('st_parent_occupation','Occupation of parent/guardian','required');
      

      if($this->form_validation->run()===false){
        $data = array(
              'main_content' => 'student',
              'title' => 'Student registration failed',
              'SchoolData' => $idSchool
        );
        $this->load->view('masterII', $data);
        $controller = base_url('index.php/Students');
        header("Refresh:2; url={$controller}");

      }else{
        $insert = array(
                  'students_fname' => $this->input->post('st_fname'),
                  'students_mname' => $this->input->post('st_mname'),
                  'students_lname' => $this->input->post('st_lname'),
                  'students_parent_fno' => $this->input->post('st_parentno'),
                  'students_year_entry' => $this->input->post('st_year'),
                  'students_register_no' => $this->input->post('st_register_no'),
                  'students_birthday' => $this->input->post('st_birthday'),
                  'students_nationality' => $this->input->post('st_nationality'),
                  'students_parent_name' => $this->input->post('st_parent_name'),
                  'students_parent_occupation' => $this->input->post('st_parent_occupation'),
                  'students_gender' => $this->input->post('st_gender'),
                  'students_classes_id' => $this->input->post('st_class'),
                  'students_standard_id' => $this->input->post('st_stand'),
                  'students_schools_id' => $this->input->post('school_id')

        );

        $query = $this->student_model->set_add_student($insert);

        if($query){
          $data = array(
              'main_content' => 'student',
              'title' => 'Student registered to the system',
              'SchoolData' => $idSchool,
              'message' => 'Student registered to the system'
          );
          $this->load->view('masterII', $data);
          $controller = base_url('index.php/Students');
          header("Refresh:2; url={$controller}");
        }

      }
  }


  public function manage_students(){
    if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }

        $emailSchool = $this->session->userdata('school_email'); // school email
        $idSchool = $this->session->userdata('school_id'); // school id

        $config = array();
        $config["base_url"] = base_url('index.php/Students/manage_students');
      /*  $config["total_rows"] = $this->student_model->set_count_student($idSchool);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

                //config for bootstrap pagination class integration
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = False;
                $config['last_link'] = False;
                $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close'] = '</span></li>';
                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
                $config['prev_tag_close'] = '</span></li>';
                $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
                $config['next_tag_close'] = '</span></li>';
                $config['prev_link'] = '&laquo';
                $config['next_link'] = '&raquo';
                $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
                $config['last_tag_close'] = '</span></li>';
                $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
                $config['first_tag_close'] = '</span></li>';
                $config['suffix'] = '.html';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

        $links = $this->pagination->create_links();*/

        $params = $this->student_model->set_manage_student($idSchool);
        $data = array(
            'main_content' => 'student_manage',
            'title' => 'Students manage page',
            'StudentData' => $params,
            //'links' => $links
        );

        $this->load->view('masterII', $data);
}


public function multiple_students(){
  if($this->session->userdata('school_email') == ''){
          echo "please login to access the page";
          redirect(base_url('index.php/Schools'),'refresh:2');
      }

      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

      $this->load->model('student_model');
      $classData = $this->student_model->set_class($idSchool);
      $standardData = $this->student_model->set_standard($idSchool);

      $data = array(
        'title' => 'Upload multiple students',
        'main_content' => 'student_multiple',
        'idSchool' => $idSchool,
        'classData' => $classData,
        'standardData' => $standardData
      );
      $this->load->view('masterII', $data);
}


public function save_students(){
  if($this->session->userdata('school_email') == ''){
          echo "please login to access the page";
          redirect(base_url('index.php/Schools'),'refresh:2');
      }

      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

  //set form validation rules
  $this->form_validation->set_rules('st_stand', 'Standard Level', 'required');
  $this->form_validation->set_rules('st_class', 'Class Name', 'required');

  if($this->form_validation->run()===false){

    $classData = $this->student_model->set_class($idSchool);
    $standardData = $this->student_model->set_standard($idSchool);

    $data = array(
      'title' => 'Upload multiple students',
      'main_content' => 'student_multiple',
      'idSchool' => $idSchool,
      'classData' => $classData,
      'standardData' => $standardData
    );
    $this->load->view('masterII', $data);
    $controller = base_url('index.php/Students/multiple_students');
    header("Refresh:2; url={$controller}");
}else{
            $path = 'uploadExcel/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
              if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;

            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $flag = true;
                $i=0;
                foreach ($allDataInSheet as $value) {
                  if($flag){
                    $flag =false;
                    continue;
                  }
                  $inserdata[$i]['students_fname'] = $value['B'];
                  $inserdata[$i]['students_mname'] = $value['C'];
                  $inserdata[$i]['students_lname'] = $value['D'];
                  $inserdata[$i]['students_register_no'] = $value['E'];
                  $inserdata[$i]['students_year_entry'] = $value['F'];
                  $inserdata[$i]['students_birthday'] = $value['G'];
                  $inserdata[$i]['students_nationality'] = $value['H'];
                  $inserdata[$i]['students_parent_name'] = $value['I'];
                  $inserdata[$i]['students_parent_occupation'] = $value['J'];
                  $inserdata[$i]['students_parent_fno'] = $value['K'];
                  $inserdata[$i]['students_gender'] = $value['L'];
                  $inserdata[$i]['students_classes_id'] = $this->input->post('st_class');
                  $inserdata[$i]['students_standard_id'] = $this->input->post('st_stand');
                  $inserdata[$i]['students_schools_id'] = $this->input->post('school_id');
                  $i++;
                }

                $result = $this->student_model->importStudent($inserdata);

                print_r($result);
                if($result){
                  $data = array(
                    'title' => 'Upload multiple students',
                    'main_content' => 'student_multiple',
                    'message' => 'Registered Students Imported successfully!'
                  );
                  $this->load->view('masterII', $data);
                  $controller = base_url('index.php/Students/multiple_students');
                  header("Refresh:2; url={$controller}");
                  //echo "Imported successfully";
                }else{
                  echo "ERROR !";
                }

          } catch (Exception $e) {
               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
            }
          }else{
              echo $error['error'];
              $controller = base_url('index.php/Students/multiple_students');
              header("Refresh:2; url={$controller}");
            }
}
}

  public function delete_student($ID){
    $query = $this->student_model->delete_student($ID);

    if($query){
      $data = array(
            'title' => 'Student Information Deleted to the system',
            'main_content' => 'student_manage'
      );
      redirect(base_url('index.php/Students/manage_students'));
    }
  }


  public function edit_student($studentID){
    if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }

        $emailSchool = $this->session->userdata('school_email'); // school email
        $idSchool = $this->session->userdata('school_id'); // school id
        $this->load->model('student_model');
        $classData = $this->student_model->set_class($idSchool);
        $standardData = $this->student_model->set_standard($idSchool);
        $studentData = $this->student_model->set_edit_student($studentID);
        $data = array(
            'main_content' => 'student_edit',
            'title' => 'Student Edit Page',
            'idSchool' => $idSchool,
            'classData' => $classData,
            'standardData' => $standardData,
            'studentData' => $studentData
        );

        $this->load->view('masterII', $data);

  }


  public function update_student(){
    if($this->session->userdata('school_email') == ''){
            echo "please login to access the page";
            redirect(base_url('index.php/Schools'),'refresh:2');
        }

        $emailSchool = $this->session->userdata('school_email'); // school email
        $idSchool = $this->session->userdata('school_id'); // school id

        //set form validation rules
      $this->form_validation->set_rules('st_fname', 'First name', 'required');
      $this->form_validation->set_rules('st_mname', 'Middle name', 'required');
      $this->form_validation->set_rules('st_lname', 'Last Name', 'required');
      $this->form_validation->set_rules('st_stand', 'Standard Level', 'required');
      $this->form_validation->set_rules('st_class', 'Class Name', 'required');
      $this->form_validation->set_rules('st_gender', 'Student Gender', 'required');
      $this->form_validation->set_rules('st_parentno', 'Parent Mobile Number', 'required');
      $this->form_validation->set_rules('st_year','Year of entry','required');
      $this->form_validation->set_rules('st_nationality','student nationality','required');
      $this->form_validation->set_rules('st_parent_name','Parent/guardian name','required');
      $this->form_validation->set_rules('st_parent_occupation','Occupation of parent/guardian','required');

        if($this->form_validation->run()===false){
          $data = array(
              'main_content' =>'student_edit',
              'title' => 'Student update failed',
              'message' => 'Student update failed to the system'
          );
          $this->load->view('masterII', $data);
          $controller = base_url('index.php/Students/manage_students');
          header("Refresh:2; url={$controller}");
        }else{
          $update = array(
                  'students_fname' => $this->input->post('st_fname'),
                  'students_mname' => $this->input->post('st_mname'),
                  'students_lname' => $this->input->post('st_lname'),
                  'students_parent_fno' => $this->input->post('st_parentno'),
                  'students_year_entry' => $this->input->post('st_year'),
                  'students_register_no' => $this->input->post('st_register_no'),
                  'students_birthday' => $this->input->post('st_birthday'),
                  'students_nationality' => $this->input->post('st_nationality'),
                  'students_parent_name' => $this->input->post('st_parent_name'),
                  'students_parent_occupation' => $this->input->post('st_parent_occupation'),
                  'students_gender' => $this->input->post('st_gender'),
                  'students_classes_id' => $this->input->post('st_class'),
                  'students_standard_id' => $this->input->post('st_stand'),
                 // 'students_schools_id' => $this->input->post('school_id')
          );


          $id = $this->input->post('students_id');
          $this->load->model('student_model');
          $query = $this->student_model->set_update_student($update, $id);
        //print_r($update);
          if($query){
            $data = array(
              'main_content' => 'student_edit',
              'title' => 'Student updated to the system',
              'message' => 'Student updated to the system'
            );
          $this->load->view('masterII', $data);
          $controller = base_url('index.php/Students/manage_students');
          header("Refresh:2; url={$controller}");
        }
        }


  }
}
?>
