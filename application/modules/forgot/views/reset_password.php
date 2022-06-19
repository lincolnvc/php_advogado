<?php
$CI = get_instance();
$CI->load->model('forgot_model');
$code = $this->uri->segment(4);

	$data['email']	= $this->forgot_model->get_admin_by_code($code);
	
	
	  $email=($data['email'][0]->email);
?>	


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
	<?php echo validation_errors(); ?>
			<span style="color:#FF0000>"<?php echo validation_errors(); ?><span>
        <div class="form-box" id="login-box">
            <div class="header"><?php echo lang('change_password')?></div>
            <form action="<?php echo site_url('forgot/forgot_password/reset_password'); ?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                      <input type="password" name="password" placeholder="<?php echo lang('password')?>" class="form-control" />
					</div>
					  
					 <div class="form-group">
						<input type="password" name="confirm" placeholder="<?php echo lang('confirm')?> <?php echo lang('password')?>" class="form-control" />
					</div>   
                   <input type="hidden" name="email" value="<?php echo  $email;?>"
                </div>
                <div class="footer">

                  <input type="submit" value="<?php echo lang('change_password')?>" name="submit" class="btn bg-olive btn-block"/>
						<a href="<?php echo site_url(); ?>">Return To Login</a>
                </div>
            </form>

           
        </div>

     

    </body>
</html>



