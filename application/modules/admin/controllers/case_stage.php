<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_stage extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->auth->check_access('1', true);
		$this->load->model("case_stage_model");
	}
	
	
	function index(){
		$data['stages'] = $this->case_stage_model->get_all();
		$data['page_title'] = lang('case') . " " .lang('stages');
		$data['body'] = 'case_stages/list';
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
                
				$this->case_stage_model->save($save);
				$this->session->set_flashdata('message',lang('case_stage_created'));
    			redirect('admin/case_stage');
				
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('case') . lang('stage');
		$data['body'] = 'case_stages/add';
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['stage'] = $this->case_stage_model->get_case_stage_by_id($id);
		$data['id'] =$id;
	
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$this->case_stage_model->update($save,$id);
				$this->session->set_flashdata('message', lang('case_stage_updated'));
                redirect('admin/case_stage');
				
			}
		}		
	

		$data['page_title'] = lang('edit') . lang('case') . lang('stage');
		$data['body'] = 'case_stages/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->case_stage_model->delete($id);
			$this->session->set_flashdata('message', lang('case_stage_deleted'));
			redirect('admin/case_stage');
		}
	}	
		
	
}