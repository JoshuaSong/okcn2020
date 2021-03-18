<?php  $this->load->view('web/newheader');?>

				<style>
					.list.small li a{
						font-size: 20px; color: #555;
					}
					.list.small li{
		width: 19% !important ;
		margin: 10px 2px !important;
		text-align: center;
		border: 1px solid  lightsalmon;
		background-color:cornsilk;
		border-radius: 10px;
	}	
                   @media (max-width: 800px)
				   {
					.header-photo {
                      height: 0px;
                     }
					 .list.small li{
		width: 100% !important ;
		
	}	

				   }
				   
			.main-player-wrapp p{
				margin: 5px 0; font-size: 20px; color:darkblue; font-weight: 600;
			}
			.main-player-wrapp span{
				margin: 5px 10px; font-size: 18px; color:#555; display:block;
			}


                </style>	 
	
		
  <div class="shifter-page"> 
		
			<!-- slider -->
		
			<div class="header-photo" style=" background: url(/assets/uploads/<?php echo $banner[1]->banners_image;?>) no-repeat 85% 50%; opacity: 0.7;">
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
			
			<div class="main-content" style="padding: 0 !important;">
				<img src="/images/onlineoffering.jpg" style="width: 100%; ">
				<!-- ######################### /HOME PLAYER & ALBUMS ######################### -->
				<div class="main-content-wrapp" style="padding: 0 20px;">
				<center>
			
				
				<p style="font-size: 16px; ">
					평양에서 예루살렘까지 잃어버린 하나님의 양을 찾아, <br/>
그들로 하나님의 백성의 삶을 누리도록 하는 일은 여러분의 섬김과 참여를 통해 이루어집니다.<br/>
모퉁이돌선교회는 여러분의 헌신이 선교현장에서 열매 맺는 그 날을 소망하며 함께 합니다
						</p>
				<br/><br/>
			</center>
				<!-- gallery list -->
				<ul class="list small">
					<!-- entry -->
					<li><center>
						<br>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XLVY6RSTXNGFL&source=url">
							일반사역<br> (General Offering)
						</a>
						<div>
						
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XLVY6RSTXNGFL&source=url">
								<img src="/images/icon/goff.png"  style="width: 100%;;margin-top: 10px;">
							
						
							</a>
						</div>
					</center>
					
					</li>
					<li><center>
						<br>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZSFLRTE7VZTXY&source=url">
							성경배달<br>(Bible Delivery)
						</a>
						
						<div>
						
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZSFLRTE7VZTXY&source=url">
								<img src="/images/icon/boff.png"  style="width: 100%;margin-top: 10px;">
							
						
							</a>
						</div>
					</center>
					
					</li>
					<li><center>
						<br>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E3UW5LVAUYBJN&source=url">
							방송<br>(Broadcasting)
						</a>
						
						<div>
						
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=E3UW5LVAUYBJN&source=url">
								<img src="/images/icon/broff.png"  style="width: 100%;margin-top: 10px;">
							
						
							</a>
						</div>
					</center>
					
					</li>
					<li><center>
						<br>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZMVQ5T5AMNTDC&source=url">
							선교사지원<br>(Missionary Support)
						</a>
						
						<div>
						
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZMVQ5T5AMNTDC&source=url">
								<img src="/images/icon/moff.png"  style="width: 100%;margin-top: 10px;">
							
						
							</a>
						</div>
					</center>
					
					</li>
					<li><center>
						<br>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7RFX68YSGZR9E&source=url">
							구제<br>(Relief Support)
						</a>
				
						<div>
						
							<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7RFX68YSGZR9E&source=url">
								<img src="/images/icon/roff.png"  style="width: 100%;margin-top: 10px;">
							
						
							</a>
						</div>
					</center>
					
					</li>
					<!-- entry -->
					
				</ul>
				<!-- pagination -->
				<div class="clearfix"></div>
				
			</div>
				<br/><br/><br/><br/>
			<div class="one-half main-player-wrapp" style="padding: 0 20px;">
				
				<!-- title -->
				<div class="title">
					<h2><strong>Personal Check 또는 Money Order</strong> </h2>
					<div class="detail">

						
					</div>
				
				</div>
				
			<div>
				<p>Payable To: Cornerstone Ministries International (CMI)</p>
				<br/>
				<p>미국 및 해외 회원</p>
				<span>P.O.Box 4002 Tustin, CA 92781-4002</span>
				<span>Tel:714-484-0042 Email:info@cornerstoneusa.org</span>
				<br/>
				<p>캐나다 회원</p>
				<span>108707 Dufferin Street Suite #119 Vaughan, ON L4J 0A6</span>
				<span>Tel:416-206-9191 Email:info@cornerstonecanada.org</span>




			</div>
				
				<!-- /music player -->
						
			</div>
			
			<div class="one-half last main-player-wrapp" style="padding: 0 20px;">
			
				<!-- title -->
				<div class="title">
					<h2><strong>자동이체</strong></h2>
					<div class="detail"></div>
				</div>
				<p>선교헌금 계좌 자동이체 신청서를 작성하시면 매월 헌금이 자동이체 됩니다.</p>
				<span></span>
				<span>-서류에 싸인과 Void Check</span>
				<span>-은행 정보(은행 이름과 지점 이름)</span>
				<span>-원하시는 날짜(5일 혹은 20일)와 금액을 적어서 보내주시면 됩니다.</span>
				<span>계좌이체 신청서 다운로드</span><br/>
				<a style="text-align: center; font-size: 18px; margin: 20px; padding: 14px; background: #90c9e8; border-radius: 10px;" href="http://uscornerstone.org/wp-content/uploads/2016/12/ACH-DEBIT-AUTH.pdf">계좌이체 신청서 다운로드</a>
			<br/><br/>
				<span>보내주신 헌금은 세금공제 혜택을 받으실 수 있습니다.</span>
				<!-- album slider -->
				
				<div >
					





				
				
					
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				</div>
				<div class="clearfix"></div>
				
			
			
		
				
			</div>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<!-- /main content -->
				
			
			
			<!-- copyright 
			
			<div class="copyright" style=" position: absolute;
			bottom: 0px; width: 100%;">
				<div class="center">
				
			
				
					<span><strong>Copyright 2020.</strong> OKCN Radio, Design & code by Joshua</span>
					
				
					
					
	
				</div>
			</div>
		
		 -->
			
		</div>	<!-- Shifter for mobile version -->
	</div>
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
		
	
	

		<!-- Custom Js -->
		
		<script type="text/javascript" src="/new/js/custom2.js"></script>

        <!-- /ATTACHMENTS -->
        <script>
           
            
            </script>
		
	</body>	

	<!-- /BODY -->
		
</html>