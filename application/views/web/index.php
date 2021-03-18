
<!-- =========================================
body
========================================== -->

<body>
    <!-- Header Area Start -->
    <header class="top-area" id="home">
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
                                <a href="<?php echo base_url() ?>home"><img src="images/logo_red.png" alt="OKCNRADIO"></a>
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
                            <li class="active"><a href="#contact">Home<i class="fa fa-angle-down"></i><span>Date</span></a>
                            <ul>
									<?php $d = array();
									for ($i = 0; $i < 10; $i++) { ?>
										<li><a href="/home/datechannel/<?php echo date("Y-m-d", strtotime("-$i days")) ?>"><?php echo date("Y-m-d", strtotime("-$i days")) ?></a></li>
									<?php }?>    
                                </ul>
                            </li>
                            
                            <?php foreach ($category as $row) { ?>                          
                            <li><p20><?php echo $row->category_name ?> <i class="fa fa-angle-down"></i><span><?php echo $row->english_name ?></span></p20>
                                <ul>
                                	<?php foreach ($row->channels as $items) {?>
                                    <li><a href="home/onechannel/<?php echo $items->c_id?>"><?php echo $items->channel_title?></a></li>                          
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
        <div class="header-text-area">
            <div class="slider-area header-text text-center">
                <div class="pogoSlider">
                <?php foreach ($banner as $row) { ?>}
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(assets/uploads/<?php echo $row->banners_image ?>) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--
                    <div class="pogoSlider-slide" data-transition="fade" data-duration="1500" style="background:url(assets/uploads/09cdb-2019.9-1.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">《광야의 소리》로 <span>하나님의 </span>나팔을 불고</h2>
                               
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(assets/uploads/4f83d-9.1.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">《통일의 소리》로 <span>하나님의 </span>나라을 준비합니다</h2>
                                </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(assets/uploads/aca93-20190901.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">하나님을 <span>사랑하고 </span></h2>
                                                   </div>
                        </div>
                    </div>
                                    -->
                    
                                    
                    <!--
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(images/slide/slide_4.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">이웃을 <span>사랑하는 </span></h2>
                               </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(images/slide/slide_5.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700"><span>OKCN 방송</span> 입니다</h2>
                               </div>
                        </div>
                    </div>
                                    -->
                    <!--
                    <div class="pogoSlider-slide" data-transition="fade" style="background:url(images/slide/slide_6.jpg) no-repeat scroll 0 0 / cover;">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <h2 class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="700">We are <span>mixmusic</span> band</h2>
                                <p class="pogoSlider-slide-element" data-in="expand" data-out="expand" data-duration="1500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi atque quos voluptates culpa aut distinctio, voluptatem autem ut perspiciatis ipsum repudiandae tempora quam alias sed eum molestiae doloremque saepe est</p>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>

    </header>
    <!-- Header Area End -->
    <div id="sticky-helper"></div>
    <!-- Now Playing -->
    <div class="container">
    	<center>
    		<h1 style="margin-top: 20px; font-weight: 600" >Current Channel Playing</h1>
    	<a id= "channelID">    		
    		<img id="posterImg"></img>
    	</a>
    	</center>
    </div>
    <!-- Today's Channels-->
    <div class="container">
    	<center>
    		<h1 style="margin-top: 80px; font-weight: 600" >Today's Channels</h1>
    	</center>
    		<div class="row">
    			<div class="col-xs-12">
    				 
    		<?php foreach ($today as $selection) { ?>     
    			<div class="col-xs-4 col-md-3 col-lg-2">
    			<a href=<?php echo $this->config->base_url().'home/onechannel/'.$selection->c_id;?> > <img src="<?php echo $selection->channel_poster;?>"></a>
    			</div>
    		<?php } ?>
    			
    			</div>
    		</div>
    </div>
    <!-- News Area Start -->
    <section class="news-area section-padding" id="news" style="margin-top: 100px; margin-bottom: 100px;">
    
        <div class="container">
 			<center>
 				<h1 style="font-weight: 600" >Other Channels</h1>
 			</center>
                <div class="col-xs-12">
                    <!-- News Page Title-->
                    <div class="row">
                	<?php foreach ($thumbnails as $item): ?>
                    <div class="col-xs-4 col-md-3 col-lg-2" style="padding: 5px;">
                        <div class">	
                            <a href="<?php echo $this->config->base_url().'home/onechannel/'.$item->c_id;?>"  > <img src="<?php echo $item->channel_poster;?>"></a>
                           
                           
                        </div>
                    </div>
                    <?php endforeach; ?>
                  
            		</div>
                </div>            
            </div>
        </div>
        
        <div class="container" style="margin-top: 20px;">
        	<div class="row">
        		<center>
							<div>
								<p>앱스토에서 "OKCN"을 검색하시거나 아래의 버튼을 클릭하여</br> 앱을 다운받으실수 있습니다.</p>
						</div>
								<table><tr><td><a href="https://itunes.apple.com/us/app/okcn-radio/id1102671285"><img style="height: 48px;" src="/src/images/appstore.png"/></a></td>
									<td style="padding-left: 10px"><a  href="https://play.google.com/store/apps/details?id=org.okcn.vou7"><img style="height: 48px;" src="/src/images/googleplay.png"/></a></td></tr></table>
								<br/><br/>
						</center>
        	</div>
        </div>
    </section>
    <section class="main-container" id="contact" style="padding-bottom: 80px; padding-top: 30px; background-color: #212020; color: white">
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
    <!-- News Area End -->
    
    <!-- Footer Area Start -->
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
        <!-- Footer Music Player Start -->
        <div class="footer-bottom black-bg">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                <div class="jp-type-playlist">
                    <div class="jp-gui jp-interface">
                    	<div class="jp-gui" style="font-size: 20px;">
                    		<div class="jp-interface">
								<div class="jp-progress" style="height: 7px; top: 0px; left: 0px; width: 100%; ">
									<div class="jp-seek-bar">	
										<div class="jp-play-bar" style="float: left"></div>
									</div>				
								</div>
								<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
								<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
							</div>
						</div>
                        <div class="jp-controls_title">
                            <a id= "channelLink">
                            	<span id="radio_title" style="color:#fff; font-size: 20px;"></span>
                            	<span id="actorTD" style="color:#fff; font-size: 20px;"></span>
                            	<span id="timeTD" style="color:#fff; font-size: 20px;"></span>
                            </a>
                        </div>
                        <div class="jp-controls">
                            <button class="jp-previous" tabindex="0"><i class="fa fa-step-backward"></i></button>
                            <button class="jp-play" tabindex="0"></button>
                            <button class="jp-next" tabindex="0"><i class="fa fa-step-forward"></i></button>
                        </div>
                      
                        <div class="jp-volume-controls hidden-xs">
                            <button class="jp-volume-max" tabindex="0"><i class="fa fa-volume-up"></i></button>
                            <div class="jp-volume-bar">
                                <div class="jp-volume-bar-value"></div>
                            </div>
                        </div>
                        
                        <div class="jp-toggles">
                            <button class="jp-list"><i class="fa fa-list-ul"></i></button>
                        </div>
                    </div>
                    <div class="jp-playlist">
                        <ul>
                            <li>&nbsp;</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Music Player Start -->
    </footer>
    <!-- Footer Area End -->
    <!-- =========================================
    JAVASCRIPT
    ========================================== -->
    <script src="js/vandor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- =========================================
    PLUGIN
    ========================================== -->
    <script src="js/jplayer.min.js"></script>
    <script src="src/js/jquery-2.1.3.min.js"></script>
    <script src="src/js/slidebars.min.js"></script>
	<script type="text/javascript" src="src/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="src/js/jplayer.playlist.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/pogo-slider.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
