<html lang="en">
<head>  
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Login Admin</title>

    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
    <link id="<?php echo base_url();?>aset/cssbootstrap-style" href="<?php echo base_url();?>aset/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>aset/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="<?php echo base_url();?>aset/css/base-style" href="<?php echo base_url();?>aset/admin/css/style.css" rel="stylesheet">
    <link id="<?php echo base_url();?>aset/css/base-style-responsive" href="<?php echo base_url();?>aset/admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>aset/images/favicon.icon">
    <!-- end: Favicon -->
    
            <style type="text/css">
            body { background: url(<?php echo base_url();?>aset/images/bg-login.jpg) !important; }
        </style>
</head>

<body>
       
    <!-- start: JavaScript-->
	 <div class="container-fluid-full">
        <div class="row-fluid">
                    
            <div class="row-fluid">
                <div class="login-box">
                    <div class="icons">
                        <a href="#"><i class="halflings-icon home"></i></a>                      
                    </div>
                    <h2>Login to your account</h2>
                    <?php											
																	echo ! empty($message) ? '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Sorry!</strong>' . $message . '</div>': '';
																	$flashmessage = $this->session->flashdata('message');
																	echo ! empty($flashmessage) ? '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Thank You! </strong>' . $flashmessage . '</div>': '';			
																	//$atrib=array('name'=>'login','class'=>'form-horisontal', 'id'=>'login');
																	//echo form_open('admin/cek',$atrib)
																?>
				<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">                      
					  <fieldset>
					   
                       
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" name="username" value="<?php echo set_value('username', isset($default['username']) ? $default['username'] : ''); ?>" type="text" placeholder="Username" required/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" name="pass" value="<?php echo set_value('pass', isset($default['pass']) ? $default['pass'] : ''); ?>" type="password" placeholder="Password" required/>
                            </div>
                            <div class="clearfix"></div>


                            <div class="button-login">  
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>                     
                    </form>
                    <hr>
                    
                </div><!--/span-->
            </div><!--/row-->
            

    </div><!--/.fluid-container-->
    
        </div><!--/fluid-row-->
 <script src="<?php echo base_url();?>aset/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery-migrate-1.0.0.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery-ui-1.10.0.custom.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.ui.touch-punch.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/modernizr.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/bootstrap.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.cookie.js"></script>
    
        <script src='<?php echo base_url();?>aset/js/fullcalendar.min.js'></script>
    
        <script src='<?php echo base_url();?>aset/js/jquery.dataTables.min.js'></script>

        <script src="<?php echo base_url();?>aset/js/excanvas.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>aset/js/jquery.flot.resize.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.chosen.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.uniform.min.js"></script>
        
        <script src="<?php echo base_url();?>aset/js/jquery.cleditor.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.noty.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.elfinder.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.raty.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.iphone.toggle.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.uploadify-3.1.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.gritter.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.imagesloaded.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.masonry.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.knob.modified.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/jquery.sparkline.min.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/counter.js"></script>
    
        <script src="<?php echo base_url();?>aset/js/retina.js"></script>

        <script src="<?php echo base_url();?>aset/js/custom.js"></script>
    <!-- end: JavaScript-->
    
</body>
</html>

        
