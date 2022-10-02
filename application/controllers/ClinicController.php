<?php 

defined('BASEPATH') or exit ('No direct script access allowed');

class ClinicController extends CI_Controller{

	//constructor

	function __construct(){
		parent:: __construct();
		$this->load->model("ClinicModel","cm");
	}

	//load pages functions

	public function index(){
		$this->load->view('layout/header');
		$this->load->view('pages/index');
	}

	public function login(){
		$this->load->view('layout/header');
		$this->load->view('pages/login');
	}

	public function logout(){
		//$this->session->userdata('username');
		$this->session->sess_destroy();
		redirect(base_url('ClinicController/index'));
	}

	public function register(){
		$this->load->view('layout/header');
		$this->load->view('pages/register');
	}

	public function info_stud($username){
		$data['record'] = $this->cm->searchUser('info_stud','username',$username);
		$this->load->view('layout/header');
		$this->load->view('pages/user_info_stud', $data);
	}

	public function info_facul($username){
		$data['record'] = $this->cm->searchUser('info_facul','username',$username);
		$this->load->view('layout/header');
		$this->load->view('pages/user_info_facul', $data);
	}

	public function gotoHomeAdmin(){
		$data['records'] = $this->cm->getAllAppointments('On-going');

		$this->deleteExpiredAppointment($data['records'], 'true');

		$this->load->view('layout/header');
		$this->load->view('pages/admin_home', $data);
	}

	public function gotoHomeAdmin_approved(){
		$data['records'] = $this->cm->getAllAppointments('Approved');
		$this->load->view('layout/header');
		$this->load->view('pages/admin_approved', $data);
	}

	public function gotoHomeAdmin_history(){
		$data['records'] = $this->cm->getAllConsultations();
		$this->load->view('layout/header');
		$this->load->view('pages/admin_history', $data);
	}

	public function gotoHomeAdmin_dashboard(){
		$m = $this->cm->getDashboardDataGender('Male');
		$f = $this->cm->getDashboardDataGender('Female');
		$stud = $this->cm->getDashboardDataClass('Student');
		$facul = $this->cm->getDashboardDataClass('Faculty');
		$lastbackup = $this->cm->getLatestDatabaseBackup();

		$data = array(
		    'noOfMale' => $m,
		    'noOfFemale' => $f,
		    'noOfStud' => $stud,
		    'noOfFacul' => $facul,
		    'lastbackup' => $lastbackup
		);

		$this->load->view('layout/header');
		$this->load->view('pages/dashboard', $data);
	}

	public function gotoUserHome($username){
		$data['record'] = $this->cm->searchUser('accounts','username',$username);

		$data1['records'] = $this->cm->getAllAppointments('On-going');
		$this->deleteExpiredAppointment($data1['records'], 'false');

		$this->load->view('layout/header');
		$this->load->view('pages/user_home', $data);
	}

	//verify login credentials

	public function verifyAccount(){
		$username = strtoupper((string)$this->cm->input->post('username_login'));
		$password = $this->cm->input->post('password_login');
		$this->session->set_userdata('userid', $username);
		
		$result = $this->cm->searchUser('accounts','username',$username);

		if($username == "ADMIN" && $password == "admin"){
			redirect(base_url('ClinicController/gotoHomeAdmin'));
		}

		if($result->username == $username && $result->password == $password){
			
			$data['record'] = $result;
			$this->load->view('layout/header');
			$this->load->view('pages/user_home', $data);
		}else{
			$this->session->set_flashdata('error_msg','Invalid Student/Faculty Id or password');
			redirect(base_url('ClinicController/login'));
		}
		
	}

	//account creation

