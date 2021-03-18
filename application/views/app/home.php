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
.marquee {
  width: 100%;
  overflow: hidden;
  border: 1px solid #eee;
  
}
.listTitle{
  margin:10px -10px; color: #a82a21; font-size: 20px; font-weight: 700; background-color: #fff; padding: 0 20px;
}

		.icon-back:after{
			font-size: 24px;
		}
    li:nth-child(even) {background: #eee}
</style>
</head>
 

<body>
  <div id="app" >
    <div  id="maintab" class="views tabs safe-areas">
    
    
      <!-- OKCN Home ****************** -->
      <div id="view-home" class="view view-main tab tab-active">
      
        <div class="page" data-name="home">
         
          <?php $data['title']='OKCN';   $this->load->view('/app/page_navbar',$data);?>
          <!-- Scrollable page content-->
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
             
                
        
          
              <div style=" float:right; margin-top:10px; font-size: 20px"><?php echo date('Y-m-d');?></div>
                 <div class="listTitle">오늘의 방송</div>

                 <div  data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
                   
                   <div class="swiper-wrapper">
                    <?php foreach ($today as $row) { ?>
                     <div class="swiper-slide" >
                       <a href="/channel/<?php echo $row->cid; ?>" class="program1" data-transition="f7-push">
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
            <div class="section-content">
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



        </div>
        <!--
        <div class="block-title">Modals</div>
        <div class="block block-strong">
          <div class="row">
            <div class="col-50">
              <a href="#" class="button button-raised button-fill popup-open" data-popup="#my-popup">Popup</a>
            </div>
            <div class="col-50">
              <a href="#" class="button button-raised button-fill login-screen-open" data-login-screen="#my-login-screen">Login Screen</a>
            </div>
          </div>
        </div>
-->


        </div>
   

          

           
         
          </div>
      </div>
   
      <div id="view-share" class="view tab">
      </div>
      <div id="view-bible" class="view tab">
      
      </div>
      <div id="view-settings" class="view tab">
      
      </div>
      <div id="view-member" class="view tab">
      
      </div>
      <div id="view-play" class="view tab">
      
      </div>

      <div class="toolbar tabbar-labels toolbar-bottom">
        <div class="toolbar-inner">
          <a href="#view-home" class="tab-link tab-link-active">
            <i class="f7-icons">house_fill</i>
            <span class="tabbar-label">Home</span>
          </a>
          <a href="#view-share" class="tab-link">
            <i class="f7-icons">bubble_left_bubble_right</i>
            <span class="tabbar-label">은혜나눔</span>
          </a>
          <a href="#view-play" class="tab-link">
            <i class="f7-icons" style="font-size: 50px;">play_circle</i>
            <span class="tabbar-label"></span>
          </a>
          <a href="#view-bible" class="tab-link">
            <i class="f7-icons">book</i>
            <span class="tabbar-label">성경</span>
          </a>
          <a href="#view-settings" class="tab-link">
            <i class="f7-icons">person_crop_rectangle</i>
            <span class="tabbar-label">마이매뉴</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Popup -->




  </div>
  
  <script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
  <script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="/assets/green/js/fullclips.js"></script>
  <script type="text/javascript" src="/assets/green/js/fullclipschannel.js"></script>
  <script type="text/javascript" src="/assets/js/jquery.marquee.min.js"></script>

  <!-- App routes -->
  <script>
var programID;
var bid = '40-1';
var bvs = 'ko/snr/';
var bbn = '마태복음';
var bvn = '모퉁이돌 북한어성경(신약)';
var blang = 'ko';
var chid = 1;
var bbid = 40;
var ot = 0;
var nt = 1;
setTimeout(function(){ 
  var h = $(".videoslide").height(); 
  var w = $(".videoslide").width(); 
 $(".youtubeplay").css('top', h/2 - 15 ); 
 $(".youtubeplay").css('left', w/2 - 25 ); 
}, 300);
var txt = '';
  var htmltxt='';
  var i = 0;
    $('.marquee').marquee({
    duration: 20000,
    gap: 50,
    delayBeforeStart: 0,
    direction: 'left',
    duplicated: true
});
     $('.fullBackground').fullClip({
      images: [
      <?php if($today[0]->channel_info != null) foreach($today[0]->channel_info as $item)  echo '"'.$item.'",';?>
       ],
      transitionTime: 3000,
      wait: 10000
    });

       
routes = [
 
{
    path: '/channel/:channelID',
    componentUrl: '/app/channel/{{channelID}}'
  },
  {
    path: '/prayer/:pID',
    componentUrl: '/app/prayer/{{pID}}'
  },


  {
    path: '/tabbible/',
    componentUrl: '/app/tabviewbible',
  },
  {
    path: '/tabshare/',
    componentUrl: '/app/tabviewshare',
  },
  {
    path: '/settings/',
    componentUrl: '/app/tabviewsettings',
  },
  {
    path: '/member/',
    componentUrl: '/app/tabviewmember',
  },
  {
    path: '/play/:cID/:programID',
    componentUrl: '/app/tabviewplay/{{cID}}/{{programID}}',
  },
  {
    path: '/biblebooklist/:blang/:ot/:nt',
    componentUrl: '/app/biblebooklist/{{blang}}/{{ot}}/{{nt}}',
    options: {
      animate: true
    }

  },
  {
    path: '/bibleversionlist/',
    componentUrl: '/app/bibleversionlist',
    options: {
      animate: false
    }

  },


  {
    path: '/namepage/',
    componentUrl: '/app/namepage',
  },
  {
    path: '/newmember/',
    componentUrl: '/app/newmemberpage',
  },  
  {
    path: '/memberid/',
    componentUrl: '/app/memberidpage',
  },
  {
    path: '/catalog',
    componentUrl: '/app/catalog',
  },
  {
    path: '/product/:id/',
    componentUrl: './pages/product.html',
  },
  
  // Page Loaders & Router
  {
    path: '/page-loader-template7/:user/:userId/:posts/:postId/',
    templateUrl: './pages/page-loader-template7.html',
  },
  {
    path: '/page-loader-component/:user/:userId/:posts/:postId/',
    componentUrl: './pages/page-loader-component.html',
  },
  {
    path: '/request-and-load/user/:userId/',
    async: function (routeTo, routeFrom, resolve, reject) {
      // Router instance
      var router = this;

      // App instance
      var app = router.app;

      // Show Preloader
      app.preloader.show();

      // User ID from request
      var userId = routeTo.params.userId;

      // Simulate Ajax Request
      setTimeout(function () {
        // We got user data from request
        var user = {
          firstName: 'Vladimir',
          lastName: 'Kharlampidi',
          about: 'Hello, i am creator of Framework7! Hope you like it!',
          links: [
            {
              title: 'Framework7 Website',
              url: 'http://framework7.io',
            },
            {
              title: 'Framework7 Forum',
              url: 'http://forum.framework7.io',
            },
          ]
        };
        // Hide Preloader
        app.preloader.hide();

        // Resolve route to load page
        resolve(
          {
            componentUrl: './pages/request-and-load.html',
          },
          {
            context: {
              user: user,
            }
          }
        );
      }, 1000);
    },
  },
 
];


    // Dom7
var $$ = Dom7;

// Framework7 App main instance
var app  = new Framework7({
  root: '#app', // App root element
  id: 'io.framework7.testapp', // App bundle ID
  name: 'Framework7', // App name
  theme: 'auto', // Automatic theme detection
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
      },
      // Demo products for Catalog section
      products: [
        {
          id: '1',
          title: 'Apple iPhone 8',
          description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempora similique reiciendis, error nesciunt vero, blanditiis pariatur dolor, minima sed sapiente rerum, dolorem corrupti hic modi praesentium unde saepe perspiciatis.'
        },
        {
          id: '2',
          title: 'Apple iPhone 8 Plus',
          description: 'Velit odit autem modi saepe ratione totam minus, aperiam, labore quia provident temporibus quasi est ut aliquid blanditiis beatae suscipit odio vel! Nostrum porro sunt sint eveniet maiores, dolorem itaque!'
        },
        {
          id: '3',
          title: 'Apple iPhone X',
          description: 'Expedita sequi perferendis quod illum pariatur aliquam, alias laboriosam! Vero blanditiis placeat, mollitia necessitatibus reprehenderit. Labore dolores amet quos, accusamus earum asperiores officiis assumenda optio architecto quia neque, quae eum.'
        },
      ]
    };
  },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,
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
 var prayerswiper = app.swiper.create('#prayerslider', {
            speed: 800,
            slidesPerView:3,
            spaceBetween: 10,
            
            autoplay: {
                delay: 5000,
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
// Init/Create views
var homeView = app.views.create('#view-home', {
  url: '/'
});

var shareView = app.views.create('#view-share', {
  url: '/tabshare/',
  on:{
    pageInit:function(e,page){
      var messages = app.messages.create({
      el: '.messages',
      tailMessageRule: function (message, previousMessage, nextMessage) {
    
            if (message.isTitle) return false;
            if (!nextMessage || nextMessage.type !== message.type || nextMessage.name !== message.name) return true;
            return false;
        }
       });
    }
   
    }
  
});

var bibleView = app.views.create('#view-bible', {
  url: '/tabbible/'
});



var settingsView = app.views.create('#view-play', {
  url: '/play/0/0'
});


var settingsView = app.views.create('#view-settings', {
  url: '/settings/'
});

var memberView = app.views.create('#view-member', {
  url: '/member/'
});



function todayclick(e)
        {
        
          $("#currentImage").attr("src", $(e).find('img:first').attr("src"));
        }
function gohome(){
  app.tab.show("#view-home", true);
}

function backtobible(e)
  {
    var res = e.split("#");
   bbn = res[0];
   bid = res[1];
   var rres = bid.split("-");
   bbid = rres[0];
   chid = rres[1];
  
  
    bibleView.router.back();
   
  }
  function version2bible(e)
  {
   var res = e.split("-");
   bvn = res[0];
   blang = res[1];
   ot = res[2];
   nt = res[3];
   bvs = res[4];
   var bbid = bid.split("-")[0];
   if(ot==0 && nt==1 && bbid < 40)
   {
     bid = '40-1';
     bbid = 40;
     chid = 1;
     bbn = '마태복음';
   }
   if(ot==1 && nt==0 && bbid > 39)
   {
     bid = '1-1';
     bbid = 1;
     chid = 1;
     bbn = '창세기';
   }
  
  
    bibleView.router.back();
  }
  function nextchapter(){
  chid =    parseInt(chid) + 1;
  bid = bbid + '-' + chid;
  app.request.get('/html/bible/' + bvs + bid + '.html', function (data) {
    $('#bibleChapter').html(data);
    $('#bbn').html(bbn + '&nbsp;&nbsp;' + chid);
    $('#pbbn').html(bbn + '&nbsp;&nbsp;' + chid);
    $('#bvn').html(bvn);
    $("#bbn").attr("href", "/biblebooklist/" + blang + "/" + ot + "/" +nt);
  });

}


  </script>
</body>
</html>
