<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo lang('detail');?>
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
        <li><a href="<?php echo site_url('admin/cases')?>"><?php echo lang('case');?></a></li>
        <li class="active"><?php echo lang('extended_dates');?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               
                <!-- form start -->
				<h6 style="color:#FF0000"><?php echo validation_errors(); ?></h3>
				<form method="post" action="<?php echo site_url('admin/cases/dates/'.$id)?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('next');?> <?php echo lang('date');?></b>
								</div>
								<div class="col-md-4">
                                    
									<?php echo $cases->next_date;?>
                                </div>
                            </div>
                        </div>
						
						  <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('last');?> <?php echo lang('date');?></b>
								</div>
								<div class="col-md-4">
                                    
									<?php echo $cases->last_date;?>
                                </div>
                            </div>
                        </div>
					   
					   
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('notes');?></b>
								</div>
								<div class="col-md-4">
                               <?php echo $cases->note;?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('attachment');?> <?php echo lang('document');?></b>
								</div>
								<div class="col-md-4">
                                   <?php if(!empty($cases->document)){?>
										  <a class="btn btn-default" href="<?php echo site_url('assets/uploads/files/'.$cases->document); ?>" target="_blank"><i class="fa fa-download"></i> Attachment</a>					
										  <?php }else {?>
										 <?php echo lang('no');?> <?php echo lang('attachment');?>
										 <?php } ?>  
                                </div>
                            </div>
                        </div>
			       </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button  type="submit" class="btn btn-primary" onclick="window.history.back();"><?php echo lang('go_back');?></button>
                    </div>
					
                </div><!-- /.box-body -->
             </form>
            </div><!-- /.box -->
        </div>
     </div>
</section>  



<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

 $(function() {
    $( ".datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
</script>