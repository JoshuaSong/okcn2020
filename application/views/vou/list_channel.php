 <?php $this->load->view('/includes/header_jp');?>
 <?php $this->load->view('/includes/script_c');?>
  <?php $this->load->view('/includes/nav_header');?>
  <center>
    <div id="sb-site">
    	<center>
    	<div id="poster" style=" max-width: 480px; min-height: 400px;  background-image: url(/src/images/tbg.png); background-repeat: repeat" >
    	<image id="posterImg" style=" width: 100%; "/>
    	<table width="100%" style="color:#FFFFFF">
    		<tr style="border: 1px #023155 solid; " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;  background-color: #023155">공지</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777">통일의 소리 방송 시험가동중입니다.</td>
    		</tr>
    	</table>
    	<div  id="channelDiv"></div>
    	
    		<div id="time"></div>
   
    		
    	</div>
    	</center>

    </div>
</center>
    <div class="sb-slidebar sb-left">
      <nav>
		<ul class="sb-menu">
			<li onclick="onair()"><img src="/src/images/vou-logo-p.png"  alt="" height="40"><img src="/src/images/onair.png"></li>
			<?php echo $channels; ?>
			
		</ul>
		
	</nav>
    </div>

    <div class="sb-slidebar sb-right">
      <!-- Your right Slidebar content. -->
    </div>


     
      

      
      </div>
  </body>
</html>