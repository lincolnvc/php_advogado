<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoice extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("invoice_model");
		$this->load->model('setting_model');
		$this->auth->is_logged_in();
	}
	
	
	function index($id=false){
		$data['details'] = $this->invoice_model->get_detail($id);
		$data['taxes'] = $this->invoice_model->get_taxes($id);
		//echo '<pre>'; print_r($data['taxes']);die;
		$data['setting']   = $this->setting_model->get_setting();	
		$data['page_title'] = lang('invoice');
		$data['body'] = 'invoice/invoice';
		$this->load->view('template/main', $data);	

	}	
	
	function pdf($id=false){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['details'] = $this->invoice_model->get_detail($id);
		$data['taxes'] = $this->invoice_model->get_taxes($id);	
		$data['setting']   = $this->setting_model->get_setting();	
		$data['page_title'] = lang('invoice');
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('invoice/pdf', $data,true);		
		pdf_create($html, 'Invoice_'.$data['details']->invoice);
		

	}	
	
	
	public function mail($id=false)
	{ 
		$data['details'] = $this->invoice_model->get_detail($id);
		$taxes = $this->invoice_model->get_taxes($id);		
		$data['setting']   = $this->setting_model->get_setting();	
	    $data['body'] = 'invoice/pdf';
		///echo $data['setting']->image;die;
		if(!empty($data['setting']->image)){ 
 			$img = '<img src="'.site_url('assets/uploads/images/'.$data['setting']->image).'"  height="70" width="80"  style="padding-left:30px;" />';
 		}
			
		$message = '
						<html>
							<head>
								<title>Invoice</title>
							</head>
							<body>
								<table  width="90%" align="center" style="border: 1px solid #f4f4f4">
									<tr>
										<th colspan="3">'.lang('invoice').'</th>
									</tr>
									<tr >
										<th colspan="3" align="center">
											 <table border="0" width="100%"> 
												<tr>
													<td width="20%">
													'.@$img.'
													</td>
													<td><h2>'.$setting->name.'</h2></td>
													<td></td>
												</tr>
											</table>
										</th>
									</tr>
									<tr>
										<th>'.lang('from').'</th>
										<th>'.lang('to').'</th>
										<th></th>
									</tr>
									<tr>
										<td>'.$setting->name.'</td>
										<td>'.$details->client.'</td>
										<td>'.lang('invoice').' : #'.$details->invoice.'</td>
									</tr>
									<tr>
										<td>'.$setting->address.'</td>
										<td>'.$details->address.'</td>
										<td><b>'.lang('case_number').'</b>  :'.$details->case_no.'</td>
									</tr>
									<tr>
										<td>'.$setting->contact.'</td>
										<td>'.$details->contact.'</td>
										<td><b>'.lang('payment_mode').'</b> :'.$details->mode.'</td>
									</tr>
									<tr>
										<td>'.$setting->email.'</td>
										<td>'.$details->email.'</td>
										<td><b>'.lang('date').'</b> :'.date_convert($details->date).'</td>
									</tr>
									<tr>
										<td colspan="3" style="border:0px;">
											<table width="100%" style="border: 1px solid #f4f4f4">
												<tr>												
													<th align="left">'.lang('details').'</th>
													<th align="right">'.lang('amount').'</th>
												 </tr>	
												<tr>
													<td align="left">'.lang('payment').'</th>
													<td align="right">'.$details->amount.'</th>
													
												</tr>
										';
										foreach($taxes as $new){
											echo '<tr>
													<td align="left">'.$new->name.'<span  style="float:right">  '.$new->percent.'</span></td>
													<td align="right">'.number_format((float)$new->percent/100*$details->amount, 2, '.', '').'</th>
													
												</tr>';
										
										}		
									echo '	
											<tr>
													<td align="left">'.lang('total').'</th>
													<td align="right">'.$details->total.'</th>
													
												</tr>
										</table>	
										</td>
									</tr>	
								</table>
							
							</body>
						</html>

				';
		$msg 				 = html_entity_decode($message,ENT_QUOTES, 'UTF-8');
		$params['recipient'] = $data['details']->email;
		$params['subject'] 	 = "Invoice";
		$params['message']   = $msg;
		modules::run('admin/fomailer/send_email',$params);
	
	/*
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
			);
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		

        $this->load->library('email', $config);
			
		$this->email->initialize($config);
		
													
			
			//echo '<pre>';print_r($message);exit;
			$this->email->from($data['setting']->email,'Invoice');
			
			$email = $data['details']->email;
			$this->email->to($email);
			$this->email->subject('Invoice');
			$this->email->message(html_entity_decode($message,ENT_QUOTES, 'UTF-8'));
			$sent = $this->email->send();
			*/
			$this->session->set_flashdata('message', lang('invoice_sent'));
			redirect('admin/invoice/index/'.$id);
			//echo 'Mail Sent to '.$email;exit;
	}
	
		
	
	
}