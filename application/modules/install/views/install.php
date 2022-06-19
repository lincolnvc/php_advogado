<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Installer | Advocate Office Management System</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
	
	<div class="row">
		<div  class="col-md-12" style="padding-top:20px;">
		<div class="alert alert-info alert-dismissable">
											<i class="fa fa-info"></i>
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										   <b>Note&hellip;</b>
						<p>Installing Advocate Office Management System will not create a database. It will simply fill your existing database with the appropriate tables and records required to run.</p>
		 </div>
		</div> 
	</div>	
	
	
	<?php if(!$is_writeable['config'] || !$is_writeable['root'] || !$is_writeable['uploads']):?>
			
			<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                  	
				<?php if(!$is_writeable['config']):?>
					<p><strong>Alert!</strong><br> The application/config directory is not writable! This is required to generate the config files.</p>
				<?php endif;?>
				<?php if(!$is_writeable['root']):?>
					<p><strong>Alert!</strong><br> The root directory is not writable! This is required if you want to eliminate "index.php" from the URL by generating an .htaccess file.</p>
				<?php endif;?>
				<?php if(!$is_writeable['uploads']):?>
					<p><strong>Alert!</strong><br> The uploads directory is not writable! This is required for uploading files.</p>
				<?php endif;?>

			</div>
		<?php endif;?>
		<?php if($errors):?>
			<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                  	
				<?php echo $errors;?>
			</div>
		<?php endif;?>
			

		<?php echo form_open('/');?>
		<div class="form-box" id="login-box">
            <div class="header">Install</div>
                <div class="body bg-gray">
                    <div class="form-group">
                     <?php echo form_input(array('class'=>'form-control', 'name'=>'hostname', 'placeholder'=>'Hostname','value'=>set_value('hostname', 'localhost') ));?>
                    </div>
                    <div class="form-group">
                     <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Database Name','name'=>'database', 'value'=>set_value('database') ));?>
                    </div>
                    <div class="form-group">
                    <?php echo form_input(array('class'=>'form-control', 'placeholder'=>'Username', 'name'=>'username', 'value'=>set_value('username') ));?>
                    </div>
                    <div class="form-group">
                     <?php echo form_input(array('class'=>'form-control', 'name'=>'password', 'placeholder'=>'Password','value'=>set_value('password') ));?>
                    </div>
					 <div class="form-group">
						<label class="checkbox" style="padding-left:20px;">
					<?php echo form_checkbox('mod_rewrite', '1', (bool)set_value('mod_rewrite') );?> Remove "index.php" from the url <small>(requires Apache with mod_rewrite)</small>					</label>
					</div>
                </div>
                <div class="footer">

                    <button type="submit" class="btn bg-olive btn-block">Install Advocate</button>

                </div>
            </form>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
