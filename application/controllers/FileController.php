<?php
 defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
 class FileController extends CI_Controller {
  public function __construct() {
   parent::__construct ();
   $this->load->helper('download');
  }

  public function download($fileName = NULL) {
   if ($fileName) {
    $file = realpath ( "download" ) . "\\" . $fileName;
    // check file exists
    if (file_exists ( $file )) {
     // get file content
     $data = file_get_contents ( $file );
     //force download
     force_download ( $fileName, $data );
    } else {
     // Redirect to base url
     redirect ( base_url () );
    }
   }
  }
 }
