<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#f44336">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
    <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
 
    <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />

    <style>
       

.listTitle{
  margin:10px -10px; color: #9f1f24; font-size: 20px; font-weight: 700; background-color: #fff; padding: 0 20px;
}

		.icon-back:after{
			font-size: 24px;
		}
    .list .item-content{
    padding-left:0px;
  }
  
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

</head>

<body class="color-theme-pink">
<div id="app">
<div class="view view-main view-init">



<div class="page">
<div class="navbar" style="background-color:#a82a21;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
          
  <div class="left" >
        <a href="#" class="link back"  onclick="closechannel()">
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
  <audio id="music" src="<?php echo $music->program_url;?>" style="display:none" class="" controls="">Your browser does not support audio tag.</audio>
  <button class="button button-raised button-fill button-round" id="prayerpupbutton"  
  style=" background-color: #a82a21; width: 150px;margin-right: auto; margin-left: auto; font-size: 20px; font-weight: 700; margin-top: 20px;">기도에 동참</button>
<div class= "row" style="margin-top: 20px;">

  <div id="adddiv" style=" border-top: 1px #ccc solid;  border-bottom: 1px #ccc solid;  padding: 0px 30px;   width: 100%;">
   
    <?php if($participate != "none") foreach($participate as $item){?>
    <div class="touch-add-div"><img class="touch-add-img" src="/images/thumb_150/<?php echo $item->image?>"><center><p><?php echo $item->user_name?></p></center> </div>
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
         
          <div class="title" style="color:#fff;width: 100%; text-align: center; font-size: 24px; font-weight: 500;">기도에 동참</div>
      
         
        
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
</div>
</div>
<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>

<script>
   var userid =  '<?php echo $user->id;?>'
    var username = '';
      <?php $username = $user->user_name; if(isset($username)) {?>
       username = '<?php echo $username;?>';
        <?php }?>
  var i = 0;
  var txt = "";
  var htmltxt = "";
var app = new Framework7({root: '#app'});
var $$ = Dom7;
   function closechannel()
   {
   
  if (app.device.android) 
  {
    Android.closechannel();
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("closechannel");
    }
   }
   var prayPopup = app.popup.create({el: '#prayer-popup'});
          $('#prayerpupbutton').click(function(){
            if(username == '')
            {
              app.dialog.confirm("기도에 동참하기 원하시면 사용자 이름을 먼저 입력해야 합니다. 이름 입력을 원하십니까?","OKCN Radio",function(){

                if (app.device.android) 
  {
    Android.gotologinfromprayer();
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("gotologinfromprayer");
    }
             
              });
                setTimeout(function () { app.dialog.close();}, 10000);
              } else 
              {
           
               
                prayPopup.open();
                if (app.device.android) 
  {
    Android.pause();
    $("#music")[0].play();
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("pauseokcn");
    }
               
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
    var userdiv="<div class='touch-add-div'><img class='touch-add-img' src='/images/thumb_150/"+data+"'><center><p>"+username+"</p></center></div>";
    setTimeout( function() {
      $("#adddiv").prepend($(userdiv));
      $("#music")[0].pause();
      Android.play();
      
      }, 4000);
    setTimeout( function() {
      Android.closechannel();

      }, 5500);
  })
}
</script>
 
</body>

</html>