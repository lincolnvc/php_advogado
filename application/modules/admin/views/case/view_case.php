<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo lang('case')?>
        <small><?php echo lang('view')?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo site_url('admin/cases')?>"><?php echo lang('cases')?></a></li>
        <li class="active"><?php echo lang('view')?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               
                    <div class="box-body">
                        <div class="box-body">
                        
						 <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('title')?></b>
								</div>
								<div class="col-md-4">
                                    
									<?php echo $case->title;?>
                                </div>
                            </div>
                        </div>
						
						
						      <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('number')?></b>
								</div>
								<div class="col-md-4">
                                    <?php echo $case->case_no?>
                                </div>
                            </div>
                        </div>
						
						
					
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('client')?> <?php echo lang('name')?></b>
								
								</div>
								<div class="col-md-4">
                                    <?php foreach($clients as $new) {
											$sel = "";
											if($new->id==$case->client_id) echo $new->name;
										}
										
										?>
									</div>
								
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('location')?></b>
								</div>
								<div class="col-md-4">
                                    	<?php foreach($locations as $new) {
										
											if($new->id==$case->location_id) echo $new->name;
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('court')?></b>
								</div>
								<div class="col-md-4">
                                    	<?php foreach($courts as $new) {
											$sel = "";
											if($new->id==$case->court_id) echo $new->name;
										}
										
										?>
								</div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('court')?> <?php echo lang('category')?></b>
								</div>
								<div class="col-md-4">
                                    	<?php foreach($court_categories as $new) {
											if($new->id==$case->court_category_id) echo  $new->name;
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('case')?> <?php echo lang('category')?></b>
								</div>
								<div class="col-md-4">
                                    	<?php foreach($case_categories as $new) {
											if(in_array($new->id,json_decode($case->case_category_id))) echo $new->name.',';
										}
										
										?>
                                </div>
                            </div>
                        </div>
						
							<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('stages')?> <?php echo lang('stages')?></b>
								</div>
								<div class="col-md-4">
                                   	<?php foreach($stages as $new) {
											if($new->id==$case->case_stage_id) echo $new->name;
										}
										
										?>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('act')?></b>
								</div>
								<div class="col-md-4">
                    					<?php 
										
										foreach($acts as $new) {
											if(in_array($new->id,json_decode($case->act_id))) echo $new->title.',';
										}
									  ?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('description')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo $case->description;?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('filling_date')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo date_convert($case->start_date);?>
                                </div>
                            </div>
                        </div>
						
					<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('hearing_date')?></b>
								</div>
								<div class="col-md-4">
                                  <?php echo date_convert($case->hearing_date);?>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('opposite_lawyer')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo $case->o_lawyer;?>
                                </div>
                            </div>
                        </div>
						
						
						<div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('total_fees')?></b>
								</div>
								<div class="col-md-4">
                                   <?php echo $case->fees;?>
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
							  
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">	
							<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."' ")->row();?>		
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
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
									</div>
								<div class="col-md-4">
								<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."' ")->row();
								
									if(!empty($values) || !empty($result)){
											foreach($values as $key=>$val) {
												if($val==@$result->reply) echo @$val;
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
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php $x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."' ")->row();
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
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
									</div>
								<div class="col-md-4">
							
							<?php	
										foreach($values as $key=>$val) { ?>
							<?php 
							$x="";
							$result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."' ")->row();
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
					<?php }	if($doc->field_type==5) //Textarea
						  {		?>	<div class="form-group">
                              <div class="row">
                                <div class="col-md-3">
                                    <label for="contact" style="clear:both;"><?php echo $doc->name; ?></label>
								</div>
								<div class="col-md-4">	
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."'")->row();?>	
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
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."'")->row();?>	
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
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."'")->row();?>	
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
									<?php  $result = $CI->db->query("select * from rel_form_custom_fields where custom_field_id = '".$doc->id."' AND table_id = '".$case->id."' AND form = '".$doc->form."'")->row();?>	
										<?php echo @$result->reply;?>
								</div>
                            </div>
                        </div>	
						
								
						
						
					<?php 
								}	
							}
						}
					?>		
			  
						
						
					<h2><?php echo lang('payment')?> <?php echo lang('history')?></h2>		
					    <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number')?></th>
							
								<th><?php echo lang('date')?></th>
								<th><?php echo lang('amount')?></th>
								<th><?php echo lang('payment_mode')?></th>
								<th></th>
								
                            </tr>
                        </thead>
                        
                        <?php if(isset($fees_all)):?>
                        <tbody>
                            <?php $i=1;foreach ($fees_all as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
									<td><?php echo date_convert($new->date) ?></td>
								    <td><?php echo $new->amount?></td>
									<td><?php echo $new->mode?></td>
									<td><a href="<?php echo site_url('admin/invoice/index/'.$new->id)?>" class="btn btn-default"><?php echo lang('invoice')?></a></td>
									
                                 
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
					<?php //echo $pagination_link ?>
					
					
					
					<h2><?php echo lang('case')?> <?php echo lang('history')?></h2>
					
					<div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example2" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number')?></th>
								<th><?php echo lang('next')?> <?php echo lang('date')?></th>
								<th><?php echo lang('last')?> <?php echo lang('date')?></th>
								<th><?php echo lang('notes')?></th>
								<th><?php echo lang('attachment')?></th>
					        </tr>
                        </thead>
                        
                        <?php if(isset($cases)):?>
                        <tbody>
                            <?php $i=1;foreach ($cases as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
									<td><?php echo date_convert($new->next_date)?></td>
                                    <td><?php echo date_convert($new->last_date)?></td>
								    <td><?php echo  substr($new->note,0,50)?></td>
									<td><?php if(!empty($new->document)){?>
										  <a class="btn btn-default" href="<?php echo site_url('assets/uploads/files/'.$new->document); ?>" target="_blank"><i class="fa fa-download"></i> Attachment</a>					
										  <?php }else {?>
										 <?php echo lang('no')?> <?php echo lang('attachment')?>
										 <?php } ?>  
									</td>
									
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
				
 	
                    </div><!-- /.box-body -->
    
             <?php echo form_close()?>
            </div><!-- /.box -->
        </div>
     </div>
</section>  
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});
$(function() {
	$('#example2').dataTable({
	});
});

 $(function() {
    $( ".datepicker" ).pickmeup({
    format  : 'Y-m-d'
});
  });
  $(function() {
	
	$('.chzn').chosen();
	
});

</script>