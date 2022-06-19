<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class holidays extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("holiday_model");
		
	}
	
	
	function index(){
	
	//$days = $this->db->query()->result();
		//echo '<pre>'; print_r($days);die;
		
		$data['holidays'] = $this->holiday_model->get_all();
		$data['months'] = $this->holiday_model->get_months();
		$data['page_title'] = lang('holidays');
		$data['body'] = 'holidays/list';
		$this->load->view('template/main', $data);	

	}	

function sortByOrder($a, $b) {
	if($a['DayOfMonth']>31){
	return ;
	}else{
  	  return $a['DayOfMonth'] - $b['DayOfMonth'];
	}
}

	
	function add(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('date', 'lang:date', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['name'] = $this->input->post('name');
				$save['date'] = $this->input->post('date');
				$this->holiday_model->save($save);
                $this->session->set_flashdata('message', lang('holiday saved'));
				redirect('admin/holidays');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('holiday');
		$data['body'] = 'holidays/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	

	
	
	function delete($id=false){
		
		if($id){
			$this->holiday_model->delete($id);
			$this->session->set_flashdata('message',lang('holiday_deleted'));
			redirect('admin/holidays');
			
		}
	}	
		
	
}
