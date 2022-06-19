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
	<?php 
			
				if($this->session->flashdata('message'))
						$message = $this->session->flashdata('message');
				  if($this->session->flashdata('error'))
						$error  = $this->session->flashdata('error');
			?>
			
            <?php if(!empty($error) || !empty($message)){ ?>
			<div class="container" style="margin-top:20px;">
					
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissable col-md-11">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($message)): ?>
                    <div class="alert alert-info alert-dismissable col-md-11">
                        <i class="fa fa-info"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       <?php echo $message; ?>
                    </div>
                    <?php endif; ?>
                    
           </div>
           <?php }?>
			<span style="color:#FF0000>"<?php echo validation_errors(); ?><span>
        <div class="form-box" id="login-box">
            <div class="header"><?php echo lang('i_forgot_my_password')?></div>
            <form action="<?php echo site_url('forgot/forgot_password'); ?>" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                       <input type="text" name="email" placeholder="<?php echo lang('enter_your_account_email')?>" class="form-control"  />
                    </div>
                  
                   
                   
                </div>
                <div class="footer">

                    <button type="submit" class="btn bg-olive btn-block"><?php echo lang('reset_password')?></button>
					<input type="hidden" value="submitted" name="submitted"/>
						<a href="<?php echo site_url('admin/login/'); ?>">Return To Login</a>
                </div>
            </form>

           
        </div>

     

    </body>
</html>
