<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class court_category extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("court_category_model");
	}
	
	
	function index(){
		$data['categories'] = $this->court_category_model->get_all();
		$data['page_title'] = lang('court') ." ". lang('categories');
		$data['body'] = 'court_category/list';
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
    			$this->court_category_model->save($save);
                $this->session->set_flashdata('message', lang('court_category_created'));
				redirect('admin/court_category');
				
			}
			
			
		}		
		
		
		$data['page_title'] = lang('add') . lang('court') . lang('category');
		$data['body'] = 'court_category/add';
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['category'] = $this->court_category_model->get_category_by_id($id);
		$data['id'] =$id;
		$data['categories'] = $this->court_category_model->get_all();
	
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$this->court_category_model->update($save,$id);
                $this->session->set_flashdata('message', lang('court_category_updated'));
				redirect('admin/court_category');
				
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('court') . lang('category'); 
		$data['body'] = 'court_category/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->court_category_model->delete($id);
			$this->session->set_flashdata('message',lang('court_category_deleted'));
			redirect('admin/court_category');
		}
	}	
		
	
}