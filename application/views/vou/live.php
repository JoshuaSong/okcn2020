<body style="">
  	<!-- Navbar -->
  	<?php $this->load->view('/includes/nav_header');?>
<center>
    <div id="sb-site">
    	<center>
    	<div id="poster" style="width: 100%; max-width: 480px; min-height: 900px; background-image: url(/src/images/tbg.png);background-repeat: repeat" >

<iframe src="https://mixlr.com/users/4096878/embed?autoplay=true" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe>
<br/><br/><a href="http://okcnradio.org/vou/live" style="color:#ffffff;text-align:left; font-family:Helvetica, sans-serif; font-size:11px;">통일의 소리 라이브 방송입니다.</a>
		</div>
		</center>
		
		</div>
		 <div class="sb-slidebar sb-left">
      <nav>
		<ul class="sb-menu">
			<li><img src=""  alt="" height="40"></li>
			<li onclick="onair()"><img src="/src/images/onair.png">실시간 방송</li>
			<li onclick="live()"><img src="/src/images/live.png">라이브 방송</li>
			<?php echo $channels; ?>
			
		</ul>
		<br/><br/><br/><br/><br/><br/>
	</nav>
    </div>
		</body>
</html>