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
.ttw-music-player .tracklist .playing .title {
	color: red !important;
}

.ttw-music-player .next,.ttw-music-player .previous {
	height: 32px;
	width: 32px;
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
					
					<div class="main-player"></div>
					
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
							
						</div>
						<?php }?>
					
						
					
					</div>
					
					<!-- / album slider -->
					
				</div>

				<!--
				<div class="one-half main-player-wrapp">
				
				
					<div class="title">
						<h2><strong>오늘의 </strong> 기도</h2>
						<div class="detail"></div>
					
					</div>
					
					<ul class="list">
					
						<li style="width: 100%;">
						
							<div class="list-wrapp">
							
								<img src="https://i0.wp.com/www.cornerstone.or.kr/cornerstonekr/wp-content/uploads/2020/04/200415.jpg" alt="img">
							
							
							</div>
						
							<a class="name" href="news_open.html">
								하늘과 땅에서 동시다발적으로 미사일 발사
							</a>
						
							<ul class="info">
								<li><span class="icon small style-1">&#xf017;</span><span>June 18, 2015 at 8:15 AM</span></li>
							
							</ul>
							<div class="clearfix"></div>
						
							<p>
								북한이 14일 오전 강원도 문천 일대에서 동해상으로 단거리 순항미사일로 추정되는 발사체 수 발을 쏘았다. 이와 함께 경계 비행 중이던 전투기에서도 동시다발적으로 미사일을 발사했다. 도발 행위는 3~4시간 동안 지속됐다. 총선과 김일성 생일 하루 전에 이뤄진 이번 도발에 대해 전문가들은 그동안 태양절을 앞두고 미사일이 발사된 적은 없었기 때문에 내부 결속을 위한 의도라기보다 4·15 총선에 자신들의 존재감을 과시하기 위한 것으로 평가했다. 북한이 적대 행위를 중단하고, 자멸케 하는 무기가 아닌 하나님의 긍휼을 의지하는 나라가 되도록 기도한다.
                            </p>
                            <a href="news_open.html" class="button small style-2">
                                더보기...
                                <span class="detail"></span>
                            </a>
                        </li>
                        </ul>
				
					
				
							
				</div>
				
				<div class="one-half last main-albums-wrapp">
				
				
					<div class="title">
						<h2><strong>오늘의</strong> 소식</h2>
						<div class="detail"></div>
					</div>
					<ul class="list">
				
						<li style="width: 100%;">
						
							<div class="list-wrapp">
							
								<img src="https://i2.wp.com/www.cornerstone.or.kr/cornerstonekr/wp-content/uploads/2020/04/20200428.jpg" alt="img">
							
							
							</div>
						
							<a class="name" href="news_open.html">
								4월 정기기도모임이 온라인으로 드려집니다!
							</a>
						
							<ul class="info">
								<li><span class="icon small style-1">&#xf017;</span><span>June 18, 2015 at 8:15 AM</span></li>
							
							</ul>
							<div class="clearfix"></div>
						
							<p>
                                코로나로 어려움이 많은 나라와 민족 그리고 선교 현장에서 진행되는 성경배달, 신학교배달, 선교사배달, 지하교회개척 및 구제사역을 위하여 기도할 것입니다. 계신 자리에서 영상을 보며 기도해 주시고, 주변 분들에게도 알려서 함께 기도할 수 있도록 해 주십시오.
                            </p>
                            <a href="news_open.html" class="button small style-2">
                                더보기...
                                <span class="detail"></span>
                            </a>
                        </li>
                        </ul>
				
			
					
				</div>


				 -->
				
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
           
            
            <?php foreach($today as $row){?>
            {
                mp3:'<?php echo $row->program->program_url;?>',
                oga:'#', // mix/1.ogg
                title:"<?php echo '《'. $row->program->channel_title.'》'. $row->program->program_title;?>"                
            }
            ,
            <?php }?>
            
            ];
            
            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>