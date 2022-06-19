<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/css/jquery.datetimepicker.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure')?>');
}
</script>
<style>
.row{
	margin-bottom:10px;
}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       <?php echo lang('fees')?>
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard')?></a></li>
        <li><a href="<?php echo site_url('admin/cases')?>"><?php echo lang('cases')?></a></li>
        <li class="active"><?php echo lang('fees')?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
<?php 
	if(validation_errors()){
?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button>
                                        <b><?php echo lang('alert')?>!</b><?php echo validation_errors(); ?>
                                    </div>

<?php  } ?>
    
<?php $total_rec = $this->db->query("select sum(amount)  as tot_rec from receipt where case_id = '".$id."'")->row();
											$tot = $total_rec->tot_rec;
											$due = $case->fees - $total_rec->tot_rec;
											?>	          
                    <div class="box-body">
                       <div class="box-body no-padding">
                                    <table class="table table-striped" border="1">
                                        <tbody>
										<tr>
                                            <th width="25%"><?php echo lang('case')?> <?php echo lang('number')?></th>
                                            <td width="25%"><?php echo $case->case_no?></td>
                                            <th width="25%"><?php echo lang('case')?> <?php echo lang('title')?></th>
                                            <td width="25%"><?php echo $case->title?></td>
                                        </tr>
										<tr>
                                            <th width="25%"><?php echo lang('fees_agreed')?> </th>
                                            <td width="25%"><?php echo $case->fees?></td>
                                            <th width="25%"><?php echo lang('paid')?></th>
                                            <td width="25%"><?php echo @$tot;?></td>
                                        </tr>
                                       
                                    </tbody>
								</table>
                                </div>
								
				<div class="tabbable" style="padding-top:12px;">
							
								<ul class="nav nav-tabs">
									<li class="active"><a href="#1" data-toggle="tab"><?php echo lang('invoice');?></a></li>
									<li><a href="#2" data-toggle="tab"><?php echo lang('receipt');?></a></li>							
								</ul>
							<div class="tab-content">
									<div class="tab-pane active" id="1">
					  <!-- form start -->
				<form method="post" action="<?php echo site_url('admin/cases/fees/'.$id)?>" enctype="multipart/form-data">
			
			
				<input type="hidden" name="inr" id="inr" value="<?php echo $case->fees?>" />
				<input type="hidden" name="bal" id="bal" value="<?php echo @$fees_all[0]->bal?>" />				
									 <div class="form-group" style="margin-top:20px;"> 
							 <legend><?php echo lang('add_payment_detail')?></legend>  
					    </div>
						<div class="form-group" style="margin-top:20px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('invoice_number')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="invoice_no" value="<?php echo $invoice_no; ?>"  class="form-control" readonly="readonly" />
									
                                </div>
                            </div>
                        </div>
					  
						  <div class="form-group" >
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('payment_mode')?></b>
								</div>
								<div class="col-md-4">
                                   <select name="payment_mode_id" class="form-control" >
										<option value="">--<?php echo lang('select')?> <?php echo lang('payment_mode')?> --</option>
										<?php foreach($payment_modes as $new) {
											$sel = "";
											echo '<option value="'.$new->id.'" '.$sel.'>'.$new->name.'</option>';
										}
										
										?>
									</select>
                                </div>
                            </div>
                        </div>
						
						  <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('date')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="date" value="" class="form-control datepicker" />
                                </div>
                            </div>
                        </div>
						
						
					    <div class="form-group" style="margin-top:20px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('amount')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="amount" value="" id="amount" class="form-control" />
									
                                </div>
                            </div>
                        </div>
					
					
					<div class="form-group input_fields_wrap">
                        	<div class="row  ">
                               
								<div class="col-md-3">
								 	<b><?php echo lang('tax')?></b>
								</div>
								<div class="col-md-4" >
									<div>
										<select name="tax_id[]" class="form-control tax" required id="tax1">
											<option value="">-- Select Tax --</option>
											<?php 
											foreach($tax as $new){
												echo "<option value='".$new->id."'>".$new->name." - ".$new->percent." </option>";
											}
											?>
										</select>
									</div>	
										
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
						
					  
					  <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('total')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="total" value="" class="form-control" id="total" readonly="readonly" />
                                </div>
                            </div>
                        </div>
					     <div class="box-footer">
                        <button  type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
					
				</form>	
					
					
			 <div class="box-body table-responsive" style="margin-top:10px;">
                    <table id="example2" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number')?></th>
								<th><?php echo lang('invoice')?></th>
								<th><?php echo lang('date')?></th>
								<th><?php echo lang('amount')?></th>
								<th><?php echo lang('payment_mode')?></th>
								<th width="10%"></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($fees_all)):?>
                        <tbody>
                            <?php $i=1;foreach ($fees_all as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
									<td><?php echo $new->invoice ?></td>
									<td><?php echo $new->date ?></td>
								    <td><?php echo $new->amount?></td>
									<td><?php echo $new->mode?></td>
									
                                    <td width="20%">
									<?php if(check_user_role(108)==1){?>
										 <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/invoice/index/'.$new->id); ?>" ><i class="fa fa-list"></i> <?php echo lang('invoice')?></a>
									<?php } ?>	 
									<?php if(check_user_role(166)==1){?>
										 <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/cases/delete_fees/'.$new->id); ?>" onclick="return areyousure()"><i class="fa fa-trash"></i> <?php echo lang('delete')?></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
					</div>				
									
									</div>
									<div class="tab-pane" id="2">
										
												  <!-- form start -->
											
			<?php if($due > 0){?>									  
				<form method="post" action="<?php echo site_url('admin/cases/receipt/'.$id)?>" enctype="multipart/form-data">
			
				<input type="hidden" name="case_id" value="<?php echo $id ?>" />
					<div class="form-group" style="margin-top:20px;"> 
							 <legend><?php echo lang('receipt_details')?></legend>  
					    </div>
						<div class="form-group" style="margin-top:20px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('invoice')?></b>
								</div>
								<div class="col-md-4">
                                   <select name="fees_id" class="form-control" required>
								   <?php foreach ($fees_all as $new){?>
								   	<option value="">--<?php echo lang('select')?> <?php echo lang('invoice')?>--</option>
									<option value="<?php echo $new->id?>"><?php echo $new->invoice?></option>
								   <?php } ?>
								   </select>
									
                                </div>
                            </div>
                        </div>
					  
						
						  <div class="form-group">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('date')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="r_date" value="" class="form-control datepicker" required />
                                </div>
                            </div>
                        </div>
						
						
					    <div class="form-group" style="margin-top:20px;">
                        	<div class="row">
                                <div class="col-md-3">
                                	<b><?php echo lang('amount')?></b>
								</div>
								<div class="col-md-4">
                                    <input type="text" name="r_amount" value="" id="r_amount" class="form-control" required />
									
                                </div>
                            </div>
                        </div>
					
				    <div class="box-footer">
                        <button  type="submit" class="btn btn-primary"><?php echo lang('save')?></button>
                    </div>
					
				</form>	
		<?php } ?>			
					
			 <div class="box-body table-responsive" style="margin-top:10px;">
                    <table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number')?></th>
								<th><?php echo lang('date')?></th>
								<th><?php echo lang('amount')?></th>
								<th width="10%"></th>
                            </tr>
                        </thead>
                        
                        <?php if(isset($receipts)):?>
                        <tbody>
                            <?php $i=1;foreach ($receipts as $new){?>
                                <tr class="gc_row">
                                    <td><?php echo $i?></td>
									<td><?php echo $new->date ?></td>
								    <td><?php echo $new->amount?></td>
									
                                    <td width="20%">
								<?php if(check_user_role(167)==1){?>	
										 <a class="btn btn-default" style="margin-left:20px;" href="<?php echo site_url('admin/cases/view_receipt/'.$new->id); ?>" ><i class="fa fa-list"></i> <?php echo lang('receipt')?></a>
								<?php }?>		 
								<?php if(check_user_role(169)==1){?>		 
										 <a class="btn btn-danger" style="margin-left:20px;" href="<?php echo site_url('admin/cases/delete_deceipt/'.$new->id.'/'.$id); ?>" onclick="return areyousure()"><i class="fa fa-trash"></i> <?php echo lang('delete')?></a>
                                 <?php } ?>       
                                    </td>
                                </tr>
                                <?php $i++;}?>
                        </tbody>
                        <?php endif;?>
                    </table>
					</div>				
			
									</div>				
							</div>
			</div>				
				
					  
					  	
						
			   			
                      
						
                    </div><!-- /.box-body -->
    
                  
					
					
			    </div><!-- /.box-body -->
             </form>
            </div><!-- /.box -->
        </div>
     </div>
</section>  


<script src="<?php echo base_url('assets/js/jquery.datetimepicker.js')?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
	 var t = 1; //initlal Tax Id
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			t++; //Tax increment
            $(wrapper).append('<div class="row"><div class="col-md-3"><b><?php echo lang('tax')?></b></div><div class="col-md-4"><select name="tax_id[]" class="form-control tax" required id="tax'+t+'"><option value="">-- Select Tax --</option><?php foreach($tax as $new){echo "<option value=".$new->id.">".$new->name." - ".$new->percent."</option>";}?></select></div><a href="#" class="remove_field btn btn-danger">Remove</a></div></div>'); //add input box
			jQuery('.datepicker').datetimepicker({
			 timepicker:false,
			 format:'Y-m-d'
			});			

        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});



