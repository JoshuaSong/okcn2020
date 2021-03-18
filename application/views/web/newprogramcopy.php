<?php  $this->load->view('web/newheader');?>
<link href="/src/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
				<style>
                   @media (max-width: 800px)
				   {
					.header-photo {
    height: 100px;
}

				   }
				 

.img-wrapp.top {
    margin: 40px 0 0;
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
  background-color: #efeff4;
}
.jp-video,.jp-video .jp-interface{
  border: 0;
  color:#4a4367
}
.jp-video .jp-type-playlist .jp-controls {
   
    margin-left: 120px;
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
.jp-previous{
  margin-top: 12px;
  width: 36px;
    height: 36px;
  background: url(/images/bible-previous.png) no-repeat;
}
.jp-next{
  margin-top: 12px;
  width: 36px;
    height: 36px;
  background: url(/images/bible-next.png) no-repeat;
}

.jp-controls-holder {
  width: 300px;
}

  button:focus{
    outline: 0px;
  }
   a:focus, a:hover {
      text-decoration-line: none;
    }
    .tabbar.toolbar-top a.tab-link-active {
    border-bottom: 2px solid #a82a21;
    font-weight: 700;
    color:#a82a21;
}

                </style>	 
	
		
		<div class="shifter-page" style="background-color: #efeff4;"> 
		
			
			
			<div class="clearfix"></div>
			
			<!-- nav -->
			
		
			
			<!-- /nav -->
			
			<div class="clearfix"></div>
			
			<!-- main content -->
			
			<div class="main-content" style="background-color: #efeff4;">
			
				<!-- ######################### /HOME PLAYER & ALBUMS ######################### -->
			 
			
				
					<!-- title -->
					
						<div class="img-wrapp top"  style="background-color: #efeff4;">
						<center  >
							<img src="<?php echo $programs->channel_poster;?>" style="border-radius: 10px; width: 90%; margin-bottom: 10px;max-width: 600px; ">
							<h3><?php echo '《'.$programs->channel_title.'》';?></h3>
							<p style="margin: 5px 0 20px 0; font-weight: 500; font-size: 18px;"><?php echo $programs->program_date.'<br>'.$programs->program_title;?></p>
						</center>
							<div id="jp_container_1" class="jp-video" role="application" aria-label="media player">
                <div class="jp-type-playlist">
                  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                  <div class="jp-gui">
                    <div class="jp-video-play">
                      <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                    </div>
                    <div class="jp-interface">
                      <div class="jp-progress">
                        <div class="jp-seek-bar">
                          <div class="jp-play-bar"></div>
                        </div>
                      </div>
                      <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                      <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                      <div class="jp-controls-holder">
                    
                        <div class="jp-controls">
                       
                          <button class="jp-play" role="button" tabindex="0">play</button>
                        
                         
                        </div>
                    
                        
                      </div>
                      <div class="jp-details">
                        <div class="jp-title" aria-label="title">&nbsp;</div>
                      </div>
                    </div>
                  </div>
                  <div class="jp-playlist" style="display: none;">
                    <ul>
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

		<script type="text/javascript" src="/new/js/libs/jquery.fs.shifter.min.js"></script>

		<script type="text/javascript" src="/src/blue.monday/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/blue.monday/add-on/jplayer.playlist.js"></script>

		<!-- Custom Js -->
	

        <!-- /ATTACHMENTS -->
        <script>
            var playlist = [
            {
           
                mp3:'<?php echo $programs->program_url;?>',
            }
           
            
			];
$(function() {
	$.shifter({ maxWidth: Infinity });
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
});


$("#jquery_jplayer_1").bind($.jPlayer.event.play, function(event) { 
 

  $.get("/home/programtouch/<?php echo $programs->p_id;?>");



  })
            
            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>