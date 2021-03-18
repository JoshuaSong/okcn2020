
<style>
	.media{ width: 32px; float: right; margin-right: 19px; margin-left: 19px}
	.mediaTD{width:70px;}
 	.channelTR:hover{ 	text-decoration: none;
	background-color: rgba(255, 255, 255, 0.05)}
	.channelTR.selected{
		background-color: #023155;

	}
	.channelTR{
		min-height:48px;
		cursor:pointer;
		color:#FFFFFF;
	padding: 0;
	margin: 0;
	border-top: 1px solid rgba(255, 255, 255, 0.1); 
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);}
	
</style>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script>
	  Kakao.init('e2bbd49016dd2187797833ebb907dab9');

Kakao.Link.createTalkLinkButton({
  container: '#kakao-link-btn',
  label: '통일의 소리 방송입니다.',
  image: {
	src: 'https://dl.dropboxusercontent.com/u/385223495/vou/images/voubtn.png',
	width: '300',
	height: '200'
  },
  webButton: {
	text: '방송 듣기',
	url: 'http://okcnradio.org/vou/kakao' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
  }
});
var playid=0;
var status="playing";
	function trclick(e)
	{
		if(playid==e)
		{
			if(status=="playing")
			{
			 $("#channelplayer").jPlayer("pause");
			}
			if(status=="pause")
			{
			 $("#channelplayer").jPlayer("play");
			}
		}
		else
		{
			jplaying(e);
		}

	}
	function jplaying(e)
	{
		playid=e;
		$("#channelplayer_container").appendTo("#tt"+e);
		$(".channelTR").removeClass("selected");
		$("#tr"+e).addClass("selected");
		$(".media").attr("src","<?php echo base_url() ?>src/images/play.png");
		$("#img"+e).attr("src","<?php echo base_url() ?>src/images/loading.gif");
		$("#channelplayer").jPlayer("destroy");
		$("#channelplayer").jPlayer({
        ready: function () {
                        $(this).jPlayer("setMedia", {
                            mp3:$("#tr"+e).attr("mediaurl")
                        }).jPlayer("play");
                    },
                    supplied: "mp3",
                    cssSelectorAncestor: "#channelplayer_container",
                    useStateClassSkin: true
                });
      	$.get("/users/pt/"+e);

		  $("#channelplayer").bind($.jPlayer.event.play, function() {
     		$(".media").attr("src","<?php echo base_url() ?>src/images/play.png");
		    $("#img"+e).attr("src","<?php echo base_url() ?>src/images/pause.png");
		    status="playing";	 
     	});
     	$("#channelplayer").bind($.jPlayer.event.pause, function() {
         $(".media").attr("src","<?php echo base_url() ?>src/images/play.png");
         status="pause";
         });
	}
	function sharech(e)
	{
		window.location.href='<?php echo base_url() ?>home/p/'+e;
	}
</script>
<!-- =========================================
body
========================================== -->

<body class="home2">
    <!-- Header Area Start -->
    <header class="top-area2" id="home">
        <div class="header-bg"></div>
        <!-- Header Top Area Start -->
        <div class="header-top-area">
            <div class="logo-area hidden-xs hidden-sm">
                <div class="container ">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-4 wow fadeIn">
                        </div>
                        <div class="col-xs-12 col-sm-4 wow fadeIn text-center">
                            <!-- Loto Start -->
                            <div class="logo">
                                <a href="<?php echo base_url() ?>home"><img src="<?php echo base_url() ?>images/logo_red.png" alt="OKCNRADIO"></a>
                            </div>
                            <!-- Logo End-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Mainmenu Area Start -->
            <div class="mainmenu-area">
                <div class="container">
                    <div class="menu">
                        <ul>
							<li class="active"><a href="<?php echo base_url() ?>home">Home <i class="fa fa-angle-down"></i><span>Date</span></a>
							<ul>
									<?php $d = array();
									for ($i = 0; $i < 10; $i++) { ?>
										<li><a href="/home/datechannel/<?php echo date("Y-m-d", strtotime("-$i days")) ?>"><?php echo date("Y-m-d", strtotime("-$i days")) ?></a></li>
									<?php }?>    
                                </ul>
                            </li>
                            
                            <?php foreach ($category as $row) { ?>                          
                            <li><a href="#news"><?php echo $row->category_name ?> <i class="fa fa-angle-down"></i><span><?php echo $row->english_name ?></span></a>
                                <ul>
                                	<?php foreach ($row->channels as $items) {?>
                                    <li><a href="/home/onechannel/<?php echo $items->c_id?>"><?php echo $items->channel_title?></a></li>                          
                                    <?php }?>
                                </ul>
                            </li>
                            
                            <?php }?>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Main Menu Area End -->
        </div>
        <!-- Header Top Area End -->
        <!-- Header Text Area Start -->
        
        </div>
        <!-- Header Text Area End -->
    </header>
    <!-- Header Area End -->
 
    <!-- Header Location Menu -->
    <!-- Album Area Start -->
    <section class="album-area section-padding">
        <div class="container">
            <center>
    	<div id="poster" style="width: 100%; max-width: 700px; min-height: 900px; background-image: url(<?php echo base_url() ?>src/images/tbg.png);background-repeat: repeat" >
    
		<div style="width: 100%; " ><image id="posterImg"  class="commhide" src="<?php echo $channels->channel_poster;?>" style=" width: 100%; "></image></div>
		<a id="kakao-link-btn" href="javascript:;">
      <img src="https://dl.dropboxusercontent.com/u/385223495/vou/images/button_kakao.png" />
    </a>
    	<div class="commshow" onclick="commHide()" style=" display: none; height: 30px; width:100%; background-image: url(<?php echo base_url() ?>src/images/tbg.png);  background-repeat: repeat;">
    		<center><img src="<?php echo base_url() ?>src/images/down.png" style="margin-top: 5px; width:36px" /></center>
    	</div>
    	<table width="100%" style="color:#FFFFFF">
    		
    		<tr style="border: 1px #023155 solid; " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;  background-color: #023155">공지</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777"> <a style="color:white"  href="https://play.google.com/store/apps/details?id=org.okcn.vou7">VOU앱 다운로드  <img style="height: 30px; margin: 5px 0px 5px 20px" src="<?php echo base_url() ?>src/images/playstorevou.png" /></a></td>
			<td style="padding: 2px 10px 2px 10px; background-color:#777"><a style="color:white" href="https://apps.apple.com/us/app/okcn-radio/id1102671285">Apple Store<img style="height: 30px; margin: 5px 0px 5px 20px" src="<?php echo base_url() ?>src/images/applestore.png" /></td>
			</tr>
    		<tr id="comm_tr" class="commshow" style="border: 1px #023155 solid;  display: none " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;border-top:1px solid #ffffff;  background-color: #023155">사연</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777; border-top:1px solid #B9DEF0; ">채널:《<?php echo $channels->channel_title;?>》</td>
    		</tr>
    	</table>
    	</table>
