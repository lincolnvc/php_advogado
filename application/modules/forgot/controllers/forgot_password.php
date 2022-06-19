<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forgot_password extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("forgot_model");
		
	}

	function index()
	{
        $this->load->helper('url');
        $this->load->library('email');
        $data['title']	=  lang('forgot_password');
        $token['token'] = time().sha1(uniqid(mt_rand(), true));
        $submitted = $this->input->post('submitted');
		if ($submitted)
		{
			$config['mailtype'] = 'html';
			
			$this->email->initialize($config);
	
			$this->load->helper('string');
			$email = $this->input->post('email');
			
			$reset = $this->forgot_model->edit_admin_to_save_code($email, $token);
			
	
			if ($reset)
			{						
				$this->session->set_flashdata('message', lang('reset_password_link_send_to_email'));
				redirect(site_url('forgot/forgot_password'));
			}
			else
			{
				$this->session->set_flashdata('message',lang('password_not_macthed'));
				redirect(site_url('forgot/forgot_password'));
			}
				
		}	
		
	   $this->load->view('forgot_password',$data);
	}	
	
	
	
	
	function reset_password()
	{
        $code = $this->uri->segment(4);

        $data['title']	=  lang('change_password');

        if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
			
			
			if ($this->form_validation->run()== FALSE)
			{
			} else {
			
				$pass = array(
				'token'=>"expired",
				'password'=>sha1($this->input->post('password'))
				);
				
				$email = $this->input->post('email');
				$this->forgot_model->save_password($pass, $email);
				$this->session->set_flashdata('message', lang('password_updated'));
				redirect(site_url(''));
			}
        }	
	   $this->load->view('reset_password', $data);
	}
	
	
	
	
	
}