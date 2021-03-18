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

                </style>	 
	
		<div class="shifter-page"> 
		
			<!-- slider -->
		
			<div class="header-photo" style=" background: url(/assets/uploads/<?php echo $banner[0]->banners_image;?>) no-repeat 85% 50%; opacity: 0.7;">
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
			 
				<div class="main-player-wrapp">
				
					<!-- title -->
					<div class="title">
						<div class="owl-prev" style="display: block;"></div>
						<h2><strong><?php echo $this->uri->segment(3);?> </strong></h2>
						<div class="detail"></div>
					
					</div>
					
					<!-- music player -->
					
					<div class="main-player"></div>
					
					<!-- /music player -->
							
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
           
            
            <?php   foreach($todays as $row){?>
            {
                mp3:'<?php echo $row->radio_url;?>',
                oga:'#', // mix/1.ogg
                title:"<?php echo $row->program_date.'  《'.$row->category_name.'》'.$row->radio_name;?>",
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