	public function addAccount(){
		$username = strtoupper((string)$this->cm->input->post('username_regist'));
		$password = $this->cm->input->post('password_regist');
		$re_password = $this->cm->input->post('password_regist_re');
		$class = $this->cm->input->post('class');
		$date_create = date("Y-m-d");

		$result = $this->isUserPresent($username);

		if($password != $re_password){
			$this->session->set_flashdata('error_msg','Password is not exactly matched!');
			redirect(base_url('ClinicController/register'));
		}

		if($result){
			$this->session->set_flashdata('error_msg','Duplicate Student/Faculty Id! Not Recorded');
			redirect(base_url('ClinicController/register'));
		}else if ($class == 'Student' && substr($username,0,1) != 'K' && substr($username,0,1) != 'A'){
			$this->session->set_flashdata('error_msg','Invalid Student ID!');
			redirect(base_url('ClinicController/register'));
		}else if ($class == 'Student' && strlen($username) != 9){
			$this->session->set_flashdata('error_msg','Invalid Student ID Length!');
			redirect(base_url('ClinicController/register'));
		}else if ($class == 'Faculty' && (substr($username,0,1) == 'K' || substr($username,0,1) == 'A')){
			$this->session->set_flashdata('error_msg','Invalid Faculty ID!');
			redirect(base_url('ClinicController/register'));
		}else{
			$this->session->set_flashdata('success_msg','Record has been added!');
			$this->cm->insertAccount($username,$password,$class,$date_create);
			
			if($class == 'Student'){
				$this->cm->insertInfoStud($username,'','','','','','','','');
			}else{
				$this->cm->insertInfoFacul($username,'','','','','','');
			}
			
			$data['record'] = $this->cm->searchUser('accounts','username',$username);
			$this->load->view('layout/header');
			redirect(base_url('ClinicController/register'));
		}
		
	}

	public function isUserPresent($user){
		$username = $this->cm->searchUser('accounts','username',$user);

		if($username != false){
			return true;
		}else{
			return false;
		}
	}

	public function editInfoStud($user){
		$username = $user;
		$lname = $this->cm->input->post('lname');
		$fname = $this->cm->input->post('fname');
		$mname = $this->cm->input->post('mname');
		$college = $this->cm->input->post('college');
		$course = $this->cm->input->post('course');
		$yearlvl = $this->cm->input->post('yearlvl');
		$gender = $this->cm->input->post('gender');
		$bday = $this->cm->input->post('bday');

		$this->session->set_flashdata('success_msg','Record has been updated!');
		$this->cm->updateInfoStud($username,$lname,$fname,$mname,$college,$course,$yearlvl,$gender,$bday);

		redirect(base_url('ClinicController/info_stud/'.$username));
	}


	public function editInfoFacul($user){
		$username = $user;
		$lname = $this->cm->input->post('lname');
		$fname = $this->cm->input->post('fname');
		$mname = $this->cm->input->post('mname');
		$dept = $this->cm->input->post('dept');
		$gender = $this->cm->input->post('gender');
		$bday = $this->cm->input->post('bday');

		$this->session->set_flashdata('success_msg','Record has been updated!');
		$this->cm->updateInfoFacul($username,$lname,$fname,$mname,$dept,$gender,$bday);

		redirect(base_url('ClinicController/info_facul/'.$username));
	}


	//add Appointment
	public function addAppointment($name){
		$username = $this->cm->input->post('user');

		if($name == 'NA'){
			$this->session->set_flashdata('error_msg','Please add Personal Information First!');
			$this->gotoUserHome($username);
		}else{
			$date_created = date("Y-m-d");
			$date_appoint = $this->cm->input->post('date_appoint');
			$guardian = $this->cm->input->post('guardian');
			$contact_no = $this->cm->input->post('contact_no');
			$email = $this->cm->input->post('email');
			
			$status = 'On-going';
			
			$result = $this->cm->searchOngoingRecord($username);

			if($result == true){
				$this->session->set_flashdata('error_msg','You still have an ongoing appointment.');
			}else{
				$this->session->set_flashdata('success_msg','Book Successfully!');
				$this->cm->addAppointment($date_created,$date_appoint,$guardian,$contact_no,$email,$username,$status);
			}

			redirect(base_url('ClinicController/gotoUserHome/'.$username));
		}
	}

