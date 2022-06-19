<?php 


	function get_time($id=6,$date){
		$CI =& get_instance();
		$check  = $CI->attendance_model->check_date_is_leave_by_id($id,$date);

		if(empty($check)){
		
			$attendance = $CI->attendance_model->get_attendance_by_user($id,$date);
			if(empty($attendance)){
				return "N/A";
			}	
				foreach($attendance as $new){
					//$current = 
					$times [] = $new->diff;
				
				}
			//echo '<pre>'; print_r($times);die;
			return sum_the_time($times);
		}else{
			return $check->leave_type;
		}		
	}
	
	function sum_the_time($times) {
	  //$times = array($time1, $time2);
	  $seconds = 0;
	  foreach ($times as $time)
	  {
	  	if(empty($time)){
			$time="00:00:00";
		}
		list($hour,$minute,$second) = explode(':', $time);
		$seconds += $hour*3600;
		$seconds += $minute*60;
		$seconds += $second;
	  }
	  $hours = floor($seconds/3600);
	  $seconds -= $hours*3600;
	  $minutes  = floor($seconds/60);
	  $seconds -= $minutes*60;
	  // return "{$hours}:{$minutes}:{$seconds}";
	  return sprintf('%02d h %02d m %02d s', $hours, $minutes, $seconds); 
	}
?>
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
         
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('attendance');?></li>
        </ol>
</section>

<section class="content">
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('attendance');?></h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:10px;">
                    <form method="post">
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                        			<input type="text" name="date1" value="<?php echo (isset($_POST['date1']))?$_POST['date1']:'';?>" class="form-control datepicker" placeholder="<?php echo lang('date_from')?>">
                                </div>
								 <div class="col-md-2">
                        			<input type="text" name="date2" value="<?php echo (isset($_POST['date2']))?$_POST['date2']:'';?>" class="form-control datepicker" placeholder="<?php echo lang('date_to')?>">
                                </div>
								
								
								<div class="col-md-1">
									<input type="submit" name="ok" value="<?php echo lang('submit')?>" class="btn btn-primary" />
								</div>
                            </div>
                        </div>
					</form>
			<?php if(!empty($_POST)){?>		
			<div style="overflow: scroll;">
					  <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="6%"><?php echo lang('serial_number');?></th>
								<th><?php echo lang('name');?></th>
								<?php if(isset($dates)){?>
								<?php foreach($dates as $date_new){
									echo '<th>'.$date_new.'</th>';	
								}?>
								<?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
						
						<?php $i=1;;foreach($employees as $new){?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $new->name ?></td>
								<?php if(isset($dates)){?>
								<?php foreach($dates as $date_new){
								
										echo '<td>'.get_time($new->id,$date_new).'</td>';	
									}
								?>
								<?php }?>
							</tr>
						<?php $i++;}?>
						</tbody>
					</table>		
				</div>	
				<?php } ?>	
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script>
jQuery('.datepicker').datetimepicker({
 timepicker:false,
 format:'Y-m-d'
});
</script>