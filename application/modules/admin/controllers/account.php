<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->check_session();
		
	}
	

	
	function index($id = false)
	{	
		$admin_se = $this->session->userdata('admin');
		if(!isset($admin_se['id']) || empty($admin_se['id'])){
			redirect('admin');
		}else{
			$id = $admin_se['id'];
		}
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['page_title']		= lang('user_account');
		
		//default values are empty if the customer is new
		$data['id']		= '';
		$data['name']	= '';
		$data['email']		= '';
		$data['username']	= '';
		$data['image']		= '';
		
		if ($id)
		{	
			$this->admin_id		= $id;
			$admin			= $this->auth->get_admin($id);
			//if the administrator does not exist, redirect them to the admin list with an error
			if (!$admin)
			{
				$this->session->set_flashdata('message', lang('admin_not_found'));
				redirect('admin/dashboard');
			}
			//set values to db values
			$data['id']			= $admin->id;
			$data['name']	= $admin->name;
			$data['email']		= $admin->email;
			$data['username']	= $admin->username;
			$data['access']		= $admin->user_role;
			$data['image']		= $admin->image;
		}
		
		$this->form_validation->set_rules('name', 'lang:name', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		$this->form_validation->set_rules('username', 'lang:username', 'trim|required|max_length[128]|callback_check_username');
		
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['body'] = 'account/admin_form';
			$this->load->view('template/main', $data);
		}
		else
		{
			$save['id']		= $id;
			$save['name']	= $this->input->post('name');
			$save['email']		= $this->input->post('email');
			$save['username']	= $admin->username;
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$this->auth->save($save);
			
			$this->session->set_flashdata('message',lang('admin_saved'));
			
			//go back to the customer list
			redirect(base_url('admin/dashboard'));
		}
	}

	
	
	function form($id = false)
	{	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['title']		= lang('user_profile');
		
		
		//default values are empty if the customer is new
		$data['id']		= '';
		$data['name']	= '';
		$data['email']		= '';
		$data['username']	= '';
		$data['image']		= '';
				
		
		if ($id)
		{	
			$this->admin_id		= $id;
			$admin				= $this->auth->get_admin($id);
			//if the administrator does not exist, redirect them to the admin list with an error
			if (!$admin)
			{
				$this->session->set_flashdata('message', lang('admin_not_found'));
				redirect($this->config->item('admin_folder').'/admin');
			}
			//set values to db values
			$data['id']			= $admin->id;
			$data['name']		= $admin->name;
			$data['email']		= $admin->email;
			$data['username']	= $admin->username;
			$data['image']		= $admin->image;
			
		$this->form_validation->set_rules('name', 'lang:name', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['body'] = 'account/admin_form';
			$this->load->view('template/main', $data);
		}
		else
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
				
						if ( !$img = $this->upload->do_upload('img')){
							
						}else{
								$img_data = array('upload_data' => $this->upload->data());
						}
						
						$save['image'] = $img_data['upload_data']['file_name'];
					}
		
		
		
			$save['id']			= $id;
			$save['name']		= $this->input->post('name');
			$save['email']		= $this->input->post('email');
			
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			$this->auth->save($save);
			$this->session->set_flashdata('message',lang('admin_saved'));
			
			//$this->session->set_flashdata('error',"Access Denied");
			
			redirect('admin/account');
		}
	}
	}
	
	function check_username($str)
	{
		$email = $this->auth->check_username($str, $this->admin_id);
		if ($email)
		{
			$this->form_validation->set_message('check_username', lang('username_is_taken'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}