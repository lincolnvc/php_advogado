<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class my_cases extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->check_access('2', true);
		$this->load->model("custom_field_model");
		$this->load->model("clients_model");
		$this->load->model("setting_model");
		$this->load->model("cases_model");
		$this->load->model("invoice_model");
		$this->load->model("case_stage_model");
		$this->load->library('form_validation');
		
	}
	
	
	function index(){
		
		$data['cases'] = $this->clients_model->get_case_by_client();
		$data['page_title'] = lang('my_cases');
		$data['body'] = 'my_cases/list';
		$this->load->view('template/main', $data);	

	}	
	
	function invoice($id=false){
		$data['details'] = $this->invoice_model->get_detail($id);
			
		$data['setting']   = $this->setting_model->get_setting();	
		$data['page_title'] = lang('invoice');
		$data['body'] = 'invoice/invoice';
		$this->load->view('template/main', $data);	

	}
	
	
	function details($id=false){
		$data['fields'] = $this->custom_field_model->get_custom_fields(2);	
		$data['clients']		 	= $this->cases_model->get_all_clients();
		$data['stages']				= $this->case_stage_model->get_all();
		$data['acts']			 	= $this->cases_model->get_all_acts();
		$data['courts']			 	= $this->cases_model->get_all_courts();
		$data['locations']		 	= $this->cases_model->get_all_locations();
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$data['court_categories']	= $this->cases_model->get_all_court_categories();
		$data['id'] =$id;
		
		$this->cases_model->case_view_by_client($id);		
		$data['payment_modes']		= $this->cases_model->get_all_payment_modes();
		$data['fees_all']			= $this->cases_model->get_fees_all($id);
		$data['case']				= $this->cases_model->get_archive_case_by_id($id);
		$data['cases']			 	= $this->cases_model->get_all_extended_case_by_id($id);
		$data['cases']			 	= $this->cases_model->get_all_extended_case_by_id($id);
		
		$data['page_title'] = lang('view') . lang('case');
		$data['body'] = 'case/view_case';
		$this->load->view('template/main', $data);	

	}
		
	function case_details($id){
	$this->auth->check_access('1', true);
		$data['cases'] = $this->clients_model->get_case_by_case_id($id);
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$data['acts']			 	= $this->cases_model->get_all_acts();
		$data['page_title'] = lang('view') . lang('case');
		$data['body'] = 'my_cases/view';
		$this->load->view('template/main', $data);	

	}
	
	function case_alert(){
		$this->cases_model->save_client_alert();
		$this->session->set_flashdata('message',lang('case_alert_saved'));
		redirect('admin/dashboard');	
	}
	
	function pdf($id=false){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['details'] = $this->invoice_model->get_detail($id);
			
		$data['setting']   = $this->setting_model->get_setting();	
		$data['page_title'] = lang('invoice');
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('invoice/pdf', $data,true);		
		pdf_create($html, 'Invoice_'.$data['details']->invoice);
		

	}	
	
	
	public function mail($id=false)
	{ 
		$data['details'] = $this->invoice_model->get_detail($id);
			
		$data['setting']   = $this->setting_model->get_setting();	
	    $data['body'] = 'invoice/pdf';
		
			
		$message = '
						<html>
							<head>
								<title>Invoice</title>
							</head>
							<body>
								<table  width="100%" align="center" border="1">
									<tr>
										<th colspan="3">'.lang('invoice').'</th>
									</tr>
									<tr>
										<th width="30%"><img src="'.site_url('assets/uploads/images/'.$data['setting']->image).'"  height="70" width="80" /></th>
										<th colspan="2">'.$data['setting']->name.'</th>
										
									</tr>
									<tr>
										<th>'.lang('from').'</th>
										<th>'.lang('to').'</th>
										<th></th>
									</tr>
									<tr>
										<td>'.$data['setting']->name.'</td>
										<td>'.$data['details']->client.'</td>
										<td>'.lang('invoice').' : #'.$data['details']->invoice.'</td>
									</tr>
									<tr>
										<td>'.$data['setting']->address.'</td>
										<td>'.$data['details']->address.'</td>
										<td><b>'.lang('case_number').'</b>  :'.$data['details']->case_no.'</td>
									</tr>
									<tr>
										<td>'.$data['setting']->contact.'</td>
										<td>'.$data['details']->contact.'</td>
										<td><b>'.lang('payment_mode').'</b> :'.$data['details']->mode.'</td>
									</tr>
									<tr>
										<td>'.$data['setting']->email.'</td>
										<td>'.$data['details']->email.'</td>
										<td></td>
									</tr>
									<tr>
										<th>'.lang('date').'</th>
										<th></td>
										<th>'.lang('amount').'</th>
									</tr>
									<tr>
										<td>'. date("d/m/Y", strtotime($data['details']->date)).'</td>
										<td></td>
										<td>'.$data['details']->amount.'</td>
									</tr>
								
								</table>
							
							</body>
						</html>
				';
		
		$this->load->library('email');
		$this->load->helper('string');    
		/*$config = array(
				'protocol' => "smtp",
				'smtp_host' => "ssl://smtp.gmail.com",
				'smtp_port' => "465",
				'smtp_user' => "",
				'smtp_pass' => "",
				'charset' => "utf-8",
				'mailtype' => "html",
				'newline' => "\r\n"
			);*/
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		

        $this->load->library('email', $config);
			
		$this->email->initialize($config);
		
			$this->email->from($data['setting']->email,'Invoice');
			$email = $data['details']->email;
			$this->email->to($email);
			$this->email->subject('Invoice');
			$this->email->message(html_entity_decode($message,ENT_QUOTES, 'UTF-8'));
			$sent = $this->email->send();
			$this->session->set_flashdata('message', lang('invoice_sent'));
			redirect('admin/my_cases/invoice/'.$id);
	}
		
	
		
	
}