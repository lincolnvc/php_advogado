<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<style>

</style>       
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<section class="content-header">
        <h1>
            <?php echo $page_title; ?>
            <small><?php echo lang('list');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active"><?php echo lang('view_all');?> <?php echo lang('cases');?></li>
        </ol>
</section>

<section class="content">
  	  	 <div class="row" style="margin-bottom:10px;">
            <div class="col-xs-12">
                <div class="btn-group pull-right">
                    <a class="btn btn-default" href="<?php echo site_url('admin/cases/add/'); ?>"><i class="fa fa-plus"></i> <?php echo lang('add');?> <?php echo lang('new');?></a>
                </div>
            </div>    
        </div>	
        
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo lang('cases');?></h3>                                    
                </div><!-- /.box-header -->
				
                <div class="box-body table-responsive" style="margin-top:40px;">
                    <table id="example1" class="table table-bordered table-striped table-mailbox">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo lang('serial_number');?></th>
								<th width="8%"><?php echo lang('star');?></th>
								<th><?php echo lang('date');?></th>
								<th><?php echo lang('case');?> <?php echo lang('number');?></th>
								<th><?php echo lang('case');?> <?php echo lang('title');?></th>
								<th><?php echo lang('client');?></th>
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
                                    <td><?php echo $new->next_date?></td>
								    <td><a href="<?php echo site_url('admin/cases/view_case/'.$new->case_id)?>"><?php echo $new->case_no?></a></td>
									<td><?php echo $new->title?></td>
									<td><?php echo $new->name?></td>
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
  
  vch = $(this).text();
    
  $.ajax({
    url: '<?php echo site_url('admin/cases/update_set_starred') ?>',
    type:'POST',
    data:{id:vch},
    success:function(result){
      
	 }
  });
  
  
});				
				

</script>