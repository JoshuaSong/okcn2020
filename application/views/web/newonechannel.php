<?php  $this->load->view('web/newheader');?>

				<style>
                   @media (max-width: 800px)
				   {
					.header-photo {
    height: 100px;
}

				   }
			
.jp-video-play-icon{
		height:0;
		width:0;
	}
  .jp-play-bar{
    background: none;
    background-color: #4a4367;
  }
.jp-video .jp-progress {
  height: 2px;
}
.jp-interface {
  background-color: #fff;
}
.jp-video,.jp-video .jp-interface{
  border: 0;
  color:#4a4367
}
.jp-video .jp-type-playlist .jp-controls {
   
    margin-left: 83px;
}

.jp-play ,.jp-play:focus{
    width: 60px;
    height: 60px;
    background: url(/images/bible-play.png) no-repeat;
}

.jp-state-playing .jp-play ,.jp-state-playing .jp-play:focus{
  width: 60px;
    height: 60px;
    background: url(/images/bible-pause.png) no-repeat;
}
.jp-previous,.jp-previous:focus{
  margin-top: 12px;
  width: 36px;
    height: 36px;
  background: url(/images/bible-previous.png) no-repeat;
}
.jp-next,.jp-next:focus{
  margin-top: 12px;
  width: 36px;
    height: 36px;
  background: url(/images/bible-next.png) no-repeat;
}

.jp-controls-holder {
  width: 300px;
}
.jp-playlist li{
	padding: 5px 20px ;
	border-bottom: 1px solid #ccc;;
}
div.jp-type-playlist div.jp-playlist li:last-child {
	padding: 5px 20px ;

}	  

                </style>	 
	
		
		<div class="shifter-page"> 
		
			<!-- slider -->
		
			<div class="header-photo" style=" background: url(<?php echo $banner[0]->banners_image;?>) no-repeat 85% 50%; opacity: 0.7;">
				<div class="center">
				
			
					<div class="photo-cover"></div>
					<!-- breadcrumbs -->
				
				</div>
			</div>
			<!-- /slider -->
			
			<div class="clearfix"></div>
			
			<!-- nav -->
			
			<nav class="nav-main-menu" style="margin-top: -300px;">
			<?php $data['category'] = $category;  $this->load->view('web/nav',$data);?>
	
			</nav>
			
			<!-- /nav -->
			
			<div class="clearfix"></div>
			
			<!-- main content -->
			
			<div class="main-content">
			
				<!-- ######################### /HOME PLAYER & ALBUMS ######################### -->
			 
				<div class="one-half main-player-wrapp">
				
					<!-- title -->
					<div class="title">
						<div class="owl-prev" style="display: block;"></div>
						<h2><strong><?php echo $channels->channel_title;?> </strong></h2>
						<div class="detail"></div>
						</div>
						<div class="img-wrapp top">
						<center>
							<img src="<?php echo $channels->channel_poster;?>" style="border-radius: 10px; width: 100%;">
							<a id="kakao-link-btn" href="javascript:;"><img src="/images/btn_talk.jpg"  /> </a>
						</center></div>
					
					
					
					<!-- music player -->
					
				
					
					<!-- /music player -->
							
				</div>
				
				<div class="one-half last main-albums-wrapp">
				
					<!-- title -->
					<div class="title">
						<h2><strong>프로그램</strong> 리스트</h2>
						<div class="detail"></div>
					</div>
					<!-- title
					<div class="main-player"></div>
				-->
				<div id="jp_container_1" class="jp-video" role="application" aria-label="media player" style="margin-top:-20px">
                <div class="jp-type-playlist">
                  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                  <div class="jp-gui">
                    <div class="jp-video-play">
                      <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                    </div>
                    <div class="jp-interface">
					<div class="jp-controls-holder">
                    
					<div class="jp-controls">
					  <button class="jp-previous" role="button" tabindex="0">previous</button>
					  <button class="jp-play" role="button" tabindex="0">play</button>
					  <button class="jp-next" role="button" tabindex="0">next</button>
					 
					</div>
				
					
				  </div>
                      <div class="jp-progress">
                        <div class="jp-seek-bar">
                          <div class="jp-play-bar"></div>
                        </div>
                      </div>
                      <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                      <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>

                      <div class="jp-details">
                        <div class="jp-title" aria-label="title">&nbsp;</div>
                      </div>
                    </div>
                  </div>
                  <div class="jp-playlist" style="margin-top: 30px;">
                    <ul style="background-color: #eee; border-bottom: 3px solid #ddd;;">
                      <!-- The method Playlist.displayPlaylist() uses this unordered list -->
                      <li>&nbsp;</li>
                    </ul>
                  </div>
                  <div class="jp-no-solution">
                    <span>Update Required</span>
                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                  </div>
                </div>
              </div>

					
				</div>

				
				<div class="clearfix"></div>
				
			
			
		
				
			</div>
			
			<!-- /main content -->
				
			<div class="clearfix"></div>
			
			
			
			<div class="clearfix"></div>
			
			<!-- footer -->
			
			<!-- /footer -->
			
			<div class="clearfix"></div>
			
			<!-- copyright -->
			
			<div class="copyright" style=" position: absolute;
			bottom: 0px; width: 100%;">
				<div class="center">
				
					<!-- txt -->
				
					<span><strong>Copyright 2020.</strong> OKCN Radio, Design & code by Joshua</span>
					
					<!-- /txt -->
					
					
	
				</div>
			</div>
		
			<!-- /copyright -->
			
		</div>	<!-- Shifter for mobile version -->
			
		<!-- /CONTENT-->
		
		<!-- MOBILE MENU -->
		
		<nav class="shifter-navigation">
			
		<?php $data['category'] = $category;  $this->load->view('web/nav_top',$data);?>
		</nav>
		
		<!-- /MOBILE MENU -->

		<!-- ATTACHMENTS -->

		<script type="text/javascript" src="/new/js/libs/jquery-1.10.2.min.js"></script>
	<!--
		<script type="text/javascript" src="/new/js/libs/jquery.easing.1.3.js"></script>
		
		<script type="text/javascript" src="/new/js/libs/jquery.mobile.customized.min.js"></script>
		-->
		<script type="text/javascript" src="/new/js/libs/placeholdem.js"></script>
		<script type="text/javascript" src="/new/js/libs/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/hover.js"></script>
		<script type="text/javascript" src="/new/js/libs/wait.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.fs.shifter.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.plugin.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.countdown.js"></script>
		
		<!-- Gallery -->
		
		<script type="text/javascript" src="/new/js/libs/lightGallery.min.js"></script>
		
		<!-- Player -->
		<script type="text/javascript" src="/src/blue.monday/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/blue.monday/add-on/jplayer.playlist.js"></script>
	
	

		<!-- Custom Js -->
	
		<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
        <!-- /ATTACHMENTS -->
        <script>
			 Kakao.init('e2bbd49016dd2187797833ebb907dab9');


