   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->library(array('session', 'form_validation'));
  }

//Login Index page for school account
  public function index()
  {
    $data = array(
          'main_content' => 'login',
          'title' => 'Login to School'
    );
    $this->load->view('master', $data);
  }


//Register page for school account
  public function register()
  {
    $data = array(
          'main_content' => 'register',
          'title' => 'Register to School'
    );
    $this->load->view('master', $data);
  }


//Form action for login page
  public function school_login()
  {
    //set library
    $this->load->library('form_validation');

    //set form validation rules
    $this->form_validation->set_rules('sc_email', 'School Email', 'required');
    $this->form_validation->set_rules('sc_password', 'School Password', 'required');


    if($this->form_validation->run()===false){
      $data = array(
            'main_content' => 'login',
            'title' => 'Login to School'
      );
      $this->load->view('master', $data);
    }else{
      $school_email = $this->input->post('sc_email');
      $school_password = $this->input->post('sc_password');

      $this->load->model('school_model');
      $query = $this->school_model->set_login($school_email);
      if($query){
        foreach($query as $row){
          $pass = $row->schools_pass;
          $schools_email = $row->schools_email;
          $schools_id = $row->schools_id;
        }
        if(password_verify($school_password, $pass)){
          $schoolData = array(
            'school_email' =>$schools_email,
            'school_id' => $schools_id,
            'logged_in' => TRUE
          );
          $date = date("d-M-Y");
          $rows = $this->school_model->set_limit_check($date, $schools_id);
          if($rows !=1){
            $check = array(
              'limit_date' => $date,
              'limit_status' => 2,
              'limit_school_id' => $schools_id,
            );
            $this->school_model->set_limit_add($check);
          }
          $session = $this->session->set_userdata($schoolData);
         redirect(base_url('index.php/dashboard'));

       }else{
        $data = array(
              'main_content' => 'login',
              'title' => 'Login to School',
              'message' => 'Wrong email and password'
        );

        $this->load->view('master', $data);
      }
    }else{
      $data = array(
            'main_content' => 'login',
            'title' => 'Login to School',
            'message' => 'Wrong email and password'
      );

      $this->load->view('master', $data);
    }
  }
  }


