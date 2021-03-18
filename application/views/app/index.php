<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#f44336">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
    <link rel="stylesheet" href="/assets/bright/css/framework7.ios.css">
    <link rel="stylesheet" href="/assets/bright/css/icons.css">
    <link rel="stylesheet" href="/assets/bright/css/app.css">
    <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />

    <style>
        
    </style>

</head>

<body class="color-theme-pink">
    <div id="app">







        <div class="view view-main view-init ios-edges" data-url="/">
            <div class="page no-navbar">

                <div class="page-content">


                    <div class="block block-no-padding" style="margin: 15px 0">

                        <div class="section" style="border-bottom: 0; padding-bottom: 5px;">
                            <div class="section-content">

                                <div id="autoslider" class="swiper-container swiper-init swiper-container-horizontal" data-slides-per-view="1">
                                    <div class="swiper-wrapper">
                                      
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Categories Section -->
                        <div class="section">

                            <div class="title-section" style="margin: 3px 0;">
                                <div class="title-section-with-link">
                                    <div class="listTitle">今日敬声</div>
                                    <a>
                                        <!-- <h3 style="font-weight: 700; font-size: 16px;"><?php echo date("Y-m-d H:i:s"); ?></h3> -->
                                        <div class="listmore">
                                            <?php echo date("Y-m-d");?>
                                        </div>
                                        
                                    </a>
                                </div>
                            </div>
                            
                            <div class="section-content">
                                <div data-pagination="{&quot;el&quot;: &quot;.swiper-pagination&quot;}" data-space-between="15" data-slides-per-view="3" class="swiper-container swiper-init swiper-container-horizontal">
                                    <div class="swiper-wrapper">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="section">
                            <div class="title-section">
                                <div class="title-section-with-link">
                                    <!-- <h2 style="font-weight: 700; font-size: 24px; color: #333; ">最新精选</h2> -->
                                    <div class="listTitle">最新精选</div>

                                    <a href="/tuijian1/">
                                        <!-- <h3 style="font-weight: 700; font-size: 14px;">更多 》</h3> -->
                                        <div class="listmore">更多&nbsp;<i class="f7-icons">chevron_right</i></div>
                                    </a>

                                </div>
                            </div>
                            <div class="section-content">
                              
                                  
        <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="10" data-slides-per-view="3" class="swiper-container swiper-init demo-swiper">
          <div class="swiper-pagination"></div>
          <div class="swiper-wrapper">
        
        
        </div>



                                </div>
                            </div>
                        </div>



                        <div class="section">
                            <div class="title-section">
                                <div class="title-section-with-link">
                                    <div class="listTitle">敬拜赞美</div>

                                    <a href="/categories1/1">
                                        <div class="listmore">更多&nbsp;<i class="f7-icons">chevron_right</i></div>
                                    </a>

                                </div>
                            </div>
                            <div class="section-content">
                                <div class="row">
                                    
                                   


                                </div>
                            </div>
                        </div> 

                        


                     

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="/assets/bright/js/framework7.min.js"></script>
    
    <script>
    var routes = [
    {
     path: '/channel/:channelID',
     componentUrl: '/okcn/channel/{{channelID}}',
     },
     {
     path: '/catalog',
     componentUrl: '/okcn/catalog',
     }
     ];
        
     var $$ = Dom7;
     var app  = new Framework7({
      root: '#app', // App root element
      id: 'okcn', // App bundle ID
      name: 'Framework7', // App name
      theme: 'auto', // Automatic theme detection

       routes: routes,
       }); 
       
    </script>
</body>

</html>