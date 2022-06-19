<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->auth->check_session();
		$this->load->model("dashboard_model");
		$this->load->model("employees_model");
		$this->load->model("tasks_model");
		$this->load->model("cases_model");
		$this->load->model("case_study_model");
		$this->load->model("clients_model");
		$this->load->model("setting_model");
		$this->load->model("attendance_model");
		$this->load->model("leave_types_model");
	}
	
	
	function index() {
		$data['case_study'] = $this->case_study_model->get_all();
		$data['my_tasks'] = $this->tasks_model->get_my_tasks();
		$data['tasks'] = $this->tasks_model->get_all();
		$data['todays_leaves'] = $this->attendance_model->get_todays_leaves();
		$data['employees'] = $this->employees_model->get_all();
		$data['att_status'] = $this->attendance_model->get_attendance_today();
		$data['check_today'] = $this->attendance_model->check_today_is_leave();
		$data['clients'] 	= $this->dashboard_model->get_clients();
		$data['notice'] 	= $this->dashboard_model->get_notice();
		$data['my_cases']	= $this->clients_model->get_case_by_client();
		$data['starred'] 	= $this->cases_model->get_all_starred();
		$data['archived'] 	= $this->cases_model->get_all_archived();
		$data['client_setting']   = $this->setting_model->get_notification_setting_client();
		$data['cases'] 		= $this->dashboard_model->get_todays_cases();
		$data['to_do'] 		= $this->dashboard_model->get_todays_to_do();
		$data['case_all'] 	= $this->dashboard_model->get_case_all();
		$data['appointment_all'] = $this->dashboard_model->get_appointment_all();
		$data['leave_types'] = $this->leave_types_model->get_all();
		//echo '<pre>'; print_r($data['check_today']);die;
		
		$data['page_title'] = lang('dashboard');
		$data['body'] = 'dashboard/dashboard';
		$this->load->view('template/main', $data);	

	}	
	
		
	
}