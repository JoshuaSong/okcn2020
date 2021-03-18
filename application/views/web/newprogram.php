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
.ttw-music-player .next,.ttw-music-player .previous {
	height: 32px;
	width: 32px;
	opacity: 0;
}		

.img-wrapp.top {
    margin: 40px 0 0;
}
                </style>	 
	
		
		<div class="shifter-page"> 
		
			
			
			<div class="clearfix"></div>
			
			<!-- nav -->
			
		
			
			<!-- /nav -->
			
			<div class="clearfix"></div>
			
			<!-- main content -->
			
			<div class="main-content">
			
				<!-- ######################### /HOME PLAYER & ALBUMS ######################### -->
			 
			
				
					<!-- title -->
					
						<div class="img-wrapp top" >
						<center  >
							<img src="<?php echo $programs->channel_poster;?>" style="border-radius: 10px; width: 90%; margin-bottom: 30px;max-width: 600px; ">
							<div class="main-player"  style=" width: 90%; max-width: 600px; "></div>
						</center>
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
           
            
         
            {
                mp3:'<?php echo $programs->program_url;?>',
                oga:'#', // mix/1.ogg
                title:"<?php echo $programs->program_date.'  《'.$programs->channel_title.'》'.$programs->program_title;?>",
                buy:'#',
                price:'<a href="#">&#xf1be;</a>',
                duration:''
            }
           
            
            ];
            
            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>