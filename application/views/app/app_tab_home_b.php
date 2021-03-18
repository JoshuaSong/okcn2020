<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="theme-color" content="#2196f3">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>OKCN App Home</title>
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />
  
<style>
  
    #app { }

.fullBackground {
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment:local;
  background-size: cover ;
  position: absolute;
  top: 60px;
  left: 0;
  width: 100%;
  height: 250px;
}

.listTitle{
  margin:10px -10px; color: #9f1f24; font-size: 20px; font-weight: 700; background-color: #fff; padding: 0 20px;
}

		.icon-back:after{
			font-size: 24px;
		}
    li:nth-child(even) {background: #eee}
</style>
</head>
<body>
<div id="app">
<div class="view view-main view-init">
  <div class="page">
      <?php $data['title']='OKCN';   $this->load->view('/app/page_navbar',$data);?>
  <div class="page-content">
  <div class="fullBackground" >
                 <div style=" width: 100%; background-color:#000;  color:#fff;  opacity: 0.7;   position:relative; top: 200px">
                   <table style="width: 100%;   height: 50px;"><tr>
                   <td style="padding: 5px 0px 5px 10px;"> 
                   <img id="currentImage" class="img-responsive" src="<?php echo $today[0]->channel_poster;?>" style=" border-radius: 50%;height: 30px; width: 30px; border: #fff 1px solid;"></td>
                   <td style="vertical-align: middle;  font-size: 12px;  line-height: 1;">
                   <span style="font-size:14px; font-weight: 500;">《<?php echo $today[0]->channel_title; ?>》</span><br>
                   <span><?php echo $today[0]->programs->program_title?></span></td>
                     </tr></table>
              
                  </div>
  </div>
  <div class="section" style="border-bottom: 0;margin-top: 250px; padding: 10px;">

  <div style=" float:right; margin-top:10px; font-size: 20px"><?php echo date('Y-m-d').':'.$this->session->userdata('user_login_id');?></div>
      <div class="listTitle">오늘의 방송</div>

      <div  data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
                   
      <div class="swiper-wrapper">
                    <?php foreach ($today as $row) { ?>
                     <div class="swiper-slide" >
                       <a href="/channel/<?php echo $row->cid; ?>" class="program1" data-transition="f7-circle">
                       <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
                       </a>
                    
        
                      </div>                         
                     <?php } ?>
            
      </div>
   </div>

   
   <div class="listTitle" >오늘의 기도</div>
              
              <div id = "prayerslider" class="swiper-container swiper-init demo-swiper">
             
               <div class="swiper-wrapper">
                <?php foreach ($todayprayer as $row) { ?>
                 <div class="swiper-slide" >
                   <a href="/prayer/<?php echo $row->id; ?>" class="program1" data-transition="f7-push">
                   <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->prayer_image; ?>">
                   </a>
                   <div  style=" font-size: 14px;"><?php  echo '['.$row->prayer_date.']';  ?></div>
                   <div  style="overflow: hidden;text-overflow:ellipsis; white-space: nowrap; font-size: 14px;"><?php echo $row->prayer_title ?></div>

                  </div>                         
                 <?php } ?>
        
               </div>
             </div>


  <div class="listTitle" >오늘의 영상</div>
                <div id="videoslider" class="swiper-container swiper-init swiper-container-horizontal" >
                    <div class="swiper-wrapper">
                        <?php foreach ($todayvideo as $row) { ?>
                          <div class="swiper-slide videoslide" >
                           
                          <a href="/channel/<?php echo $row->id; ?>" class="program1" data-transition="f7-push">
                            <img class="youtubeplay" src="/images/youtubeplay1.png" style="width: 50px; margin-right: auto; margin-left: auto; position:absolute; " >
                          <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="  https://img.youtube.com/vi/<?php echo $row->video_id; ?>/maxresdefault.jpg">
                        </a>
                      </div>
                        
                        <?php } ?>
                    </div>
                </div>

                <div class="listTitle" >예배와 찬양</div>

<div  id="slider1"  class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ( $this->CI->getChannelByCatArray(array(1,7,8)) as $row) { ?>
    <div class="swiper-slide">
        <a  href="/channel/<?php echo $row->c_id; ?>" >
         <img id=""style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>                                       
         </div>
                                       
    <?php } ?>
    
  </div>
</div>

<div class="listTitle" >말씀과 기도</div>

<div  id="slider6"  class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ( $this->CI->getChannelByCatArray(array(1,7,8)) as $row) { ?>
    <div class="swiper-slide">
        <a  href="/channel/<?php echo $row->c_id; ?>" >
         <img id=""style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>                                       
         </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">선교지</div>

<div id="slider2" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(2,3,4)) as $row) { ?>
    <div class="swiper-slide">
      <a  href="/channel/<?php echo $row->c_id; ?>" >
         <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>
         </div>
                                       
    <?php } ?>
    
  </div>
