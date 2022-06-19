<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<style>

</style>       
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure')?>');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small><?php echo lang('lang');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dahboard');?></a></li>
            <li class="active"><?php echo lang('case');?></li>
        </ol>
</section>

<section class="content">
  	  	
		 <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
                <div class="">
                    <div class="col-xs-2">
						<select name="filter" id="client_id" class="form-control chzn">
							<option>--<?php echo lang('filter');?> <?php echo lang('by');?> <?php echo lang('client');?>--</option>
							<?php foreach($clients as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
								  }
										
							?>
						</select>
					</div>
					
					 <div class="col-xs-2">
						<select name="filter_court" id="court_id" class="form-control chzn">
							<option>--<?php echo lang('filter');?> <?php echo lang('by');?> <?php echo lang('court');?>--</option>
										<?php foreach($courts as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
											}
										
										?>
						</select>
					</div>
					
					 <div class="col-xs-2">
						<select name="filter_location" id="location_id" class="form-control chzn">
							<option>--<?php echo lang('filter');?> <?php echo lang('by');?> <?php echo lang('location');?>--</option>
							<?php foreach($locations as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
						</select>
					</div>
					
					<div class="col-xs-2">
						<select name="filter_location" id="case_stage_id" class="form-control chzn">
							<option>--<?php echo lang('filter');?> <?php echo lang('by');?> <?php echo lang('case') ." ". lang('stages');?>--</option>
							<?php foreach($stages as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
						</select>
					</div>
					
					<div class="col-xs-2">
						<input type="text" name="date1" id="date1" class="form-control datepicker" placeholder="<?php echo lang('filling_date');?> " />
					</div>
					
					<div class="col-xs-2">
						<input type="text" name="date2" id="date2" class="form-control datepicker" placeholder="<?php echo lang('hearing_date');?>" />
					</div>
					
                </div>
            </div>    
        </div>	
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('case');?></h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;" id="result">
                    <table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number');?></th>
								<th width="8%"><?php echo lang('star');?></th>
								<th><?php echo lang('case')?> <?php echo lang('title')?></th>
								<th><?php echo lang('case');?> <?php echo lang('number');?></th>
								<th><?php echo lang('clients');?></th>
								<th width="20%"><?php echo lang('action');?></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($cases)):?>
                        <tbody>
                            <?php $i=1;foreach ($cases as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
									
									<td class="small-col">
									
									<?php if($new->is_starred==0){ ?>
									<a href="" at="90" class="Privat"><span style="display:none"><?php echo $new->id?></span>
									<i class="fa fa-star-o"></i></a>
									<?php 
									}else{
									?>
									<a href="" at="90" class="Public"><span style="display:none"><?php echo $new->id?></span>
									<i class="fa fa-star"></i></a>
									<?php
									}
									?>
									</td>
                                    <td><?php echo $new->title?></td>
								    <td><?php echo $new->case_no?></td>
									<td><?php echo $new->client?></td>
									
                                    <td width="53%">
								<?php if(check_user_role(7)==1){?>		
									<a class="btn btn-default"  href="<?php echo site_url('admin/cases/view_case/'.$new->id); ?>"><i class="fa fa-eye"></i> <?php echo lang('view')?></a>
								<?php } ?>		
							<?php if(check_user_role(8)==1){?>			
									<a class="btn btn-info"  href="<?php echo site_url('admin/cases/fees/'.$new->id); ?>"><i class="fa fa-inr"></i> <?php echo lang('fees')?></a>	
                         <?php } ?>
						  <?php if(check_user_role(84)==1){?>	
						              <a class="btn btn-success"  href="<?php echo site_url('admin/cases/dates/'.$new->id); ?>"><i class="fa fa-calendar"></i> <?php echo lang('hearing_date')?></a>							
                           <?php } ?>              
									<?php if(check_user_role(6)==1){?>		  
										  <a class="btn btn-primary"  href="<?php echo site_url('admin/cases/edit/'.$new->id); ?>"><i class="fa fa-edit"></i> <?php echo lang('edit')?></a>								<?php } ?>
									<?php if(check_user_role(9)==1){?>		
                                        <a class="btn btn-warning"  href="<?php echo site_url('admin/cases/archived/'.$new->id); ?>"><i class="fa fa-close"></i> <?php echo lang('archived')?></a>					<?php } ?>
										<?php if(check_user_role(156)==1){?>		
                                        <a class="btn bg-purple"  href="<?php echo site_url('admin/cases/notes/'.$new->id); ?>"><i class="fa fa-pencil"></i> <?php echo lang('notes')?></a>					<?php } ?>	
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
<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('#example1').dataTable({
	});
});

  jQuery('.datepicker').datetimepicker({
 lang:'en',
 i18n:{
  de:{
   months:[
    'Januar','Februar','März','April',
    'Mai','Juni','Juli','August',
    'September','Oktober','November','Dezember',
   ],
   dayOfWeek:[
    "So.", "Mo", "Di", "Mi", 
    "Do", "Fr", "Sa.",
   ]
  }
 },
 timepicker:false,
 format:'Y-m-d'
});

$(function() {
	
	$('.chzn').chosen();
	
});
 //Handle starring for glyphicon and font awesome
                $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                    e.preventDefault();
                    //detect type
                    var glyph = $(this).hasClass("glyphicon");
                    var fa = $(this).hasClass("fa");

                    //Switch states
                    if (glyph) {
                        $(this).toggleClass("glyphicon-star");
                        $(this).toggleClass("glyphicon-star-empty");
                    }

                    if (fa) {
                        $(this).toggleClass("fa-star");
                        $(this).toggleClass("fa-star-o");
                    }
                });
$(".Privat").click(function (e) {
    e.preventDefault();
    //alert($(this).text());
  vch = $(this).text();
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/set_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
	 }
  });
  
  
});		


$(".Public").click(function (e) {
    e.preventDefault();
   // alert($(this).text());
  vch = $(this).text();
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/update_set_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
     
	 }
  });
  
  
});	



$(document).on('change', '#client_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_client_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      //alert(result);return false;
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});


$(document).on('change', '#court_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_court_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});


$(document).on('change', '#location_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_location_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});

$(document).on('change', '#case_stage_id', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_case_stage_id_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});


$(document).on('change', '#date1', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	//alert(vch);	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_case_filing_date_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});

$(document).on('change', '#date2', function(){
 //alert(12);
 	vch = $(this).val();
  var ajax_load = '<img style="margin-left:100px;" src="<?php echo base_url('assets/img/ajax-loader.gif')?>"/>';
  $('#result').html(ajax_load);
	//alert(vch);	  
  $.ajax({
    url: '<?php echo site_url('admin/cases/get_case_by_case_hearing_date_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
	  $('#result').html(result);
	  $(".chzn").chosen();
	  $('#example1').dataTable({});
	 }
  });
});
			
				

</script>