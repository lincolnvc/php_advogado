<link href="<?php echo base_url('assets/css/fullcalendar.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/fullcalendar.print.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<style type="text/css">
.custom,
.custom div,
.custom span {
    border-color: rgb(0, 115, 183);
	 background-color: rgb(0, 115, 183);
    
    color: white;           /* text color */
}
.fc-event-time {
    display:none !important;
}

.custom1,
.custom1 div,
.custom1 span {
   border-color: rgb(245, 105, 84);
   background-color: rgb(245, 105, 84);
   color: white;           /* text color */
}
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo lang('dashboard') ?>
         <?php if(!empty($page_title)):?>
    	 <small>
        	<?php echo  $page_title; ?>
        </small>
   		<?php endif;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard') ?></a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
	
		<?php
        $admin = $this->session->userdata('admin');
		$access = $admin['user_role'];
		if($access==2){
		?>				
					<div class="row">
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($my_cases)?>
                                    </h3>
                                    <p>
                                       <?php echo lang('my_cases');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <a href="<?php echo site_url('admin/my_cases')?>" class="small-box-footer">
                                    <?php echo lang('more_info')?><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $client_setting->client_case_alert;?>
                                    </h3>
                                    <p>
                                       <?php echo lang('case_alert_days')?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <a href="#myModal" data-toggle="modal"  class="small-box-footer">
                                    <?php echo lang('click_here_to_change_setting'); ?><i class="fa fa-cog"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
	
		<?php }else{?>		
    <div class="row">
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($clients)?>
                                    </h3>
                                    <p>
                                     <?php echo lang('clients');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="<?php echo site_url('admin/clients')?>" class="small-box-footer">
                                    <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?php echo count($case_all)?>
                                    </h3>
                                    <p>
                                       <?php echo lang('cases');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list"></i>
                                </div>
                                <a href="<?php echo site_url('admin/cases')?>" class="small-box-footer">
                                    <?php echo lang('more_info');?>  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                       <?php echo count($starred)?>
                                    </h3>
                                    <p>
                                       <?php echo lang('starred_cases');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="<?php echo site_url('admin/cases/starred_cases')?>" class="small-box-footer">
                                   <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($archived)?>
                                    </h3>
                                    <p>
                                        <?php echo lang('archived_cases'); ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <a href="<?php echo site_url('admin/cases/archived_cases')?>" class="small-box-footer">
                                   <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
	
	
	 <div class="row">
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($employees)?>
                                    </h3>
                                    <p>
                                     <?php echo lang('employees');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="<?php echo site_url('admin/employees')?>" class="small-box-footer">
                                    <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php echo count($tasks)?>
                                    </h3>
                                    <p>
                                       <?php echo lang('tasks');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tasks"></i>
                                </div>
                                <a href="<?php echo site_url('admin/tasks')?>" class="small-box-footer">
                                    <?php echo lang('more_info');?>  <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-light-blue-gradient">
                                <div class="inner">
                                    <h3>
                                       <?php echo count($case_study)?>
                                    </h3>
                                    <p>
                                       <?php echo lang('case_study');?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <a href="<?php echo site_url('admin/case_study')?>" class="small-box-footer">
                                   <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($my_tasks)?>
                                    </h3>
                                    <p>
                                        <?php echo lang('my_tasks'); ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <a href="<?php echo site_url('admin/tasks/my_tasks')?>" class="small-box-footer">
                                   <?php echo lang('more_info');?> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
	
	<div class="row">	
	<?php if(check_user_role(105)==1){?>		
	<section class="col-lg-6 connectedSortable ui-sortable">	
		<div class="box box-primary ">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title"><?php echo lang('todays_cases');?></h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list ui-sortable">
									<?php if(isset($cases)):?>
										 <?php $i=1;foreach ($cases as $new){?>
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle ui-sortable-handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <!-- todo text -->
                                            <span class="text"><a href="<?php echo site_url('admin/cases/dates/'.$new->case_id); ?>"><?php echo $new->case_no  ." - ". $new->title; ?> </a></span>
                                            <!-- Emphasis label -->
                                           
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fa fa-eye"></i>
                                                
                                            </div>
                                        </li>
										<?php $i++;}?>
									<?php endif;?>	
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><a href="<?php echo site_url('admin/cases/view_all'); ?>"><i class="fa fa-plus"></i> <?php echo lang('view_all'); ?></a></button>
                                </div>
                            </div>		
	</section>
	<?php 
	}
	if(check_user_role(107)==1){?>		
	<section class="col-lg-6 connectedSortable ui-sortable">	
		<div class="box box-primary ">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="fa fa-tasks"></i>
                                    <h3 class="box-title"><?php echo lang('todays_to_do'); ?></h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list ui-sortable">
									<?php if(isset($to_do)):?>
										 <?php $i=1;foreach ($to_do as $new){?>
                                        <li>
                                            <!-- drag handle -->
                                            <span class="handle ui-sortable-handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <!-- todo text -->
                                            <span class="text"><a href="<?php echo site_url('admin/to_do_list'); ?>"><?php echo  $new->title; ?> </a></span>
                                            <!-- Emphasis label -->
                                           
                                            <!-- General tools such as edit or delete-->
                                            <div class="tools">
                                                <i class="fa fa-eye"></i>
                                                
                                            </div>
                                        </li>
										<?php $i++;}?>
									<?php endif;?>	
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><a href="<?php echo site_url('admin/to_do_list/view_all'); ?>"><i class="fa fa-plus"></i> <?php echo lang('view_all'); ?></a></button>
                                </div>
     
	                        </div>				
</div>
<?php }?>
<section class="col-lg-6 connectedSortable ui-sortable">	
					<div class="box box-primary">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title"><?php echo lang('notice_board')?></h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="todo-list ui-sortable">
                                      <?php if(isset($notice)):?>
										 <?php $i=1;foreach ($notice as $new){?>  
                                        <li>
                                            <span class="label label-info"><i class="fa fa-clock-o"></i> <?php echo date_time_convert($new->date_time); ?></span>
											<span class="text"><?php echo $new->title; ?></span>
                                            
                                            <div class="tools">
                                               <a href="<?php echo site_url('admin/notice/view/'.$new->id)?>"> <i class="fa fa-eye"></i></a>
                                            </div>
                                        </li>
										<?php $i++;}?>
									<?php endif;?>	
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> <a href="<?php echo site_url('admin/notice/')?>"><?php echo lang('view_all')?></a></button>
                                </div>
                            </div>
</section>
<?php if($access==1){ ?>
<section class="col-lg-6 connectedSortable ui-sortable">	
					<div class="box box-primary">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="fa fa-user"></i>
                                    <h3 class="box-title"><?php echo lang('today_employees_on_leave')?></h3>
                            								</div><!-- /.box-header -->
                                <div class="box-body">
									
									         <ul class="todo-list ui-sortable">
									 <?php $i=1;foreach ($todays_leaves as $new){?>  
                                        <li>
                                           <span class="text"><?php echo $new->user; ?></span>
										   <span class="text label label-success"><?php echo $new->leave_type; ?></span>
                                            
                                            <div class="tools">
                                               <a href="#"> </a>
                                            </div>
                                        </li>
										<?php $i++;}?>
									</ul>

		                        </div>
								
                      </div>
</section>


<?php }else{
		if($access !=2){
 ?>
<section class="col-lg-6 connectedSortable ui-sortable">	
					<div class="box box-primary">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="fa fa-user"></i>
                                    <h3 class="box-title"><?php echo lang('attendance')?></h3>
                                   <div class="box-tools pull-right">
								  <?php //if(check_user_role(137)==1){?>	 
                                   	<a href="#apply_leave" class="btn bg-purple btn-flat margin" data-toggle="modal"  > <i class="fa fa-arrow-circle-up"></i> <?php echo lang('apply_leave')?></a><?php //} ?>
								   </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
			<?php if(empty($check_today)){?>	
						<?php if(!empty($att_status)){?>		
								<?php if($att_status->current_status==NULL OR $att_status->current_status==0){?>
                                <a href="#mark_in" class="btn bg-olive btn-flat margin" data-toggle="modal"  > <i class="fa fa-sign-in"></i> <?php echo lang('mark_in')?></a>
								<?php }else{?>
									<a href="#mark_out" class="btn bg-orange btn-flat margin" data-toggle="modal"  > <i class="fa fa-sign-out"></i> <?php echo lang('mark_out')?></a>									<?php } ?>
						<?php }else{ ?>
									<a href="#mark_in" class="btn bg-olive btn-flat margin" data-toggle="modal"  > <i class="fa fa-sign-in"></i> <?php echo lang('mark_in')?></a>	
						<?php }?>	
			<?php }else{?>
							<button class="btn bg-maroon btn-flat margin">Today is <?php echo $check_today->leave_type?></button>
				
			<?php }?>					
                                </div><!-- /.box-body -->
								 <div class="box-footer clearfix no-border">
								 <?php //if(check_user_role(135)==1){?>	
                                    <a href="<?php echo site_url('admin/attendance/my_attendance');?>" style="padding-right:7px" class="btn btn-default"><i class="fa fa-user"></i> <?php echo lang('my_attendance')?></a>
								<?php //} ?>	
									<?php //if(check_user_role(136)==1){?>	
									<a href="<?php echo site_url('admin/attendance/my_leaves');?>"  class="btn btn-default pull-right"><i class="fa fa-plus"></i> <?php echo lang('my_leaves')?></a>	
									<?php //} ?>	
                                </div>
								
                      </div>
</section>
<?php		 } 
	}
?>

	<section class="content">
				<div class="row">	
					
					
					<div class="col-md-9">
                            <div class="box box-primary">
						<div class="col-md-12" style="padding:20px">	
							<select id='lang-selector' class="pull-right"></select>
						</div>	

                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->
						<div class="col-md-3">
                            <div class="box box-primary">
                                <div class="box-body ">
                                    <!-- THE CALENDAR -->
									<h2><?php echo lang('events'); ?></h2>
                                    <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;"><?php echo lang('cases'); ?></div>
									<div class="external-event ui-draggable ui-draggable-handle" style="border-color: rgb(0, 115, 183); color: rgb(255, 255, 255); position: relative; background-color: rgb(0, 115, 183);"><?php echo lang('appointments'); ?></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

					<?php } ?>
     </section><!-- /.content -->	


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('case_alert_days') ?> <?php echo lang('settings') ?></h4>
      </div>
      <div class="modal-body">
			<?php echo form_open_multipart('admin/my_cases/case_alert/'); ?>
                    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"> <?php echo lang('case_alert_days') ?></label>
									<input type="text" name="days" value="" class="form-control">
                                </div>
                            </div>
                        </div>
						
							

                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo lang('save') ?></button>
                    </div>
             </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close') ?></button>  
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="mark_in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('mark_in') ?> </h4>
      </div>
      <div class="modal-body">
			<?php echo form_open_multipart('admin/attendance/mark_in/'); ?>
                    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"> <?php echo lang('notes') ?></label>
									<textarea name="notes" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
						
							

                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn bg-olive btn-flat margin" ><i class="fa fa-sign-in"></i> <?php echo lang('mark_in')?></button>
                    
					</div>
             </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close') ?></button>  
      </div>
    </div>
  </div>
