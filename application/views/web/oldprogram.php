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
			
				<!-- title -->
				<div class="title">
                        <h2><strong>OKCN</strong>지난 프로그램</h2>
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
	
	

        <script>
			


			$(function() {
				$.shifter({ maxWidth: Infinity });
			});



            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>