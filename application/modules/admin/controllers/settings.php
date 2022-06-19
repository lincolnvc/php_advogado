<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("cases_model");
		$this->load->model("setting_model");
		$this->load->model("canned_message_model");
		
	}
	
	

	function index(){
		$data['settings'] = $this->setting_model->get_setting();
		$data['days'] = $this->setting_model->get_days();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
		//echo '<pre>'; print_r($_POST);die;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:company_name', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				$photo = array();
					if($_FILES['img'] ['name'] !='')
					{ 
						
					
						$config['upload_path'] = './assets/uploads/images/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('img'))
							{
								
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
								$save['image'] = $img_data['upload_data']['file_name'];
							}
						
					}
				
				$save['name'] = $this->input->post('name');
				$save['address'] = $this->input->post('address');
				$save['header_setting'] = $this->input->post('header_setting');
				$save['contact'] = $this->input->post('contact');
				$save['email'] = $this->input->post('email');
				$save['employee_id'] = $this->input->post('employee_id');
				$save['date_format'] = $this->input->post('date_format');
				$save['timezone'] = $this->input->post('timezone');
				$save['smtp_host'] = $this->input->post('smtp_host');
				$save['smtp_user'] = $this->input->post('smtp_user');
				$save['smtp_pass'] = $this->input->post('smtp_pass');
				$save['smtp_port'] = $this->input->post('smtp_port');
				$save['mark_out_time'] = $this->input->post('mark_out_time');
				$save['invoice_no'] = $this->input->post('invoice_no');
			  	$this->setting_model->update($save);
				
				if(isset($_POST['days'])){	               
				   foreach($_POST['days'] as $key => $val){
						$this->setting_model->update_days($key,$val);
				   }
				 }  
			   
			    $this->session->set_flashdata('message', lang('general_settings_updated'));
				redirect('admin/settings');
				
			}
		}		
		
		
		$data['page_title'] = lang('genral_settings');
		$data['body'] = 'setting/setting';
		$this->load->view('template/main', $data);	

	}
	
	function canned_messages()
    {
        $data['canned_messages'] = $this->canned_message_model->get_list();
        $data['body'] = 'canned_message/canned_messages';
		 $data['page_title'] = lang('canned_messages');
		$this->load->view('template/main', $data);	
    }

  
    function canned_message_form($id=false)
    {
        $data['page_title'] = lang('canned_message_form');

        $data['id']         = $id;
        $data['name']       = '';
        $data['subject']    = '';
        $data['content']    = '';
        $data['deletable']  = 1;
        
        if($id)
        {
            $message = $this->canned_message_model->get_message($id);
                        
            $data['name']       = $message['name'];
            $data['subject']    = $message['subject'];
            $data['content']    = $message['content'];
            $data['deletable']  = $message['deletable'];
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name', 'lang:message_name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('subject', 'lang:subject', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('content', 'lang:message_content', 'trim|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $data['errors'] = validation_errors();
            
			$data['body'] = 'canned_message/canned_message_form';
			$this->load->view('template/main', $data);	
        }
        else
        {
            
            $save['id']         = $id;
            $save['name']       = $this->input->post('name');
            $save['subject']    = $this->input->post('subject');
            $save['content']    = $this->input->post('content');
            
            //all created messages are typed to order so admins can send them from the view order page.
            if($data['deletable'])
            {
                $save['type'] = 'order';
            }
            $this->canned_message_model->save_message($save);
            
            $this->session->set_flashdata('message', lang('message_saved_message'));
            redirect('admin/settings/canned_messages');
        }
    }
    
    function delete_message($id)
    {
        $this->canned_message_model->delete_message($id);
        
        $this->session->set_flashdata('message', lang('message_deleted_message'));
        redirect('admin/settings/canned_messages');
    }	
	
	
		
	
}