<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('Are You Sure You Want Delete This Appointment');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small><?php echo lang('list');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('appointments');?> </li>
        </ol>
</section>

<section class="content">
  	  	 <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
              
            </div>    
        </div>	
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('view_all');?></h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('serial_number');?></th>
								<th><?php echo lang('date');?></th>
								<th><?php echo lang('title');?></th>
								<th><?php echo lang('contact');?></th>
								<th><?php echo lang('motive');?></th>
								<th><?php echo lang('notes');?></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($appointments)):?>
                        <tbody>
                            <?php $i=1;foreach ($appointments as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
                                    <th><?php echo date_time_convert($new->date_time)?></th>
									<td><a href="<?php echo site_url('admin/appointments/view_appointment/'.$new->id); ?>"><?php echo $new->title?></a></th>
									<td><?php echo $new->name?></td>
									<td><?php echo $new->motive?></td>
									<td><?php echo $new->notes?></td>
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