<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
    <title>VOU </title>
    <link rel="stylesheet" href="/src/css/bootstrap.css">
    <link href="/src/css/simple-sidebar.css" rel="stylesheet">
     <script src="/src/js/jquery-2.1.3.min.js"></script>
<style>
.navbar-default {
  background-color: #E83165;
  border-color: #E83165;
}
</style>
<script>
  
    function menu(){
    	$("#wrapper").toggleClass("toggled");
    }
    </script>
  </head>
  <body>
  	 <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
  	<nav class="navbar navbar-default " role="navigation">
			<div onclick="menu()"  >
				<img src="/src/images/program.png" style="margin-top: 10px; margin-left: 10px; height: 30px; float: left; " />			</div>
			<div class="container">
				<!-- Logo -->
				<div id="logo" class="navbar-left">
					<a href="#"><img src="/src/images/vou-logo.png" style="margin-top: 3px"  height="36"></a>
				</div><!-- /#logo -->

			</div>
		</nav>