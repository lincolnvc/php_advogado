<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notification extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("cases_model");
		$this->load->model("notification_model");
		
		
	}
	
	

	function index(){
		$data['settings'] = $this->notification_model->get_setting();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('case', 'lang:case_alert_days', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['case_alert'] = $this->input->post('case');
				$save['to_do_alert'] = $this->input->post('to_do');
				$save['appointment_alert'] = $this->input->post('appointment');
				$this->notification_model->update($save);
                $this->session->set_flashdata('message', lang('notification_settings_updated'));
				redirect('admin/notification');
			}
			
		}		
		
		
		$data['page_title'] = lang('notification') . lang('settings');
		$data['body'] = 'notification/notification';
		$this->load->view('template/main', $data);	

	}	
	
	
		
	
}