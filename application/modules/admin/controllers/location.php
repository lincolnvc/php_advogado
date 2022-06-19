<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class location extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("location_model");
		
	}
	
	
	function index(){
		$data['locations'] = $this->location_model->get_all();
		$data['page_title'] = lang('locations');
		$data['body'] = 'location/list';
		$this->load->view('template/main', $data);	

	}	
	
	function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
			   
				$this->location_model->save($save);
                $this->session->set_flashdata('message', lang('location_created'));
				redirect('admin/location');
			}
			
		}	
		$data['page_title'] = lang('add') . lang('location');
		$data['body'] = 'location/add';
		$this->load->view('template/main', $data);	

	}	
	
	
	function edit($id=false){
		
		$data['location'] = $this->location_model->get_location_by_id($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			 $this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$this->location_model->update($save,$id);
                $this->session->set_flashdata('message', lang('location_updated'));
				redirect('admin/location');
				
			}
		 }		
	
		$data['page_title'] = lang('edit') . lang('location');
		$data['body'] = 'location/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->location_model->delete($id);
			$this->session->set_flashdata('message',lang('location_deleted'));
			redirect('admin/location');
		}
	}	
		
	
}