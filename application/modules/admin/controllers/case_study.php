<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class case_study extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->auth->check_access('1', true);
		$this->load->model("case_study_model");
		$this->load->model("cases_model");
		
	}
	
	
	function index(){
		$data['case_study'] = $this->case_study_model->get_all();
		$data['page_title'] = lang('case_study');
		$data['body'] = 'case_study/list';
		$this->load->view('template/main', $data);	

	}	
	
	function add(){
		$data['case_categories'] = $this->cases_model->get_all_case_categories();
		$data['cases'] = $this->cases_model->get_all();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			//$this->form_validation->set_rules('name', 'lang:name', 'required','please enter your name');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('title', 'lang:title', 'required');
			$this->form_validation->set_rules('case_id', 'lang:case', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['case_categories'] = json_encode($this->input->post('case_category_id'));
				//$save['case_id'] = $this->input->post('case_id');
				$save['notes'] = $this->input->post('notes');
				$save['result'] = $this->input->post('result');
        		
				//echo '<pre>'; print_r($save);die;
				$this->case_study_model->save($save);
                $this->session->set_flashdata('message', lang('case_study_saved'));
				redirect('admin/case_study');
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('case_study');
		$data['body'] = 'case_study/add';
		
		
		$this->load->view('template/main', $data);	
	}	
	
	
	function edit($id=false){
		$data['case_categories'] = $this->cases_model->get_all_case_categories();
		$data['cases'] = $this->cases_model->get_all();
		$data['case_study'] = $this->case_study_model->get($id);
		$data['id'] =$id;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('title', 'lang:title', 'required');
			$this->form_validation->set_rules('case_id', 'lang:case', 'required');
			$this->form_validation->set_message('required', '%s can not be blank');
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['case_categories'] = json_encode($this->input->post('case_category_id'));
				//$save['case_id'] = $this->input->post('case_id');
				$save['notes'] = $this->input->post('notes');
				$save['result'] = $this->input->post('result');
				
				$this->case_study_model->update($save,$id);
               	$this->session->set_flashdata('message', lang('case_study_updated'));
				redirect('admin/case_study');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('case_study');
		$data['body'] = 'case_study/edit';
		$this->load->view('template/main', $data);	

	}
	
	function view($id=false){
		$data['case_categories'] = $this->cases_model->get_all_case_categories();
		$data['cases'] = $this->cases_model->get_all();
		$data['case_study'] = $this->case_study_model->get($id);
		$data['id'] =$id;
		$data['page_title'] = lang('view') . lang('case_study');
		$data['body'] = 'case_study/view';
		$this->load->view('template/main', $data);	

	}
	
	function download($id)
	{
		$document = $this->case_study_model->get_document($id);
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
	
	
	function attachments($id=false){
		$data['case_study'] = $this->case_study_model->get($id);
		//$data['document'] = $this->document_model->get($id);
		$data['documents'] = $this->case_study_model->get_all_documents($id);
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
					$save['case_study_id'] = $id;
					$save['title'] = $title;
					
					$this->case_study_model->save_document($save);
				
				}
				
			$this->session->set_flashdata('message', lang('attachments_saved'));
			redirect('admin/case_study/attachments/'.$id);

		}	
			
		

		$data['page_title'] = lang('manage') . lang('documents');
		$data['body'] = 'case_study/attachments';
		$this->load->view('template/main', $data);	

	}	
	
	
	function delete($id=false){
		
		if($id){
			$this->case_study_model->delete($id);
			$this->session->set_flashdata('message',lang('case_study_deleted'));
			redirect('admin/case_study');
			
		}
	}	
	
	function delete_document($id)
	{
		$document = $this->case_study_model->get_document($id);
		$file = BASEPATH.'../uploads/documents/'.$document->file_name;
		if (file_exists($file)) {
			unlink($file);
		}
		$this->case_study_model->delete_document($id);
		 $this->session->set_flashdata('message', lang('attachments_deleted'));
		redirect('admin/case_study/attachments/'.$document->case_study_id);
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