<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permissions extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("user_role_model");
		$this->load->library('form_validation');
	}
	
	
	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			//echo '<pre>';print_r($_POST);exit;
			
			if($this->user_role_model->update_permissions($this->input->post('access'))){
				$this->session->set_flashdata('flag', 1);
			}
			else{$this->session->set_flashdata('flag', 2);}
				redirect('admin/permissions');
		}
		
		
		$data['page_title'] = 'permissions';
		$data['body'] = 'permissions/permissions';
		$data['departments'] = $this->user_role_model->get_user_roles();
		$data['actions'] = $this->user_role_model->get_all_actions();
		$data['permissions'] = $this->user_role_model->get_permissions();
		//echo '<pre>';print_r($data['departments']);exit;
		$this->load->view('template/main',$data);
	}
	
}