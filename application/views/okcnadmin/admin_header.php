<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>OKCN Admin</title>
    <link href="<?php echo base_url();?>assets/okcnadmin/css/bootstrap.css" rel="stylesheet">    <!--external css-->
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/okcnadmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/okcnadmin/css/style-responsive.css" rel="stylesheet">
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114703738-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

gtag('config', 'UA-114703738-1');

</script>
  </head>

  <body >

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
     