<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class court extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->auth->check_access('1', true);
		$this->load->model("court_model");
		$this->load->model("location_model");
		$this->load->model("court_category_model");
		
	}
	
	
	function index(){
		$data['courts'] = $this->court_model->get_all();
		$data['page_title'] = lang('court');
		$data['body'] = 'court/list';
		$this->load->view('template/main', $data);	
	}	
	
	function add(){
		$data['locations'] = $this->location_model->get_all();
		$data['court_categories'] = $this->court_category_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['location_id'] = $this->input->post('location_id');
				$save['court_category_id'] = $this->input->post('court_category_id');
				$save['description'] = $this->input->post('description');
                
				$this->court_model->save($save);
                $this->session->set_flashdata('message', lang('court_created'));
				redirect('admin/court');
				
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('court');
		$data['body'] = 'court/add';
		
		$this->load->view('template/main', $data);	

	}	
	
	
	function edit($id=false){
		$data['locations'] = $this->location_model->get_all();
		$data['court_categories'] = $this->court_category_model->get_all();
		$data['court'] = $this->court_model->get_court_by_id($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['location_id'] = $this->input->post('location_id');
				$save['court_category_id'] = $this->input->post('court_category_id');
				$save['description'] = $this->input->post('description');
				$this->court_model->update($save,$id);
				$this->session->set_flashdata('message', lang('court_updated'));
                redirect('admin/court');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('court');
		$data['body'] = 'court/edit';
		$this->load->view('template/main', $data);	
	}	
	
	function delete($id=false){
		
		if($id){
			$this->court_model->delete($id);
			$this->session->set_flashdata('message', lang('court_deleted'));
			redirect('admin/court');
		}
	}	
		
	
}