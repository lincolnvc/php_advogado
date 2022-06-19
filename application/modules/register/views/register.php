<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Register | Advocate Office Management System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url('assets/css/ionicons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
  
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />
    
    
    <!-- jQuery 2.0.2 -->
    <script src="<?php echo base_url('assets/js/jquery.js')?>"></script>
	
	  <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
	<div style="padding:20px;">
			<?php if(validation_errors()): ?>
                    <div class="alert alert-danger alert-dismissable col-md-11">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo validation_errors(); ?>
                    </div>
                    <?php endif; ?>
     </div>  
		<div class="form-box" id="login-box">
           <?php 
		   	echo '
			    <div class="header">'.lang("register_new_admin").'</div>
            <form action="'.site_url("register").'" method="post" id="register_form">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="'.lang("name").'"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="'.lang("username").'"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="'.lang("password").'"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="conf" class="form-control" placeholder="'.lang("confirm_password").'"/>
                    </div>
					<div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="'.lang("email").'"/>
                    </div>
                </div>
                <div class="footer">

                    <button type="submit" class="btn bg-olive btn-block">Register</button>

                    
                </div>
            </form>
				';
		   ?>
        </div>

<script>
$(document).on('ready', function(){
 
  //var ajax_load = '<img style="margin-left:10px;" src="<?php echo base_url('assets/img/green-ajax-loader.gif')?>"/>';
  //$('#login-box').html(ajax_load);
  //check_table();
  
});

function check_table()
{
 $.ajax({
    url: '<?php echo site_url('register/register/check_table') ?>',
	type:'POST',
    success:function(result){
	
    	if(result=='error'){
			check_table();
		}else{	
			$('#login-box').html(result);
	  	}
	  
     }
  });
}


</script>     


    </body>
	
</html>
