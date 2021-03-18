<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="theme-color" content="#f44336">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
  <title>OKCN Bible</title>
  <link rel="stylesheet" type="text/css" href="/new/css/player.css" media="screen">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />

  <!-- favicon -->
  <link rel="shortcut icon" href="/new/img/okcn32.png">
<style>
	.ttw-music-player .next:hover,.ttw-music-player .previous:hover,.ttw-music-player .play:hover,.ttw-music-player .pause:hover{
		background-color: #9f1f25;
	}
	.ttw-music-player .progress{
		height: 5px;
	}
			.ttw-music-player .play, .ttw-music-player .pause, .ttw-music-player .previous, .ttw-music-player .next{
				background-color:#386892 ;
				float: left;
			}
			 .tracklist {
				display: none;
			}
			.ttw-music-player {
				margin: 20px auto -10px auto;
			}
			.ttw-music-player .duration-time{
				width: 100%;
				margin: 0;
				padding: 0 25px;
				color: #9f1f25;
			}

.ttw-music-player .next,.ttw-music-player .previous {
	height: 32px;
	width: 32px;

}
.progress {
	background-color: #ddd;
}
.ttw-music-player .elapsed{
	background-color: #9f1f25;
}
.ttw-music-player .player-controls .main {
	float: none;
	height: 30px;
}
.ttw-music-player .progress-wrapper {
	margin: 15px 0 0 0;
	padding: 0px 20px;
	background-color:#efeff4
}
  button:focus{
    outline: 0px;
  }
   a:focus, a:hover {
      text-decoration-line: none;
    }
    .tabbar.toolbar-top a.tab-link-active {
    border-bottom: 2px solid #a82a21;
    font-weight: 700;
    color:#a82a21;
}

.content{
font-size: 24px;
line-height: 30px;
color: #444;

}
.label {
    color: #a82a21;
    font-size: 24px;
    font-family: "Helvetica Neue",Arial,"Liberation Sans",FreeSans,sans-serif;
    font-weight: bold;
    line-height: 1;
    margin-top: 2px;
    margin-left: 4px;
    margin-right: 6px;
}
div.label {
    display: none;
}

sup {
    color: #008000;
}
.notification.modal-in{
  top:110px;
  background-color: #fff;
}
td.verseNumber
	{
		font-size: x-large;
 vertical-align:top;
 color:Blue;
		
		}
	td.verseContent
	{
		font-size: x-large;
letter-spacing: 0.02em;
padding: 1px;
font-family: "Ezra SIL","TITUS Cyberbit Basic","SBL Hebrew","New Peninim MT","Cardo","Arial Unicode MS","New Athena Unicode", "Gentium", "Palatino Linotype", "Lucida Grande", "Galilee", "Arial Unicode MS", "sans-serif";
		}
.tablefloat {
float: left;

margin: 0px;
}
.floatLeft
{
	float: left;
margin: 4px;
	font-size: 20px;
	}
	
	.eng
	{
		font-size:16px;
		color: #b35a33;
		}
	.ps
	
	{font-size:14px;
		color: Green;
		
		}
span.heading
{
	font-size: 20px;
	}
span.reftext
{
	font-size: 16px;
	
  }
  .note {
    display: none;
}
   .loading{
     width: 100px;
     margin-top: 100px;
   }
.topbuttondiv{
  background-color: #fff; border-radius: 5px; padding:5px 10px; box-shadow:2px 2px 4px #aaa;
}
.topbuttondiv a{
  width: 100px; font-size: 20px; color: #a82a21; font-weight: 700;
}
.topbuttondiv i {
  font-size: 14px; float: right; margin-top: 7px;
}
</style>
</head>
<body style="background-color: #efeff4;">
<div id="app">
	<div class="appbar" style="height: 61px; background-color: #9f1f25;">
		<div class="appbar-inner">
			<div class="left">
				<a class="link external"  href="<?php echo base_url() ?>" style="margin-top: 15px; ">
					<img src="/new/img/albums/logo_white.png" style=" max-height: 50px; margin-left: 10px;" >
				</a>
				<a href="#" style="margin-left: 15px; color: #efeff4; font-size: 22px; font-weight: 800; margin-top: 20px;">
					다국어 성경
				  </a>
				
			  </div>
		  <div class="right">
			<a href="#" class="button button-small panel-toggle display-flex" data-panel="right" style="color: #efeff4; margin-top: 20px;">
			  <i class="f7-icons" style=" font-size:40px;">bars</i>
			</a>
		  </div>
		</div>
	  </div>
	  <div class="panel panel-right panel-cover panel-init">
		<div class="block">
			<div class="list links-list">
				<ul style="color:#9f1f25; font-weight: 400;">
				  <li><a class="link external" href="<?php echo base_url() ?>">OKCN Radio 홈</a></li>
				  <li><a class="link external" href="https://www.cornerstone.or.kr/">모퉁이돌 선교회</a></li>
				  <li><a class="link external" href="https://www.uscornerstone.org/offering">헌금</a></li>
				</ul>
			  </div>
		</div>
	  </div>
