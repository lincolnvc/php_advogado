<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small><?php echo lang('list');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('canned_messages');?></li>
        </ol>
</section>

<section class="content">
  	  	 <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
                <div class="btn-group pull-right">
                   
<div class="button_set pull-right">
    	<a class="btn btn-default" href="<?php echo site_url('admin/settings/canned_message_form/');?>"><i class="icon-plus-sign"></i> <?php echo lang('add_new');?></a>
</div>          

                </div>
            </div>    
        </div>	
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
               
                <div class="box-body table-responsive" style="margin-top:40px;">



<?php if(count($canned_messages) > 0): ?>
 <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><?php echo lang('name');?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($canned_messages as $message): ?>
        <tr class="gc_row">
            <td><?php echo $message['name']; ?></td>
            <td>
                <span class="btn-group pull-right">
                    <a class="btn btn-default" href="<?php echo site_url('admin//settings/canned_message_form/'.$message['id']);?>"><i class="icon-pencil"></i> <?php echo lang('edit');?></a>
                    <?php if($message['deletable'] == 1) : ?>   
                        <a class="btn btn-danger" href="<?php echo site_url('admin//settings/delete_message/'.$message['id']);?>" onclick="return areyousure();"><i class="fa fa-trash"></i> <?php echo lang('delete');?></a>
                    <?php endif; ?>
                </span>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

</script>
<script type="text/javascript">
function areyousure()
{
    return confirm('<?php echo lang('are_you_sure');?>');
}
</script>