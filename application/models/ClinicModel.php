<?php 

defined('BASEPATH') or exit ('No direct script access allowed');

class ClinicModel extends CI_Model{

	//insert new account into the database
	
	public function insertAccount($username,$password,$class,$date_created){
		$fields = array(
			'username' => $username,
			'password' => $password,
			'class' => $class,
			'date_created' => $date_created);
		$this->db->insert('accounts',$fields);
	}

	public function insertInfoStud($username,$lname,$fname,$mname,$college,$course,$yearlvl,$gender,$bday){
		$fields = array(
			'LastName' => $lname,
			'FirstName' => $fname,
			'MiddleName' => $mname,
			'College' => $college,
			'Course' => $course,
			'YearLevel' => $yearlvl,
			'Gender' => $gender,
			'Bday' => $bday,
			'username' => $username
		);
		$this->db->insert('info_stud',$fields);
	}

	public function insertInfoFacul($username,$lname,$fname,$mname,$dept,$gender,$bday){
		$fields = array(
			'LastName' => $lname,
			'FirstName' => $fname,
			'MiddleName' => $mname,
			'Department' => $dept,
			'Gender' => $gender,
			'Bday' => $bday,
			'username' => $username
		);
		$this->db->insert('info_facul',$fields);
	}

	//update account from the database

	public function updateInfoStud($username,$lname,$fname,$mname,$college,$course,$yearlvl,$gender,$bday){

		$fields = array(
			'LastName' => $lname,
			'FirstName' => $fname,
			'MiddleName' => $mname,
			'College' => $college,
			'Course' => $course,
			'YearLevel' => $yearlvl,
			'Gender' => $gender,
			'Bday' => $bday,
		);
		$this->db->where('username',$username);
		$this->db->update('info_stud',$fields);

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}

	}

	public function updateInfoFacul($username,$lname,$fname,$mname,$dept,$gender,$bday){

		$fields = array(
			'LastName' => $lname,
			'FirstName' => $fname,
			'MiddleName' => $mname,
			'Department' => $dept,
			'Gender' => $gender,
			'Bday' => $bday,
			'username' => $username
		);
		$this->db->where('username',$username);
		$this->db->update('info_facul',$fields);

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}

	}

	//retrieve user information from the database

	public function searchUser($table, $pk, $value){
		$this->db->where($pk,$value);
		$sql = $this->db->get($table);
		if($sql->num_rows()>0){
			return $sql->row();
		}else{
			return false;
		}
	}

	public function searchOngoingRecord($username){
		$this->db->where("username", $username);
		//$this->db->where("status", "On-going");
		$sql = $this->db->get("appointment");
		if($sql->num_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function addAppointment($date_created,$date_appoint,$guardian,$contact_no,$email,$username,$status){
		$fields = array(
			'date_created' => $date_created,
			'date_appoint' => $date_appoint,
			'guardian' => $guardian,
			'contact_num' => $contact_no,
			'email' => $email,
			'username' => $username,
			'status' => $status
		);

		$this->db->insert('appointment', $fields);
	}

	public function getAllAppointments($status){
		$this->db->where('status', $status);
		$this->db->order_by('date_appoint', 'asc');
		$sql = $this->db->get('appointment');
		if($sql->num_rows()>0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function getAllConsultations(){
		$this->db->order_by('id', 'desc');
		$sql = $this->db->get('consultation');
		if($sql->num_rows()>0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function getAllAppointments_user($username){
		$this->db->where('username',$username);
		$sql = $this->db->get('appointment');
		if($sql->num_rows()>0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function getAllConsultations_user($username){
		$this->db->where('username',$username);
		$sql = $this->db->get('consultation');
		if($sql->num_rows()>0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function removeAppointment($username){
		$this->db->where('username',$username);
		$this->db->delete('appointment');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function updateAppointmentStatus($username, $status){
		$this->db->where('username',$username);
		$this->db->update('appointment', [
		    'status' => $status,
		]);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function insert_to_Consultation($class,$date_create,$fname,$lname,$mname,$gender,$bday,$guardian,$contact_num,$email,$medhist,$weight,$height,$bmi,$temp,$pulse,$respiration,$bp,$doc,$diag,$treatment,$complaint,$user,$date){

		$fields = array(
			'class' => $class,
			'date_created' => $date_create,
			'FirstName' => $fname,
			'LastName' => $lname,
			'MiddleName' => $mname,
			'Gender' => $gender,
			'Bday' => $bday,
			'guardian' => $guardian,
			'contact_num' => $contact_num,
			'email' => $email,
			'med_history' => $medhist,
			'weight' => $weight,
			'height' => $height,
			'bmi' => $bmi,
			'temp' => $temp,
			'pulse' => $pulse,
			'respiration' => $respiration,
			'blood_pressure' => $bp,
			'doctor' => $doc,
			'diagnosis' => $diag,
			'treatment' => $treatment,
			'chief_complaint' => $complaint,
			'username' => $user,
			'date' => $date
		);

		$this->db->insert('Consultation', $fields);
	}

	public function getDashboardDataGender($gender){
		    $this->db->where('Gender',$gender);
    		$result = $this->db->get('consultation')->num_rows();

    		return $result;
	}

	public function getDashboardDataClass($class){
		    $this->db->where('class',$class);
    		$result = $this->db->get('consultation')->num_rows();

    		return $result;
	}

	public function sendNotification($username, $reason, $status){
		$fields = array(
			'username' => $username,
			'date' => date("Y-m-d"),
			'isread' => 0,
			'reason' => $reason,
			'status' => $status);
		$this->db->insert('notification',$fields);
	}

	public function getUserNotifications($username){
		$this->db->where('username',$username);
		$this->db->order_by('id', 'desc');
		$sql = $this->db->get('notification');
		if($sql->num_rows()>0){
			return $sql->result();
		}else{
			return false;
		}
	}

	public function getUserNotificationsNumber($username){
			$this->db->where('isread',0);
		    $this->db->where('username',$username);
    		$result = $this->db->get('notification')->num_rows();

    		return $result;
	}

	public function updateUserNotificationsRead($username){
    		$this->db->where('username',$username);
			$this->db->update('notification', [
			    'isread' => 1,
			]);
	}

	public function insertDatabaseBackupLog(){
			date_default_timezone_set('Asia/Manila');
			$date = date('y-m-d h:i:s');
			$fields = array(
			'date' => $date
		);

		$this->db->insert('database_backup', $fields);
	}

	public function getLatestDatabaseBackup(){
		return $this->db->select('date')->from('database_backup')->limit(1)->order_by('date','DESC')->get()->row();
	}

}
?>