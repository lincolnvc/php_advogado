<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class leave_types extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("leave_types_model");
		
	}
	
	
	function index(){
		$data['leave_types'] = $this->leave_types_model->get_all();
		$data['page_title'] = lang('leave_types');
		$data['body'] = 'leave_types/list';
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
				$save['leaves'] = $this->input->post('leaves');
				$save['description'] = $this->input->post('description');
            
				$this->leave_types_model->save($save);
                $this->session->set_flashdata('message', lang('leave_types saved'));
				redirect('admin/leave_types');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('leave_types');
		$data['body'] = 'leave_types/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['leave_type'] = $this->leave_types_model->get($id);
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
				$save['leaves'] = $this->input->post('leaves');
				$save['description'] = $this->input->post('description');
				$this->leave_types_model->update($save,$id);
               	$this->session->set_flashdata('message', lang('leave_types_updated'));
				redirect('admin/leave_types');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('leave_types');
		$data['body'] = 'leave_types/edit';
		$this->load->view('template/main', $data);	

	}
	
	function delete($id=false){
		
		if($id){
			$this->leave_types_model->delete($id);
			$this->session->set_flashdata('message',lang('leave_types_deleted'));
			redirect('admin/leave_types');
			
		}
	}	
	
}