</div>


<!-- Mark Out Modal -->
<div class="modal fade" id="mark_out" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('mark_out') ?> </h4>
      </div>
      <div class="modal-body">
			<?php echo form_open_multipart('admin/attendance/mark_out/'); ?>
                    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"> <?php echo lang('notes') ?></label>
									<textarea name="notes" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
						
							

                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn bg-orange btn-flat margin" ><i class="fa fa-sign-out"></i> <?php echo lang('mark_out')?></button>
                    
					</div>
             </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close') ?></button>  
      </div>
    </div>
  </div>
</div>


<!-- Apply Leave Modal -->
<div class="modal fade" id="apply_leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo lang('apply_leave') ?> </h4>
      </div>
      <div class="modal-body">
			<?php echo form_open_multipart('admin/attendance/apply_leave/'); ?>
                    <div class="box-body">
                        <div class="form-group input_fields_wrap">
                        	<div class="row  ">
                               
								<div class="col-md-3">
								 	<input type="text" name="date[]" value="" placeholder="<?php echo lang('date')?>" class="form-control datepicker" required/>
								</div>
								<div class="col-md-3" >
									<div>
										<select name="leave_id[]" class="form-control" required>
											<option value="">-- Select Leave Type</option>
											<?php 
											foreach($leave_types as $new){
												echo "<option value='".$new->id."'>".$new->name."</option>";
											}
											?>
										</select>
									</div>	
										
                                </div>
								<div class="col-md-4">
									<input type="text" name="reason[]" value="" placeholder="Reason" class="form-control" required />
									
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-md-offset-2" style="padding-left:12px;">
												<button class="add_field_button btn btn-success">Add More </button>
										</div>
									</div>
								</div>	
								
                            </div>
                        </div>
							

                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn bg-blue btn-flat margin" ><?php echo lang('submit')?></button>
                    
					</div>
             </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close') ?></button>  
      </div>
    </div>
  </div>
