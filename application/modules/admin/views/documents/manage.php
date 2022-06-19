<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $document->title; ?>
            <small><?php echo lang('manage');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('documents');?></li>
        </ol>
</section>

<section class="content">
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('add');?> <?php echo lang('document');?></h3>                                    
                </div><!-- /.box-header -->
				 <div class="box-body">
				
				
				
               <div class="col-xs-12">
				  <form method="post" enctype="multipart/form-data">
					<div class="form-group input_fields_wrap">
                        	<div class="row  ">
                                <div class="col-md-2">
                                    <label for="name" style="clear:both;"> Documents</label>
									
								</div>
								<div class="col-md-4" >
									<div>
										<input type="text" name="title[]" value="" class="form-control" placeholder="Title" />
									</div>	
										
                                </div>
								<div class="col-md-4">
									<input type="file" name="doc[]" value="" class="form-control" />
									
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
				<?php if(check_user_role(122)==1){?>		
				
					<div class="row ">
						<div class="col-xs-12" style="padding:20px;">
							<input type="submit" name="ok" value="Save" class="btn btn-primary" />
						</div>
					</div>
			<?php } ?>	

					</form>	
				</div>
				
				
			    <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('serial_number');?></th>
								<th><?php echo lang('name');?></th>
								<th width="20%"><?php echo lang('action');?></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($documents)):?>
                        <tbody>
                            <?php $i=1;foreach ($documents as $new){
							if(!empty($new->c_id)){
								$link = '<a href="'.site_url('admin/cases/view_case/'.$new->c_id).'">#'.$new->case_no.' '.$new->case_title.'</a>';
							}else{
								$link = "-";
							}
							?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
                                    <td><?php echo $new->title?></td>
									 <td class="col-md-3">
                                        <div class="btn-group">
                                         <a class="btn btn-default" style="margin-left:2px;" href="<?php echo site_url('admin/documents/download/'.$new->id); ?>" ><i class="fa fa-download"></i> <?php echo lang('download');?></a>
										 
										  <?php if(check_user_role(153)==1){?>	 
										 <a class="btn btn-danger" style="margin-left:2px;" href="<?php echo site_url('admin/documents/delete_document/'.$new->id); ?>" onclick="return areyousure()"><i class="fa fa-trash"></i> <?php echo lang('delete');?></a>
										 <?php } ?>
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
            $(wrapper).append('<div class="row" style="padding-top:10px;"><div class="col-md-2"></div><div class="col-md-4"><input type="text" name="title[]" value="" class="form-control" placeholder="Title" /></div><div class="col-md-4"><input type="file" name="doc[]" value="" class="form-control" /></div><a href="#" class="remove_field btn btn-danger">Remove</a></div></div>'); //add input box
			$('.chzn').chosen({search_contains:true});
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



</script>

