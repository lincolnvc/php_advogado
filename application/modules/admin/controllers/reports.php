<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("reports_model");
		
	}
	
	
	function index(){
		$data['months'] = $this->reports_model->get_earning_by_month();
		$data['weeks'] = $this->reports_model->get_earning_by_week();
		$data['years'] = $this->reports_model->get_earning_by_year();
		$data['clients'] = $this->reports_model->get_earning_by_client();
		$data['page_title'] = lang('reports');
		$data['body'] = 'reports/reports';
		$this->load->view('template/main', $data);	

	}	
	
		
		
	
}