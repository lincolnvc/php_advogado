<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class custom_fields extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("custom_field_model");
		
	}
	
	
	function index($id=false){
		$data['fields'] = $this->custom_field_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('type', 'lang:field_type', 'required');
			$this->form_validation->set_rules('form', 'lang:select_form', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] 		 = $this->input->post('name');
				$save['field_type']  = $this->input->post('type');
				$save['form']		 = $this->input->post('form');
				$save['values']		 = $this->input->post('values');
                
				$this->custom_field_model->save($save);
                $this->session->set_flashdata('message', lang('field_created'));
				redirect('admin/custom_fields');
			}
		}		
			
		$data['page_title'] = lang('custome_fields');
		$data['body'] = 'custom_fields/form';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->custom_field_model->delete($id);
			$this->session->set_flashdata('message',lang('field_deleted'));
			redirect('admin/custom_fields');
		}
	}	
}