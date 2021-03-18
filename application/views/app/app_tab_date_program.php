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
  #overlay {
    position: absolute;
    left: 20%;
    top: 0;
    right: 0;
    width: 80%;
    bottom: 0;

    background:black;
    background:rgba(0,0,0,0.8);

    filter: blur(10px);
    -webkit-filter: blur(10px);
    -moz-filter: blur(10px);
    -o-filter: blur(10px);
    -ms-filter: blur(10px);
}
#blurimg {
    
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px) grayscale(50%);
}
.dateli {
 padding: 10px 10px 10px 70px;
 background-color: #eee;
 color: #9f1f24;
 font-size: 24px;
 font-weight: 400;

}
    </style>

</head>

<body class="color-theme-pink">
<div id="app">
<div class="view view-main view-init">



<div class="page">
<div class="navbar" style="background-color:#9f1f24;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back"  onclick="closechannel()">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
    <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" >날짜별 다시듣기</div>
              
   </div>
</div>
  
	<div id="channelcontent" class="page-content  ptr-content ptr-bottom" style="padding-top: 60px;">				
  <div class="list media-list" style="margin-top: 0px;">
  
  <ul id="channelul">
    <li class="dateli"><?php $cdate = $programs[0]->program_date; echo date("Y-m-d (D)", strtotime($cdate));?></li>
  <?php foreach($programs as $row) { ?>
    <?php if ($row->program_date != $cdate) { $cdate = $row->program_date; ?>
      <li class="dateli"><?php echo date("Y-m-d (D)", strtotime($cdate));?></li>
      <?php }?>
    <li onclick="playthisprogram('<?php echo $cdate;?>')">
      <a class="item-link item-content" >
        <div class="item-media">
          <img src="/images/playbutton1.png" style="width: 40px;margin-left:20px;"/>
        </div>
        <div class="item-inner">
         
            <div class="item-text" style="font-size:14px; padding-right: 15px;"><?php echo '['.$row->channel_title.']<br>'.$row->program_title;?></div>
            
          
         
        </div>
      </a>
    </li>
	<?php }?>



  </ul>
   </div>
   
</div>
</div>
</div>
<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>

<script>
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
   function playthisprogram(e)
   {
   
    
     if (app.device.android) 
  {
    Android.playthisdateprogram(e);
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("oneprogramdateios/" + e);
    }
   }
</script>
 
</body>

</html>