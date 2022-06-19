<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employees extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("employees_model");
		$this->load->model("document_model");
		$this->load->model("user_role_model");
		$this->load->model("department_model");
		$this->load->model("custom_field_model");
		$this->load->library('form_validation');
	}
	
	
	function index(){
		$data['employees'] = $this->employees_model->get_all();
		
		$data['page_title'] = lang('employees');
		$data['body'] = 'employees/list';
		$this->load->view('template/main', $data);	

	}	
	
	
	function export(){
		$data['employees'] = $this->employees_model->get_all();
		$this->load->view('employees/export', $data);	

	}	
	
	function add(){
		$data['fields'] = $this->custom_field_model->get_custom_fields(6);	
		$data['employee_id'] = $this->employees_model->get_employee_id();
		if($data['employee_id']->employee_id==0){
			$data['e_id']	= $this->settings->employee_id;
		}else{
			$data['e_id']	= $data['employee_id']->employee_id+1;
		}
		
		
		$data['roles'] = $this->user_role_model->get_all();
		$data['departments'] = $this->department_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			 
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('gender', 'lang:gender', 'required');
			$this->form_validation->set_rules('dob', 'lang:date_of_birth', '');
            $this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]|is_unique[users.email]');
			$this->form_validation->set_rules('username', 'lang:username', 'trim|required|is_unique[users.username]');
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
			$this->form_validation->set_rules('contact', 'lang:phone', 'required');
			$this->form_validation->set_rules('address', 'lang:address', '');
			
           
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
							}
						$save['image'] = $img_data['upload_data']['file_name'];
					}
		
			
				$save['name'] = $this->input->post('name');
				$save['gender'] = $this->input->post('gender');
                $save['dob'] = $this->input->post('dob');
                $save['email'] = $this->input->post('email');
				$save['username'] = $this->input->post('username');
				$save['password'] = sha1($this->input->post('password'));
                $save['contact'] = $this->input->post('contact');
				$save['address'] = $this->input->post('address');
				$save['user_role'] = $this->input->post('role_id');
				$save['employee_id'] = $data['e_id'];
			    $save['department_id'] = $this->input->post('department_id');
				$save['designation_id'] = $this->input->post('designation_id');
				$save['joining_date'] = $this->input->post('joining_date');
				$save['joining_salary'] = $this->input->post('joining_salary');
			   	$save['status'] = $this->input->post('status');
				$p_key = $this->employees_model->save($save);
			
				$reply = $this->input->post('reply');
				if(!empty($reply)){
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $p_key,
							'form'=> 6,
						);	
					
					}	
					$this->custom_field_model->save_answer($save_fields);
				}
			    $this->session->set_flashdata('message', lang('employee_saved'));
				redirect('admin/employees');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('employees');
		$data['body'] = 'employees/add';
		$this->load->view('template/main', $data);	
}	
	


	function edit($id=false){
		$data['fields'] = $this->custom_field_model->get_custom_fields(6);	
		$data['employee'] = $this->employees_model->get($id);
		$data['roles'] = $this->user_role_model->get_all();
		$data['departments'] = $this->department_model->get_all();
		$data['designations'] = $this->department_model->get_designations($data['employee']->department_id);
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('gender', 'lang:gender', 'required');
            $this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]');
			$this->form_validation->set_rules('username', 'lang:username', 'trim|required|');
			$this->form_validation->set_rules('contact', 'lang:phone', 'required');
			$this->form_validation->set_rules('department_id', 'lang:department', 'required');
			$this->form_validation->set_rules('designation_id', 'lang:designation', 'required');
			$this->form_validation->set_rules('joining_date', 'lang:joining_date', '');
			$this->form_validation->set_rules('joining_salary', 'lang:joining_salary', '');
			
        	if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
			{
				$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]');
				$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
			}
			
			if ($this->form_validation->run())
            {
				if($_FILES['img'] ['name'] !='')
					{ 
						$config['upload_path'] = './assets/uploads/images/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
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
							}
						$save['image'] = $img_data['upload_data']['file_name'];
					}
				$save['name'] = $this->input->post('name');
				$save['gender'] = $this->input->post('gender');
                $save['dob'] = $this->input->post('dob');
                $save['email'] = $this->input->post('email');
				$save['username'] = $this->input->post('username');
				$save['contact'] = $this->input->post('contact');
				$save['address'] = $this->input->post('address');
				$save['user_role'] = $this->input->post('role_id');
				$save['department_id'] = $this->input->post('department_id');
				$save['designation_id'] = $this->input->post('designation_id');
				$save['joining_date'] = $this->input->post('joining_date');
				$save['joining_salary'] = $this->input->post('joining_salary');
				$save['status'] = $this->input->post('status');
			   
			   
			   if ($this->input->post('password') != '' || !$id)
				{
					$save['password']	= sha1($this->input->post('password'));
				}
				
				
				$reply  = $this->input->post('reply');
				if(!empty($reply)){
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $id,
							'form'=> 6,
						);	
					
					}	
					$this->custom_field_model->delete_answer($id,$form=1);
					$this->custom_field_model->save_answer($save_fields);
				}
				
				
				$this->employees_model->update($save,$id);
                $this->session->set_flashdata('message', lang('employee_updated'));
				redirect('admin/employees');
			}
			
			
		}
		$data['page_title'] = lang('edit') . lang('employee');
		$data['body'] = 'employees/edit';
		$this->load->view('template/main', $data);	

	}	
	
	
	
	function add_bank_details($id){
		$data['details'] = $this->employees_model->get_bank_details($id);
		
		$data['id']	= $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			 
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			
			$this->form_validation->set_rules('account_holder_name', 'lang:account_holder_name', 'required');
			$this->form_validation->set_rules('account_number', 'lang:account_number', 'required');
			
			$this->form_validation->set_rules('bank_name', 'lang:bank_name', 'required');
			$this->form_validation->set_rules('ifsc_code', 'lang:ifsc_code', 'required');
			$this->form_validation->set_rules('pan_number', 'lang:pan_number', 'required');
			$this->form_validation->set_rules('branch', 'lang:branch', 'required');
			
			
           
			if ($this->form_validation->run()==true)
            {
				$save['user_id'] = $id;
				$save['account_holder_name'] = $this->input->post('account_holder_name');
				$save['account_number']		 = $this->input->post('account_number');
				$save['bank_name'] 			 = $this->input->post('bank_name');
				$save['ifsc'] 		 	 = $this->input->post('ifsc_code');
				$save['pan']			 = $this->input->post('pan_number');
				$save['branch'] 			= $this->input->post('branch');
			
				$this->employees_model->save_bank_details($save);
				
				$this->session->set_flashdata('message', lang('bank_details_saved'));
				redirect('admin/employees/bank_details/'.$id);
			}
			
		}		
		$data['page_title'] = lang('add') . lang('employees');
		$data['body'] = 'employees/add_bank_details';
		$this->load->view('template/main', $data);	
	}
	
	function bank_details($id){
		$data['details'] = $this->employees_model->get_bank_details($id);
		
		$data['id']	= $id;
				
		$data['page_title'] =  lang('bank_details');
		$data['body'] = 'employees/bank_details';
		$this->load->view('template/main', $data);	
	}	


	function view($id=false){
		$data['fields'] = $this->custom_field_model->get_custom_fields(6);	
		$data['employee'] = $this->employees_model->get($id);
		
		$data['departments'] = $this->department_model->get_all();
		$data['designations'] = $this->department_model->get_designations($data['employee']->department_id);
		
		$data['page_title'] = lang('view') . lang('employee');
		$data['body'] = 'employees/view';
		$this->load->view('template/main', $data);	
	}	
	
	
	
	function get_degi(){
		
		$designations = $this->department_model->get_designations($_POST['id']);
		foreach($designations as $new){
			echo '<option val="'.$new->id.'">'.$new->designation.'</option>';
		}
	
	}
	
	
	function documents($id=false){
		$data['document'] = $this->document_model->get($id);
		$data['documents'] = $this->employees_model->get_all_documents($id);
		$data['employee'] = $this->employees_model->get($id);
		$data['id'] = $id;
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			
			$this->load->library('upload');
			$files = $_FILES;
			$cpt = count($_FILES['doc']['name']);
			//echo $cpt;die;
				for($i=0; $i<$cpt; $i++)
				{           
					$_FILES['userfile']['name']= $files['doc']['name'][$i];
					$_FILES['userfile']['type']= $files['doc']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['doc']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['doc']['error'][$i];
					$_FILES['userfile']['size']= $files['doc']['size'][$i];    
					
					//Title Name
					$title = $_POST['title'][$i];
					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload();
					
					$save['file_name'] = $_FILES['userfile']['name'];
					$save['user_id'] = $id;
					$save['title'] = $title;
					
					
					$this->document_model->save_document($save);
				
				}
				
			$this->session->set_flashdata('message', lang('document_saved'));
			redirect('admin/employees/documents/'.$id);

		}	
			
		

		$data['page_title'] = lang('manage') . lang('documents');
		$data['body'] = 'employees/documents';
		$this->load->view('template/main', $data);	

	}	


	function delete($id=false){
		
		if($id){
			$this->employees_model->delete($id);
			$this->session->set_flashdata('message',lang('employee_deleted'));
			redirect('admin/employees');
		}
	}	
	
	function delete_bank_details($id=false){
		$detail =	$this->employees_model->get_bank_detail($id);
		//echo '<pre>'; print_r($detail);die;
		if($id){
			$this->employees_model->delete_bank_details($id);
			$this->session->set_flashdata('message',lang('bank_details_deleted'));
			redirect('admin/employees/bank_details/'.$detail->user_id);
		}
	}	
	
	
	function delete_document($id)
	{
		$document = $this->document_model->get_document($id);
		$file = BASEPATH.'../uploads/documents/'.$document->file_name;
		if (file_exists($file)) {
			unlink($file);
		}
		$this->document_model->delete_document($id);
		 $this->session->set_flashdata('message', lang('document_deleted'));
		redirect('admin/employees/documents/'.$document->user_id);
	}
	function set_upload_options()
	{  //  upload an image and document options
		$config = array();
		$config['upload_path'] = BASEPATH.'../uploads/documents/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '0'; // 0 = no file size limit
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['overwrite'] = TRUE;
		return $config;
	}	
		
	
}