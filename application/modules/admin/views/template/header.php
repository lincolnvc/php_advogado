<?php
$CI = get_instance();
$CI->load->model('setting_model');
$CI->load->model('notification_model');
$CI->load->model('message_model');
$CI->load->model('language_model');
$CI->load->model('tasks_model');
$CI->load->model('attendance_model');

$admin = $this->session->userdata('admin');
$case_alert   = $CI->setting_model->get_case_alert();
$case_alert_client   = $CI->setting_model->get_case_alert_client();
$setting   = $CI->setting_model->get_setting();
$client_setting   = $CI->setting_model->get_notification_setting_client();
$notification  = $CI->notification_model->get_setting();
$to_do_alert   = $CI->setting_model->get_to_do_alert();
$appointment_alert   = $CI->setting_model->get_appointment_alert();
$admin_messages = $this->message_model->get_message_count_by_id();
$langs = $this->language_model->get_all();
$due_tasks = $this->tasks_model->get_due_tasks();
$my_due_tasks = $this->tasks_model->get_my_due_tasks();

$leave_notification = $this->attendance_model->get_leave_notification();

//echo '<pre>'; print_r($leave_notification);die;
$first = $this->uri->segment(1);
$second = $this->uri->segment(2);
$third = $this->uri->segment(3);
$fourth = $this->uri->segment(4);



	$CI->db->order_by('A.name','asc');
	$CI->db->select('A.name action');
	$CI->db->join('actions A', 'A.id = RRA.action_id', 'LEFT');
	$CI->db->where('RRA.role_id',$this->session->userdata('admin')['user_role']);
	$actions = $CI->db->get('rel_role_action RRA')->result();
	//echo '<pre>';print_r($actions);exit;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <title><?php echo $setting->name;?></title>
    	    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	    	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
			<!-- font Awesome -->
			<link href="<?php echo base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
			<!-- Ionicons -->
			<link href="<?php echo base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
			<!-- Morris chart -->
			<link href="<?php echo base_url('assets/css/morris/morris.css')?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url('assets/css/pickmeup.min.css')?>" rel="stylesheet" type="text/css" />
		  
			<!-- Theme style -->
			<link href="<?php echo base_url('assets/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url('assets/css/redactor.css')?>" rel="stylesheet" type="text/css" />
			
			<!-- jQuery 2.0.2 -->
			<script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
 
	
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo site_url('admin/dashboard');?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
             
			   <?php 
			   if($setting->header_setting==0){
			   	echo @$setting->name;
			   }else{?>
			   	<img src="<?php echo base_url('assets/uploads/images/'.@$setting->image); ?>" width="150" height="50" />
			  <?php }?>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"><?php echo lang('toggle_navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <?php echo lang('language') ?>
                                <span class="label label-success"></span>                            </a>
                            <ul class="dropdown-menu">
                          	 <li>
							 	
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
										 <li><!-- start message -->
                                            <a href='<?php echo site_url('admin/languages/switch_language/'); ?>/english/<?php echo $first.'/'.$second.'/'.$third.'/'.$fourth?>'>
                                                <div class="pull-left">
                                                    <img src="<?php echo base_url('assets/img/eng.png')?>" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                   ENGLISH
                                                   
                                                </h4>
                                      
                                            </a>
                                        </li><!-- end message -->
									<?php foreach ($langs as $new){ ?>
                                       
										<li><!-- start message -->
                                            <a href='<?php echo site_url('admin/languages/switch_language/'.$new->name.'/'.$first.'/'.$second.'/'.$third.'/'.$fourth); ?>'>
                                                <div class="pull-left">
                                                    <img src="<?php echo base_url('assets/uploads/images/'.$new->flag)?>" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    <?php echo ucwords($new->name)?>
                                                   
                                                </h4>
                                       
                                            </a>
                                        </li><!-- end message -->
										 <?php } ?>        
										
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                      </li>
					<?php
		$access = $admin['user_role'];
		if($access==2){
		?>	
		
		<!--  Case Alert Start For CLient-->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <?php echo lang('cases');?>
								
								
								
                               
								<?php 
									if(!empty($case_alert_client))
									{
										echo '<span class="label label-danger">'.count($case_alert_client).'</span>'; 
									}
								?>
								
							</a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo count($case_alert_client) ?> <?php echo lang('case_comming_in_next'); ?> <?php echo $client_setting->client_case_alert;?> <?php echo lang('days'); ?>.</li>
                               <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
									<?php 
									foreach ($case_alert_client as $new){
									echo'	<li>
                                            <a href="'.site_url('admin/my_cases/details/'.$new->id).'" style="color:#666666">
                                                <i class="fa fa-legal"></i> Case NO - '.$new->case_no.' On '.date_convert($new->next_date).'</a>
                                       </li>
									';
									}
									?>
									
                                        
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php echo site_url('admin/my_cases') ?>"><?php echo lang('view_all'); ?> </a>
                                </li>
                            </ul>
                      </li>
                        <!-- Case Alert End FOr CLient -->
            	
		
		<?php }else{ ?>
		
					<!--  Leave Notifiation Alert End-->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang('leaves'); ?>
								
								
								
                               
								<?php 
									if(!empty($leave_notification))
									{
										echo '<span class="label label-danger">'.count($leave_notification).'</span>'; 
									}
								?>
								
							</a>
                            <ul class="dropdown-menu">
                                <li class="header"> <?php echo count($leave_notification)?>  <?php echo lang('leave_request_pending'); ?> .</li>
                               <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
									<?php 
									foreach ($leave_notification as $new){
									echo'	<li>
                                            <a href="#" style="color:#666666">
                                                <i class="fa fa-user"></i>  '.$new->user.' Request For '.date_convert($new->date).'</a>
                                       </li>
									';
									}
									?>
									
                                      
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php echo site_url('admin/attendance/leave_notification');?>"><?php echo lang('view_all');?> </a>
                                </li>
                            </ul>
                      </li>
                        <!-- Leave Notification Alert End -->
				
				
			<?php if(check_user_role(106)==1){?>	
							<!--  Appo Alert Start-->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               <?php echo lang('appointments'); ?>
								
								
								
                               
								<?php 
									if(!empty($appointment_alert))
									{
										echo '<span class="label label-danger">'.count($appointment_alert).'</span>'; 
									}
								?>
								
							</a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo count(@$appointment_alert) ?>  <?php echo lang('appointment_comming_in_next'); ?> <?php echo @$notification->appointment_alert;?> <?php echo lang('days')?>.</li>
                               <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
									<?php 
									foreach ($appointment_alert as $new){
									echo'	<li>
                                            <a href="'.site_url('admin/appointments/view_appointment/'.$new->id).'" style="color:#666666">
                                                <i class="fa fa-chevron-circle-right"></i> '.$new->title.' On '.date_time_convert($new->date_time).'</a>
                                       </li>
									';
									}
									?>
									
                                        
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php echo site_url('admin/appointments/view_all') ?>"><?php echo lang('days') ?> </a>
                                </li>
                            </ul>
                      </li>
                        <!-- Appo Alert End -->
           <?php } ?> 	
				
			<?php if(check_user_role(105)==1){?>		
						<!--  Case Alert Start-->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang('cases'); ?>
								
								
								
                               
								<?php 
									if(!empty($case_alert))
									{
										echo '<span class="label label-danger">'.count($case_alert).'</span>'; 
									}
								?>
								
							</a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo count($case_alert) ?> <?php echo lang('case_comming_in_next'); ?>  <?php echo $notification->case_alert;?>  <?php echo lang('days'); ?>.</li>
                               <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
									<?php 
									foreach ($case_alert as $new){
									echo'	<li>
                                            <a href="'.site_url('admin/cases/view_case/'.$new->id).'" style="color:#666666">
                                                <i class="fa fa-legal"></i> Case NO - '.$new->case_no.' On '.date_convert($new->next_date).'</a>
                                       </li>
									';
									}
									?>
									
                                        
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php echo site_url('admin/cases/view_all') ?>"><?php echo lang('view_all'); ?> </a>
                                </li>
                            </ul>
                      </li>
                        <!-- Case Alert End -->
            <?php } ?>	
			<?php if(check_user_role(107)==1){?>		
					<!--  To Do Alert End-->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang('to_do'); ?>
								
								
								
                               
								<?php 
									if(!empty($to_do_alert))
									{
										echo '<span class="label label-danger">'.count($to_do_alert).'</span>'; 
									}
								?>
								
							</a>
                            <ul class="dropdown-menu">
                                <li class="header"><?php echo lang('you_have_today');?> <?php echo count($to_do_alert)?>  <?php echo lang('to_do'); ?> .</li>
                               <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
									<?php 
									foreach ($to_do_alert as $new){
									echo'	<li>
                                            <a href="'.site_url('admin/to_do_list/view_to_do/'.$new->id).'" style="color:#666666">
                                                <i class="fa fa-tasks"></i>  '.$new->title.' On '.date_convert($new->date).'</a>
                                       </li>
									';
									}
									?>
									
                                      
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php echo site_url('admin/to_do_list/view_all');?>"><?php echo lang('view_all');?> </a>
                                </li>
                            </ul>
                      </li>
                        <!-- To Do Alert End -->
            	<?php }  //end check condition ?>
				
				 <?php }  // End Access COndition?> 
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $admin['name'] ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                <?php 
								 if(!empty($admin['image'])){
								 ?>
								 <img src="<?php echo base_url('assets/uploads/images/'.$admin['image']);?>"class="img-circle" alt="User Image" />
								 <?php 
								 	}else{
								?>	
								 <img src="<?php echo base_url('assets/uploads/images/avatar5.png');?>"class="img-circle" alt="User Image" />
								<?php
									}
								?>

                                    <p>
                                       <?php echo $admin['name'] ?>
                                        
                                    </p>
                                </li>
                                <!-- Menu Body -->
                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('admin/account'); ?>" class="btn btn-default btn-flat"><?php echo lang('profile');?></a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('admin/login/logout'); ?>" class="btn btn-default btn-flat"><?php echo lang('sign') ." ". lang('out');?></a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>




   <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                             <?php 
								 if(!empty($admin['image'])){
								 ?>
								 <img src="<?php echo base_url('assets/uploads/images/'.$admin['image']);?>"class="img-circle" alt="User Image" />
								 <?php 
								 	}else{
								?>	
								 <img src="<?php echo base_url('assets/uploads/images/avatar5.png');?>"class="img-circle" alt="User Image" />
								<?php
									}
								?>
                        </div>
                        <div class="pull-left info">
                            <p><?php echo lang('hello');?>, <?php echo $admin['name'] ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('online');?></a>
                        </div>
                    </div>
                    <!-- search form -->
                   
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php echo($this->uri->segment(2)=='dashboard' || $this->uri->segment(2)=='')?'active':'';?>">
                            <a href="<?php echo site_url('admin/dashboard');?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('dashboard');?></span>
                            </a>
                        </li>
		<?php
		$access = $admin['user_role'];
		if($access==1){
		?>				
						
                     <li class="treeview <?php echo($this->uri->segment(2)=='user_role'|| $this->uri->segment(2)=='departments'|| $this->uri->segment(2)=='clients'|| $this->uri->segment(2)=='employees' || $this->uri->segment(2)=='permissions' || $this->uri->segment(2)=='holidays'  || $this->uri->segment(2)=='notice'  || $this->uri->segment(2)=='leave_types' || $this->uri->segment(2)=='attendance' || $this->uri->segment(3)=='leave_notification')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-users"></i> <span><?php echo lang('user_management');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        		    <li class="<?php echo($this->uri->segment(2)=='clients')?'active':'';?>">
										<a href="<?php echo site_url('admin/clients');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('clients');?></span> 
										</a>
									</li>
									
									<li class="<?php echo($this->uri->segment(2)=='employees')?'active':'';?>">
										<a href="<?php echo site_url('admin/employees');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('employees');?></span> 
										</a>
									</li>
								
								<li class="<?php echo($this->uri->segment(2)=='user_role')?'active':'';?>">
									<a href="<?php echo site_url('admin/user_role');?>">
										<i class="fa   fa-angle-double-right"></i> <span><?php echo lang('user_role')?></span>
									</a>
								</li>
								<li class="<?php echo($this->uri->segment(2)=='departments')?'active':'';?>">
									<a href="<?php echo site_url('admin/departments');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('departments')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(2)=='permissions')?'active':'';?>">
									<a href="<?php echo site_url('admin/permissions');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('permissions')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(2)=='holidays')?'active':'';?>">
									<a href="<?php echo site_url('admin/holidays');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('holidays')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(2)=='notice')?'active':'';?>">
									<a href="<?php echo site_url('admin/notice');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('notice')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(2)=='leave_types')?'active':'';?>">
									<a href="<?php echo site_url('admin/leave_types');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('leave_types')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(2)=='attendance')?'active':'';?>">
									<a href="<?php echo site_url('admin/attendance');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('attendance')?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(3)=='attendance')?'active':'';?>">
									<a href="<?php echo site_url('admin/attendance/leave_notification');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('leave_notification')?></span>
									</a>
								</li>
								
									
							</ul>
                        </li>
					
						<li class="<?php echo($this->uri->segment(2)=='cases' && $this->uri->segment(3) !='starred_cases' && $this->uri->segment(3) != 'archived_cases')?'active':'' ;?>">
                            <a href="<?php echo site_url('admin/cases');?>">
                                <i class="fa fa-th"></i> <span><?php echo lang('all');?> <?php echo lang('cases');?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(3)=='starred_cases')?'active':'';?>">
                            <a href="<?php echo site_url('admin/cases/starred_cases');?>">
                                <i class="fa fa-star"></i> <span><?php echo lang('starred_cases');?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(3)=='archived_cases')?'active':'';?>">
                            <a href="<?php echo site_url('admin/cases/archived_cases');?>">
                                <i class="fa fa-archive"></i> <span><?php echo lang('archived_cases');?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(2)=='case_study')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_study/');?>">
                                <i class="fa fa-book"></i> <span><?php echo lang('case_study');?></span>
                            </a>
                        </li>
					
					 <li class="treeview <?php echo($this->uri->segment(2)=='tasks')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-tasks"></i> <span><?php echo lang('tasks');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        		    <li class="<?php echo($this->uri->segment(2)=='tasks')?'active':'';?>">
										<a href="<?php echo site_url('admin/tasks');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('tasks');?></span> 
											<small class="badge pull-right bg-red"><?php echo count($due_tasks) ?></small>
										</a>
									</li>
									 <li class="<?php echo($this->uri->segment(3)=='my_tasks')?'active':'';?>">
										<a href="<?php echo site_url('admin/tasks/my_tasks');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('my_tasks');?></span> 
											<small class="badge pull-right bg-red"><?php echo count($my_due_tasks) ?></small>
											
										</a>
									</li>
									
							</ul>
                        </li>
					
						<li class="<?php echo($this->uri->segment(2)=='documents')?'active':'';?>">
                            <a href="<?php echo site_url('admin/documents');?>">
                                <i class="fa fa-file-o"></i> <span><?php echo lang('documents');?></span>
                            </a>
                        </li>
					
						<li class="<?php echo($this->uri->segment(2)=='reports')?'active':'';?>">
                            <a href="<?php echo site_url('admin/reports');?>">
                                <i class="fa fa-line-chart"></i> <span><?php echo lang('reports');?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(2)=='message')?'active':'';?>">
                            <a href="<?php echo site_url('admin/message');?>">
                                <i class="fa fa-envelope"></i> <span><?php echo lang('message');?> </span>
							
								<small class="badge pull-right bg-red"><?php echo count($admin_messages) ?></small>
							
							</a>
                        </li>
					
						
						
						<li class="<?php echo($this->uri->segment(2)=='to_do_list')?'active':'';?>">
                            <a href="<?php echo site_url('admin/to_do_list');?>">
                                <i class="fa fa-bars"></i> <span><?php echo lang('to_do_list');?></span>
								<small class="badge pull-right bg-red"><?php echo count($to_do_alert) ?></small>
                            </a>
                        </li>
						<li class="<?php echo($this->uri->segment(2)=='contacts')?'active':'';?>">
                            <a href="<?php echo site_url('admin/contacts');?>">
                                <i class="fa fa-newspaper-o"></i> <span><?php echo lang('contacts')?></span>
                            </a>
                        </li>
						<li class="<?php echo($this->uri->segment(2)=='custom_fields')?'active':'';?>">
                            <a href="<?php echo site_url('admin/custom_fields');?>">
                                <i class="fa fa-columns"></i> <span><?php echo lang('custom_fields')?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(2)=='appointments')?'active':'';?>">
                            <a href="<?php echo site_url('admin/appointments');?>">
                                <i class="fa fa-thumb-tack"></i> <span><?php echo lang('appointments')?></span>
								<small class="badge pull-right bg-red"><?php echo count($appointment_alert) ?></small>
                            </a>
                        </li>
						
                    <li class="treeview <?php echo($this->uri->segment(2)=='case_category'|| $this->uri->segment(2)=='court_category' || $this->uri->segment(2)=='act' || $this->uri->segment(2)=='court' || $this->uri->segment(2)=='case_stage' || $this->uri->segment(2)=='location' || $this->uri->segment(2)=='tax' || $this->uri->segment(2)=='payment_mode')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span><?php echo lang('masters') ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        
							<li class="<?php echo($this->uri->segment(2)=='location')?'active':'';?>">
                            <a href="<?php echo site_url('admin/location');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('locations')?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(2)=='tax')?'active':'';?>">
                            <a href="<?php echo site_url('admin/tax');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('tax')?></span>
                            </a>
                        </li>
					
						<li class="<?php echo($this->uri->segment(2)=='case_category')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_category');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('case')?> <?php echo lang('category')?></span>
                            </a>
                        </li>
						
						
						
						<li class="<?php echo($this->uri->segment(2)=='court_category')?'active':'';?>">
                            <a href="<?php echo site_url('admin/court_category');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('court')?> <?php echo lang('category')?></span>
                            </a>
                        </li>
						<li class="<?php echo($this->uri->segment(2)=='act')?'active':'';?>">
                            <a href="<?php echo site_url('admin/act');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('act')?></span>
                            </a>
                        </li>
						<li class="<?php echo($this->uri->segment(2)=='court')?'active':'';?>">
                            <a href="<?php echo site_url('admin/court');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('court')?></span>
                            </a>
                        </li>       
						<li class="<?php echo($this->uri->segment(2)=='case_stage')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_stage');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('case')?> <?php echo lang('stages')?></span>
                            </a>
                        </li>
						
						
						<li class="<?php echo($this->uri->segment(2)=='payment_mode')?'active':'';?>">
                            <a href="<?php echo site_url('admin/payment_mode');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('payment_mode')?></span>
                            </a>
                        </li>
						 
                            </ul>
                        </li>
						
						<li class="treeview <?php echo($this->uri->segment(2)=='settings'|| $this->uri->segment(2)=='notification' || $this->uri->segment(2)=='languages')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span><?php echo lang('administrative');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        			
								<li class="<?php echo($this->uri->segment(2)=='settings')?'active':'';?>">
									<a href="<?php echo site_url('admin/settings');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('general');?> <?php echo lang('settings');?></span>
									</a>
								</li>
								<li class="<?php echo($this->uri->segment(2)=='notification')?'active':'';?>">
									<a href="<?php echo site_url('admin/notification');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('notification');?> <?php echo lang('settings');?></span>
									</a>
								</li>
								
								<li class="<?php echo($this->uri->segment(3)=='canned_messages')?'active':'';?>">
									<a href="<?php echo site_url('admin/settings/canned_messages');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('canned_messages');?></span>
									</a>
								</li>
								<li class="<?php echo($this->uri->segment(2)=='languages')?'active':'';?>">
									<a href="<?php echo site_url('admin/languages');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('language');?></span>
									</a>
								</li>
                            </ul>
                        </li>
				<?php
				}		
				if($access==2){
				?>
				
						<li class="<?php echo($this->uri->segment(2)=='my_cases')?'active':'';?>">
                            <a href="<?php echo site_url('admin/my_cases');?>">
                                <i class="fa fa-file"></i> <span><?php echo lang('my_cases');?></span>
                            </a>
                        </li>
						
						<li class="<?php echo($this->uri->segment(3)=='send_message')?'active':'';?>">
                            <a href="<?php echo site_url('admin/message/send_message/'.$admin['id']);?>">
                                <i class="fa fa-envelope"></i> <span><?php echo lang('message');?> </span><small class="badge pull-right bg-red"><?php echo count($admin_messages) ?></small>
                            </a>
                        </li>
						
				
				
				<?php } ?>
				
		<?php foreach($actions as $action){ 
			 if($action->action=='user_role' || $action->action=='departments' || $action->action=='clients' || $action->action=='employees' ||  
			 		$action->action=='permissions'  || $action->action=='attendance'  || $action->action=='holidays'  || $action->action=='leave_types'  || $action->action=='notification') { ?>
	
				
				 <li class="treeview <?php echo($this->uri->segment(2)=='user_role'|| $this->uri->segment(2)=='departments'|| $this->uri->segment(2)=='clients'|| $this->uri->segment(2)=='employees' || $this->uri->segment(2)=='permissions')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-users"></i> <span><?php echo lang('user_management');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        	<?php foreach($actions as $action){if($action->action=='clients'){?>
                    
								    <li class="<?php echo($this->uri->segment(2)=='clients')?'active':'';?>">
										<a href="<?php echo site_url('admin/clients');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('clients');?></span> 
										</a>
									</li>
							<?php break;}}?>	
							<?php foreach($actions as $action){if($action->action=='employees'){?>	
									<li class="<?php echo($this->uri->segment(2)=='employees')?'active':'';?>">
										<a href="<?php echo site_url('admin/employees');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('employees');?></span> 
										</a>
									</li>
									
							<?php break;}}?>	
							<?php foreach($actions as $action){if($action->action=='user_role'){?>
								<li class="<?php echo($this->uri->segment(2)=='user_role')?'active':'';?>">
									<a href="<?php echo site_url('admin/user_role');?>">
										<i class="fa   fa-angle-double-right"></i> <span><?php echo lang('user_role')?></span>
									</a>
								</li>
								
							<?php break;}}?>
							<?php foreach($actions as $action){if($action->action=='departments'){?>
								<li class="<?php echo($this->uri->segment(2)=='departments')?'active':'';?>">
									<a href="<?php echo site_url('admin/departments');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('departments')?></span>
									</a>
								</li>
							<?php break;}}?>
							<?php foreach($actions as $action){if($action->action=='permissions'){?>	
								<li class="<?php echo($this->uri->segment(2)=='permissions')?'active':'';?>">
									<a href="<?php echo site_url('admin/permissions');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('permissions')?></span>
									</a>
								</li>
							 <?php break;}}?>	
							 
							 
						<?php foreach($actions as $action){if($action->action=='holidays'){?>		 
							 <li class="<?php echo($this->uri->segment(2)=='holidays')?'active':'';?>">
									<a href="<?php echo site_url('admin/holidays');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('holidays')?></span>
									</a>
								</li>
					<?php break;}}?>	
					<?php foreach($actions as $action){if($action->action=='notice'){?>				
								<li class="<?php echo($this->uri->segment(2)=='notice')?'active':'';?>">
									<a href="<?php echo site_url('admin/notice');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('notice')?></span>
									</a>
								</li>
					<?php break;}}?>				
					<?php foreach($actions as $action){if($action->action=='leave_types'){?>				
								<li class="<?php echo($this->uri->segment(2)=='leave_types')?'active':'';?>">
									<a href="<?php echo site_url('admin/leave_types');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('leave_types')?></span>
									</a>
								</li>
					<?php break;}}?>				
					<?php foreach($actions as $action){if($action->action=='attendance'){?>				
								<li class="<?php echo($this->uri->segment(2)=='attendance')?'active':'';?>">
									<a href="<?php echo site_url('admin/attendance');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('attendance')?></span>
									</a>
								</li>
					<?php break;}}?>	
					
					<?php if(check_user_role(130)==1){?>				
								<li class="<?php echo($this->uri->segment(3)=='leave_notification')?'active':'';?>">
									<a href="<?php echo site_url('admin/attendance/leave_notification');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('leave_notification')?></span>
									</a>
								</li>	
					<?php }?>						
									
							</ul>
                        </li>
				<?php break;}}?>	
				
				
            
            
				
				<?php foreach($actions as $action){if($action->action=='cases'){?>		
						<li class="<?php echo($this->uri->segment(2)=='cases' && $this->uri->segment(3) !='starred_cases' && $this->uri->segment(3) != 'archived_cases')?'active':'' ;?>">	
                            <a href="<?php echo site_url('admin/cases');?>">
                                <i class="fa fa-th"></i> <span><?php echo lang('all');?> <?php echo lang('cases');?></span>
                            </a>
                        </li>
						<?php break;}}?>		
					<?php foreach($actions as $action){if($action->action=='starred_cases'){?>		
						<li class="<?php echo($this->uri->segment(3)=='starred_cases')?'active':'';?>">
                            <a href="<?php echo site_url('admin/cases/starred_cases');?>">
                                <i class="fa fa-star"></i> <span><?php echo lang('starred_cases');?></span>
                            </a>
                        </li>
						<?php break;}}?>		
				<?php foreach($actions as $action){if($action->action=='archived_cases'){?>		
						<li class="<?php echo($this->uri->segment(3)=='archived_cases')?'active':'';?>">
                            <a href="<?php echo site_url('admin/cases/archived_cases');?>">
                                <i class="fa fa-archive"></i> <span><?php echo lang('archived_cases');?></span>
                            </a>
                        </li>
					<?php break;}}?>
				<?php foreach($actions as $action){if($action->action=='case_study'){?>			
				<li class="<?php echo($this->uri->segment(2)=='case_study')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_study/');?>">
                                <i class="fa fa-book"></i> <span><?php echo lang('case_study');?></span>
                            </a>
                        </li>	
				<?php break;}}?>		
			<?php foreach($actions as $action){if($action->action=='tasks'){?>		
				 <li class="treeview <?php echo($this->uri->segment(2)=='tasks')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-tasks"></i> <span><?php echo lang('tasks');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        		    <li class="<?php echo($this->uri->segment(2)=='tasks')?'active':'';?>">
										<a href="<?php echo site_url('admin/tasks');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('tasks');?></span> 
											<small class="badge pull-right bg-red"><?php echo count($due_tasks) ?></small>
										</a>
									</li>
									<?php if(check_user_role(152)==1){?>	
									 <li class="<?php echo($this->uri->segment(3)=='my_tasks')?'active':'';?>">
										<a href="<?php echo site_url('admin/tasks/my_tasks');?>">
											<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('my_tasks');?></span> 
											<small class="badge pull-right bg-red"><?php echo count($my_due_tasks) ?></small>
											
										</a>
									</li>
									<?php } ?>
									
							</ul>
                        </li>				
				<?php break;}}?>
				
			<?php foreach($actions as $action){if($action->action=='documents'){?>
				<li class="<?php echo($this->uri->segment(2)=='documents')?'active':'';?>">
                            <a href="<?php echo site_url('admin/documents');?>">
                                <i class="fa fa-file-o"></i> <span><?php echo lang('documents');?></span>
                            </a>
                        </li>
			<?php break;}}?>
				 <?php foreach($actions as $action){if($action->action=='reports'){?>
				
						<li class="<?php echo($this->uri->segment(2)=='reports')?'active':'';?>">
                            <a href="<?php echo site_url('admin/reports');?>">
                                <i class="fa fa-line-chart"></i> <span><?php echo lang('reports');?></span>
                            </a>
                        </li>
					<?php break;}}?>			
                	
				 <?php foreach($actions as $action){if($action->action=='message'){?>		
						<li class="<?php echo($this->uri->segment(2)=='message')?'active':'';?>">
                            <a href="<?php echo site_url('admin/message');?>">
                                <i class="fa fa-envelope"></i> <span><?php echo lang('message');?> </span>
							
								<small class="badge pull-right bg-red"><?php echo count($admin_messages) ?></small>
							
							</a>
                        </li>
				<?php break;}}?>	
						
				<?php foreach($actions as $action){if($action->action=='to_do_list'){?>		
						<li class="<?php echo($this->uri->segment(2)=='to_do_list')?'active':'';?>">
                            <a href="<?php echo site_url('admin/to_do_list');?>">
                                <i class="fa fa-bars"></i> <span><?php echo lang('to_do_list');?></span>
								<small class="badge pull-right bg-red"><?php echo count($to_do_alert) ?></small>
                            </a>
                        </li>
				<?php break;}}?>		
				<?php foreach($actions as $action){if($action->action=='contacts'){?>		
						<li class="<?php echo($this->uri->segment(2)=='contacts')?'active':'';?>">
                            <a href="<?php echo site_url('admin/contacts');?>">
                                <i class="fa fa-newspaper-o"></i> <span><?php echo lang('contacts')?></span>
                            </a>
                        </li>
				<?php break;}}?>		
				<?php foreach($actions as $action){if($action->action=='custom_fields'){?>
						<li class="<?php echo($this->uri->segment(2)=='custom_fields')?'active':'';?>">
                            <a href="<?php echo site_url('admin/custom_fields');?>">
                                <i class="fa fa-columns"></i> <span><?php echo lang('custom_fields')?></span>
                            </a>
                        </li>
				<?php break;}}?>		
				<?php foreach($actions as $action){if($action->action=='appointments'){?>
						<li class="<?php echo($this->uri->segment(2)=='appointments')?'active':'';?>">
                            <a href="<?php echo site_url('admin/appointments');?>">
                                <i class="fa fa-thumb-tack"></i> <span><?php echo lang('appointments')?></span>
								<small class="badge pull-right bg-red"><?php echo count($appointment_alert) ?></small>
                            </a>
                        </li>
				<?php break;}}?>	
				
					
		<?php foreach($actions as $action){ 
			 if($action->action=='case_category' || $action->action=='court_category' || $action->action=='act' || $action->action=='court' ||  
			 		$action->action=='case_stage' || $action->action=='location' || $action->action=='payment_mode') { ?>	
				<li class="treeview <?php echo($this->uri->segment(2)=='case_category'|| $this->uri->segment(2)=='court_category' || $this->uri->segment(2)=='act' || $this->uri->segment(2)=='court' || $this->uri->segment(2)=='case_stage' || $this->uri->segment(2)=='location' || $this->uri->segment(2)=='tax' || $this->uri->segment(2)=='payment_mode')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span><?php echo lang('masters') ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                      <?php foreach($actions as $action){if($action->action=='location'){?>  
						<li class="<?php echo($this->uri->segment(2)=='location')?'active':'';?>">
                            <a href="<?php echo site_url('admin/location');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('locations')?></span>
                            </a>
                        </li>
					<?php break;}}?>
					<?php foreach($actions as $action){if($action->action=='tax'){?>  
						<li class="<?php echo($this->uri->segment(2)=='tax')?'active':'';?>">
                            <a href="<?php echo site_url('admin/tax');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('tax')?></span>
                            </a>
                        </li>
					<?php break;}}?>
					<?php foreach($actions as $action){if($action->action=='case_category'){?>
						<li class="<?php echo($this->uri->segment(2)=='case_category')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_category');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('case')?> <?php echo lang('category')?></span>
                            </a>
                        </li>
					<?php break;}}?>	
						
					<?php foreach($actions as $action){if($action->action=='court_category'){?>	
						<li class="<?php echo($this->uri->segment(2)=='court_category')?'active':'';?>">
                            <a href="<?php echo site_url('admin/court_category');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('court')?> <?php echo lang('category')?></span>
                            </a>
                        </li>
					<?php break;}}?>	
					<?php foreach($actions as $action){if($action->action=='act'){?>
						<li class="<?php echo($this->uri->segment(2)=='act')?'active':'';?>">
                            <a href="<?php echo site_url('admin/act');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('act')?></span>
                            </a>
                        </li>
					<?php break;}}?>	
					<?php foreach($actions as $action){if($action->action=='court'){?>
						<li class="<?php echo($this->uri->segment(2)=='court')?'active':'';?>">
                            <a href="<?php echo site_url('admin/court');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('court')?></span>
                            </a>
                        </li>       
					<?php break;}}?>	
					<?php foreach($actions as $action){if($action->action=='case_stage'){?>
						<li class="<?php echo($this->uri->segment(2)=='case_stage')?'active':'';?>">
                            <a href="<?php echo site_url('admin/case_stage');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('case')?> <?php echo lang('stages')?></span>
                            </a>
                        </li>
					<?php break;}}?>	
					<?php foreach($actions as $action){if($action->action=='payment_mode'){?>	
						<li class="<?php echo($this->uri->segment(2)=='payment_mode')?'active':'';?>">
                            <a href="<?php echo site_url('admin/payment_mode');?>">
                                <i class="fa  fa-angle-double-right"></i> <span><?php echo lang('payment_mode')?></span>
                            </a>
                        </li>
					<?php break;}}?>	 
                            </ul>
                        </li>
				<?php break;}}?>		
				
			<?php foreach($actions as $action){ 
			 if($action->action=='settings' || $action->action=='notification' || $action->action=='canned_messages' || $action->action=='languages') { ?>	
				<li class="treeview <?php echo($this->uri->segment(2)=='case_category'|| $this->uri->segment(2)=='court_category' || $this->uri->segment(2)=='act' || $this->uri->segment(2)=='court' || $this->uri->segment(2)=='case_stage' || $this->uri->segment(2)=='location' || $this->uri->segment(2)=='payment_mode')?'active':'';?>">	
				<li class="treeview <?php echo($this->uri->segment(2)=='settings'|| $this->uri->segment(2)=='notification' || $this->uri->segment(2)=='languages')?'active':'';?>">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span><?php echo lang('administrative');?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                        	<?php foreach($actions as $action){if($action->action=='settings'){?>		
								<li class="<?php echo($this->uri->segment(2)=='settings')?'active':'';?>">
									<a href="<?php echo site_url('admin/settings');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('general');?> <?php echo lang('settings');?></span>
									</a>
								</li>
							<?php break;}}?>
						<?php foreach($actions as $action){if($action->action=='notification'){?>	
								<li class="<?php echo($this->uri->segment(2)=='notification')?'active':'';?>">
									<a href="<?php echo site_url('admin/notification');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('notification');?> <?php echo lang('settings');?></span>
									</a>
								</li>
							<?php break;}}?>	
						<?php foreach($actions as $action){if($action->action=='canned_messages'){?>	
								<li class="<?php echo($this->uri->segment(3)=='canned_messages')?'active':'';?>">
									<a href="<?php echo site_url('admin/settings/canned_messages');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('canned_messages');?></span>
									</a>
								</li>
							<?php break;}}?>	
							<?php foreach($actions as $action){if($action->action=='languages'){?>
								<li class="<?php echo($this->uri->segment(2)=='languages')?'active':'';?>">
									<a href="<?php echo site_url('admin/languages');?>">
										<i class="fa  fa-angle-double-right"></i> <span><?php echo lang('language');?></span>
									</a>
								</li>
							<?php break;}}?>	
                            </ul>
                        </li>
					<?php break;}}?>	
					
				    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
			
 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
			
			<?php 
				if($this->session->flashdata('message'))
					$message = $this->session->flashdata('message');
				  if($this->session->flashdata('error'))
						$error  = $this->session->flashdata('error');
				
			?>
			
            <?php if(!empty($error) || !empty($message)){ ?>
			<div class="container" style="margin-top:20px;">
					
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissable col-md-11">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($message)): ?>
                    <div class="alert alert-info alert-dismissable col-md-11">
                        <i class="fa fa-info"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo $message; ?>
                    </div>
                    <?php endif; ?>
                    
           </div>
           <?php }?>

    