	//delete Appointment
	public function deleteAppointment($username, $is_admin){
		$reason = $this->cm->input->post('reason');
		
		$username = $this->cm->input->post('user');
		$targetdate = '';

		$data['records'] = $this->cm->getAllAppointments_user($username);
		foreach($data['records'] as $record){
			 $targetdate = $record->date_appoint;
		}

		$result = $this->cm->removeAppointment($username);
		if($result){
			$this->session->set_flashdata('success_msg','Scheduled Appointment has been declined!');
			if($is_admin == 'true'){
				$reason = "Your appointment on " . $targetdate . " was declined. Reason: " .$reason;
				$this->cm->sendNotification($username, $reason, 0);
			}

		}else{
			$this->session->set_flashdata('error_msg','Failed to decline the Appointment Schedule!');
		}
	
		if($is_admin == 'true'){
			redirect(base_url('ClinicController/gotoHomeAdmin'));
		}else{
			redirect(base_url('ClinicController/gotoUserHome/'.$username));
		}
	}

	//approve
	public function updateAppointmentStatus($username){
		$result = $this->cm->updateAppointmentStatus($username, 'Approved');
		if($result){
			$this->session->set_flashdata('success_msg','Scheduled Appointment has been approved!');

			$targetdate = '';
			$data['records'] = $this->cm->getAllAppointments_user($username);
			foreach($data['records'] as $record){
				 $targetdate = $record->date_appoint;
			}
			$reason = "Your appointment on " . $targetdate . " was approved. You can visit the clinic between 8AM to 5PM.";
			$this->cm->sendNotification($username, $reason, 1);
		}else{
			$this->session->set_flashdata('error_msg','Scheduled Appointment has failed to approved');
		}
		redirect(base_url('ClinicController/gotoHomeAdmin'));
	}

	public function consultation($username){
		$result = $this->cm->searchUser('accounts', 'username', $username);
		$result2  = $this->cm->searchUser('appointment', 'username', $username);

		if($result->class == "Student"){
			$result3  = $this->cm->searchUser('info_stud', 'username', $username);
		}else{
			$result3  = $this->cm->searchUser('info_facul', 'username', $username);
		}
	
		$data['record'] = $result;
		$data['record2'] = $result2;
		$data['record3'] = $result3;
		$this->load->view('layout/header');
		$this->load->view('pages/consultation', $data);
	}

	public function insert_Consultation($username){
		$result = $this->cm->searchUser('accounts', 'username', $username);
		$class = $result->class;

		$date_create = $this->cm->input->post('date_create');

		$fname = $this->cm->input->post('fname');
		$lname = $this->cm->input->post('lname');
		$mname = $this->cm->input->post('mname');
		$gender = $this->cm->input->post('gender');
		$bday = $this->cm->input->post('bday');
		$guardian = $this->cm->input->post('guardian');
		$contact_num = $this->cm->input->post('contact_num');
		$email = $this->cm->input->post('email');

		//$medhist = $this->cm->input->post('medhist');
		
		$ctr = 0;
		if(!empty($_POST['medhist'])) {
		    foreach($_POST['medhist'] as $disease) {
		    	if ($ctr == 0){
		    		$medhist = $disease;
		    		$ctr++;
		    	} else {
		    		$medhist = $medhist . ", " . $disease;
		    	} 
		    }
		} else {
			$medhist = 'None';
		}

		$weight = $this->cm->input->post('weight');
		$height = (double)$this->cm->input->post('height');

		$bmi = round((double)$weight/(($height/100)*($height/100)), 2);
		if ($bmi <= 18.5) {
			$bmi = $bmi." - Under Weight";
		} else if ($bmi > 18.5 AND $bmi<=24.9 ) {
			$bmi = $bmi." - Normal Weight";
		} else if ($bmi > 24.9 AND $bmi<=29.9) {
			$bmi = $bmi." - Over Weight";
		} else if ($bmi > 30.0) {
			$bmi = $bmi." - Obese";
		}

		$temp = $this->cm->input->post('temp');
		$pulse = $this->cm->input->post('pulse');
		$respiration = $this->cm->input->post('respiration');
		$bp = $this->cm->input->post('bp');
		$doc = $this->cm->input->post('doc');
		$diag = $this->cm->input->post('diag');
		$treatment = $this->cm->input->post('treatment');

		//$complaint = $this->cm->input->post('complaint');

		$ctr = 0;
		if(!empty($_POST['complaint'])) {
		    foreach($_POST['complaint'] as $symptoms) {
		    	if ($ctr == 0){
		    		$complaint = $symptoms;
		    		$ctr++;
		    	} else {
		    		$complaint = $complaint . ", " . $symptoms;
		    	} 
		    }
		} else {
			$complaint = 'None';
		}

		$user = $username;
		$date = $this->cm->input->post('date_appoint'); 

		$this->session->set_flashdata('success_msg','Consultation Record Saved!');
		$result = $this->cm->insert_to_Consultation($class,$date_create,$fname,$lname,$mname,$gender,$bday,$guardian,$contact_num,$email,$medhist,$weight,$height,$bmi,$temp,$pulse,$respiration,$bp,$doc,$diag,$treatment,$complaint,$user,$date);

		//$this->cm->updateAppointmentStatus($username, 'Success');
		$this->cm->removeAppointment($username);
		redirect(base_url('ClinicController/gotoHomeAdmin_approved'));
	}

