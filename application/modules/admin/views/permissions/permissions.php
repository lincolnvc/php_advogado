<link href="<?php echo base_url('assets/css/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function areyousure()
{
	return confirm('<?php echo lang('are_you_sure');?>');
}
</script>
<section class="content-header">
        <h1>
            User Permissions
            <small><?php echo lang('list');?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
            <li class="active">Permissions</li>
        </ol>
</section>
<section class="content">
  	  	<div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->

<?php if(check_user_role(50)==1){?>					
<div class="box-body table-responsive" style="margin-top:40px;">
<div class="row">
  <div class="col-lg-12">
   	<button type="submit" class="btn btn-primary" form="permission">Submit</button>
  </div>
</div>
<?php } ?>	
<br/>
<?php $pactions = $actions?>
<div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">
              
			   <form id="permission" method="post" action="<?php echo site_url('admin/permissions/')?>">
			  
			  <table class="table table-bordered table-hover tablesorter" id="example">
                <thead>
                  <tr>
                  	<th>Actions</th>
                    <?php foreach($departments as $department){?>
                    	<th><?php echo ucwords($department->name)?></th>	
                    <?php }?>
                  </tr>
                </thead>
                <tbody>
               
                	<?php foreach($pactions as $paction){
						 if($paction->parent_id==0){?>
                    	    <tr>
							<td><b><?php echo $paction->alias?></b></td>
                            <?php foreach($departments as $depart){
								$checked = '';
								foreach($permissions as $permission){
									if($permission->role_id==$depart->id && $permission->action_id==$paction->id)
										{$checked = 'checked';break;}
								}
									echo '<td><input type="checkbox" name="access['.$depart->id.']['.$paction->id.']" '.$checked.'/></td>';
								
							}
						 ?>
                        </tr>
                        <?php foreach($actions as $action){
						if($action->is_hidden==0)
						 if($action->parent_id==$paction->id){ if($action->always_allowed==1){//&& $action->always_allowed!=1){?>
                    	    <tr>
							<td>--> <?php echo $action->alias?></td>
                            <?php foreach($departments as $depart){
								echo '<td><input type="checkbox" name="access['.$depart->id.']['.$action->id.']" checked disabled/></td>';
								
								}}else{
						     ?>
                            </tr>
                            
                            <tr>
							<td>--> <?php echo $action->alias?></td>
                            <?php foreach($departments as $depart){
								$checked = '';
								foreach($permissions as $permission){
									if($permission->role_id==$depart->id && $permission->action_id==$action->id)
										{$checked = 'checked';break;}
								}
									echo '<td><input type="checkbox" name="access['.$depart->id.']['.$action->id.']"  '.$checked.'/></td>';
								
							}
						     ?>
                          </tr>
                        <?php }}}?>
                    <?php }}?>
                
               </tbody>
              </table>
            </div>
          </div>
</div><!-- /.row -->
<?php if(check_user_role(50)==1){?>	
<div class="row">
  <div class="col-lg-12">
   	<button type="submit" class="btn btn-primary" form="permission">Submit</button>
  </div>
</div>
</div>
<?php } ?>
 </form>   
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



