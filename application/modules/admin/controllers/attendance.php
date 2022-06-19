<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class attendance extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("attendance_model");
		$this->load->model("employees_model");
		
	}
	
	

	function index(){
	
		$attendance_null = $this->attendance_model->get_null_attendance();
			if(!empty($attendance_null)){
				foreach($attendance_null as $key => $val){
					$mark_in=date("Y-m-d", strtotime($val->mark_in));
					$mark_out_time = date("Y-m-d H:i:s", strtotime($mark_in .' '.$this->settings->mark_out_time)); 
					$save['mark_out'] = $mark_out_time;
					$this->attendance_model->update($save,$val->id);
					
				}
			}
		//echo '<pre>'; print_r($attendance_null);die;
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
		$begin = new DateTime($this->input->post('date1'));
		$end = new DateTime( $this->input->post('date2'));
		
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);
		
		for($i = $begin; $begin <= $end; $i->modify('+1 day')){
			$dates[] = $i->format("Y-m-d");
			
		}
		$data['dates'] = $dates;
		
			$data['employees'] = $this->attendance_model->get_employees();
			$date = $this->input->post('date1');
			$attendance = $this->attendance_model->get_attendance($date);
		
		}
		
		$data['page_title'] = lang('attendance');
		$data['body'] = 'attendance/attendance';
		$this->load->view('template/main', $data);	

	}	
	
	
	function my_attendance(){
		
		$attendance_null = $this->attendance_model->get_null_attendance();
			if(!empty($attendance_null)){
				foreach($attendance_null as $key => $val){
					$mark_in=date("Y-m-d", strtotime($val->mark_in));
					$mark_out_time = date("Y-m-d H:i:s", strtotime($mark_in .' '.$this->settings->mark_out_time)); 
					$save['mark_out'] = $mark_out_time;
					$this->attendance_model->update($save,$val->id);
					
				}
			}
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
		$begin = new DateTime($this->input->post('date1'));
		$end = new DateTime( $this->input->post('date2'));
		
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);
		
		for($i = $begin; $begin <= $end; $i->modify('+1 day')){
			$dates[] = $i->format("Y-m-d");
			
		}
		$data['dates'] = $dates;
		//echo '<pre>'; print_r($dates);die;
			$data['employees'] = $this->attendance_model->get_employee();
			$date = $this->input->post('date1');
			$attendance = $this->attendance_model->get_attendance($date);
			///echo '<pre>'; print_r($attendance);die;
		}
		
		$data['page_title'] = lang('attendance');
		$data['body'] = 'attendance/my_attendance';
		$this->load->view('template/main', $data);	

	}	
	
	function mark_in(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
				$admin = $this->session->userdata('admin');
				$save['user_id'] = $admin['id'];		
				$save['mark_in_notes'] = $this->input->post('notes');
				$save['mark_in'] = date("Y-m-d H:i:s");
				$save['mark_in_ip'] = $_SERVER['REMOTE_ADDR'];
				$save['current_status'] = 1;
				//echo '<pre>'; print_r($save);die;
				$id = $this->attendance_model->save($save);
				$this->session->set_flashdata('message', lang('mark_in_success'));
				redirect('admin/dashboard');
			
		}else{
			 $this->session->set_flashdata('error', lang('no_access'));
				redirect('admin/dashboard');
		
		}		
	}
	
	function mark_out(){
	$att = $this->attendance_model->get_attendance_today();
	//echo '<pre>'; print_r($att);die;
		if($att->current_status==1){
	
				if ($this->input->server('REQUEST_METHOD') === 'POST')
				{	
						$admin = $this->session->userdata('admin');
						//$save['user_id'] = $admin['id'];		
						$save['mark_out_notes'] = $this->input->post('notes');
						$save['mark_out'] = date("Y-m-d H:i:s");
						$save['mark_out_ip'] = $_SERVER['REMOTE_ADDR'];
						$save['current_status'] = 0;
										
						//echo '<pre>'; print_r($save);die;
						$this->attendance_model->update($save,$att->id);
						$this->session->set_flashdata('message', lang('mark_out_success'));
						redirect('admin/dashboard');
					
				}else{
					 $this->session->set_flashdata('error', lang('no_access'));
						redirect('admin/dashboard');
				
				}
		}else{
					 $this->session->set_flashdata('error', lang('something_was_wrong'));
						redirect('admin/dashboard');
				
		}				
	}	
	
	function apply_leave(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
		//echo '<pre>'; print_r($_POST);die;
			$f1 = $this->input->post('date');
			$f2 = $this->input->post('leave_id');
			$f3 = $this->input->post('reason');
			
			$save = array();
			
			
			$cnt = 0;
			$admin = $this->session->userdata('admin');
			foreach($_POST as $c_id=>$items) {
					if(empty($f1[$cnt])){
						continue;
					}
					$save[$cnt]['user_id'] = $admin['id'];		
					$save[$cnt]['date'] = $f1[$cnt];
					$save[$cnt]['leave_type_id'] = $f2[$cnt];
					$save[$cnt]['reason'] = $f3[$cnt];
					
					
					$cnt++;
				
			}
				$msg = "Hello ".$this->settings->name.", <<br />
				".$admin['name']." send a request for Leave.<br />
				
				<a href='".site_url('attendance/leave_notification')."'>Click Here To View</a>	
				";
				$msg 				 = html_entity_decode($msg,ENT_QUOTES, 'UTF-8');
				$params['recipient'] = $this->settings->email;
				$params['subject'] 	 = "Leave Request From :". $admin['name'];
				$params['message']   = $msg;
				modules::run('admin/fomailer/send_email',$params);
		
				//echo '<pre>'; print_r($save);die;
				$this->attendance_model->save_apply_leave($save);
				$this->session->set_flashdata('message', lang('leave_request_success'));
				redirect('admin/dashboard');
			
		}else{
			 $this->session->set_flashdata('error', lang('something_was_wrong'));
				redirect('admin/dashboard');
		
		}
	
	
	}	
	
	function update_leave($id,$status){
		$leave = $this->attendance_model->get_leave_by_id($id);
		if(isset($id) && isset($status)){
			$save['status'] = $status;
			$this->attendance_model->update_leave($save,$id);
			if($status==0){
				$l_status = "Approved";
				$this->session->set_flashdata('message', lang('leave_request_success'));
				redirect('admin/attendance/leave_notification');
			}else{
				$l_status = "Pending";
				$this->session->set_flashdata('message', lang('leave_approved'));
				redirect('admin/attendance/leave_notification');
			}
			
			$msg = "Hello ".$leave->user.", <<br />
				".$admin['name']." send a request for Leave.<br />
				
				<a href='".site_url('attendance/my_leaves')."'>Click Here To View</a>	
				";
				$msg 				 = html_entity_decode($msg,ENT_QUOTES, 'UTF-8');
				$params['recipient'] = $leave->email;
				$params['subject'] 	 = "Leave Request Satus is ".$l_status." ";
				$params['message']   = $msg;
				modules::run('admin/fomailer/send_email',$params);
		}else{
			 $this->session->set_flashdata('error', lang('leave_pending'));
				redirect('admin/attendance/leave_notification');
		
		}
	}
	
	function my_leaves(){
		$data['my_leaves'] = $this->attendance_model->get_my_leaves();
		$data['page_title'] = lang('my_leaves');
		$data['body'] = 'attendance/my_leaves';
		$this->load->view('template/main', $data);	

	}	
	
	function leave_notification(){
		$data['leaves'] = $this->attendance_model->get_all_leaves();
		$data['page_title'] = lang('leave_notification');
		$data['body'] = 'attendance/leave_notification';
		$this->load->view('template/main', $data);	

	}	
	
	function delete_my_leave($id){
		$leave = $this->attendance_model->get_my_leaves_id($id);
		if(!empty($leave)){
			$this->attendance_model->delete_my_leave($id);
			$this->session->set_flashdata('message', lang('leave_deleted'));
			redirect('admin/attendance/my_leaves');
		}else{
			$this->session->set_flashdata('error', lang('something_was_wrong'));
			redirect('admin/dashboard');
		}
	}
	
	function delete_leave($id){
		
			$this->attendance_model->delete_my_leave($id);
			$this->session->set_flashdata('message', lang('leave_deleted'));
			redirect('admin/attendance/my_leaves');
		
	}
	
}