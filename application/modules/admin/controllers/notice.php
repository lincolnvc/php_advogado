<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notice extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("notice_model");
		
	}
	
	
	function index(){
		$data['notice'] = $this->notice_model->get_all();
		$data['page_title'] = lang('notice');
		$data['body'] = 'notice/list';
		$this->load->view('template/main', $data);	

	}	
	
	function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('title', 'lang:title', 'required');
			$this->form_validation->set_rules('date_time', 'lang:date', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['description'] = $this->input->post('description');
                $save['date_time'] = $this->input->post('date_time');
				$this->notice_model->save($save);
                $this->session->set_flashdata('message', lang('notice saved'));
				redirect('admin/notice');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('notice');
		$data['body'] = 'notice/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['notice'] = $this->notice_model->get($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('title', 'lang:title', 'required');
			$this->form_validation->set_rules('date_time', 'lang:date', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['description'] = $this->input->post('description');
				$save['date_time'] = $this->input->post('date_time');
				$this->notice_model->update($save,$id);
               	$this->session->set_flashdata('message', lang('notice_updated'));
				redirect('admin/notice');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('notice');
		$data['body'] = 'notice/edit';
		$this->load->view('template/main', $data);	

	}
	
	function view($id=false){
		
		$data['notice'] = $this->notice_model->get($id);
		$data['id'] =$id;
	
		$data['page_title'] = lang('edit') . lang('notice');
		$data['body'] = 'notice/view';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->notice_model->delete($id);
			$this->session->set_flashdata('message',lang('notice_deleted'));
			redirect('admin/notice');
			
		}
	}	
	
}