<div id="bibleview" class="view view-main view-init">
<div class="page">

	
					<table style="position:relative; z-index: 100; width: 100%; background-color: #efeff4;">
						<tr>
						  <td style="width: 50%; text-align: center; padding: 0px 5px 10px 10px;">
							<div class="topbuttondiv">
							<a id="bbn" href=""   >Bible</a><i class="f7-icons" >chevron_down</i>
						  </div>
						  </td>
						  <td style="width: 50%; text-align: center; padding: 0px 10px 10px 5px;">
							<div class="topbuttondiv">
							<a id="bvn"   href="/bibleversionlist/">Version</a>
							<i class="f7-icons" style="">chevron_down</i>
						  </div>
						  </td>
						</tr>
					  </table>
			
						<div class="page-content" style="background-color:#efeff4; padding-top:0px ; ">
							<div class="main-player"></div>
						 <div class="block" style="margin-top: 0px;">
						  
						  <div class="row"  style="text-align: center;font-size: 50px;   margin-bottom: 20px;">
							<div class="col-20"> </div>
							<div class="col-60" style="font-size: 20px;"> 
							  <span id="pbbn" style="font-size: 24px; margin-top:0px; color: #386892;"></span></div>
							<div class="col-20"></div>
						  </div>
						 
						  <div id="bibleChapter" >
							
						  </div>
						 
						  <br/><br/><br/>
						 <center> <a id="kakao-link-btn" href="javascript:;"><img src="/images/kakaobibleshare.png" style="max-width: 300px; width: 80%;"  /> </a></center>
						 <br/><br/><br/>
						 <br/><br/><br/>
						</div>
						</div>
					 
					
					  
					

</div>		
</div>
</div>
		
	

         

<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
<script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/new/js/libs/jquery.jplayer.js"></script>
<script type="text/javascript" src="/new/js/libs/ttw-music-player-bible.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>

<script>
 Kakao.init('e2bbd49016dd2187797833ebb907dab9');
var bid = '<?php echo $bid."-".$cid;?>';
var bvs = '<?php echo $bvs?>';
var bbn = '<?php echo $bbn?>';
var bvn = '<?php echo $bvn?>';
var vid = '<?php echo $vid?>';
var blang = '<?php echo $blang?>';
var chid = <?php echo $cid?>;
var bbid = <?php echo $bid?>;
var ot = <?php echo $ot?>;
var nt = <?php echo $nt?>;
var description = '';
var current = 10;


Kakao.Link.createDefaultButton({
      container: '#kakao-link-btn',
      objectType: 'feed',
      content: {
           title: 'OKCN Radio 다국어 오디오 성경입니다.',
           description:'',
            imageUrl: '<?php echo $image;?>',
            imageWidth:80,
            imageHeight:60,
			link: {
      mobileWebUrl: 'http://okcnradio.org',
	  webUrl: 'http://okcnradio.org'
    },
      },
             
      
       buttons: [
        {
          title: '성경듣기',
          link: {
    
            mobileWebUrl: 'http://okcnradio.org/home/bible/' + vid + '/' + bbid + '/' + chid,
			webUrl: 'http://okcnradio.org/home/bible/' + vid + '/' + bbid + '/' + chid
          }
        }
      ]
    });
var app = new Framework7({
  root: '#app',

  routes:[
    {
    path: '/biblebooklist/:blang/:ot/:nt',
    componentUrl: '/app/biblebooklistweb/{{blang}}/{{ot}}/{{nt}}',
    options: {
      animate: true
    }

  },
  {
    path: '/bibleversionlist/',
    componentUrl: '/app/bibleversionlistweb',
    options: {
      animate: false
    }

  }
  ]
});
$(function() {
	
    setTimeout(function(){ getbible(); }, 100);

    if (app.device.ios) 
  {
   $(".navbars").removeClass("navbar-hidden");
  }

  $('.main-player').ttwMusicPlayer(myPlaylist, {currentindex:<?php echo strval(intval($cid) - 1);?>,
	  
				jPlayer:{}
			});
		//	$('.jp-next').attr('onClick', 'nextchapter()');
		//	$('.jp-previous').attr('onClick', 'previouschapter()');


});
var mainView = app.views.create('.view-main', {

	dynamicNavbar: true,
});

