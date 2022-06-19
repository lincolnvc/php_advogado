<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_category extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("case_category_model");
		
	}
	
	
	function index(){
		$data['categories'] = $this->case_category_model->get_all();
		$data['page_title'] = lang('case') ." ". lang('categories');
		$data['body'] = 'case_category/list';
		$this->load->view('template/main', $data);	
	}	
	
	function add(){
		$data['categories'] = $this->case_category_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			 $this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['parent_id'] = $this->input->post('parent_id');
                
				$this->case_category_model->save($save);
                $this->session->set_flashdata('message', lang('case_category_created'));
				redirect('admin/case_category');
				
			}
			
		}		
		
		
		$data['page_title'] = lang('add') . lang('case') . lang('category');
		$data['body'] = 'case_category/add';
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		$data['id'] =$id;
		$data['category'] = $this->case_category_model->get_category_by_id($id);
		
		$data['categories'] = $this->case_category_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required')); 
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['parent_id'] = $this->input->post('parent_id');
                
				$this->case_category_model->update($save,$id);
                $this->session->set_flashdata('message', lang('case_category_updated'));
				redirect('admin/case_category');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('case') . lang('category');
		$data['body'] = 'case_category/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->case_category_model->delete($id);
			 $this->session->set_flashdata('message', lang('case_category_deleted'));
			redirect('admin/case_category');
		}
	}	
		
	
}