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
    /*
    li:nth-child(even) {background: #eee}
    */
    </style>

</head>

<body class="color-theme-pink">
<div id="app">
  <div class="view view-main view-init">
    <div class="page">
      <?php $data['title']='OKCN';   $this->load->view('/app/page_navbar',$data);?>
      <div class="page-content ptr-content ptr-bottom">
       
        <div class="section" id="sectionbody" style="border-bottom: 0; padding: 10px;">
          <div data-space-between="10" data-slides-per-view="1" class="swiper-container swiper-init demo-swiper bannerslider">
            <div class="swiper-wrapper">
                   <?php foreach ($banners as $row) { ?>
                    <div class="swiper-slide" >                  
                      <a href="<?php echo $row->banners_link; ?>"  class="link  external">
                        <img style="border-radius: 5px; width: 100%; " src="/assets/uploads/<?php echo $row->banners_image; ?>">
                      </a>
                      </div>                         
                    <?php } ?>      
             </div>
          </div>


           <div style=" float:right; margin-top:10px; font-size: 20px"><?php echo date('Y-m-d')?></div>
           <div class="listTitle">오늘의 방송</div>
           <div  data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
             <div class="swiper-wrapper">
                    <?php foreach ($today as $row) { ?>
                     <div class="swiper-slide" >
                      <div id="loading<?php echo $row->cid; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
                       <a href="" onclick="openthischannel('<?php echo $row->cid; ?>')" class="program1" data-transition="f7-push"> 
                       <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
                       </a>
                      </div>                         
                     <?php } ?>
            
              </div>
           </div>
        



        <div class="listTitle" >오늘의 기도</div>
              
              <div id = "prayerslider" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
             
               <div class="swiper-wrapper">
                <?php foreach ($todayprayer as $row) { ?>
                 <div class="swiper-slide" >
                   <a href=""   onclick="openthisprayer('<?php echo $row->id; ?>')" class="program1" data-transition="f7-push">
                   <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->prayer_image; ?>">
                   </a>
                   <div  style=" font-size: 14px;"><?php  echo '['.$row->prayer_date.']';  ?></div>
                   <div  style="overflow: hidden;text-overflow:ellipsis; white-space: nowrap; font-size: 14px;"><?php echo $row->prayer_title ?></div>

                  </div>                         
                 <?php } ?>
        
               </div>
             </div>
       
  <div class="listTitle" >오늘의 영상</div>
                <div data-space-between="10" data-slides-per-view="2" class="swiper-container swiper-init swiper-container-horizontal videoslider" >
                    <div class="swiper-wrapper">
                        <?php foreach ($todayvideo as $row) { ?>
                          <div class="swiper-slide" >
                           
                          <a href="https://youtu.be/<?php echo $row->video_id; ?>" class="link  external" >
                            <img class="youtubeplay" src="/images/youtubeplay1.png" 
                            style="width: 50px; margin-right: auto; margin-left: auto; position:absolute; " >
                          <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="  https://img.youtube.com/vi/<?php echo $row->video_id; ?>/mqdefault.jpg">
                        </a>
                      </div>
                        
                        <?php } ?>
                    </div>
                </div>
               
                <div class="listTitle" >예배와 찬양</div>

<div  id="slider1" data-space-between="10" data-slides-per-view="3"  class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
    
  <?php foreach ( $this->CI->getChannelByCatArray(array(1)) as $row) { ?>
    <div class="swiper-slide">
    <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
      <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
         <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>                                       
         </div>
                                       
    <?php } ?>

    
  </div>
</div>

<div class="listTitle" >말씀과 기도</div>

<div  id="slider6" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ( $this->CI->getChannelByCatArray(array(7,8)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">선교지</div>

<div id="slider2" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(2,3,4)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>

<div class="listTitle">모퉁이돌</div>

<div  id="slider3" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(5)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">24시간 찬양</div>

<div   id="slider4" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(6)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
  <div class="listTitle">날자별 다시듣기</div>

  <div  id="slider5" data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
  
    <div class="swiper-wrapper" >
      <?php $d = array();
      for ($i = 1; $i < 20; $i++) { ?>
        <div class="swiper-slide" onclick="openthisdate('<?php echo date("Y-m-d", strtotime("-$i days"));?>')"
          style="padding: 5px 0; font-size: 16px; text-align: center; background-color: #fff; border-radius: 5px; border: 1px solid #ccc;">
          <a  href="" i class="program1">
            <?php echo date("m-d (D)", strtotime("-$i days")) ?>
          </a>
           </div>
     
      <?php }?>    
   
      
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
      var moreNotUploaded = true;
      var app = new Framework7({
  root: '#app',
  routes: [
    {
    path: '/channel/:channelID',
    componentUrl: '/app/channel/{{channelID}}'
  },
  {
    path: '/prayer/:pID',
    componentUrl: '/app/prayer/{{pID}}'
  }
  ]
});

$(document).ready(function() {
  if (app.device.ios) 
  {
   $("#sectionbody").css("margin-top",15);
  }

  var swiper1 = app.swiper.create('#slider1', {
            speed: 1000,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }
        });
        var swiper2 = app.swiper.create('#slider2', {
            speed: 1000,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            }
        });
        var swiper3 = app.swiper.create('#slider3', {
            speed: 1200,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            }
        });
        var swiper4 = app.swiper.create('#slider4', {
            speed: 1200,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            }
        });
        var swiper5 = app.swiper.create('#slider5', {
            speed: 1000,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 9000,
                disableOnInteraction: false,
            }
        });
        var swiper6 = app.swiper.create('#slider6', {
            speed: 1000,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 9000,
                disableOnInteraction: false,
            }
        });
});

   
       
        var prayerswiper = app.swiper.create('#prayerslider', {
            speed: 800,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            }
        });
        var prayerswiper = app.swiper.create('.bannerslider', {
            speed: 800,
            slidesPerView:1,
            spaceBetween: 10,
            
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            }
        });
        var videoswiper = app.swiper.create('.videoslider', {
            speed: 1000,
            slidesPerView:2,
            spaceBetween: 10,
            
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            }
        });
 
       

 //var $ptrContent = $('.ptr-content');
//$ptrContent.on('ptr:refresh', function (e) {
 // if(moreNotUploaded){
 // $.get('/app/homemore/', function (data) {
 
 //moreNotUploaded=false;
 //$(".ptr-preloader").remove();
 // $('#homemore').append(data);
  
  
 //  })
 // }
 //// app.ptr.done(); 

//});

function openthischannel(e)
{
  $("#loading"+e).show();
  setTimeout(function () {  $("#loading"+e).hide();}, 3000);

  if (app.device.android) 
  {
           Android.openList("app/channeltab/" + e);
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("app/channeltab/" + e);
    }

}
function openthisdate(e)
{
 

  if (app.device.android) 
  {
    Android.openList("app/dateprogramtab/" + e);
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("app/dateprogramtab/" + e);
    }

}
function openthisprayer(e)
{
 


  if (app.device.android) 
  {
    Android.openList("app/prayertab/" + userid + "/" + e);
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("app/prayertab/" + userid + "/" + e);
    }

}

function changeName(e)
{
  username = e;
}

    </script>
</body>

</html>