<?php
require_once( APPPATH . 'third_party/PHPExcel/Classes/PHPExcel.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class import extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('import_model');
    }


public function index(){
    $data = array(
        'title' => 'import file to the database',
        'main_content' => 'import'
    );
    $this->load->view('masterII', $data);
}
  public function uploadData(){

  if ($this->input->post('submit')) {

            $path = 'uploads/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
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
                  $inserdata[$i]['org_name'] = $value['A'];
                  $inserdata[$i]['org_code'] = $value['B'];
                  $i++;
                }
                $result = $this->import_model->importdata($inserdata);

                print_r($result);
                if($result){
                  echo "Imported successfully";
                }else{
                  echo "ERROR !";
                }

          } catch (Exception $e) {
               die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
            }
          }else{
              echo $error['error'];
            }


    }
    $this->load->view('upload');
  }
}
?>
