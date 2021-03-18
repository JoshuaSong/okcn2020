<style>
  .touch-add-img {
    border-radius: 50%;
    width: 36px;
}
.touch-add-div {
    margin: 5px;
    font-size: 10px;
    width: 36px;
    height: 44px;
    float: left;
   
}
.touch-add-div p{
  white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
<template>

<div class="page">
<div class="navbar" style="background-color:#a82a21;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" >오늘의 기도[<?php echo $prayer->prayer_date;?>]</div>
              
   </div>
</div>
  
  <div class="page-content" style="margin-top:17px;">	
  
			  <div id="sliderchannel"  class="swiper-container swiper-init demo-swiper">
         
				<div class="swiper-wrapper">
			
				  <div class="swiper-slide" >
          <p style="padding:5px 30px;font-size: 24px !important; font-weight: 600;"><?php echo $prayer->prayer_title;?></p>     
					<img id="currentImage" class="img-responsive" src="<?php echo  $prayer->prayer_image;?>" style=" width: 100%;">
				   </div>  
				   <?php if(isset( $prayer->prayer_cont)) {?>                       
				   <div class="swiper-slide" style="background-color: #1e3993;" >
          <p style="padding:30px;font-size: 20px !important; color:#fff ;"><?php echo mb_substr($prayer->prayer_cont,0,200);?>...</p>
        
				   </div> 
				   <?php }?> 
				</div>
			  </div>
			
  <div class="list media-list" style="margin-top: 0px;">

  <button class="button button-raised button-fill button-round" id="prayerpupbutton"  
  style=" background-color: #a82a21; width: 150px;margin-right: auto; margin-left: auto; font-size: 20px; font-weight: 700; margin-top: 20px;">기도에 동참</button>
<div class= "row" style="margin-top: 20px;">

  <div id="adddiv" style=" border-top: 1px #ccc solid;  border-bottom: 1px #ccc solid;  padding: 0px 30px;   width: 100%;">
   
    <?php if($participate != "none") foreach($participate as $item){?>
    <div class="touch-add-div"><img class="touch-add-img" src="/images/thumb_150/<?php echo $item->image?>"><p><?php echo $item->user_name?></p> </div>
      <?php }?>
  
  </div>

</div>
  <p style="padding:20px;font-size: 20px !important;"><?php echo $prayer->prayer_info;?></p>
</div>

</div>
<div class="popup" id="prayer-popup">
  <div class="view">
    <div class="page">
      <div class="navbar" style="background-color: #9f1f24;">
        <div class="navbar-inner">
         
          <div class="title" style="color:#fff;width: 100%; text-align: center; font-size: 20px; font-weight: 500;">기도에 동참</div>
      
         
          <div class="right" >
            <a id="closea" href="#" class="link popup-close">  </a>
          </div>
        
        </div>
      </div>
      <div class="page-content">
        <div >
          <span id="prayertxt" style="display: none" ><?php echo str_replace(array(PHP_EOL,"			"), "", $prayer->prayer_cont);?></span>
          <p style="color:#1e3993; font-size: 20px; text-align: center; padding: 15px;">
          
          <span id="prayerspan" ></span><img style="width: 32px; display: inline;" src="/images/prayer1.png"/></p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  var i = 0;
  var txt = "";
  var htmltxt = "";
	return {
		on: {
			pageInit: function (e, page)  
			  {
          var prayPopup = app.popup.create({el: '#prayer-popup'});
          $('#prayerpupbutton').click(function(){
            if(username == '')
            {
              app.dialog.confirm("기도에 동참하기 원하시면 사용자 이름을 먼저 입력해야 합니다. 이름 입력을 원하십니까?","OKCN Radio",function(){
               Android.gotologin("home");
              });
                setTimeout(function () { app.dialog.close();}, 10000);
              } else 
              {
                prayPopup.open();
              }
            
            });
				var swiper5 = app.swiper.create('#sliderchannel', {
            speed: 1000,
            slidesPerView:1,
            spaceBetween: 10,
            
            autoplay: {
                delay: 9000,
                disableOnInteraction: false,
            }
        });
      

        $('#prayer-popup').on('popup:opened', function (e) {
          htmltxt = "";
         txt = $("#prayertxt").text();
         i = 0;
         typeWriter();
         
         });


         $('#prayer-popup').on('popup:closed', function (e) {
          htmltxt = "";
          txt = "";
          $("#prayerspan").html("");
         

        
        
         
         });
       

function typeWriter() {
  if (i < txt.length) {
   htmltxt += txt.charAt(i)
   $("#prayerspan").html(htmltxt);
    i++;
    setTimeout(typeWriter, 100);
  } else{
    
    addoneprayer()
   
   
  }
}
function addoneprayer()
{
  setTimeout( function() {prayPopup.close()}, 3000);

  app.request.post('/app/addoneprayer', { username: username, tpid:<?php echo $prayer->id?>, userid: userid}, function (data) {
    var userdiv="<div class='touch-add-div'><img class='touch-add-img' src='/images/thumb_150/"+data+"'><p>"+username+"</p></div>";
    setTimeout( function() {$("#adddiv").prepend($(userdiv));}, 4000);
    setTimeout( function() {location.reload();}, 7000);
  })
}
	
		      }
		     }
      }
      
	  </script>