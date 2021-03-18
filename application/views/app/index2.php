<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
  <title>My App</title>
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />
  
<style>
  
    #app { max-width: 370px; }

.fullBackground {
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment:local;
  background-size: cover ;
  position: absolute;
  top: 44px;
  left: 0;
  width: 100%;
  height: 250px;
}
.marquee {
  width: 100%;
  overflow: hidden;
  border: 1px solid #ccc;
  
}
</style>
</head>
 

<body>
  <div id="app" >
   

    <!-- Views/Tabs container -->
    <div class="views tabs safe-areas">
      <!-- Tabbar for switching views-tabs -->
    
      <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
      <div id="view-home" class="view view-main tab tab-active">
        <!-- Page, data-name contains page name which can be used in page callbacks -->
        <div class="page" data-name="home">
          <!-- Top Navbar -->
          <div class="navbar" style="background-color:#a82a21;">
            <div class="navbar-inner">
           
              <div class="left">
                <img src="/images/okcn_logo_w.png" style="width: 30px; margin-left: 3px;" >
                <a href="#" class="link icon-only panel-open" data-panel="left" >
                
                </a>
              </div>
         
              <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" > OKCN</div>
              <div class="right">
                <a href="#" class="link panel-open" data-panel="right" style="color: floralwhite;">
                헌금
                </a>
              </div>
            </div>
          </div>

          <!-- Scrollable page content-->
          <div class="page-content">
           
 

        <div class="fullBackground" >
        
  
         
     
              
              <div style=" width: 100%; background-color:#000;  color:#fff;  opacity: 0.7;  height: 40px; ">
                <table style="width: 100%;   height: 25px;"><tr>
                  <td style="padding: 5px 0px 5px 10px;"> 
                   <img id="currentImage" class="img-responsive" src="<?php echo $today[0]->channel_poster;?>" style=" border-radius: 50%;height: 30px; width: 30px; border: #fff 1px solid;"></td>
                  <td style="vertical-align: middle;  font-size: 12px;  line-height: 1;">
                   <span style="font-size:14px; font-weight: 500;">《<?php echo $today[0]->channel_title; ?>》</span><br>
                   <span><?php echo $today[0]->programs->program_title?></span></td>
                </tr></table>
              
              </div>
         
        </div>

        <div class="section" style="border-bottom: 0;margin-top: 250px; padding: 10px;">

          <div class="marquee"> <?php echo $today[0]->programs->summary?></div> 
        <span id="prayerspan" style="display: none;"><?php echo $today[0]->programs->summary?></span>
          <a href="#" class="button button-raised button-fill popup-open" data-popup="#prayer-popup" style="margin-top:10px;">기도에 동참</a>
        
          
              
         <div class="listTitle" style="margin:10px 0">오늘의 방송</div>

        <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
          <div class="swiper-pagination"></div>
          <div class="swiper-wrapper">
          <?php foreach ($today as $row) { ?>
            <div class="swiper-slide" >
                <a href="/channel/<?php echo $row->cid; ?>" class="program1" data-transition="f7-push">
                 <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
                </a>
                 <div  id="title<?php echo $row->c_id; ?>" class="item-title" style="overflow: hidden;text-overflow:ellipsis; white-space: nowrap; font-size: 14px;"><?php echo $row->channel_title; ?></div>
                 <p> <br/></p>
        
                 </div>
                                               
            <?php } ?>
            
          </div>
        </div>
            <div class="section-content">

                <div id="autoslider" class="swiper-container swiper-init swiper-container-horizontal" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                        <?php foreach ($sliders as $row) { ?>

                            <div class="swiper-slide" onclick="playthisprogram()" style="height: 150px; border-radius: 7px;
                     background: url(<?php echo $row->image; ?>) no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;
                     background-size: cover;"></div>
                        <?php } ?>
                    </div>
                </div>

            </div>


            <div class="listTitle" style="margin:10px 0">예배</div>

            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
              <div class="swiper-pagination"></div>
              <div class="swiper-wrapper">
              <?php foreach ($this->CI->getChannelByCat(1) as $row) { ?>
                <div class="swiper-slide" onclick = "todayclick(this)" id="<?php echo $row->c_id; ?>">
                    <a id="" class="program1">
                     <img id=""style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
                    </a>
                     <div  id="title<?php echo $row->c_id; ?>" class="item-title" style="overflow: hidden;text-overflow:ellipsis; white-space: nowrap; font-size: 14px;"><?php echo $row->channel_title; ?></div>
                     <p> <br/></p>
            
                     </div>
                                                   
                <?php } ?>
                
              </div>
            </div>
            <div class="listTitle" style="margin:10px 0">북한</div>

            <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
              <div class="swiper-pagination"></div>
              <div class="swiper-wrapper">
              <?php foreach ($this->CI->getChannelByCat(2) as $row) { ?>
                <div class="swiper-slide" onclick = "todayclick(this)" id="<?php echo $row->c_id; ?>">
                    <a id="" class="program1">
                     <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
                    </a>
                     <div  id="title<?php echo $row->c_id; ?>" class="item-title" style="overflow: hidden;text-overflow:ellipsis; white-space: nowrap; font-size: 14px;"><?php echo $row->channel_title; ?></div>
                     <p> <br/></p>
            
                     </div>
                                                   
                <?php } ?>
                
              </div>
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
   

      <!-- Catalog View -->
      <div id="view-catalog" class="view tab">
        <!-- Catalog page will be loaded here dynamically from /catalog/ route -->
      </div>

      <!-- Settings View -->
      <div id="view-settings" class="view tab">
      
      </div>


      <div class="toolbar tabbar-labels toolbar-bottom">
        <div class="toolbar-inner">
          <a href="#view-home" class="tab-link tab-link-active">
            <i class="f7-icons">house_fill</i>
            <span class="tabbar-label">Home</span>
          </a>
          <a href="#view-catalog" class="tab-link">
            <i class="f7-icons">bubble_left_bubble_right</i>
            <span class="tabbar-label">사연나눔</span>
          </a>
          <a href="#view-settings" class="tab-link">
            <i class="f7-icons" style="font-size: 50px;">play_circle</i>
            <span class="tabbar-label"></span>
          </a>
          <a href="#view-settings" class="tab-link">
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
    <div class="popup" id="prayer-popup">
        <div class="view">
          <div class="page">
            <div class="navbar">
              <div class="navbar-inner">
                <div class="title">기도에 동참</div>
                <div class="right">
                  <a href="#" class="link popup-close">Close</a>
                </div>
              </div>
            </div>
            <div class="page-content">
              <div class="block">
                <p style="color:#05b2fa; font-size: 20px; text-align: center; padding: 15px;"><span id="touch-text" ></span><img style="width: 24px;" src="/images/prayer.png"/></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="login-screen" id="my-login-screen">
        <div class="view">
          <div class="page">
            <div class="page-content login-screen-content">
              <div class="login-screen-title">Login</div>
              <div class="list">
                <ul>
                  <li class="item-content item-input">
                    <div class="item-inner">
                      <div class="item-title item-label">Username</div>
                      <div class="item-input-wrap">
                        <input type="text" name="username" placeholder="Your username">
                      </div>
                    </div>
                  </li>
                  <li class="item-content item-input">
                    <div class="item-inner">
                      <div class="item-title item-label">Password</div>
                      <div class="item-input-wrap">
                        <input type="password" name="password" placeholder="Your password">
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="list">
                <ul>
                  <li>
                    <a href="#" class="item-link list-button login-button">Sign In</a>
                  </li>
                </ul>
                <div class="block-footer">Some text about login information.<br>Click "Sign In" to close Login Screen</div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  
  <script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
  <script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="/assets/green/js/fullclips.js"></script>
  <script type="text/javascript" src="/assets/js/jquery.marquee.min.js"></script>

  <!-- App routes -->
  <script>


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
      <?php if($today[0]->programs->program_info != null) foreach($today[0]->programs->program_info as $item)  echo '"'.$item.'",';?>
       ],
      transitionTime: 3000,
      wait: 10000
    });

       
