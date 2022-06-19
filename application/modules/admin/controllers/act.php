<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class act extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("act_model");
		
	}
	
	
	function index(){
		$data['acts'] = $this->act_model->get_all();
		$data['page_title'] = lang('act');
		$data['body'] = 'act/list';
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
				$save['title'] = $this->input->post('name');
				$save['description'] = $this->input->post('description');
                
				$this->act_model->save($save);
                $this->session->set_flashdata('message', lang('act saved'));
				redirect('admin/act');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('act');
		$data['body'] = 'act/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		
		$data['act'] = $this->act_model->get_act_by_id($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			 $this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('name');
				$save['description'] = $this->input->post('description');
				
				$this->act_model->update($save,$id);
               	$this->session->set_flashdata('message', lang('act_updated'));
				redirect('admin/act');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('act');
		$data['body'] = 'act/edit';
		$this->load->view('template/main', $data);	

	}	
	
	function delete($id=false){
		
		if($id){
			$this->act_model->delete($id);
			$this->session->set_flashdata('message',lang('act_deleted'));
			redirect('admin/act');
			
		}
		
	function _custom_required($str, $func) {
     	   switch($func) {
            case 'name':
                $this->form_validation->set_message('custom_required', 'Enter your name');
                return (trim($str) == '') ? FALSE : TRUE;
                break;
            case 'second':
                $this->form_validation->set_message('custom_required', 'The variables are required');
                return (trim($str) == '') ? FALSE : TRUE;
                break;
        }
    }
	}	
		
	
}

class MY_Form_validation {
    public function custom_required($str) {
        if ( ! is_array($str)) {
            return (trim($str) == '') ? FALSE : TRUE;
        } else {
            return ( ! empty($str));
        }
    }
}
	
class MY_Form_validation1 extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();
    }
    function required_select($input)
    {
        $this->set_message('required_select','select %s');
        return FALSE;
    }

	
}