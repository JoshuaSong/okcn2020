<?php  $this->load->view('web/newheader');?>

				<style>
                   @media (max-width: 800px)
				   {
					.header-photo {
    height: 100px;
}

				   }
				   .ttw-music-player .tracklist .title {
				padding: 0 0;
			}
			.ttw-music-player .tracklist li {
    list-style-position:unset;
    
}

.ttw-music-player .tracklist .playing .title {
	color: red !important;
}			
.ttw-music-player .next,.ttw-music-player .previous {
	height: 32px;
	width: 32px;
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
					
					<div class="main-player"></div>
					
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
		
		<!-- Gallery -->
		
		<script type="text/javascript" src="/new/js/libs/lightGallery.min.js"></script>
		
		<!-- Player -->
		
		<script type="text/javascript" src="/new/js/libs/jquery.jplayer.js"></script>
		<script type="text/javascript" src="/new/js/libs/ttw-music-player.js"></script>
	

		<!-- Custom Js -->
		
		<script type="text/javascript" src="/new/js/custom.js"></script>

        <!-- /ATTACHMENTS -->
        <script>
            var myPlaylist = [
           
            
            <?php   foreach($programs as $row){?>
            {
                mp3:'<?php echo $row->program_url;?>',
                oga:'#', // mix/1.ogg
                title:"<?php echo $row->program_date.'  《'.$row->channel_title.'》'.$row->program_title;?>",
                buy:'#',
                price:'<a href="#">&#xf1be;</a>',
                duration:''
            }
            ,
            <?php }?>
            
            ];
            
            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>