	public function printConsultation($id){
		$result  = $this->cm->searchUser('consultation', 'id', $id);
		$data['record'] = $result;

		$this->load->view('layout/header');
		$this->load->view('pages/print', $data);
	}

	public function deleteExpiredAppointment($records, $is_admin){
		if($records != NULL){
			foreach($records as $record){
				$user = $record->username;
				$date1 = date_create($record->date_created);
				$date2 = date_create($record->date_appoint);
				$diff=date_diff($date1,$date2);
				$value = $diff->format("%R%a");

				if ((int)$value <= 0){
					$reason = "Transaction Expired.";
					$targetdate = $record->date_appoint;
					$this->cm->removeAppointment($record->username);

					$reason = "Your appointment on " . $targetdate . " was declined. Reason: " .$reason;
					$this->cm->sendNotification($record->username, $reason, 0);

					if($is_admin == 'true'){
						redirect(base_url('ClinicController/gotoHomeAdmin'));
					}else{
						redirect(base_url('ClinicController/gotoUserHome/'.$record->username));
					}
				}
			}
		}
	}

	public function updateNotif($username){
		$this->cm->updateUserNotificationsRead($username);
		redirect(base_url('ClinicController/gotoUserHome/'.$username));
	}

	public function backupSqlDatabase(){
		$this->load->dbutil();

		$prefs = array(     
		    'format'      => 'zip',             
		    'filename'    => 'my_db_backup.sql'
		    );

		$backup =& $this->dbutil->backup($prefs); 

		$db_name = 'my_db_backup' .'.zip';

		$save = 'assets/db_backup/'.$db_name;

		$this->load->helper('file');
		write_file($save, $backup); 

		//Download backup to target location
		$db_name1 = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$this->load->helper('download');
		//force_download($db_name1, $backup);

		$this->session->set_flashdata('success_msg','The backup database has been saved to the system successfully.');
		$this->cm->insertDatabaseBackupLog();

		redirect(base_url('ClinicController/gotoHomeAdmin_dashboard'));
	}

	public function restoreSqlDatabase(){
		$zip_obj = new ZipArchive;

		if ($zip_obj->open('assets/db_backup/my_db_backup.zip') === TRUE) {
			$zip_obj->extractTo('assets/db_backup/');

			$temp_line = '';
		    $lines = file('assets/db_backup/my_db_backup.sql'); 
		    foreach ($lines as $line)
		    {
		        if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 1) == '#')
		            continue;
		        $temp_line .= $line;
		        if (substr(trim($line), -1, 1) == ';')
		        {
		            $this->db->query($temp_line);
		            $temp_line = '';
		        }
		    }

		    $this->session->set_flashdata('success_msg','The latest backup has been successfully restored.');
		    redirect(base_url('ClinicController/gotoHomeAdmin_dashboard'));
		}
		else {
			$this->session->set_flashdata('error_msg','Failed to restore. No backup file available.');
			redirect(base_url('ClinicController/gotoHomeAdmin_dashboard'));
		}
	}

}

?>