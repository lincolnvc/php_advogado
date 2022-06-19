<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_mode extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->auth->check_access('1', true);
		$this->load->model("payment_mode_model");
		
	}
	
	
	function index(){
		$data['modes'] = $this->payment_mode_model->get_all();
		$data['page_title'] = lang('payment_mode');
		$data['body'] = 'payment_mode/list';
		$this->load->view('template/main', $data);	
	}	
	
	function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				
				$this->payment_mode_model->save($save);
                $this->session->set_flashdata('message', lang('payment_mode_created'));
				redirect('admin/payment_mode');
				
			}
			
		}		
		
		$data['page_title'] = lang('add') . lang('payment_mode');
		$data['body'] = 'payment_mode/add';
		
		$this->load->view('template/main', $data);	

	}	
	
	
	function edit($id=false){
		
		$data['mode'] = $this->payment_mode_model->get_payment_mode_by_id($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$this->payment_mode_model->update($save,$id);
        		$this->session->set_flashdata('message',lang('payment_mode_updated'));
		        redirect('admin/payment_mode');
				
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('payment_mode');
		$data['body'] = 'payment_mode/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->payment_mode_model->delete($id);
			$this->session->set_flashdata('message',lang('payment_mode_deleted'));
			redirect('admin/payment_mode');
		}
	}	
		
	
}