//initpage();


function playBibleAudio()
{
  var str = vid+'/'+bbid+'/'+chid;
 

  if (app.device.android) 
  {
    Android.playBibleAudio(str);
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage(str);
    }

}




  function backtobible(e)
  {
   var res = e.split("#");
   bbn = res[0];
   bid = res[1];
   var rres = bid.split("-");
   bbid = rres[0];
   chid = rres[1];
   mainView.router.back();
   window.location = "http://okcnradio.org/home/bible/" + vid + "/" + bbid + "/" + chid;
  }



  function version2bible(e)
  {
   var res = e.split("-");
   bvn = res[0];
   blang = res[1];
   ot = res[2];
   nt = res[3];
   bvs = res[4];
   vid = res[5];
   bbid = bid.split("-")[0];
   if(ot==0 && nt==1 && bbid < 40)
   {
     bid = '40-1';
     bbid = 40;
     chid = 1;
     bbn = 'Matthew';
   }
   if(ot==1 && nt==0 && bbid > 39)
   {
     bid = '1-1';
     bbid = 1;
     chid = 1;
     bbn = 'Genesis';
   }
  
  
   mainView.router.back();
   getbiblefromversion();
  
  }
function getbible()
{
  $('#bibleChapter').html('<center><img class="loading" src="/images/loading.gif" ></center>');
  app.request.get('/html/bible/' + bvs + bid + '.html', function (data) {
  $('#bibleChapter').html(data);
   initpage();
   })
}
 
function getbiblefromversion()
{
	window.location = "http://okcnradio.org/home/bible/" + vid + "/" + bbid + "/" + chid;
 // $('#bibleChapter').html('<center><img class="loading" src="/images/loading.gif" ></center>');
 // app.request.get('/html/bible/' + bvs + bid + '.html', function (data) {
 // $('#bibleChapter').html(data);
 // initpagefromversion();
 //  })
}
  function initpage(){
  
    $('#bbn').html(bbn + '&nbsp;&nbsp;' + chid);
    $('#pbbn').html(bbn + '&nbsp;&nbsp;' + chid);

   bvn = getfirst10(bvn);
    $('#bvn').html(bvn);
    $("#bbn").attr("href", "/biblebooklist/" + blang + "/" + ot + "/" +nt);

    supclick();

 
}

function initpagefromversion(){
    app.request.get('/app/getbookname/' + bbid + '/' + blang , function (data) {
      $('#bbn').html(data + '&nbsp;&nbsp;' + chid);
    $('#pbbn').html(data + '&nbsp;&nbsp;' + chid);
    });
    bvn = getfirst10(bvn);
    $('#bvn').html(bvn);
    $("#bbn").attr("href", "/biblebooklist/" + blang + "/" + ot + "/" +nt);

    supclick();
}
function getfirst10(str)
{
  var maxlength = 12;
  if(blang=='ko')
  {
    maxlength = 7;
  }
  if(str.length > maxlength) {
    return str.substring(0,maxlength) + '...';
  } else 
  {
    return str;
  }
  
}
function supclick()
{
  if($('sup').length){
  $('sup').on('click', function (e) {
     var strong = $(e.target).html();
      app.request.get('/html/dict/strongs/' + strong + '.html', function (data) {
        var notificationWithButton = app.notification.create({
  icon: '<i class="f7-icons">book_circle_fill</i>',
  title: 'Strongs Bible Dictionary',
  subtitle: strong ,
  text: data,
  closeButton: true,
       });
       notificationWithButton.open();
      })
     
     });
}
}
function nextchapter()
{
  chid = chid + 1;
  bid = bbid + '-' + chid;
  getbible();
}
function previouschapter()
{
  if(chid > 1)
  {
    chid = chid - 1;
  bid = bbid + '-' + chid;
  getbible();
  }
 
}

var myPlaylist = [    
		   <?php   foreach($audios as $row){?>
		   {
			   mp3:'<?php echo $row["mp3"];?>'
		   }
		   ,
		   <?php }?>	   
		   ];
</script>

</body>
</html>
