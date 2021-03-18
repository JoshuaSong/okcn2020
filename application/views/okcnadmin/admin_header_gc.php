<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>OKCN Admin</title>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">    <!--external css-->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
   	<link type="text/css" rel="stylesheet" href="http://okcnradio.org/assets/grocery_crud/themes/bootstrap/css/common.css" />
	<link type="text/css" rel="stylesheet" href="http://okcnradio.org/assets/grocery_crud/themes/bootstrap/css/list.css" />
	<link type="text/css" rel="stylesheet" href="http://okcnradio.org/assets/grocery_crud/themes/bootstrap/css/general.css" />
	<link type="text/css" rel="stylesheet" href="http://okcnradio.org/assets/grocery_crud/themes/bootstrap/css/plugins/animate.min.css" />
	<link type="text/css" rel="stylesheet" href="http://okcnradio.org/assets/grocery_crud/themes/bootstrap/css/add-edit-form.css" />
	<style>
	.header-tools{display:none;}
	.container {
		max-width: 970px; }
		
		.table-label .l5 {
    margin-left: 5px;font-size: 24px; padding: 10px;
}
.table-label .r5 {
    display:none;
}
	</style>
  </head>

  <body onload="onload()">

  <section id="container" >
      
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>OKCN Admin</b></a>
            <!--logo end-->

            
        </header>
    
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
           <?php  $this->load->view('/okcnadmin/admin_sidemenu');?>
              <!-- sidebar menu end-->
          </div>
      </aside>
     