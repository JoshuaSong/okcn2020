<html>
  <head>
    <title>VOU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Latest compiled and minified CSS -->
   <meta property="og:image" content="<?php echo $first->channel_poster;?>"/>
	<meta property="og:title" content="통일의 소리 방송입니다." />
	<meta property="og:description" content="《<?php echo $first->channel_title;?>》" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="/src/css/slidebars.css">
<link rel="stylesheet" href="/src/css/mystyle.css">
<link href="/src/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />



	 <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="/src/js/jquery-2.1.3.min.js"></script>
	<script src="/src/js/slidebars.min.js"></script>
	<script type="text/javascript" src="/src/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/js/jplayer.playlist.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114703738-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

gtag('config', 'UA-114703738-1');


     var plarray=<?php echo $playlist; ?>;
     var start=<?php echo $starting;?>;
     var pid=<?php echo $first->p_id;?>;
     var c_id=<?php echo $first->c_id;?>;
     var nows;
     var pauses;
     var load=0;
     var snsshow=false;
     var d = new Date()
     var n = d.getTimezoneOffset();
     $(document).ready(function() 
        {
        	$.get("/users/touchweb/1/"+n);
        	getnowseconds();
        	getpauseseconds();

         $.slidebars();
         playlisting();
           setTimeout(function() {
         $("#jquery_jplayer_1").jPlayer("play",start);
          }, 1000);
           });

function playlisting()
{

	 var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"	}, 
		plarray, 
		{supplied: "mp3",
		useStateClassSkin: true	});

	$("#jquery_jplayer_1").bind($.jPlayer.event.loadedmetadata, function() { 
		$("#titleTD").html($("#jp_audio_0").attr("title"));
		$("#posterImg").attr("src",$("#jp_poster_0").attr("src"));
		var arr=$(".jp-artist").eq(load).html().split('_');
		var tar=arr[1].split(' ');
		var arr1=$(".jp-artist").eq(load+1).html().split('_');
		var tar1=arr1[1].split(' ');
		
		$("#timeTD").html(tar[1].replace(':00','')+'--'+tar1[1].replace(':00',''));
		$("#actorTD").html(arr[0].replace('by ',''));
		if(load!=0){
			start=0;
			getnowseconds();
		}
		load=load+1;
		});
		
     $("#jquery_jplayer_1").bind($.jPlayer.event.play, function() {
     	$('#playbtn').hide();
     	$("#pausebtn").show();
     	$.get("/users/pt/"+pid);
     	});
      $("#jquery_jplayer_1").bind($.jPlayer.event.pause, function() {
      	$("#playbtn").show();
	    $("#pausebtn").hide();
     });
     
}
    function play()
    {
    	var newps=pauses;
    	getpauseseconds();
    	 if(pauses-newps > 60)
      {
  	     location.replace('http://okcnradio.org/vou');
       }
    	var news=nows;
    	getnowseconds();
        start=start+nows-news;

      $('#playbtn').css('background-image', 'url(/src/images/trans.png)');

         setTimeout(function() { 
    	     $("#jquery_jplayer_1").jPlayer("play",start);
    	     $('#playbtn').css('background-image', ''); 
    	 }, 300);

    }
    
    
    function pause(){
    getpauseseconds();
    $('#pausebtn').css('background-image', 'url(/src/images/trans.png)');
    setTimeout(function() {
         $("#jquery_jplayer_1").jPlayer("pause");
         $("#pausebtn").css('background-image','');
    }, 300);
    }
    
    function getnowseconds()
    {
    	var d=new Date();
    	var m=d.getMinutes();
    	var s=d.getSeconds();
    	nows=m*60+s;
    }
        function getpauseseconds()
    {
    	var d=new Date();
    	var m=d.getMinutes();
    	var s=d.getSeconds();
    	pauses=m*60+s;
    }
     function trclick(e)
	{
		
		location.replace('http://okcnradio.org/vou/p/'+e);
	}
	function onair()
    {
    	location.replace('http://okcnradio.org/vou');
    	
    }
   
     function live()
    {
    	location.replace('http://okcnradio.org/vou/live');
    	
    }
     function signup()
        {
           }
        
<?php $this->load->view('/includes/vou_common_script');?>
    
    </script>

  </head>

		