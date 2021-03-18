<html>
  <head>
    <title>VOU</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="/src/css/slidebars.css">
<link rel="stylesheet" href="/src/css/mystyle.css">
<link href="/src/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />



	 <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="/src/js/jquery-2.1.3.min.js"></script>
	<script src="/src/js/slidebars.min.js"></script>
	<script type="text/javascript" src="/src/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/js/jplayer.playlist.min.js"></script>
<script>
 
  
     $(document).ready(function() 
        {
        	 $.slidebars();
        	 menuclick(<?php echo $cid;?>);
           });

function menuclick(e)
{
	
	$.get( "/vou/c/"+e, function( data ) {
                       $( "#channelDiv" ).html( data );});
    $("#posterImg").attr("src",($("#c"+e).attr("poster")));
 
}
  function trclick(e)
	{
		
		location.replace('http://okcnradio.org/vou/p/'+e);
	}
    
    </script>

  </head>

<body style="">
  	<!-- Navbar -->
  	<?php $this->load->view('/includes/nav_header');?>

<center>
    <div id="sb-site">
    	<center>
    	<div id="poster" style="width: 100%; max-width: 480px; min-height: 900px; background-image: url(/src/images/tbg.png);background-repeat: repeat" >
    
    	<div style="width: 100%; " ><image id="posterImg"  class="commhide" src="" style=" width: 100%; "></image></div>
    	<div class="commshow" onclick="commHide()" style=" display: none; height: 30px; width:100%; background-image: url(/src/images/tbg.png);  background-repeat: repeat;">
    		<center><img src="/src/images/down.png" style="margin-top: 5px; width:36px" /></center>
    	</div>
    	<table width="100%" style="color:#FFFFFF">
    		
    		<tr style="border: 1px #023155 solid; " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;  background-color: #023155">공지</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777"> <a style="color:white"  href="https://play.google.com/store/apps/details?id=org.okcn.vou7">VOU앱 다운로드  <img style="height: 30px; margin: 5px 0px 5px 20px" src="/src/images/playstorevou.png" /></a></td>
    		</tr>
    		
    		
    	</table>
    	</table>
    	<div  id="channelDiv"></div>
 </div></div>


 
<!--Left Slidebar Menu UL          -->    
    <div class="sb-slidebar sb-left">
      <nav>
		<ul class="sb-menu">
			<li><img src="/src/images/vou-logo-p.png"  alt="" height="40"></li>
			<li onclick="onair()"><img src="/src/images/onair.png">실시간 방송</li>
			<?php echo $channels; ?>
			
		</ul>
		<br/><br/><br/><br/><br/><br/>
	</nav>
    </div>

    
<!--Footer Div          --> 

      

  </body>
</html>