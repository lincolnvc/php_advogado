<link href="<?php echo base_url('assets/css/chosen.css')?>" rel="stylesheet" type="text/css" />
<!-- Content Header (Page header) -->
<style>
.row{
	margin-bottom:10px;
}
#month-chart > svg {width: 100% !important;}
</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo lang('reports');?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin')?>"><i class="fa fa-dashboard"></i> <?php echo lang('dashboard');?></a></li>
      
        <li class="active"><?php echo lang('reports');?></li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                   
                </div><!-- /.box-header -->
                <!-- form start -->
			       <div class="box-body">
                       
			          <div class="row">
                        <div class="col-md-10">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><?php echo lang('by') ." ". lang('month');?></a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><?php echo lang('by') ." ". lang('week');?></a></li>
									 <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><?php echo lang('by') ." ". lang('year');?></a></li>
									  <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"><?php echo lang('by') ." ". lang('client');?></a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                    	<!--graph code start  -->
										
                            <!-- solid sales graph -->
                            <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">Earning Graph</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


										<!--graph code end -->
									</div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                         <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">Earning Graph</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div class="chart" id="month-chart" style="height: 250px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
									
									 <div class="tab-pane" id="tab_3">
                                       <!-- solid sales graph -->
                            <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">Earning Graph</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div class="chart" id="year-chart" style="height: 250px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
									
									 <div class="tab-pane" id="tab_4">
                                       <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Bar Chart</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                        </div><!-- /.col -->

                  </div>
					  
					  
						
                    </div><!-- /.box-body -->
    
             </form>
            </div><!-- /.box -->
        </div>
     </div>
</section>  


<?php 
	
	$graph_arr = array();
	foreach($months as $ind => $month) {
		$graph_arr[$ind]['date'] = $month->date;
		$graph_arr[$ind]['amount'] = $month->amount;
	}
	$week_arr = array();
	foreach($weeks as $ind => $week) {
		$week_arr[$ind]['date'] = $week->date;
		$week_arr[$ind]['amount'] = $week->amount;
	}
	
	$year_arr = array();
	foreach($years as $ind => $year) {
		$year_arr[$ind]['date'] = date('Y',strtotime($year->date));
		$year_arr[$ind]['amount'] =$year->amount;
	}
	
	$client_arr = array();
	foreach($clients as $ind => $client) {
		$client_arr[$ind]['name'] = $client->name;
		$client_arr[$ind]['amount'] =$client->amount;
	}
?>	

<script src="<?php echo base_url('assets/js/chosen.jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/raphael-min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/morris.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	
	$('.chzn').chosen();
	/* Morris.js Charts */
    // Sales chart
   
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: <?php echo json_encode($graph_arr); ?>,
        xkey: 'date',
        ykeys: ['amount'],
        labels: ['Amount'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10
    });
	
	
	 var month_line = new Morris.Line({
        element: 'month-chart',
        resize: true,
       data: <?php echo json_encode($week_arr); ?>,
         xkey: 'date',
        ykeys: ['amount'],
        labels: ['Amount'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10
    });
	
	$(document).on('click','a[href=#tab_2]',function(){
		
		month_line.redraw();
	});
	
	
	$(document).on('click','a[href=#tab_3]',function(){
		
		year_line.redraw();
	});
	 var year_line = new Morris.Line({
        element: 'year-chart',
        resize: true,
         data: <?php echo json_encode($year_arr); ?>,
         xkey: 'date',
        ykeys: ['amount'],
        labels: ['Amount'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10
    });
	
	
    var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        data: <?php echo json_encode($client_arr); ?>,
        barColors: ['#00a65a'],
        xkey: 'name',
        ykeys: ['amount'],
        labels: ['Amount'],
        hideHover: 'auto'
    });
	
});



</script>