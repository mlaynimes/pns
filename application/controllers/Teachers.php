<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	public function index()
	{
if($this->session->userdata('school_email') == ''){
		    echo "please login to access the page";
		    redirect(base_url('index.php/Schools'),'refresh:2');
		}

		$emailSchool = $this->session->userdata('school_email'); // school email
		$idSchool = $this->session->userdata('school_id'); // school id

		$data = array(
				'title' => 'Register Teachers Page',
				'main_content' => 'teacher',
				'schoolData'  => $idSchool

		);
		$this->load->view('masterII', $data);
	}


	public function teacher_register()
	{
		if($this->session->userdata('school_email') == ''){
				    echo "please login to access the page";
				    redirect(base_url('index.php/Schools'),'refresh:2');
				}
				$emailSchool = $this->session->userdata('school_email'); // school email
				$idSchool = $this->session->userdata('school_id'); // school id


		//set form validation rule
		$this->form_validation->set_rules('te_firstname', 'First Name', 'required');
		$this->form_validation->set_rules('te_middlename', 'Middle Name', 'required');
		$this->form_validation->set_rules('te_lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('te_mobilenumber', 'Mobile Number', 'required');
		$this->form_validation->set_rules('te_email', 'Email', 'required|valid_email|is_unique[teachers.teachers_email]',
										array(
											'is_unique' => 'Email you entered is already exists',
											'valid_email' => 'Email you entered is not valid'
										));
		$this->form_validation->set_rules('te_password', 'Password', 'required');
		$this->form_validation->set_rules('te_gender', 'Gender', 'required');
		$this->form_validation->set_rules('te_roles', 'Role', 'required');

		if($this->form_validation->run()===false){

			$data = array(
						'title' => 'Register Teachers Page',
						'main_content' => 'teacher'
			);

			$this->load->view('masterII', $data);
			$controller = base_url('index.php/Teachers');
			header("Refresh:2; url={$controller}");
		}else{

			$insert = array(
						'teachers_fname' => $this->input->post('te_firstname'),
						'teachers_mname' => $this->input->post('te_middlename'),
						'teachers_lname' => $this->input->post('te_lastname'),
						'teachers_mobile' => $this->input->post('te_mobilenumber'),
						'teachers_gender' => $this->input->post('te_gender'),
						'teachers_roles' => $this->input->post('te_roles'),
						'teachers_email' => $this->input->post('te_email'),
						'teachers_password' => password_hash($this->input->post('te_password'), PASSWORD_DEFAULT),
						'teachers_schools_id' => $this->input->post('schools_id')
			);

			$this->load->model('teacher_model');
			if($this->teacher_model->set_teachers($insert)){
					$data = array(
								'main_content' => 'teacher',
								'title' => 'Register Teachers Page',
								'message' => 'Teacher Registered to the system'
					);
					$this->load->view('masterII', $data);
					$controller = base_url('index.php/Teachers/manage_teachers');
					header("Refresh:2; url={$controller}");
			}else{
				$data = array(
							'main_content' => 'teacher',
							'title' => 'Register Teachers Page',
							'message' => 'Teacher Not Registered to the system'
				);
				$this->load->view('masterII', $data);

			}
		}
	}

	public function manage_teachers(){
		if($this->session->userdata('school_email') == ''){
				    echo "please login to access the page";
				    redirect(base_url('index.php/Schools'),'refresh:2');
				}

		$emailSchool = $this->session->userdata('school_email'); // school email
		$idSchool = $this->session->userdata('school_id'); // school id

		$this->load->model('teacher_model');
		$data = $this->teacher_model->set_manage_teachers($idSchool);
			$data = array(
						'title' => 'Manage Teachers',
						'main_content' => 'teacher_manage',
						'teachersData' => $data
			);

			$this->load->view('masterII', $data);
	}


	public function edit_teachers($teachersID){
		if($this->session->userdata('school_email') == ''){
        echo "please login to access the page";
        redirect(base_url('index.php/Schools'),'refresh:2');
    }
    $emailSchool = $this->session->userdata('school_email'); // school email
    $idSchool = $this->session->userdata('school_id'); // school id

						$this->load->model('teacher_model');
						$query = $this->teacher_model->set_edit_teachers($teachersID, $idSchool);

						$data = array(
								'title' => 'Teacher Edit page',
								'main_content' => 'teachers_edit',
								'EditTeacherID' => $query
						);

						$this->load->view('masterII', $data);

	}

	public function update_teachers(){
		if($this->session->userdata('school_email') == ''){
						echo "please login to access the page";
						redirect(base_url('index.php/Schools'),'refresh:2');
				}
				$emailSchool = $this->session->userdata('school_email'); // school email
				$idSchool = $this->session->userdata('school_id'); // school id


		//set form validation rule
		$this->form_validation->set_rules('te_firstname', 'First Name', 'required');
		$this->form_validation->set_rules('te_middlename', 'Middle Name', 'required');
		$this->form_validation->set_rules('te_lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('te_mobilenumber', 'Mobile Number', 'required');
		$this->form_validation->set_rules('te_gender', 'Gender', 'required');
		$this->form_validation->set_rules('te_roles', 'Role', 'required');

		if($this->form_validation->run()===false){
			$data = array(
						'title' => 'Update failed to the school',
						'main_content' => 'teachers_edit',
			);
			$this->load->view('masterII', $data);
			$controller = base_url('index.php/Teachers/manage_teachers');
			header("Refresh:1; url={$controller}");
		}else{
			$update = array(
						'teachers_fname' => $this->input->post('te_firstname'),
						'teachers_mname' => $this->input->post('te_middlename'),
						'teachers_lname' => $this->input->post('te_lastname'),
						'teachers_mobile' => $this->input->post('te_mobilenumber'),
						'teachers_gender' => $this->input->post('te_gender'),
						'teachers_roles' => $this->input->post('te_roles'),
					);
					$teacherId = $this->input->post('teachers_id');
					$this->load->model('teacher_model');
					$query = $this->teacher_model->set_update_teachers($update, $teacherId);

					if($query){
							$data = array(
											'main_content' => 'teachers_edit',
											'title' => 'Teacher updated successfully!',
											'message' => 'Teacher updated successfully'
							);
							$this->load->view('masterII', $data);
							$controller = base_url('index.php/Teachers/manage_teachers');
							header("Refresh:1; url={$controller}");
					}
	}
	}

	public function delete_teachers($teachersID){
		if($this->session->userdata('school_email') == ''){
				    echo "please login to access the page";
				    redirect(base_url('index.php/Schools'),'refresh:2');
				}

		$this->load->model('teacher_model');
		$query = $this->teacher_model->set_delete_teachers($teachersID);

		$data = array(
			'title' => 'Teacher Deleted to the system',
			'main_content' => 'teacher_manage',
		);
		redirect(base_url('index.php/Teachers/manage_teachers'));
	}



//role for teachers login pages
	public function login_teacher(){
		$data = array(
					'title' => 'Teacher Login to the system',
					'main_content' => 'teacher_login'
		);
		$this->load->view('master', $data);
	}

	public function teacher_login_ac(){

		//set library
		$this->load->library('form_validation');

		//set form validation
		$this->form_validation->set_rules('tc_email','Teacher Email','required');
		$this->form_validation->set_rules('tc_password','Teacher Password','required');

		if($this->form_validation->run()===false){
			$data = array(
					'main_content' => 'teacher_login',
					'title' => 'Teacher login page'
			);
			$this->load->view('master', $data);
		}else{
			$teacher_email = $this->input->post('tc_email');
			$teacher_password = $this->input->post('tc_password');

			$this->load->model('teacher_model');
			$query = $this->teacher_model->set_login($teacher_email);

			if($query){
				foreach($query as $row){
						$pass = $row->teachers_password;
						$teacher_email = $row->teachers_email;
						$teachers_id = $row->teachers_id;
						$school_id = $row->teachers_schools_id;

				}
				if(password_verify($teacher_password, $pass)){
					$teacherData = array(
						'schools_id' => $school_id,
						'teacher_email' => $teacher_email,
						'teacher_id' => $teachers_id,
						'logged_in' => TRUE
					);
					$session = $this->session->set_userdata($teacherData);
					redirect(base_url('index.php/Tdashboard'));
				}else{
						$data = array (
								'main_content' => 'teacher_login',
								'title' => 'teacher login',
								'message' => 'Wrong email and password'
						);
						$this->load->view('master', $data);
				}
			}else{
						$data = array (
									'main_content' => 'teacher_login',
									'title' => 'Teacher Login',
									'message' => 'Wrong email and password'
						);
						$this->load->view('master', $data);
			}
 		}

	}


	//teachers tasks
	public function teacher_task(){
		if($this->session->userdata('teacher_email') == ''){
						echo "please login to access the page";
						redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
				}

				$emailTeacher = $this->session->userdata('teacher_email'); // teacher email
				$idTeacher = $this->session->userdata('teacher_id'); // teacher id
				$idSchool = $this->session->userdata('schools_id'); // school id

				$this->load->model('teacher_model');
				$query = $this->teacher_model->set_teacher_task($idTeacher);

			$data = array(
						'title' => 'teacher tasks',
						'main_content' => 'teacher_task',
						'teacherData' => $query
			);
			$this->load->view('masterIII', $data);
	}

	public function teacher_attendance($assign_id, $students_year_entry){
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
						'title' => 'teacher attendance',
						'main_content' => 'teacher_attendance',
						'idteacher' => $idTeacher,
						'studentData' => $query
		);
		$this->load->view('masterIII', $data);
	}

	public function teacher_submit($assign_id, $students_year_entry){
		if($this->session->userdata('teacher_email') == ''){
			echo "please login to access the page";
			redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
		}
		$emailTeacher = $this->session->userdata('teacher_email'); // teacher email
		$idTeacher = $this->session->userdata('teacher_id'); // teacher id
	 	$idSchool = $this->session->userdata('schools_id'); // school id
		$this->load->model('teacher_model');
		$query = $this->teacher_model->set_student_attendance($assign_id, $students_year_entry, $idSchool);

		//print_r($query);
		$sum = 0;
		foreach($query as $data)
		{
			$sum +=0;
			$sum++;
		}
		$sum;

		//print_r($data);
		//$date =  Date('j-m-Y');
		$date = Date('m-Y');
	 	$day = Date('j');


		for($k=1; $k <= $sum; $k++){
			//data information from database
			$insert[$k] = array(
				//'attendance_data' => $this->input->post('attend_'.$k),
				'attendance_data' => $date,
				"d$day"	=> $this->input->post('attend_'.$k),
			//	'`28`'	=> $this->input->post('attend_'.$k),
				'attendance_standard_id' => $this->input->post('standardid_'.$k),
				'attendance_class_id' => $this->input->post('classid_'.$k),
				'attendance_schools_id' => $this->input->post('schoolid_'.$k),
				'attendance_teachers_id' => $this->input->post('teacherid_'.$k),
				'attendance_students_id' => $this->input->post('studentid_'.$k),
			);

			$message[$k] = array(
				'receiptId' => $this->input->post('rec_'.$k),
				'fullname' => $this->input->post('fullname_'.$k),
				'firstnumber' => $this->input->post('fn_'.$k),
				'secondnumber' => $this->input->post('sn_'.$k),
				'schoolname' => $this->input->post('sc_'.$k),
				'attendance' => $this->input->post('attend_'.$k),
				'class' => $this->input->post('cl_'.$k)
			);

		}
		//print_r($insert);
			$this->load->model('attendance_model');
			$query = $this->attendance_model->set_update_attendance($insert,$date);

			if ($query){
			$today =  Date('j-m-Y');
				//print_r($message);
				foreach($message as $sms){
					$fullname = $sms['fullname'];
					$receiptId = $sms['receiptId'];
					$firstnumber = $sms['firstnumber'];
					$secondnumber = $sms['secondnumber'];
				  $schoolname = $sms['schoolname'];
					$attendance = $sms['attendance'];
					$class = $sms['class'];
					// $schoolname;

					if($attendance != "V"){

					if ($attendance == "X") {
							$smses = "Message from $schoolname \nStudent $fullname \nDate: $today \nAttendance from standard $class\nThis student is ABSENT to the Class";
					}else {
							$smses = "Message from $schoolname \nStudent $fullname \nDate: $today  \nAttendance from standard $class\nThis student is ABSENT BUT WE HAVE HIS/HER REPORT to the Class";
					}
					$smses;

					$api_key='bee982b307ad6c89';
				  $secret_key = 'MzNhMzNiZWVjNTYxYmMyNmU3ZmI3MmYxMGRkYzlkNTU3NjFmYTNmNDFjOWFjY2IzMDkyODMwODA1MzYxZjIyMQ==';
				  // The data to send to the API
				  $postData = array(
				      'source_addr' => 'PNSNOTIFIER',
				      'encoding'=>0,
				      'schedule_time' => '',
				      'message' => $smses,
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
				  $response2 = json_decode($response);
					$success = $response2->successful;
					$requestid = $response2->request_id;
					$code = $response2->code;
					$message = $response2->message;
					$valid = $response2->valid;
					$invalid = $response2->invalid;
					$duplicate = $response2->duplicates;
				}
				$url = base_url('index.php/Teachers/teacher_task/');
				echo "<script>
						alert('".$message."');
						window.location.href='".$url."';
						</script>";
			}
		}else{
			//	echo 'attendance not submitted';
			//	echo'<script>alert("You failed to taking attendance");</script>';
				$controller = base_url('index.php/Teachers/teacher_task');
				redirect($controller);

			}

}

	public function teacher_view($assign_id, $student_year_entry){
		if($this->session->userdata('teacher_email') == ''){
			echo "please login to access the page";
			redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
		}
		$emailTeacher = $this->session->userdata('teacher_email'); // teacher email
		$idTeacher = $this->session->userdata('teacher_id'); // teacher id
		$idSchool = $this->session->userdata('schools_id'); // school id

		$date = Date('m-Y');

		$this->load->model('attendance_model');
		$query = $this->attendance_model->set_attendance_view($assign_id, $student_year_entry, $idSchool, $date);
		//print_r($query);

		$data = array(
					'title' => 'View students attendance',
					'main_content' => 'teacher_view',
					'attendanceData' => $query
		);
		$this->load->view('masterIII', $data);
	}


	public function password_teachers($teachersID){
		if($this->session->userdata('school_email') == ''){
						echo "please login to access the page";
						redirect(base_url('index.php/Schools'),'refresh:2');
				}
				$emailSchool = $this->session->userdata('school_email'); // school email
				$idSchool = $this->session->userdata('school_id'); // school id

				$this->load->model('teacher_model');
			$query = $this->teacher_model->set_edit_teachers($teachersID, $idSchool);

				$data = array(
						'title' => 'Change teacher password',
						'main_content' => 'teacher_password',
						'EditPassword' => $query
				);
				$this->load->view('masterII', $data);

	}


	public function update_password_teacher(){
		if($this->session->userdata('school_email') == ''){
		    echo "please login to access the page";
		    redirect(base_url('index.php/Schools'),'refresh:1');
		}
		  $emailSchool = $this->session->userdata('school_email'); // school email
		  $idSchool = $this->session->userdata('school_id'); // school id

		$this->form_validation->set_rules('tc_password', 'Teacher Password', 'required');
		$this->form_validation->set_rules('tc_cpassword',  'Teacher Confirm Password', 'required|matches[tc_password]');

		if($this->form_validation->run()===false){
			$data = array(
					'title' => 'Change teacher password',
					'main_content' => 'teacher_password',
			);
			$this->load->view('masterII', $data);
			$controller = base_url('index.php/Teachers/manage_teachers');
			header("Refresh:2; url={$controller}");
		}else{
				$update = array(
							'teachers_password' => password_hash($this->input->post('tc_password'), PASSWORD_DEFAULT),
				);
				$teacherid = $this->input->post('tc_id');
				$this->load->model('teacher_model');
				$query	= $this->teacher_model->set_update_teacher_pass($update, $teacherid);

				if($query){
						$data = array(
									'title' => 'Teacher password update to the system',
									'main_content' => 'teacher_password',
									'message' => 'Teacher password update successfully'
						);
						$this->load->view('masterII', $data);
						$controller = base_url('index.php/Teachers/manage_teachers');
						header("Refresh:1; url={$controller}");
				}
		}
	}


	public function teacher_report($assign_id, $students_year_entry){
		if($this->session->userdata('teacher_email') == ''){
			echo "please login to access the page";
			redirect(base_url('index.php/Teachers/login_teacher'),'refresh:2');
		}
		$emailTeacher = $this->session->userdata('teacher_email'); // teacher email
		$idTeacher = $this->session->userdata('teacher_id'); // teacher id
		$idSchool = $this->session->userdata('schools_id'); // school id

			$this->load->model('attendance_model');
			$query = $this->attendance_model->set_report_attendance($assign_id, $students_year_entry);

			if($query){
				$data = array(
							'title' => 'Teacher attendance report',
							'main_content' => 'teacher_report',
							'reportData' => $query
				);
				$this->load->view('masterIII', $data);
			}
	}
	}
