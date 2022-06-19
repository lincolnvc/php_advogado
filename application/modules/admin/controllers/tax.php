<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tax extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("tax_model");
		
	}
	
	
	function index(){
		$data['tax'] = $this->tax_model->get_all();
		$data['page_title'] = lang('tax');
		$data['body'] = 'tax/list';
		$this->load->view('template/main', $data);	

	}	
	
	function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['percent'] = $this->input->post('percent');
        
				$this->tax_model->save($save);
                $this->session->set_flashdata('message', lang('tax_saved'));
				redirect('admin/tax');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('tax');
		$data['body'] = 'tax/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['tax'] = $this->tax_model->get($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['percent'] = $this->input->post('percent');
			
				$this->tax_model->update($save,$id);
               	$this->session->set_flashdata('message', lang('tax_updated'));
				redirect('admin/tax');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('tax');
		$data['body'] = 'tax/edit';
		$this->load->view('template/main', $data);	

	}
	
	function delete($id=false){
		
		if($id){
			$this->tax_model->delete($id);
			$this->session->set_flashdata('message',lang('tax_deleted'));
			redirect('admin/tax');
			
		}
	}	
	
}