</script>


<script type="text/javascript">
$(function() {
	$('#example1,#example2').dataTable({
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
  
 /* 
 $(document).on('blur', '#amount', function(){

 			var value1 = parseInt($('#inr').val());
            var value2 = parseInt($('#bal').val(), 10) || 0;
			var value3 = parseInt($('#amount').val());
			
			var bal = value2 - value1;
			if(bal > value3){
				alert("Current Filled Amount Is Greather Then Balance");
			 return false;
			}

});
 */
 
 $(document).on('change', '.tax', function(){
		amt= $('#amount').val();
		 var foo = [];
		 var coo = []; 
		$('.tax :selected').each(function(i, selected){ 
		  foo[i] = $(selected).val();
		  co = $(selected).text(); 
		  co = co.split('-');	  
		  coo[i] = co[1];
		  console.log(coo);
		});
		
		var total = 0;
		for (var i = 0; i < coo.length; i++) {
			total += coo[i] << 0;
		}
		 total = total/100*amt;
		 total_amount =  parseInt(amt, 10)+ parseInt(total, 10); 
		 $('#total').val(total_amount);

});
 

 $(document).on('focusout', '#amount', function(){
		//alert(11);
		tax= $('.tax').val();
 		console.log(tax);
			var amt = parseInt($('#amount').val());
			if( !$(this).val() ) {
    			alert("Must Enter Amount");
				$("#amount").focus();
			  }
		$('#total').val(amt);

});
</script>