routes = [
 
{
    path: '/channel/:channelID',
    componentUrl: '/okcn/channel/{{channelID}}',
  },
  {
    path: '/catalog',
    componentUrl: '/okcn/catalog',
  },
  {
    path: '/product/:id/',
    componentUrl: './pages/product.html',
  },
  {
    path: '/settings/',
    componentUrl: '/okcn/catalog',
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

var swiper = app.swiper.create('#autoslider', {
            speed: 1000,
            spaceBetween: 15,
            centeredSlides: true,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            }
        });
// Init/Create views
var homeView = app.views.create('#view-home', {
  url: '/'
});
var catalogView = app.views.create('#view-catalog', {
 // url: '/catalog/'
});
var settingsView = app.views.create('#view-settings', {
 // url: '/settings/'
});

function todayclick(e)
        {
        
          $("#currentImage").attr("src", $(e).find('img:first').attr("src"));
        }



 $$('#prayer-popup').on('popup:opened', function (e) {
   console.log('prayer-popuped');
 txt = $("#prayerspan").text();
 console.log(txt);
 typeWriter();
});

function typeWriter() {
  if (i < txt.length) {
   htmltxt += txt.charAt(i)
   $("#touch-text").html(htmltxt);
    i++;
    setTimeout(typeWriter, 100);
  }
}
  </script>
</body>
</html>
