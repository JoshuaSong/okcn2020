<?php  $this->load->view('web/newheader');?>
		<style>
			.ttw-music-player .tracklist .title {
				padding: 0 0;
				font-size: 16px;
			}
			.ttw-music-player .tracklist li {
    list-style-position:unset;
    
}
.list li .name {
	font-size: 18px; color: #777;
}
@media (max-width: 800px)
				   {
					.photo-cover {
						height: 142px;
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
		<!-- /HEADER -->
		
		<!-- CONTENT-->
		
		<div class="shifter-page"> <!-- for mobile version -->
		
			<!-- slider -->
		
			<div class="slider-wrapp">
				<div class="main-slider">
					<!-- item -->
					<?php foreach($banner as $item) {?>
					<div class="item" style="background: url(<?php echo $item->banners_image;?>) no-repeat 85% 50%;"> 
						<div class="cover">
							<div class="center">
								<div class="content">
								<?php echo $item->banner_title?>
									<a href="<?php echo $item->banners_link;?>" class="button big style-1">
										<?php echo $item->banners_name?>
										<span class="detail"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				
				</div>
				<div class="photo-cover"></div>
			</div>
			
			<!-- /slider -->
			
			<div class="clearfix"></div>
			
			<!-- nav -->
			
			<nav class="nav-main-menu">
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
						<h2><strong>오늘의 </strong> 방송</h2>
						<div class="detail"></div>
					
					</div>
					
					<!-- music player -->
					
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

					
					<!-- /music player -->
							
				</div>
				
				<div class="one-half last main-albums-wrapp">
				
					<!-- title -->
					<div class="title">
						<h2><strong>오늘의</strong> 영상</h2>
						<div class="detail"></div>
					</div>
					
					<!-- album slider -->
					
					<div class="album-slider big-album-slider content-slider">
						<!-- item -->
						<?php foreach($videos as $row) {?>
						<div class="item">
					
						<a href="https://youtu.be/<?php echo $row->video_id; ?>"  >
                           
						  <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="  https://img.youtube.com/vi/<?php echo $row->video_id; ?>/mqdefault.jpg">
						</a>
						<a class="medium genre" style="color: #4a4367;" href="https://youtu.be/<?php echo $row->video_id; ?>">
								<?php echo $row->video_title;?>
							</a>
						</div>
						<?php }?>
					
						
					
					</div>
					
					<!-- / album slider -->
					
				</div>

			
				
				<div class="clearfix"></div>
				<div class=" main-content-wrapp">
				
					<!-- title -->
					<div class="title">
                        <h2><strong>모바일 앱  </strong>  Mobile App</h2>
						<div class="detail"></div>
					</div>
					<div class="one-half main-player-wrapp">
						<div class="item" style="margin-bottom: 50px;" >
							<iframe class="youtube-widget"  style="min-height: 250px ;  "src="https://www.youtube.com/embed/w6sfxpAUOTQ" allowfullscreen=""></iframe>
							
							
						</div>
					</div>
					<div class="one-half last main-albums-wrapp" style="height: 100%;">
						<table style="width:100%; min-height: 250px ;">
							<tr>
								<td style="width: 50%; vertical-align:middle;">
									<img src="/new/img/Icon-1024.png" style="width: 80%; border-radius: 10px;"/ >
								</td>
								<td style="width: 50%; vertical-align:middle;">
                                 <a href="https://apps.apple.com/us/app/okcn-radio/id1102671285"> <img src="/new/img/ios-okcn.png" style="width:90%; margin-bottom: 10%;" /></a> 
								  <a href="https://play.google.com/store/apps/details?id=org.okcn.vou7"> <img src="/new/img/playstore-okcn.png" style="width:90%" /></a>
										
								</td>
							</tr>
						</table>
						
					</div>
					<div class="clearfix"></div>
					
				</div>
				
				
				<!-- ######################### MAIN CONTENT ######################### -->
				<div class=" main-content-wrapp">
				
					<!-- title -->
					<div class="title">
                        <h2><strong>OKCN</strong>방송채널</h2>
						<div class="detail"></div>
					</div>
					<!-- album list -->
					<ul class="list small">
                        <!-- entry -->
                        <?php foreach ($thumbnails as $item): ?>
                        
						<li>
							<!-- wrapp -->
							<div class="list-wrapp">
                                <!-- img -->
                               
                                <img src="<?php echo $item->channel_poster;?>" alt="img">
                 
								<!-- link -->
								<a href="<?php echo $this->config->base_url().'home/newonechannel/'.$item->c_id;?>" class="button small style-3">
									채널듣기
									<span class="detail"></span>
								</a>
							</div>
							<!-- title -->
							<a class="name" href="album_open.html">
								<?php echo $item->channel_title;?>
							</a>
							<!-- info
							<ul class="info">
							
								<li><span class="icon small style-1">&#xf044;</span><a href="author_open.html">Pellentesque tincidunt</a></li>
                            </ul>
                             -->
                        </li>
                        <?php endforeach; ?>
						
					</ul>
					<!-- pagination -->
					<div class="clearfix"></div>
					
				</div>
				<div class="clearfix"></div>
				<div class=" main-content-wrapp">
				
					<!-- title -->
					<div class="title">
                        <h3><strong>Contact Us</strong><br/><br/><strong>O</strong>ne <strong>K</strong>orea <strong>C</strong>hristian <strong>N</strong>etworks</h3>
						<div class="detail"></div>
					</div>
					<div class="one-third main-player-wrapp">
						<ul class="contact-details">
							<li><span>Address:</span>2660 W. Woodland Dr. Suite#103, Anaheim, CA 92801</li>
							
						</ul>
					

					</div>
					<div class="one-third main-player-wrapp">
						<ul class="contact-details">
							<li><span>Phone Number:</span>714 484 0042</li>
							

						</ul>
					
					</div>
					<div class="one-third last main-albums-wrapp" style="height: 100%;">
						<ul class="contact-details">
							<li><span>Email Address:</span>okcn@cornerstoneusa.org</li>
							

						</ul>
						
					</div>
					<br/><br/><br/>
				
					
				</div>
				<div class="clearfix" style="height: 100px;"></div>
				
				<!-- ######################### /MAIN CONTENT ######################### -->
				
				<!-- ######################### SIDEBAR ######################### -->
				
					
				<!-- ######################### /SIDEBAR ######################### -->
				
			</div>
			
			<!-- /main content -->
				
			<div class="clearfix"></div>
			
			
			
			<div class="clearfix"></div>
			
			<!-- footer -->
			
			<!-- /footer -->
			
			<div class="clearfix"></div>
			
			<!-- copyright -->
			
			<div class="copyright">
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
		<script type="text/javascript" src="/new/js/libs/jquery.migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/placeholdem.js"></script>
		<script type="text/javascript" src="/new/js/libs/owl.carousel.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/hover.js"></script>
		<script type="text/javascript" src="/new/js/libs/wait.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.fs.shifter.min.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.plugin.js"></script>
		<script type="text/javascript" src="/new/js/libs/jquery.countdown.js"></script>
		
		<!-- Gallery	<script type="text/javascript" src="/new/js/custom.js"></script> -->
		
		<script type="text/javascript" src="/new/js/libs/lightGallery.min.js"></script>
		
		<!-- Player -->
		
		<script type="text/javascript" src="/src/blue.monday/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/blue.monday/add-on/jplayer.playlist.js"></script>
	


	

        <script>
			
            var playlist = [
           
            
            <?php foreach($today as $row){?>
            {
				id:'<?php echo $row->program->p_id;?>',
                mp3:'<?php echo $row->program->program_url;?>',
             
                title:"<?php echo '《'. $row->program->channel_title.'》'. $row->program->program_title;?>"                
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

				setTimeout(function(){  }, 1000);

	var myPlaylist = new jPlayerPlaylist({
		   jPlayer: "#jquery_jplayer_1",
		   cssSelectorAncestor: "#jp_container_1"
	   }, playlist, {
		playlistOptions: {
            autoPlay: true,
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