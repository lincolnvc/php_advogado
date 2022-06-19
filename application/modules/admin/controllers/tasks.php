<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("tasks_model");
		$this->load->model("user_role_model");
		$this->load->model("cases_model");
		$this->load->model("employees_model");
		$this->load->model("custom_field_model");
		$this->load->library('form_validation');
	}
	
	
	function index(){
		$data['tasks'] = $this->tasks_model->get_all();
		$data['page_title'] = lang('tasks');
		$data['body'] = 'tasks/list';
		$this->load->view('template/main', $data);	

	}	
	
	function my_tasks(){
		$data['tasks'] = $this->tasks_model->get_my_tasks();
		$data['page_title'] = lang('my_tasks');
		$data['body'] = 'tasks/my_tasks';
		$this->load->view('template/main', $data);	

	}	
	
	function comments($id=false){
		$data['task'] = $this->tasks_model->get($id);
		$data['messages'] = $this->tasks_model->get_commnets_by_task($id);  //messages == comments
		if(isset($_GET['my_tasks'])){
			$data['my_tasks']	= "my_tasks=".$_GET['my_tasks'];
		}else{
			$data['my_tasks']	= '';
		}
		
		$data['id'] =$id;
        $admin = $this->session->userdata('admin');
		$email = $this->tasks_model->get_users_email($id);
		
		foreach($email as $new){
			$email_list[] =  $new->email;
		}
        //echo '<pre>'; print_r($email_list );die;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('message', 'lang:comment', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
				$save['comment_by'] = $admin['id'];
				$save['task_id'] = $id;
				$save['comment'] = $this->input->post('message');
				$save['date_time'] = date("Y-m-d H:i:s");
				
				$this->tasks_model->save_comment($save);
                
				
				$msg 				 = html_entity_decode($save['message'],ENT_QUOTES, 'UTF-8');
				$params['recipient'] = $email_list;
				$params['subject'] 	 = "You Have New Comments From :". $admin['name']."On Task :".$data['task'];
				$params['message']   = $msg;
				modules::run('admin/fomailer/send_email',$params);
				
				$this->session->set_flashdata('message', lang('comment_success'));
				redirect('admin/tasks/comments/'.$id);
				
				if(isset($_GET['my_tasks'])){
					redirect('admin/my_tasks/comments/'.$id);
				}else{
					redirect('admin/tasks/comments/'.$id);
				}
				
			}
		}		
	
		$data['page_title'] =  lang('comments');
		$data['body'] = 'tasks/comments';
		$this->load->view('template/main', $data);	

	}	
	
	
	
	
	function add(){
		$data['fields'] = $this->custom_field_model->get_custom_fields(7);	
		$data['roles'] = $this->user_role_model->get_all();
		$data['employees'] = $this->tasks_model->get_all_employees();
		$data['cases'] = $this->cases_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			 //echo '<pre>'; print_r($_POST);die;
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('due_date', 'lang:due_date', '');
            $this->form_validation->set_rules('priority', 'lang:priority', 'required');
			$this->form_validation->set_rules('case_id', 'lang:case', '');
			$this->form_validation->set_rules('employee_id', 'lang:employee', '');
			$this->form_validation->set_rules('description', 'lang:employee', '');
			
           
			if ($this->form_validation->run()==true)
            {
			
				$save['name'] = $this->input->post('name');
				$save['priority'] = $this->input->post('priority');
				$save['due_date'] = $this->input->post('due_date');
				$save['case_id'] = $this->input->post('case_id');
				$save['progress'] = $this->input->post('progress');
				$save['description'] = $this->input->post('description');
				$save['created_by'] = $this->session->userdata('admin')['id'];
			    
				$task_id = $this->tasks_model->save($save);
				//echo '<pre>'; print_r($save);die;
				$save_user_tasks=array();
			    foreach($this->input->post('employee_id') as $new){
					$save_user_tasks[] = array(
											'user_id' =>$new,
											'task_id' =>$task_id
											);
				
				}
				
				$reply = $this->input->post('reply');
				if(!empty($reply)){
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $task_id,
							'form'=> 6,
						);	
					
					}	
					$this->custom_field_model->save_answer($save_fields);
				}
				//echo '<pre>'; print_r($save_user_tasks);die;
				$this->tasks_model->save_assigned_tasks($save_user_tasks);
				
				$this->session->set_flashdata('message', lang('tasks_saved'));
				redirect('admin/tasks');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('task');
		$data['body'] = 'tasks/add';
		$this->load->view('template/main', $data);	
	}	
	
	function edit($id){
		if(isset($_GET['my_tasks'])){
			$data['my_tasks']	= "my_tasks=".$_GET['my_tasks'];
		}else{
			$data['my_tasks']	= '';
		}
		
		$data['fields'] = $this->custom_field_model->get_custom_fields(7);	
		$data['roles'] = $this->user_role_model->get_all();
		$data['employees'] = $this->tasks_model->get_all_employees();
		$data['assigned_users'] = $this->tasks_model->get_assigned_user($id);
		//echo '<pre>'; print_r($data['assigned_users']);die;
		$data['cases'] = $this->cases_model->get_all();
		$data['task'] = $this->tasks_model->get($id);
		$data['id'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			 //echo '<pre>'; print_r($_POST);die;
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:name', 'required');
			$this->form_validation->set_rules('due_date', 'lang:due_date', '');
            $this->form_validation->set_rules('priority', 'lang:priority', 'required');
			$this->form_validation->set_rules('case_id', 'lang:case', '');
			$this->form_validation->set_rules('employee_id', 'lang:employee', '');
			$this->form_validation->set_rules('description', 'lang:employee', '');
			
           
			if ($this->form_validation->run()==true)
            {
			
				$save['name'] = $this->input->post('name');
				$save['priority'] = $this->input->post('priority');
				$save['due_date'] = $this->input->post('due_date');
				$save['case_id'] = $this->input->post('case_id');
				$save['progress'] = $this->input->post('progress');
				$save['description'] = $this->input->post('description');
			    
				$this->tasks_model->update($save,$id);
				//echo '<pre>'; print_r($save);die;
				$save_user_tasks=array();
				$eids  = $this->input->post('employee_id');
			   if(!empty($eids)){
					foreach($this->input->post('employee_id') as $new){
						$save_user_tasks[] = array(
												'user_id' =>$new,
												'task_id' =>$id
												);
					
					}
				}				
				$reply  = $this->input->post('reply');
				if(!empty($reply)){
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $id,
							'form'=> 7,
						);	
					
					}	
					$this->custom_field_model->delete_answer($id,$form=1);
					$this->custom_field_model->save_answer($save_fields);
				}
				//echo '<pre>'; print_r($save_user_tasks);die;
				$this->tasks_model->delete_assigned_tasks($id);
				$this->tasks_model->save_assigned_tasks($save_user_tasks);
				
				$this->session->set_flashdata('message', lang('tasks_updated'));
				if(isset($_GET['my_tasks'])){
					redirect('admin/tasks/my_tasks');
				}else{
					redirect('admin/tasks');
				}
				
				
			}
			
		}		
		$data['page_title'] = lang('edit') . lang('task');
		$data['body'] = 'tasks/edit';
		$this->load->view('template/main', $data);	
	}	
	
function view($id){
		
		$data['fields'] = $this->custom_field_model->get_custom_fields(7);	
		$data['roles'] = $this->user_role_model->get_all();
		$data['employees'] = $this->tasks_model->get_all_employees();
		$data['assigned_users'] = $this->tasks_model->get_assigned_user($id);
		$data['cases'] = $this->cases_model->get_all();
		$data['task'] = $this->tasks_model->get($id);
	
		$data['page_title'] = lang('view') . lang('task');
		$data['body'] = 'tasks/view';
		$this->load->view('template/main', $data);	
	}


	function delete($id=false){
		
		if($id){
			$this->tasks_model->delete($id);
			$this->tasks_model->delete_assigned_tasks($id);
			$this->session->set_flashdata('message',lang('tasks_deleted'));
			if(isset($_GET['my_tasks'])){
					redirect('admin/tasks/my_tasks');
				}else{
					redirect('admin/tasks');
				}
		}
	}	
		
	
}