<html>
  <head>
    <title>VOU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/src/css/bootstrap.css">
    <link rel="stylesheet" href="/src/css/slidebars.css">
    <link rel="stylesheet" href="/src/css/mystyle.css">
    <script src="/src/js/jquery-2.1.3.min.js"></script>
	<script src="/src/js/slidebars.min.js"></script>
	
	<script>
	  $(document).ready(function() 
        {
        	$.slidebars();
        })
        function signup()
        {
        	window.location.href='http://members.eprayerapp.com/mauth/site_signup/vou/<?php echo $this->session->userdata('user_id');?>';
        }
         </script>

  </head>
  <body>
	<?php $this->load->view('/includes/nav_header');?>
		