</div>

  <!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('assets/js/plugins/morris/morris.min.js')?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js')?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url('assets/js/moment.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/fullcalendar.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/lang-all.js')?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/js/plugins/jqueryKnob/jquery.knob.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row" style="padding-top:10px;"><div class="col-md-3"><input type="text" name="date[]" value="" placeholder="<?php echo lang('date')?>" class="form-control datepicker"  required/></div><div class="col-md-3"><select name="leave_id[]" class="form-control" required><option value="">-- Select Leave Type</option><?php foreach($leave_types as $new){echo "<option value=".$new->id.">".$new->name."</option>";}?></select></div><div class="col-md-4"><input type="text" name="reason[]" value="" placeholder="Reason" class="form-control" required /></div><a href="#" class="remove_field btn btn-danger">Remove</a></div></div>'); //add input box
			jQuery('.datepicker').datetimepicker({
			 timepicker:false,
			 format:'Y-m-d'
			});			

        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



</script>




<script type="text/javascript">
      $(function() {
				
		var currentLangCode = 'en';

		// build the language selector's options
		$.each($.fullCalendar.langs, function(langCode) {
			$('#lang-selector').append(
				$('<option/>')
					.attr('value', langCode)
					.prop('selected', langCode == currentLangCode)
					.text(langCode)
			);
		});

		// rerender the calendar when the selected option changes
		$('#lang-selector').on('change', function() {
			if (this.value) {
				currentLangCode = this.value;
				$('#calendar').fullCalendar('destroy');
				//start cal code
					
					/* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date();
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                $('#calendar').fullCalendar({
					 showAgendaButton: true,
                columnFormat: { month: 'ddd', week: 'ddd d/M', day: 'dddd d/M' },
                timeFormat: 'H:mm',
                axisFormat: 'H:mm',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
					lang: currentLangCode,
                    buttonText: {
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random default events
                    events:[
					
		<?php  
			foreach($case_all as $order){
				
				echo "{
				title: '".'#'.$order->case_no."',
				start: '".date('M d Y 12:00:00', strtotime($order->next_date))."',
				backgroundColor: '#3c8dbc',
				className : 'custom1',
				url:   '".site_url('admin/cases/view_case/'.$order->case_id)."'
				},
					  ";
			 }		
			 
			 
			 foreach($appointment_all as $new){
				
				echo "{
				title: '".$new->title."',
				date: '".date('M d Y 12:00:00', strtotime($new->date_time))."',
				backgroundColor: '#3c8dbc',
				className : 'custom',
				
				url:   '".site_url('admin/appointments/view_appointment/'.$new->id)."'
				},
					  ";
			 }		
		?>
		],
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });
				
				
				//end cal code
				
				
			}
		});

				
				
                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date();
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                $('#calendar').fullCalendar({
					 showAgendaButton: true,
                columnFormat: { month: 'ddd', week: 'ddd d/M', day: 'dddd d/M' },
                timeFormat: 'H:mm',
                axisFormat: 'H:mm',
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
					lang: currentLangCode,
                    buttonText: {
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random default events
                    events:[
					
		<?php  
			foreach($case_all as $order){
				
				echo "{
				title: '".'#'.$order->case_no."',
				start: '".date('M d Y 12:00:00', strtotime($order->next_date))."',
				backgroundColor: '#3c8dbc',
				className : 'custom1',
				url:   '".site_url('admin/cases/view_case/'.$order->case_id)."'
				},
					  ";
			 }		
			 
			 
			 foreach($appointment_all as $new){
				
				echo "{
				title: '".$new->title."',
				date: '".date('M d Y 12:00:00', strtotime($new->date_time))."',
				backgroundColor: '#3c8dbc',
				className : 'custom',
				
				url:   '".site_url('admin/appointments/view_appointment/'.$new->id)."'
				},
					  ";
			 }		
		?>
		],
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });

                
               
            });
jQuery('.datepicker').datetimepicker({
 timepicker:false,
 format:'Y-m-d'
});			
        </script>  
