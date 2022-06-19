<?php 
 if(!empty($setting->image)){ 
 	$img = '<img src="'.base_url('assets/uploads/images/'.$setting->image).'"  height="70" width="150"  style="padding-left:30px;" />';
 }
echo '
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

';;
?>