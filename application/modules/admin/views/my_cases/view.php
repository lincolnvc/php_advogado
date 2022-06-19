<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}

@media print {
 .btn{display:none}
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        View Case
      
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i><?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo base_url('admin/my_cases')?>"><?php echo lang('my_cases')?></a></li>
        <li class="active">View Case</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
			        <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('case_number')?></b>
								</div>
								<div class="col-md-4">
                                    
									<?php echo $cases->case_no;?>
                                </div>
                            </div>
                        </div>
						
					
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('client')?></b>
								
								</div>
								<div class="col-md-4">
                                    <?php echo $cases->client;?>
                                </div>
								 
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('location')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo $cases->location;?>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('court')?></b>
								</div>
								<div class="col-md-4">
                					 <?php echo $cases->court;?>
				                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('court_category')?></b>
								</div>
								<div class="col-md-4">
                                     <?php echo $cases->court_category;?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('case_category')?></b>
								</div>
								<div class="col-md-4">
                                    <?php
									
									 foreach($case_categories as $new) {
									echo	(in_array($new->id,json_decode($cases->case_category_id)))?  $new->name ."," : '';
											//echo $new->name;	
											//echo ",";
										}
										
										?>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('act')?></b>
								</div>
								<div class="col-md-4">
                                    <?php
									
									 foreach($acts as $new) {
									echo	(in_array($new->id,json_decode($cases->act_id)))?  $new->title .",": '';
											//echo $new->name;	
											//echo ",";
										}
										
										?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('description')?></b>
								</div>
								<div class="col-md-4">
                                    <?php echo $cases->description;?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                	<b><?php echo lang('filing_date')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo $cases->start_date;?>
                                </div>
                            </div>
                        </div>
						
						
						
			   			
                      
						
                    </div><!-- /.box-body -->
    
                   <div class="box-footer">
                       <a href="<?php echo site_url('admin/my_cases')?>" class="btn btn-default">Go Back</a>
					   <a href="" onclick="window.print();" class="btn btn-danger">Print</a>
                    </div>
            </div><!-- /.box -->
        </div>
     </div>
</section>  



<!-- Button trigger modal -->


<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>" type="text/javascript"></script>


<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('.chzn').chosen();
	
});

$(function() {
	//bootstrap WYSIHTML5 - text editor
	$(".txtarea").wysihtml5();
});

 $(function() {
    $( ".datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
</script>