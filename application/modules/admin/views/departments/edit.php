<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo lang('departments');?>
        <small><?php echo lang('edit');?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
        <li><a href="<?php echo site_url('admin/departments')?>"><?php echo lang('departments');?></a></li>
        <li class="active"><?php echo lang('edit');?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('edit');?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<h3 style="color:#FF0000"><?php echo validation_errors(); ?></h3>
				<?php echo form_open_multipart('admin/departments/edit/'.$id); ?>
                    <div class="box-body">
                        <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"> <?php echo lang('name');?></label>
									<input type="text" name="name" value="<?php echo $department->name; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                        	<div class="row">
                                <div class="col-md-4">
                                    <label for="name" style="clear:both;"><?php echo lang('description');?></label>
									<textarea name="description"class="form-control"><?php echo $department->description; ?></textarea>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group input_fields_wrap">
									<div class="row">
										<div class="col-md-4">
											<label for="name" style="clear:both;"> <?php echo lang('designations');?></label>
											<input type="text" name="designations[]" value="" class="form-control" placeholder="<?php echo lang('designations');?>">
										</div>
										
										<div class="col-md-4" style="padding-top:22px;">
											<button class="add_field_button btn btn-success" >Add More </button>
										</div>
										
												
										
									</div>
							<?php if(!empty($designations)){
									foreach($designations as $new){
								 	if(!empty($new))
								 ?>		
									
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="designations[]" value="<?php echo $new->designation?>" class="form-control" placeholder="Designations">
										</div><a href="#" class="remove_field btn btn-danger">Remove</a>
					 	   			</div>
							<?php 
									}
							} ?>
						
			   			
                     	
                    </div><!-- /.box-body -->
    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo lang('save');?></button>
                    </div>
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  
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
            $(wrapper).append('<div class="row"><div class="col-md-4"><input type="text" name="designations[]" value="" class="form-control" placeholder="<?php echo lang('designations');?>"></div><a href="#" class="remove_field btn btn-danger" >Remove</a></div></div>'); //add input box
			
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



</script>
