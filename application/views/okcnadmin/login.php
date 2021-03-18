<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OKCNAdmin Login</title>

    <link href="<?php echo base_url();?>assets/okcnadmin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/okcnadmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/okcnadmin/css/style-responsive.css" rel="stylesheet">

   <style>
   	.form-login{
   		max-width: 600px;
   	}
   </style>
  </head>

  <body>

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?php echo base_url();?>okcnadmin/logincheck">
		        <h2 class="form-login-heading">OKCN Admin Sign In </h2>
		        <div class="login-wrap">
		        	<br><br>
		            <input name="username" type="text" class="form-control" placeholder="User ID" autofocus>
		            <br><br>
		            <input name="password" type="password" class="form-control" placeholder="Password">
		           <br><br>
		           <br><br>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            
		            <br>
		            
		           <br> 
		
		        </div>
		
		         
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/okcnadmin/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/okcnadmin/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/okcnadmin/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url();?>assets/okcnadmin/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