Kakao.Link.createDefaultButton({
      container: '#kakao-link-btn',
      objectType: 'feed',
      content: {
           title: '하나님을 예배하는 방송 《통일의 소리》방송입니다.',
           description:'',
            imageUrl: '<?php echo $channels->channel_poster;?>',
            imageWidth:80,
            imageHeight:60,
			link: {
      mobileWebUrl: 'http://okcnradio.org/home/newonechannel/<?php echo $channels->c_id;?>',
	  webUrl: 'http://okcnradio.org/home/newonechannel/<?php echo $channels->c_id;?>'
    },
      },
             
      
       buttons: [
        {
          title: '방송듣기',
          link: {
    
            mobileWebUrl: 'http://okcnradio.org/home/newonechannel/<?php echo $channels->c_id;?>',
			webUrl: 'http://okcnradio.org/home/newonechannel/<?php echo $channels->c_id;?>'
          }
        }
      ]
    });
            var playlist = [
           
            
            <?php $count = count($programs); $i = -1; foreach($programs as $row){ $i++;?>
            {
				id:'<?php echo $row->p_id;?>',
                mp3:'<?php echo $row->program_url;?>',
            
                title:"<?php echo '('.($count - $i).'회)  《'.$row->channel_title.'》'.$row->program_title.$row->program_date;?>",
               
            }
            ,
            <?php }?>
            
            ];
			$(function() {
				$.shifter({ maxWidth: Infinity });

$('.main-slider').owlCarousel({
animateOut: 'pulse',
animateIn: 'pulse',
loop:true,
margin:10,
nav:true,
autoplay:true,
navText: [
'',
''
],
items:1
})
$('.big-album-slider').owlCarousel({
loop:true,
margin:10,
nav:true,
autoplay:false,
navText: [
'',
''
],
items:2,
responsive:{
0:{
	items:1
},
600:{
	items:2
}
}
})
	

var myPlaylist = new jPlayerPlaylist({
jPlayer: "#jquery_jplayer_1",
cssSelectorAncestor: "#jp_container_1"
}, playlist, {
	playlistOptions: {
            autoPlay: false,
        },
		supplied: "oga, mp3,application/x-mpegURL",
        wmode: "window",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        autoPlay: true
});

$("#jquery_jplayer_1").bind($.jPlayer.event.play, function(event) { 
	var current = myPlaylist.current;
    var pid =	playlist[current]['id'];
    $.get("/home/programtouch/" + pid);
 })
 setTimeout(function(){  }, 1000);
});
function nextchapter()
   {
	 
   }
   function previouschapter()
   {
	
   }

            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>