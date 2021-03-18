<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="theme-color" content="#f44336">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

  <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />
  
<style>
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
  width: 100px; font-size: 18px; color: #a82a21; 
}
.topbuttondiv i {
  font-size: 14px; float: right; margin-top: 7px;
}
</style>
</head>
<body style="background-color: #eee;">
<div id="app">
<div id="bibleview" class="view view-main view-init">
  <div class="page">
      <?php $data['title']='성경';   $this->load->view('/app/page_navbar',$data);?>

<table style="position:relative; z-index: 100; width: 100%; top:58px;background-color: #eee;">
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

  <div class="page-content" style="margin-top:50px; background-color: #eee; padding-top:0px ; ">
   <div class="block" style="margin-top: 0px;">
    
    <div class="row"  style="text-align: center;font-size: 50px; margin-top:10px; border-bottom: 1px solid #386892; margin-bottom: 20px;">
      <div class="col-20"> <button class="button" style="height: 60px;" onclick="previouschapter()"><i class="f7-icons" style="font-size: 30px; color: #bbb; margin-top: 15px;">chevron_left_circle</i></button></div>
      <div class="col-60" style="font-size: 20px;">  <button class="button" style="height: 60px;" onclick="playBibleAudio()"><img style="width: 50px;" src="/images/playbutton2.png"></button> 
        <span id="pbbn" style="font-size: 28px; margin-top:-10px; color: #386892;"></span></div>
      <div class="col-20"><button class="button" style="height: 60px;" onclick="nextchapter()"><i class="f7-icons" style="font-size: 30px; color: #bbb; margin-top: 15px;">chevron_right_circle</i></button></div>
    </div>
    <div id="bibleChapter">
      
    </div>
    <br/><br/><br/><br/><br/><br/>
  </div>
  </div>
</div>




  </div>
  </div>
  </div>


         

<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
<script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>


<script>
  var bid = '40-1';
var bvs = 'ko/snr/';
var bbn = '마태복음';
var bvn = '모퉁이돌 북한어성경(신약)';
var vid = '11';
var blang = 'ko';
var chid = 1;
var bbid = 40;
var ot = 0;
var nt = 1;
var app = new Framework7({
  root: '#app',

  routes:[
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

  }
  ]
});
$(function() {
    setTimeout(function(){ getbible(); }, 100);

    if (app.device.ios) 
  {
   $(".navbars").removeClass("navbar-hidden");
  }
});
var mainView = app.views.create('.view-main', {

	dynamicNavbar: true,
});

//initpage();


function playBibleAudio()
{
  var str = vid+'/'+bbid+'/'+chid;
 // bibleTouch();

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
  getbible();
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
  $('#bibleChapter').html('<center><img class="loading" src="/images/loading.gif" ></center>');
  app.request.get('/html/bible/' + bvs + bid + '.html', function (data) {
  $('#bibleChapter').html(data);
  initpagefromversion();
   })
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
 // bibleTouch();
}
function previouschapter()
{
  if(chid > 1)
  {
    chid = chid - 1;
  bid = bbid + '-' + chid;
  getbible();
//  bibleTouch();
  }
 
}

function gotochapter(e)
{
  chid = e;
  bid = bbid + '-' + chid;
  getbible();
}
function bibleTouch()
{
  var str = vid+'/'+bbid+'/'+chid;
  app.request.get('/home/touchBible/' + str);

}

</script>

</body>
</html>