</div>

<div class="listTitle">모통이돌</div>

<div  id="slider3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(5)) as $row) { ?>
    <div class="swiper-slide">
      <a  href="/channel/<?php echo $row->c_id; ?>" >
         <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>
         </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">24시간 찬양</div>

<div   id="slider4" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(6)) as $row) { ?>
    <div class="swiper-slide">
      <a  href="/channel/<?php echo $row->c_id; ?>" >
         <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>
         </div>
                                       
    <?php } ?>
    
  </div>
</div>
  <div class="listTitle">날자별 다시듣기</div>

  <div  id="slider5" class="swiper-container swiper-init demo-swiper">
  
    <div class="swiper-wrapper" >
      <?php $d = array();
      for ($i = 0; $i < 20; $i++) { ?>
        <div class="swiper-slide" onclick = "todayclick(this)" id="<?php echo $row->c_id; ?>" style="padding: 10px 0; font-size: 20px; text-align: center; background-color: #fff; border-radius: 5px; border: 1px solid #ccc;">
          <a  href="/home/newdatechannel/<?php echo date("Y-m-d", strtotime("-$i days")) ?>" i class="program1">
            <?php echo date("m-d (D)", strtotime("-$i days")) ?>
          </a>
           </div>
     
      <?php }?>    
   
      
    </div>
  <br/><br/><br/><br/><br/>
</div>


          <div class="list links-list">
            <ul><li><a href="/page-transitions/f7-circle" data-transition="f7-circle">f7-circle</a></li><li><a href="/page-transitions/f7-cover" data-transition="f7-cover">f7-cover</a></li><li><a href="/page-transitions/f7-cover-v" data-transition="f7-cover-v">f7-cover-v</a></li><li><a href="/page-transitions/f7-dive" data-transition="f7-dive">f7-dive</a></li><li><a href="/page-transitions/f7-fade" data-transition="f7-fade">f7-fade</a></li><li><a href="/page-transitions/f7-flip" data-transition="f7-flip">f7-flip</a></li><li><a href="/page-transitions/f7-parallax" data-transition="f7-parallax">f7-parallax</a></li><li><a href="/page-transitions/f7-push" data-transition="f7-push">f7-push</a></li></ul></div></div></div></div></div>

  </div>

<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
<script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="/assets/green/js/fullclips.js"></script>
  <script type="text/javascript" src="/assets/green/js/fullclipschannel.js"></script>

<script>
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
  },

    {
      path: '/page-transitions/:effect',
      component: {
        template: `
          <div class="page">
            <div class="navbar">
              <div class="navbar-bg"></div>
              <div class="navbar-inner sliding">
                <div class="left">
                  <a href="#" class="link back">
                    <i class="icon icon-back"></i>
                    <span class="if-not-md">Back</span>
                  </a>
                </div>
                <div class="title">{{$f7route.params.effect}}</div>
              </div>
            </div>
            <div class="page-content">
              <div class="block block-strong text-align-center">
                <p>This page was loaded with <b>{{$f7route.params.effect}}</b> transition.</p>
              </div>
            </div>
          </div>
        `,
      },
    }
  ]
});

$('.fullBackground').fullClip({
      images: [
      <?php if($today[0]->channel_info != null) foreach($today[0]->channel_info as $item)  echo '"'.$item.'",';?>
       ],
      transitionTime: 3000,
      wait: 10000
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
        var videoswiper = app.swiper.create('#videoslider', {
            speed: 1000,
            slidesPerView:2,
            spaceBetween: 10,
            
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            }
        });

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

        



</script>

</body>
</html>