//form action for register page
    public function school_register()
    {
      $this->load->library('form_validation');

      //set form validation rule
      $this->form_validation->set_rules('sc_name', 'School Name', 'required');
      $this->form_validation->set_rules('sc_reg', 'School Registration Number', 'required');
      $this->form_validation->set_rules('sc_email', 'School Email', 'required|valid_email|is_unique[schools.schools_email]',
                                array(
                                  'is_unique' => 'Email you entered is already exists',
                                  'valid_email' => 'Email you entered is not valid'
                                ));
      $this->form_validation->set_rules('sc_password', 'School Password', 'required');
      $this->form_validation->set_rules('sc_cpassword', 'School Confirm Password', 'required|matches[sc_password]');

      if($this->form_validation->run()===false){
        $data = array(
              'main_content' => 'register',
              'title' => 'Register to School'
        );
        $this->load->view('master', $data);

      }else{
        $config = array(
          'upload_path' => "./uploads/",
          'allowed_types' => "gif|jpg|png|jpeg",
          'overwrite' => TRUE,
          'max_size' => "9048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
          // 'max_height' => "768",
          // 'max_width' => "1024",
      );
        $this->load->library('upload', $config);
        if(! $this->upload->do_upload('sc_file') == 0){
          $imagename = $this->upload->data();
          $filename = $imagename['file_name'];

        $insert = array(
            'schools_name' => $this->input->post('sc_name'),
            'schools_regno' => $this->input->post('sc_reg'),
            'schools_pass' => password_hash($this->input->post('sc_password'), PASSWORD_DEFAULT),
            'schools_image' => $filename,
            'schools_email' => $this->input->post('sc_email')
        );

        $this->load->model('school_model');
        if($this->school_model->set_school_register($insert)){
          $data = array(
                'main_content' => 'register',
                'title' => 'Register to School',
                'message' => 'School Registered to the system'
          );
          $this->load->view('master', $data);
        }
      }else{
        $data = array(
              'main_content' => 'register',
              'title' => 'Register to School',
              'message' => 'You must upload image into the system'
        );
        $this->load->view('master', $data);
      }
      }
    }

    public function school_info(){
      if($this->session->userdata('school_email') == ''){
          echo "please login to access the page";
          redirect(base_url('index.php/Schools'),'refresh:2');
      }
        $emailSchool = $this->session->userdata('school_email'); // school email
         $idSchool = $this->session->userdata('school_id'); // school id

         $this->load->model('dashboard_model');
         $query = $this->dashboard_model->set_school_id($idSchool);
        $data = array(
            'main_content' => 'school_info',
            'title' => 'School info',
            'schoolData' => $query
        );
        $this->load->view('masterII', $data);
    }

    public function school_info_update(){
      $this->load->library('form_validation');
      if($this->session->userdata('school_email') == ''){
          echo "please login to access the page";
          redirect(base_url('index.php/Schools'),'refresh:2');
      }
      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

         //set form validation rule
         $this->form_validation->set_rules('sc_name', 'School Name', 'required');
         $this->form_validation->set_rules('sc_reg', 'School Registration Number', 'required');


         if($this->form_validation->run()===false){
           $data = array(
                  'main_content' => 'school_info',
                  'title' => 'School info'
           );
           $this->load->view('masterII', $data);
           $controller = base_url('index.php/Schools/school_info');
           header("Refresh:2, url={$controller}");
         }else{
           $update = array(
               'schools_name' => $this->input->post('sc_name'),
               'schools_regno' => $this->input->post('sc_reg'),
             );
             $schoolid = $this->input->post('sc-id');

             $this->load->model('school_model');
             $query = $this->school_model->set_update_school_info($update, $schoolid);

             if($query){
                 $data = array(
               'main_content' => 'school_info',
               'title' => 'School Info Updated',
               'message' => 'School info updated successfully'
             );

             $this->load->view('masterII', $data);
             $controller = base_url('index.php/schools/school_info');
             header("refresh:2, url={$controller}");
             }
         }
    }
    public function school_profile(){
      if($this->session->userdata('school_email') == ''){
          echo "please login to access the page";
          redirect(base_url('index.php/Schools'),'refresh:2');
      }
      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

      $this->load->model('dashboard_model');
      $query = $this->dashboard_model->set_school_id($idSchool);

      $data = array(
            'main_content' => 'school_profile',
            'title' => 'School Profile Picture',
            'schoolData' => $query
      );
      $this->load->view('masterII', $data);
    }

    public function school_profile_update(){
      if($this->session->userdata('school_email') == ''){
    echo "please login to access the page";
    redirect(base_url('index.php/Schools'),'refresh:2');
}
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id
    $config = array(
    'upload_path' => "./uploads/",
    'allowed_types' => "gif|jpg|png|jpeg",
    'overwrite' => TRUE,
    'max_size' => "9048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    // 'max_height' => "768",
    // 'max_width' => "1024",
  );
    $this->load->library('upload', $config);
      if(! $this->upload->do_upload('sc_file') == 0){
        $imagename = $this->upload->data();
        $filename = $imagename['file_name'];

        $update = array(
    'schools_image' => $filename,
);
  $schoolid = $this->input->post('sc-id');
  $this->load->model('school_model');
  $query = $this->school_model->set_update_profile($update, $schoolid);

  if($query){
    $data = array(
      'main_content' => 'school_profile',
      'title' => 'School Profile Image',
      'message' => 'School Profile Updated Successfully!'
);
$this->load->view('masterII', $data);
redirect('index.php/schools/school_profile');
  }else{
    echo"<script>alert('Failed to upload your image');window.location.href='school_profile'</script>";
    //redirect('index.php')
    //echo "no!";
  }
}else{
  echo"<script>alert('upload recommende image type jpg,png,jpeg,gif');window.location.href='school_profile'</script>";
  //redirect('index.php')
    //echo "upload recommende image type jpg,png,jpeg,gif";
}
      }

      public function school_password(){
        if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

        $this->load->model('dashboard_model');
        $query = $this->dashboard_model->set_school_id($idSchool);

        $data = array(
          'main_content'=> 'school_password',
          'title' => 'Change school password',
          'schoolData' => $query
        );
        $this->load->view('masterII', $data);
      }

      public function school_password_update(){
        $this->load->library('form_validation');
        if($this->session->userdata('school_email') == ''){
      echo "please login to access the page";
      redirect(base_url('index.php/Schools'),'refresh:2');
  }
      $emailSchool = $this->session->userdata('school_email'); // school email
      $idSchool = $this->session->userdata('school_id'); // school id

      //set form validation rules
      $this->form_validation->set_rules('sc_pass', 'School Password', 'required');
      $this->form_validation->set_rules('sc_cpass', 'School Confirm Password', 'required|matches[sc_pass]');

      if($this->form_validation->run()===false){
          $data = array(
                'main_content' => 'school_password',
                'title' => 'Change School Password'
          );
          $this->load->view('masterII', $data);
          $controller = base_url('index.php/schools/school_password');
          header("refresh:2, url={$controller}");

      }else{
          $update = array(
                'schools_pass' => password_hash($this->input->post('sc_pass'),PASSWORD_DEFAULT),
          );
          $schoolid = $this->input->post('sc-id');

          $this->load->model('school_model');
          $query = $this->school_model->set_update_school_password($update, $schoolid);

          if($query){
          $data = array(
                'main_content' => 'school_password',
                'title' => 'Change school password',
                'message' => 'School Password updated successfully!'
          );
          $this->load->view('masterII', $data);
          $controller = base_url('index.php/schools/school_password');
          header("refresh:2, url={$controller}");

}

      }
      }

      public function school_password_recovery(){
          $data = array(
              'main_content' => 'school_password_recovery',
              'title' => 'School recovery password'
          );
          $this->load->view('master', $data);
      }

      public function school_reset(){
        $this->load->library('phpmailer_library');
        $this->load->library('form_validation');

        //set form validation rule
        $this->form_validation->set_rules('sc_email', 'School Email', 'required|valid_email',
                                  array(
                                    'valid_email' => 'Email you entered is not valid'
                                  ));


          if($this->form_validation->run()===false){
            $data = array(
                'main_content' => 'school_password_recovery',
                'title' => 'School recovery password'
            );
            $this->load->view('master', $data);
          }else{
            $schoolEmail = $this->input->post('sc_email');
            $this->load->model('school_model');
            $query = $this->school_model->set_school_recovery_password($schoolEmail);

            if($query){
              $email = $this->phpmailer_library->load();

              //SMTP configuration
              $email->isSMTP();
              $email->Host = 'smtp.gmail.com';
              $email->SMTPAuth = true;
              $email->Username = 'shortclips999@gmail.com';
              $email->Password = 'shortclip@2020';
              $email->SMTPSecure = 'tls';
              $email->Port = 587;
      
              $email->setFrom('shortclips999@gmail.com', 'shortclip');
      
              //Add a recipient
              $email->addAddress($schoolEmail);
      
              //Email subject
              $email->Subject = 'PARENT NOTIFICATION SYSTEM || PNS School recover your password';
      
              //Set email format to HTML
              $email->isHTML(true);
      
              //Email body content
              $link = "<a href=".base_url('index.php/schools/school_recovery_password/'.$schoolEmail).">Click here to recover your password</a>";
              $emailContent = "PARENT NOTIFICATION SYSEM || PNS School <br>Reseting your account on the link below <br>$link";
              $email->Body = $emailContent;

            // Send email
            if(!$email->send()){
                $sms = 'Message could not be sent.';
                $sms = 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                $sms = 'Message has been sent to your email';
            }
              $data = array(
                  'main_content' => 'school_password_recovery',
                  'title' => 'School recovery password',
                  'message' => $sms
              );
                $this->load->view('master', $data);
            }else{
              $data = array(
                  'main_content' => 'school_password_recovery',
                  'title' => 'School recovery password',
                  'message' => 'Email is not valid..!!'
              );
                $this->load->view('master', $data);
            }
          }
      }

      public function school_recovery_password($email){
        $data = array(
            'main_content' =>'school_reset_password',
            'title' => 'School Reset Password'
        );
        $this->load->view('master', $data);
      }

      public function school_reset_confirm($email){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pass', 'School Password', 'required');
        $this->form_validation->set_rules('cpass', 'School Confirm Password', 'required|matches[pass]');

        if($this->form_validation->run()===false){
          $data = array(
              'main_content' => 'school_reset_password',
              'title' => 'School Reset Password',
          );
          $this->load->view('master', $data);
        }else{
          $update = array(
              'schools_pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
          );
          $this->load->model('school_model');
          $query = $this->school_model->set_school_reset_pass($update, $email);

          if($query){
            $data = array(
              'main_content' => 'login',
              'title' => 'login to school',
              'message' => 'School Password updated successfully!'
        );
        $this->load->view('master', $data);
        $controller = base_url('index.php/schools');
        header("refresh:2, url={$controller}");
          }
        }
      }
}
?>
