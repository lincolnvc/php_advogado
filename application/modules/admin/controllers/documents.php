<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class documents extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("document_model");
		$this->load->model("cases_model");
		$this->load->library('form_validation');
	}
	
	
	function index(){
		$data['documents'] = $this->document_model->get_all();
		//echo '<pre>'; print_r($data['documents']);die;
		$data['page_title'] = lang('documents');
		$data['body'] = 'documents/list';
		$this->load->view('template/main', $data);	

	}	
	
	

	function add(){
	$data['cases'] = $this->cases_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			 
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('is_case', 'lang:case', '');
			
           
			if ($this->form_validation->run()==true)
            {
			
				$save['is_case']  = $is_case = $this->input->post('is_case');
				if($is_case == 1){
					$save['case_id'] = $this->input->post('case_id');
					$save['title'] = $this->input->post('title');
				}else{
					$save['title'] = $this->input->post('title');
				}
				
                
				$this->document_model->save($save);
			    $this->session->set_flashdata('message', lang('document_saved'));
				redirect('admin/documents');
			}
			
		}		
		$data['page_title'] = lang('add') . lang('document');
		$data['body'] = 'documents/add';
		$this->load->view('template/main', $data);	
}	
	


	function edit($id=false){
		//$data['fields'] = $this->custom_field_model->get_custom_fields(1);	
		$data['document'] = $this->document_model->get($id);
		$data['cases'] = $this->cases_model->get_all();
		$data['id'] = $id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('name', 'lang:case', '');
			
			if ($this->form_validation->run())
            {
			
				$save['is_case']  = $is_case = $this->input->post('is_case');
				if($is_case == 1){
					$save['case_id'] = $this->input->post('case_id');
					$save['title'] = $this->input->post('title');
				}else{
					$save['title'] = $this->input->post('title');
				}
				
				$this->document_model->update($save,$id);
                $this->session->set_flashdata('message', lang('document_updated'));
				redirect('admin/documents');
			}
			
			
		}
		$data['page_title'] = lang('edit') . lang('document');
		$data['body'] = 'documents/edit';
		$this->load->view('template/main', $data);	

	}
	
	
	function download($id)
	{
		$document = $this->document_model->get_document($id);
		$file = BASEPATH.'../uploads/documents/'.$document->file_name;
		$this->load->helper('download');
		force_download($document->file_name, $file);
		exit;
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
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
		redirect('admin/documents/manage/'.$document->document_id);
	}
	function manage($id=false){
		$data['document'] = $this->document_model->get($id);
		$data['documents'] = $this->document_model->get_all_documents($id);
		//echo '<pre>'; print_r($data['documents']);die;
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
					$save['document_id'] = $id;
					$save['title'] = $title;
					
					$this->document_model->save_document($save);
				
				}
				
			$this->session->set_flashdata('message', lang('document_saved'));
			redirect('admin/documents/manage/'.$id);

		}	
			
		

		$data['page_title'] = lang('manage') . lang('documents');
		$data['body'] = 'documents/manage';
		$this->load->view('template/main', $data);	

	}	
	


	function delete($id=false){
		
		if($id){
			$this->document_model->delete($id);
			$this->session->set_flashdata('message',lang('document_deleted'));
			redirect('admin/documents');
		}
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