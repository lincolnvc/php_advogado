<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small><?php echo lang('list');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('leave_notification');?></li>
        </ol>
</section>

<section class="content">
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('leave_notification');?></h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('serial_number');?></th>
								<th><?php echo lang('date');?></th>
								<th><?php echo lang('employee');?></th>
								<th><?php echo lang('leave_type');?></th>
								<th><?php echo lang('reason');?></th>
								<th><?php echo lang('status');?></th>
								<th width="20%"><?php echo lang('action');?></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($leaves)):?>
                        <tbody>
                            <?php $i=1;foreach ($leaves as $new){
							if($new->status==0){
								$status = '<small class="badge bg-orange">Pending</small>';
								$done = '<a href="'.site_url('admin/attendance/update_leave/'.$new->id.'/1').'" class="btn btn-warning">Approve</a>';
							}else{
								$status = '<small class="badge bg-green">Approved</small>';
								$done = '<a href="'.site_url('admin/attendance/update_leave/'.$new->id.'/0').'" class="btn btn-success">Pending</a>';
							}
							?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
                                    <td><?php echo date_convert($new->date)?></td>
									 <td><?php echo $new->user?></td>
									 <td><?php echo $new->leave_type?></td>
									 <td><?php echo $new->reason?></td>
									 <td><?php echo $status?></td>
									
                                    <td>
                                        <div class="btn-group">
                                        <?php echo $done ?>
										 <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/attendance/delete_leave/'.$new->id); ?>" onclick="return areyousure()"><i class="fa fa-trash"></i> <?php echo lang('delete');?></a>
										</div>
                                    </td>
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
					
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

</script>