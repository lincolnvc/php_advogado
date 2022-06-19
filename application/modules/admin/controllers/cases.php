<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cases extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//$this->auth->check_access('1', true);
		
		$this->load->model("cases_model");
		$this->load->model("tax_model");
		$this->load->model("location_model");
		$this->load->model("case_stage_model");
		$this->load->model("custom_field_model");
		
	}
	
	
	function index(){
		
		$data['cases'] = $this->cases_model->get_all();
		$data['courts'] = $this->cases_model->get_all_courts();
		$data['clients'] = $this->cases_model->get_all_clients();
		$data['locations'] = $this->location_model->get_all();
		$data['stages'] = $this->case_stage_model->get_all();
		$data['page_title'] = lang('case');
		$data['body'] = 'case/list';
		$this->load->view('template/main', $data);	
	}
	
	
	
	function get_case_by_client(){
		$cases = $this->cases_model->get_cases_by_client_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}
	
	function get_case_by_client_starred(){
		$cases = $this->cases_model->get_cases_by_client_id_starred($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}	
	
	
	
	function get_case_by_court(){
		$cases = $this->cases_model->get_cases_by_court_id($_POST['id']);
	
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	function get_case_by_court_starred(){
		$cases = $this->cases_model->get_cases_by_court_id_starred($_POST['id']);
	
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	

	function get_case_by_location(){
		$cases = $this->cases_model->get_cases_by_location_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	function get_case_by_location_starred(){
		$cases = $this->cases_model->get_cases_by_location_id_starred($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}


	function get_case_by_case_stage_id(){
		$cases = $this->cases_model->get_cases_by_case_stage_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	function get_case_by_case_stage_id_starred(){
		$cases = $this->cases_model->get_cases_by_case_stage_id_starred($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}


	function get_case_by_case_filing_date(){
		$cases = $this->cases_model->get_cases_by_filing_date($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                    	 echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
						echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	function get_case_by_case_filing_date_starred(){
		$cases = $this->cases_model->get_cases_by_filing_date_starred($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                   ';
				   		if(isset($cases)):
                    	 echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                   <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
						echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}


	function get_case_by_case_hearing_date(){
		$cases = $this->cases_model->get_cases_by_hearing_date($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}

	function get_case_by_case_hearing_date_starred(){
		$cases = $this->cases_model->get_cases_by_hearing_date_starred($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('client').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				   		if(isset($cases)):
                     echo '   
						<tbody>
                            ';
							 $i=1;foreach ($cases as $new){
							 
							 echo '
                                <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
									
								'; if($new->is_starred==0){ 
								echo '
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
								echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>
								';
									}
									
								echo'	</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									
                                    <td width="47%">
										<a class="btn btn-default"  href="'.site_url('admin/cases/view_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										<a class="btn btn-info"  href="'.site_url('admin/cases/fees/'.$new->id).'"><i class="fa fa-inr"></i> '.lang('fees').'</a>	
                                      	<a class="btn btn-success"  href="'.site_url('admin/cases/dates/'.$new->id).'"><i class="fa fa-calendar"></i> '.lang('hearing_date').'</a>							
                                        <a class="btn btn-primary"  href="'.site_url('admin/cases/edit/'.$new->id) .'"><i class="fa fa-edit"></i> '.lang('edit').'</a>
										<a class="btn btn-warning"  href="'.site_url('admin/cases/archived/'.$new->id).'"><i class="fa fa-close"></i> '.lang('archived').'</a>
                                    </td>
                                </tr>
							';	
                              $i++;}
					echo '		  
                        </tbody>';
                        endif;
                    
				echo '</table>';
					
		
	}


	
	function view_all(){
		$data['cases'] = $this->cases_model->get_case_by_date();
		$ids='';
		foreach($data['cases'] as $ind => $key){
		
			$ids[]=$key->case_id;
		}
		
		$this->cases_model->cases_view_by_admin($ids);
		$data['page_title'] =  lang('view_all') . lang('cases');
		$data['body'] = 'case/view_all';
		$this->load->view('template/main', $data);	

	}	
	
	function get_court_categories()
	{
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$result = $this->cases_model->get_court_catogries_by_location($_POST['id']);

		echo '
		<select name="court_category_id" id="court_category_id" class="chzn col-md-12" >
										<option value="">--Select Court Category--</option>
									';
									foreach($result as $new) {
											$sel = "";
											if(set_select('court_category_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
		echo'</select>';						
	}
	
	function get_courts()
	{
		$courts = $this->cases_model->get_all_courts();
		$result = $this->cases_model->get_court_by_location_c_category($_POST['l_id'],$_POST['c_id']);
		echo '
		<select name="court_id" id="court_id" class="chzn col-md-12" >
										<option value="">--Select Court Category--</option>
									';
									foreach($result as $new) {
											$sel = "";
											if(set_select('court_id', $new->id)) $sel = "selected='selected'";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
		echo'</select>';						
	}
	
	
	function starred_cases(){
		$data['cases'] = $this->cases_model->get_all_starred();
		$data['courts'] = $this->cases_model->get_all_courts();
		$data['clients'] = $this->cases_model->get_all_clients();
		$data['locations'] = $this->location_model->get_all();
		$data['stages'] = $this->case_stage_model->get_all();
		$data['page_title'] = lang('case');
		$data['body'] = 'case/starred_list';
		$this->load->view('template/main', $data);	

	}	
	
	
	
	function archived_cases(){
		$data['cases'] = $this->cases_model->get_all_archived();
		$data['courts'] = $this->cases_model->get_all_courts();
		$data['clients'] = $this->cases_model->get_all_clients();
		$data['locations'] = $this->location_model->get_all();
		$data['stages'] = $this->case_stage_model->get_all();
		$data['page_title'] = lang('archived_cases');
		$data['body'] = 'case/archive_list';
		$this->load->view('template/main', $data);	
	}	
	
	function get_archive_case_by_client(){
		$cases = $this->cases_model->get_archive_cases_by_client_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                  echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
						echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
							echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
							echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                    <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                       echo ' </tbody>';
                         endif;
                   echo ' </table>
					';
	}	
	
	
	function get_archive_case_by_court(){
		$cases = $this->cases_model->get_archive_cases_by_court_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                  echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
						echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
							echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
							echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                     <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                       echo ' </tbody>';
                         endif;
                   echo ' </table>
					';
	}	
	
	
	function get_archive_case_by_location(){
		$cases = $this->cases_model->get_archive_cases_by_location_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
				echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
				echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
				echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                    <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                echo ' </tbody>';
                         endif;
                echo ' </table>
					';
	}	
	
	
	function get_archive_case_by_case_stage_id(){
		$cases = $this->cases_model->get_archive_cases_by_case_stage_id($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                         <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
				echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
				echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
				echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                     <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                echo ' </tbody>';
                         endif;
                echo ' </table>
					';
	}	
	
	
	function get_archive_case_by_case_filing_date(){
		$cases = $this->cases_model->get_archive_cases_by_filing_date($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
				echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
				echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
				echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                     <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                echo ' </tbody>';
                         endif;
                echo ' </table>
					';
	}	
	
	
	function get_archive_case_by_case_hearing_date(){
			$cases = $this->cases_model->get_archive_cases_by_hearing_date($_POST['id']);
		echo '
		<table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%">'.lang('serial_number').'</th>
								<th width="8%">'.lang('star').'</th>
								<th>'.lang('case').' '.lang('title').'</th>
								<th>'.lang('case').' '.lang('number').'</th>
								<th>'.lang('clients').'</th>
								<th>'.lang('case').' '.lang('stage').'</th>
								<th width="20%">'.lang('action').'</th>
                            </tr>
                        </thead>
                        
                   ';
				    if(isset($cases)):
				echo '	
                        <tbody>
                            '. $i=1;foreach ($cases as $new){
                echo '              <tr class="gc_row">
                                    <td>'.$i.'</td>
									
									<td class="small-col">
							';		
									if($new->is_starred==0){ 
				echo '			
									<a href="" at="90" class="Privat"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star-o"></i></a>
								';
									}else{
				echo '
									<a href="" at="90" class="Public"><span style="display:none">'.$new->id.'</span>
									<i class="fa fa-star"></i></a>';
								}
				echo '
									</td>
                                    <td>'.$new->title.'</td>
								    <td>'.$new->case_no.'</td>
									<td>'.$new->client.'</td>
									<td>'.$new->stage.'</td>
									
                                     <td width="20%">
									 	 <a class="btn btn-primary"  href="'.site_url('admin/cases/view_archived_case/'.$new->id).'"><i class="fa fa-eye"></i> '.lang('view').'</a>
										 <a class="btn btn-danger" style="margin-left:20px;" href="'.site_url('admin/cases/restore/'.$new->id).'" onclick="return areyousure()"><i class="fa fa-check"></i> '.lang('restore').'</a>
                                    </td>
                                </tr>';
								 $i++;}
                echo ' </tbody>';
                         endif;
                echo ' </table>
					';
	}
	
	
	
	function restore($id)
	{
		$this->cases_model->restore_case($id);
		$this->session->set_flashdata('message', lang('case_has_been_restored'));
		redirect('admin/cases');
	}
	
	
	
	function archived($id=false){
	
		$data['clients']		 	= $this->cases_model->get_all_clients();
		$data['id']					=$id;
		$data['case']				= $this->cases_model->get_case_by_id($id);
		
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('notes', 'lang:notes', 'required');
			$this->form_validation->set_rules('close_date', 'lang:date', 'trim|required');
			 
			if ($this->form_validation->run()==true)
            {
				$save['notes'] = $this->input->post('notes');
				$save['close_date'] = $this->input->post('close_date');
				$save['case_id'] = $id;
				$this->cases_model->save_archived($save);
				$this->cases_model->set_is_archived($id);
              	$this->session->set_flashdata('message', lang('case_is_archived'));
				redirect('admin/cases/archived_cases');
			}
		}		
	
		$data['page_title'] = lang('archive') . lang('case');
		$data['body'] = 'case/archive';
		$this->load->view('template/main', $data);	
	}
	

	function view_archived_case($id=false){
		$data['clients']		 	= $this->cases_model->get_all_clients();
		$data['stages'] 			= $this->case_stage_model->get_all();
		$data['acts']			 	= $this->cases_model->get_all_acts();
		$data['courts']			 	= $this->cases_model->get_all_courts();
		$data['locations']		 	= $this->cases_model->get_all_locations();
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$data['court_categories']	= $this->cases_model->get_all_court_categories();
		$data['id'] 				= $id;
		$data['payment_modes']		= $this->cases_model->get_all_payment_modes();
		$data['fees_all']			= $this->cases_model->get_fees_all($id);
		$data['case']				= $this->cases_model->get_archive_case_by_id($id);
		$data['cases']		 		= $this->cases_model->get_all_extended_case_by_id($id);
		$data['cases']		 		= $this->cases_model->get_all_extended_case_by_id($id);
		$data['page_title'] 		= lang('view') . lang('archived_case');
		$data['body'] 				= 'case/view_archived';
	
		$this->load->view('template/main', $data);	
	}
	
	function view_case($id=false){
		$data['fields'] = $this->custom_field_model->get_custom_fields(2);	
		$data['clients']		 	= $this->cases_model->get_all_clients();
		$data['stages']				= $this->case_stage_model->get_all();
		$data['acts']			 	= $this->cases_model->get_all_acts();
		$data['courts']			 	= $this->cases_model->get_all_courts();
		$data['locations']		 	= $this->cases_model->get_all_locations();
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$data['court_categories']	= $this->cases_model->get_all_court_categories();
		$data['id'] 				= $id;
		$data['payment_modes']		= $this->cases_model->get_all_payment_modes();
		$data['fees_all']			= $this->cases_model->get_fees_all($id);
		$data['case']				= $this->cases_model->get_archive_case_by_id($id);
		$data['cases']		 		= $this->cases_model->get_all_extended_case_by_id($id);
		$data['cases']		 		= $this->cases_model->get_all_extended_case_by_id($id);
		
		$this->cases_model->case_view_by_admin($id);
		
		$data['page_title']			= lang('view') . lang('case');
		$data['body'] 				= 'case/view_case';
		$this->load->view('template/main', $data);	
	}
	
	function add(){
		$data['fields_clients'] = $this->custom_field_model->get_custom_fields(1);
		$data['fields']			 = $this->custom_field_model->get_custom_fields(2);
		$data['clients']		 = $this->cases_model->get_all_clients();
		$data['stages'] 		 = $this->case_stage_model->get_all();
		$data['acts'] 			 = $this->cases_model->get_all_acts();
		$data['courts']			 = $this->cases_model->get_all_courts();
		$data['locations'] 		 = $this->cases_model->get_all_locations();
		$data['case_categories'] = $this->cases_model->get_all_case_categories();
		$data['court_categories']= $this->cases_model->get_all_court_categories();
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', lang('custom_required'));
			$this->form_validation->set_rules('title', 'lang:title', 'required');
			$this->form_validation->set_rules('client_id', 'Client', 'required');
			$this->form_validation->set_rules('case_no', 'Case No', 'trim|required|is_unique[cases.case_no]');
			$this->form_validation->set_rules('location_id', 'Location', 'required');
			$this->form_validation->set_rules('case_stage_id', 'Case Stage', 'required');
			$this->form_validation->set_rules('court_id', 'Court', 'required');
			$this->form_validation->set_rules('court_category_id', 'Court Category', 'required');
			$this->form_validation->set_rules('case_category_id', 'Case Category', 'required');
			$this->form_validation->set_rules('act_id', 'Act', 'required');
			$this->form_validation->set_rules('start_date', 'Filing Date', 'required');
			$this->form_validation->set_rules('description', 'Description', '');
			$this->form_validation->set_rules('fees', 'Fees', '');
			$this->form_validation->set_rules('o_lawyer', 'Opposite Lawyer', '');
			$this->form_validation->set_rules('hearing_date', 'Description', '');
			 
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['case_no'] = $this->input->post('case_no');
				$save['client_id'] = $this->input->post('client_id');
				$save['location_id'] = $this->input->post('location_id');
				$save['court_id'] = $this->input->post('court_id');
				$save['court_category_id'] = $this->input->post('court_category_id');
				$save['case_stage_id'] = $this->input->post('case_stage_id');
				$save['case_category_id'] = json_encode($this->input->post('case_category_id'));
				$save['act_id'] = json_encode($this->input->post('act_id'));
				$save['description'] = $this->input->post('description');
				$save['start_date'] = $this->input->post('start_date');
				$save['hearing_date'] = $this->input->post('hearing_date');
				$save['o_lawyer'] = $this->input->post('o_lawyer');
				$save['fees'] = $this->input->post('fees');
             
			 	$p_key = $this->cases_model->save($save);
				$reply = $this->input->post('reply');
					if(!empty($reply)){
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $p_key,
							'form'=> 2,
						);	
					
					}	
					$this->custom_field_model->save_answer($save_fields);
				}
                $this->session->set_flashdata('message', lang('case_created'));
				redirect('admin/cases');
				
			}
		}		
		
		
		$data['page_title'] = lang('add') . lang('case');
		$data['body'] = 'case/add';
		
		
		$this->load->view('template/main', $data);	

	}	
	
	
	function edit($id=false){
	
		$data['clients']		 	= $this->cases_model->get_all_clients();
		$data['stages'] 			= $this->case_stage_model->get_all();
		$data['acts']			 	= $this->cases_model->get_all_acts();
		$data['courts']			 	= $this->cases_model->get_all_courts();
		$data['locations']		 	= $this->cases_model->get_all_locations();
		$data['case_categories'] 	= $this->cases_model->get_all_case_categories();
		$data['court_categories']	= $this->cases_model->get_all_court_categories();
		$data['id']					=	$id;
		$data['case'] 				= $this->cases_model->get_case_by_id($id);
		$data['fields'] 			= $this->custom_field_model->get_custom_fields(2);	
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('client_id', 'lang:client', 'required');
			$this->form_validation->set_rules('case_no', 'lang:case_number', 'trim|required');
			$this->form_validation->set_rules('location_id', 'lang:location', 'required');
			$this->form_validation->set_rules('court_id', 'lang:court', 'required');
			$this->form_validation->set_rules('court_category_id', 'lang:court_category', 'required');
			$this->form_validation->set_rules('case_category_id', 'lang:case_category', 'required');
			$this->form_validation->set_rules('act_id', 'lang:act', 'required');
			$this->form_validation->set_rules('start_date', 'lang:filing_date', 'required');
			 $this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				$save['title'] = $this->input->post('title');
				$save['case_no'] = $this->input->post('case_no');
				$save['client_id'] = $this->input->post('client_id');
				$save['location_id'] = $this->input->post('location_id');
				$save['court_id'] = $this->input->post('court_id');
				$save['court_category_id'] = $this->input->post('court_category_id');
				$save['case_stage_id'] = $this->input->post('case_stage_id');
				$save['case_category_id'] = json_encode($this->input->post('case_category_id'));
				$save['act_id'] = json_encode($this->input->post('act_id'));
				$save['description'] = $this->input->post('description');
				$save['start_date'] = $this->input->post('start_date');
				$save['hearing_date'] = $this->input->post('hearing_date');
				$save['o_lawyer'] = $this->input->post('o_lawyer');
				$save['fees'] = $this->input->post('fees');
				
				$reply = $this->input->post('reply');
				if(!empty($reply)){	
					foreach($this->input->post('reply') as $key => $val) {
						$save_fields[] = array(
							'custom_field_id'=> $key,
							'reply'=> $val,
							'table_id'=> $id,
							'form'=> 2,
						);	
					
					}	
					$this->custom_field_model->delete_answer($id,$form=2);
					$this->custom_field_model->save_answer($save_fields);
				}
				$this->cases_model->update($save,$id);
              	$this->session->set_flashdata('message',  lang('case_created'));
				redirect('admin/cases');
			}
		}		
	
		$data['page_title'] = lang('edit') . lang('court');
		$data['body'] = 'case/edit';
		$this->load->view('template/main', $data);	

	}
	
	function notes($id=false){
		$data['id']					=	$id;
		$data['case'] 				= $this->cases_model->get_case_by_id($id);
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('notes', 'lang:notes', 'required');
			 $this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				$save['notes'] = $this->input->post('notes');
				
				$this->cases_model->update($save,$id);
              	$this->session->set_flashdata('message',  lang('notes_saved'));
				redirect('admin/cases/notes/'.$id);
			}
		}		
	
		$data['page_title'] =  lang('notes');
		$data['body'] = 'case/notes';
		$this->load->view('template/main', $data);	

	}
	
	
	
	function dates($id=false){
	
		$data['cases']		 	= $this->cases_model->get_all_extended_case_by_id($id);
		$data['id'] =$id;
		$data['case']				= $this->cases_model->get_case_by_id($id);
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('date', 'lang:date', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			 
			if ($this->form_validation->run()==true)
            {
			
				if($_FILES['img'] ['name'] !='')
					{ 
						
					
						$config['upload_path'] = './assets/uploads/files/';
						$config['allowed_types'] = 'gif|jpg|png|pdf|doc';
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
						$save['document'] = $img_data['upload_data']['file_name'];
					}
					
				$save['case_id'] = $id;	
				$save['next_date'] = $this->input->post('date');
				$save['last_date'] = $this->input->post('date2');
				$save['note'] = $this->input->post('notes');
				$this->cases_model->save_extended_case($save);
              	$this->session->set_flashdata('message', 'Extended Date Saved');
				redirect('admin/cases/dates/'.$id);
				
			}
		}		
	
		
		$data['body'] = 'case/extended_dates';
		$this->load->view('template/main', $data);	

	}
	
	
	function dates_detail($id=false){
	
		$data['cases']		 	= $this->cases_model->get_extended_case_by_id($id);
		$data['id'] 			= $id;
		$data['case']			= $this->cases_model->get_case_by_id($id);
		$data['body'] 			= 'case/extended_dates_detail';
		$this->load->view('template/main', $data);	

	}	
	
	function fees($id){
		$data['tax']			= $this->tax_model->get_all();
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['receipts']			= $this->cases_model->get_receipts($id);
		$data['case']					= $this->cases_model->get_case_by_id($id);
		$data['fees_all']				= $this->cases_model->get_fees_all($id);
		$data['id'] 					= $id;
		$invoice			= $this->cases_model->get_invoice_number();
		
		//echo '<pre>'; print_r($data['receipts']);die;

		if(empty($invoice->invoice)){
			$data['invoice_no'] = $this->settings->invoice_no;
		}else{
			$data['invoice_no'] = $invoice->invoice+1;
		}
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('amount', 'lang:amount', 'required');
			$this->form_validation->set_rules('payment_mode_id', 'lang:payment_mode', 'required');
			$this->form_validation->set_rules('date', 'lang:date', 'required');
			$this->form_validation->set_rules('invoice_no', 'lang:invoice', 'required');
			if ($this->form_validation->run()==true)
            {
			
				$save['amount'] = $this->input->post('amount');
				$save['total'] = $this->input->post('total');
				$save['payment_mode_id'] = $this->input->post('payment_mode_id');
				$save['case_id'] = $id;
				$save['date'] = $this->input->post('date');
				$save['invoice'] =  $data['invoice_no'];
				
				$fees_id = $this->cases_model->save_fees($save);
				$save_tax=array();
				$taxes = $this->input->post('tax_id');
				if(!empty($taxes)){
				$i=1;
					foreach($taxes as $new){
						$save_tax[$i]['tax_id'] = $new;
						$save_tax[$i]['fees_id'] = $fees_id;
					$i++;
					}
				$this->cases_model->save_taxes($save_tax);
				}
				
				
				
              	$this->session->set_flashdata('message', lang('fees_updated'));
				redirect('admin/cases/fees/'.$id);
			}
		}
		$data['body'] = 'case/fees';
		$this->load->view('template/main', $data);
	}
	
	function view_receipt($id){
		$data['receipt']			= $this->cases_model->get_receipt($id);
		//echo '<pre>'; print_r($data['receipt']);die;
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['setting']     = $this->settings;
		$data['body'] = 'case/view_receipt';
		$this->load->view('template/main', $data);
	}
	
	function print_receipt($id){
		$data['receipt']			= $this->cases_model->get_receipt($id);
		//echo '<pre>'; print_r($data['receipt']);die;
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['setting']     = $this->settings;
		//$data['body'] = '';
		$this->load->view('case/print_receipt', $data);
	}
	
	function pdf($id=false){
		$this->load->helper('dompdf_helper');
		$this->load->helper('download');
		$data['receipt']			= $this->cases_model->get_receipt($id);
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['setting']     = $this->settings;
		$data['page_title'] = lang('receipt');
		//$data['body'] = 'invoice/pdf';
		$html = $this->load->view('case/pdf_receipt', $data,true);		
		pdf_create($html, 'Receipt_'.$data['receipt']->id);
		

	}	
	
	
	
	public function mail($id=false)
	{ 
		$data['receipt']			= $this->cases_model->get_receipt($id);
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['setting']     = $this->settings;
		$data['page_title'] = lang('receipt');
		
		///echo $data['receipt']->u_email;die;
		if(!empty($data['setting']->image)){ 
 			$img = '<img src="'.site_url('assets/uploads/images/'.$data['setting']->image).'"  height="70" width="80"  style="padding-left:30px;" />';
 		}
		$html = $this->load->view('case/pdf_receipt', $data,true);			
		$message = $html;
		$msg 				 = html_entity_decode($message,ENT_QUOTES, 'UTF-8');
		$params['recipient'] = $data['receipt']->u_email;;
		$params['subject'] 	 = "Receipt";
		$params['message']   = $msg;
		modules::run('admin/fomailer/send_email',$params);
	
		$this->session->set_flashdata('message', lang('receipt_send'));
		redirect('admin/cases/fees/'.$data['receipt']->case_id);
			
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
			//echo 'Mail Sent to '.$email;exit;
	}
	
	
	function receipt($id){
		$data['tax']			= $this->tax_model->get_all();
		$data['payment_modes']			= $this->cases_model->get_all_payment_modes();
		$data['case']					= $this->cases_model->get_case_by_id($id);
		$data['fees_all']				= $this->cases_model->get_fees_all($id);
		$data['id'] 					= $id;
		$invoice			= $this->cases_model->get_invoice_number();
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('r_amount', 'lang:amount', '');
			if ($this->form_validation->run()==true)
            {
			//echo '<pre>'; print_r($_POST);die;
			
				$save['amount'] = $this->input->post('r_amount');
				$save['date'] = $this->input->post('r_date');
				$save['fees_id'] = $this->input->post('fees_id');
				$save['case_id'] = $this->input->post('case_id');
				
				$this->cases_model->save_receipt($save);
				
				
				
				
              	$this->session->set_flashdata('message', lang('receipt_created'));
				redirect('admin/cases/fees/'.$id);
			}
		}
		$data['body'] = 'case/fees';
		$this->load->view('template/main', $data);
	}
	
	function delete($id=false){
		
		if($id){
			$this->cases_model->delete($id);
			redirect('admin/cases');
			$this->session->set_flashdata('message',  lang('case_deleted'));
		}
	}
	
	function delete_archive_case($id=false){
		
		if($id){
			$this->cases_model->delete($id);
			redirect('admin/cases/archived_cases');
			$this->session->set_flashdata('message',  lang('case_deleted'));
		}
	}	
	
	function delete_fees($id=false){
		
		if($id){
			$this->cases_model->delete_fees($id);
			$this->session->set_flashdata('message', lang('fees_deleted'));
			redirect('admin/cases');
			
		}
	}	
	
	function delete_deceipt($id=false,$c_id){
		//$rc = $this->cases_model->get_receipt($id);
		if($id){
			$this->cases_model->delete_receipt($id);
			$this->session->set_flashdata('message', lang('receipt_deleted'));
			redirect('admin/cases/fees/'.$c_id);
			
		}
	}	
	
	
		
	function delete_history($id=false){
		
		if($id){
			$this->cases_model->delete_history($id);
			$this->session->set_flashdata('message', lang('history_deleted'));
			redirect('admin/cases');
		}
	}	

		
	function set_starred()
	{
		 $this->cases_model->set_is_starred($_POST['id']);
	}	
	
	function update_set_starred()
	{
		 $this->cases_model->update_set_is_starred($_POST['id']);
	}	
	
		
	
}