<!--Channel Div          --> 
    	<div  id="channelDiv"></div>
<!--Comm Div          -->
    	<div  id="commDiv" class="commshow" style="background-color: #b8d1f3; display: none; padding-bottom: 50px"></div>

<!--SNS Div          -->
    	
<!--OnAir Table          -->    	
    	<table id="onairTable" class="commhide"  style="color:#ffffff; padding: 10px; margin: 10px; width: 95%;" cellpadding="5px"><tr>
    	<?php $i=0;  
    	foreach ($programs as $item): ?>
			<tr id="tr<?php echo $item->p_id;?>"  mediaurl="<?php echo $item->program_url;?>"  class= "channelTR">
				<td onclick="trclick(<?php echo $item->p_id;?>)" class="mediaTD"><img id="img<?php echo $item->p_id?>" class="media" src="<?php echo base_url() ?>src/images/play.png" /></td>
				<td id="tt<?php echo $item->p_id;?>" class="titleTD" ><span><?php echo $item->program_date.'  '.$item->program_title.'';?></span>
			</td>
	 	<td width="30px;" onclick="sharech(<?php echo $item->p_id;?>)"><image src="<?php echo base_url() ?>src/images/share.png" style="width: 20px;"></image></td>
		</tr>
		<?php $i++; ?>
<?php endforeach; ?>
    	</table>
    	
    	
    		<div id="time"></div>
   
    		
    	</div>
    	</center>
            <table width="100%;">

</table>
	<?php if ($i <= 20) { ?>
	    <center><a href="<?php echo base_url() ?>home/channel/<?php echo $channels->c_id?>" class="btn btn-primary btn-lg" role="button" aria-disabled="true">View All</a></center>
	    
	<?php }?>
			<div id="channelplayer_container" class="jp-video" role="application" aria-label="media player">
	<div class="jp-type-playlist">
	<div id="channelplayer" class="jp-jplayer" style="display: none"></div>
		<div class="jp-gui">
			
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">	
						<div class="jp-play-bar" style="float: left"></div>
					</div>
					
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				
			</div>
		</div>


		  
	</div>
</div>

        </div>
    </section>
    <!-- Album Area End -->
    <!-- Newslatter Area Start -->
    <section class="main-container" id="contact" style="padding-bottom: 80px; padding-top: 30px; background-color: #212020; color: white; margin-top: 70px">
		<div class="container">
			
				<!-- main start -->
				<!-- ================ -->
						

				<!-- sidebar start -->
				<center>
					<h1>Contact Us</h1>
						
					<h3 class="title">One Korea Christian Networks</h3>
				</center>
					 <div class="row">
						<div class="col-sm-4">
							<i class="fa fa-home pr-10"></i><span> Address:</span><br/><span="a">Suite 103, 2660 W Woodland Dr</span><br><span class="pl-20"><div class="a">Anaheim, CA 92801</div></span><br/><br/>
						</div>
						<div class="col-sm-4">
							<i class="fa fa-phone pr-10"></i><span> Phone Number:</span><abbr title="Phone"></abbr><div class="a"> (714) 484-0046</div><br/></br/>
						</div>
						<div class="col-sm-4">
							<i class="fa fa-envelope pr-10"></i><span> Email Address:</span><br/><a href="mailto:vou.okcn@gmail.com"><div class="a">vou.okcn@gmail.com</div></a>
						</div> 			
				</div>
		</div>
	</section>
    <!-- Newslatter Area End -->
    <!-- Footer Area Start 
    <footer class="footer-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <p class="copyright">&copy;Copyright <a href="https://themeforest.net/user/bdexpert">BDEXPERT</a> All Right Reserved. Design by <a href="https://themeforest.net/user/themeuk">ThemeUK.</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Music Player End -->
    </footer>
    <!-- Footer Area End -->
    <!-- =========================================
    JAVASCRIPT
    ========================================== -->
    <script src="<?php echo base_url() ?>js/vandor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <!-- =========================================
    Plugin
    ========================================== -->
    <script src="<?php echo base_url() ?>js/jplayer.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url() ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url() ?>js/pogo-slider.js"></script>
    <script src="<?php echo base_url() ?>js/plugin.js"></script>
    <script src="<?php echo base_url() ?>js/main.js"></script>
</body>

</html>