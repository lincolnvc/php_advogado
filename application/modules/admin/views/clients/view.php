
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo lang('clients')?>
        <small><?php echo lang('view')?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo site_url('admin/clients')?>"><?php echo lang('clients')?></a></li>
        <li class="active"><?php echo lang('view')?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('view')?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<form method="post">
                    <div class="box-body">
                        <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="name" style="clear:both;"><?php echo lang('name')?></label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->name?>
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="name" style="clear:both;"><?php echo lang('profile')?> <?php echo lang('picture')?></label>
									
                                <br />

								 <?php 
								 if(!empty($clients->image)){
								 ?>
								 <img src="<?php echo base_url('assets/uploads/images/'.$clients->image);?>" height="90" width="110" />
								 <?php 
								 	}
								?>	
								 </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-2">
                                    <label for="gender" style="clear:both;"><?php echo lang('gender')?></label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->gender?>
                                </div>
                            </div>
                        </div>
               
			   			 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="dob" style="clear:both;"><?php echo lang('date_of_birth')?></label>
								</div>	
								<div class="col-md-4">	
									<?php echo date_convert($clients->dob)?>
									
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="email" style="clear:both;"><?php echo lang('email')?></label>
								</div>	
								<div class="col-md-4">	
									<?php echo $clients->email?>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="username" style="clear:both;"><?php echo lang('username')?></label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->username?>
                                </div>
                            </div>
                        </div>
						
						
						
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo lang('phone')?></label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->contact?>
                                </div>
                            </div>
                        </div>
						
						 <div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo lang('address')?></label>
								</div>	
								<div class="col-md-4">
									<?php echo $clients->address?>
                                </div>
                            </div>
                        </div>

										<?php 
					$CI = get_instance();
						if($fields){
							foreach($fields as $doc){
							$output = '';
							if($doc->field_type==1) //testbox
							{
						?>
						<div class="form-group">
                              <div class="row">
							  
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
							<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."' ")->row();?>		
							<?php echo @$result->reply; ?>
								</div>
                            </div>
                        </div>
					 <?php 	}	
							if($doc->field_type==2) //dropdown list
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
								
								<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."'  ")->row();?>	
							<?php		if(!empty($values)){
											foreach($values as $key=>$val) {
												///$val='';
												if($val==$result->reply) echo $val;
											}
										}
							?>			
								</div>
                            </div>
                        </div>
						<?php	}	
								if($doc->field_type==3) //radio buttons
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							</div>	
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php 
							$x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."' ")->row();
							if(!empty($result->reply)){
								if($result->reply==$val){
									$x= $val;
								}else{
									$x='';
								}
							}
							?>			
						
						<?php echo $x;?>
 							<?php 			}
							?>			
								</div>
                            </div>
                        </div>
						
						<?php }
						if($doc->field_type==4) //checkbox
							{
								$values = explode(",", $doc->values);
					?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
							</div>	
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php 
							$x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."' ")->row();
							if(!empty($result->reply)){
								if($result->reply==$val){
									$x= $val;
								}else{
									$x='';
								}
							}
						?>	
										
								<?php echo $x;?>
 							<?php } ?>			
								</div>
                            </div>
                        </div>
					<?php }	if($doc->field_type==5) //Textarea
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."'")->row();?>	
										<?php echo @$result->reply;?>
								</div>
                            </div>
                        </div>
					
					
					<?php }	if($doc->field_type==6) //URl
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."'")->row();?>	
										<a href="<?php echo @$result->reply;?>" target="_blank"> <?php echo @$result->reply;?></a>
								</div>
                            </div>
                        </div>
						
					<?php }	if($doc->field_type==7) //EMAIL
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."'")->row();?>	
										<a href="mailto:<?php echo @$result->reply;?>" target="_top"> <?php echo @$result->reply;?></a>
								</div>
                            </div>
                        </div>				
					
					<?php }	if($doc->field_type==8) //Phone
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-2">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>	
								<div class="col-md-4">
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$clients->id."' AND form = '".$doc->form."'")->row();?>	
										<?php echo @$result->reply;?>
								</div>
                            </div>
                        </div>	
						
						
					<?php 
								}	
							}
						}
					?>		

                    </div><!-- /.box-body -->
    
                   
             <?php form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  

<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	//bootstrap WYSIHTML5 - text editor
	$(".txtarea").wysihtml5();
});

 $(function() {
    $( "#datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
</script>