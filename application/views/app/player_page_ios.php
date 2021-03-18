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

<title>playpage</title>
   

    <style>
       
       .ios .navbar{
        background:#9f1f24 !important;
       }
        .ios .title-section-with-link a {
            color: #950E4A;
        }

        .ios .navbar {
            background: #eee;
            height: 60px;
        }

        .ios .navbar a.link {
            justify-content: center;
        }
        .ios .color-theme-pink .button{
            color:#343434;
        }
        .ios .list{
            margin-top:0px;
        }
        .ios .list .item-content{
            min-height:66px;
        }
        .ios .button{
            line-height:29px;
        }
        .row{
            margin:0px;
        }
        .channeBg{
           
            overflow:hidden;
           
            
        }
       #tab-2 img{
        width:100%;
       }
        .channeBg .img{
            width:100%;
            height: 60vw;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .channeBg .playTime{
            position:absolute;
            bottom:5px;
            right:15px;
            color:#ffffff;
            display: flex;
            align-items: center;
        }
        .channeBg .playTime svg{
            margin-right:5px;
        }

        .channelControl{
            display:flex; 
            font-size:12px;
            padding:30px 15px 10px; 
            align-items:center;
        }
        .channelControl .left a{
            border-radius:3px;
            background-color:#f5f5f4;
            border:none;
            color:black;
        }
        .channelControl .left a svg{
            fill:#323332;
        }
        .channelControl .right{
            display:flex;
            justify-content:space-around;
            color:#636363;
        }
        .channelControl .right .iconList{
            fill:#636363;
        }
        a {text-decoration: none !important;}
        .ios .tabbar .toolbar-inner,.ios .tabbar-labels .toolbar-inner 
        {
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .ios .tabbar a.tab-link,.ios .tabbar-labels a.tab-link,.ios .tabbar a.link,.ios .tabbar-labels a.link
        {
           width: auto;
          min-width: 45px;
        }
        .ios .tabbar-labels {
           height: 56px;
        }
         .ios .tabbar-labels .tabbar-label {
             font-size: 14px;
         }

         .toolbar.toolbar-top 
         {
             border-bottom: 0;
        }

        .ios .toolbar {
            top:10px !important;
            background-color: #eee;

}
.ios .toolbar:before {
    height: 0px;
}

.tabbar a.tab-link, .tabbar-labels a.tab-link, .tabbar a.link, .tabbar-labels a.link {
    height: auto;
}
.tabbar .tab-link-active{
 color:#9f1f24 !important;
 font-weight: 800;
 font-size: 24px;
 margin: 10px;
 border-bottom: #9f1f24 solid 3px;
}
.tabbar a{
  color: #9f1f24;
  font-weight: 400;
  font-size: 22px;
  margin: 10px;
}
    </style>

</head>

<body class="color-theme-pink">
<div id="app">
<div class="view view-main view-init" data-url="/">
            <div class="page">
            <div class="navbar" style="background-color:#9f1f24;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back"  onclick="closechannel()">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" ><?php echo $channel->channel_name;?></div>
              
   </div>
</div>

                <div class="page-content">   

          <div style="width: 100%; position: fixed;z-index: 10;">            

 <div class="ios toolbar tabbar toolbar-top">
    <div class="ios toolbar-inner" style="margin-top: 9px;">
      <a href="#tab-1" class="tab-link tab-link-active">방송</a>
      <a href="#tab-2" class="tab-link">문서</a>
      <!--
      <a href="#tab-3" class="tab-link">留言</a>
-->
    </div>
  </div>
</div>  
  <div class="tabs-swipeable-wrap">
    <div class="tabs">
      <div id="tab-1" class="page-content tab tab-active">
        <div class="block" style="margin-top: 50px;">
        <div class="channeBg">
          <center>
            <img src="<?php echo $channel->category_image;?>" style=" border-radius: 7px; margin: 0px 30px; width:80%;box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important ">
                          
                       
                          <table style="margin:30px 0px; width: 80%; "><tr>
                              <td>
                                <p style="font-size: 18px; font-weight: 600;">《<?php echo $channel->channel_name;?>》 </p> 
                                  <p style="font-size: 20px; font-weight: 300;"><?php echo $channel->radio_name;?></p>
                                <span  style="font-size: 20px; font-weight: 300;"><?php echo $channel->program_date;?></span>
                                </td>
                                  <td style="vertical-align: middle;"> </td>
                          </tr></table>
          </center>
          <!--
                          <p class="segmented segmented-strong" style="display: hide;">
<button class="button button-active" speed="1">1배속</button>
<button class="button"  speed="1.5">1.5배속</button>
<button class="button"  speed="2">2배속</button>

<button class="button" speed="2.5">2.5배속</button>
<button class="button" speed="3">3배속</button>

<span class="segmented-highlight"></span>
</p> 
-->                      
          </div>                                                      
                
                      
           
        </div>
      </div>
      <div id="tab-2" class="page-content tab ">
      <div class="block" style="padding: 0 30px;margin-top: 80px;">
        
        <?php echo $channel->description?>
        
                        
                       
        </div>
      </div>
      
    </div>
  </div>








                </div>

            </div>
        </div>        
    </div>
    <script src="/bright/js/framework7.min.js"></script>
    <script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>
  
<script>
var app = new Framework7({root: '#app'});
$(document).ready(function(){
  $("button").click(function(){
    $("button ").removeClass("button-active");
    $(this).addClass("button-active");
    Android.playspeedwith($(this).attr("speed"));
   
  });
});
        function playthisprogram(pid) {
        
                Android.playthisprogram(pid);
          
        }
  function closechannel()
   {
   

    webkit.messageHandlers.callbackHandler.postMessage("closeplayer");
   
   }
    </script>
</body>

</html>