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
	<link href="/src/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
	 <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="/src/js/jquery-2.1.3.min.js"></script>
	<script src="/src/js/slidebars.min.js"></script>
	<script type="text/javascript" src="/src/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="/src/js/jplayer.playlist.min.js"></script>
<script>

     var plarray=<?php echo $playlist; ?>;
     var start=<?php echo $starting;?>;
     var pid=<?php echo $first->p_id;?>;
     var c_id=<?php echo $first->c_id;?>;
     var nows;
     var pauses;
     var load=0;
     var snsshow=false;
     $(document).ready(function() 
        {
        	
        	getnowseconds();
        	getpauseseconds();

         $.slidebars();
         playlisting();
           setTimeout(function() {
         $("#jquery_jplayer_1").jPlayer("play",start);
          }, 1000);
           });
function menuclick(e)
{
	commHide()
	$("#footer").hide();
	$("#onairTable").hide();
	$.get( "vou/c/"+e, function( data ) {
                       $( "#channelDiv" ).html( data );});
    $("#posterImg").attr("src",($("#c"+e).attr("poster")));
  $("#jquery_jplayer_1").jPlayer("destroy");
}

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
		var arr=$(".jp-artist").eq(load).html().split(' ');
		var tar=arr[3].split(':');
		var arr1=$(".jp-artist").eq(load+1).html().split(' ');
		var tar1=arr1[3].split(':');
		
		$("#timeTD").html(tar[0]+':'+tar[1]+'--'+tar1[0]+':'+tar1[1]);
		$("#actorTD").html(arr[1]);
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
  	     location.replace('http://okcnradio.org/');
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
    function onair()
    {
    	location.replace('http://okcnradio.org/');
    }
    function sharesns(e)
    {
 
    $(".commshow").hide();
    $(".commhide").show();
    $("#snsdiv").slideToggle();
   
  
    }
    function snshide()
    {
  
    $("#onairTable").show();
    $("#snsdiv").hide();
    }
    function commclick()
    {
    	$(".commshow").toggle();
    	$(".commhide").toggle();
    	
    	getcomm(c_id);
    }
     function commShow()
    {
    	$("#posterImg").hide();
    	$("#onairTable").hide();
    	$("#comm_input_div").show();
    	$("#comm_tr").show();	
    	$("#commDiv").show();
    }
     function commHide()
    {
    	$(".commshow").hide();
    	$(".commhide").show();
    }
    
    function commpostclick()
    {
    	<?php if ($this->session->userdata('user_name')): ?>
    	//alert("OK");
    	var commval=$("#comminput").val();
    	$.post( "users/commentpost", {cid:c_id,comm:commval}, function( data ) {
    
     $("#comminput").val("");
        });
         <?php endif ?>
    }
    function commoninputclick()
    {
    	<?php if (!$this->session->userdata('user_name')): ?>
    	alert("로그인 혹은 회원가입을 하셔야 사연을 올릴수 있습니다");
    	location.replace('http://members.eprayerapp.com/mauth/site_signup/vou/<?php echo $this->session->userdata('user_id');?>');
   <?php endif ?>
    }
    function getcomm(e)
    {
    	$.get("users/commentlist/"+e,function(data){
    		$("#commDiv").html(data);
    	});
    }
    
    function sharewithkakao(e)
    {
    	$.get("users/ps/"+e+"/kakao");
    }
    
    </script>


<style>
    	#footer{
    position:fixed;
    left:0px;
    bottom:0px;
    height:100px;
    width:100%;
    background-image: url(/src/images/tbg.png);
    background-repeat: repeat;
    z-index: 10;
    
}
.jp-video-270p {
width: 100%;
}
.jp-playlist li
{
	display: none;
}
#shareTd:hover
{

}
.navbar-default {
  background-color: #E83165;
  border-color: #E83165;
}
.commtalbe
{
	width:100%;
}

.commtalbe td
{
	padding: 5px; color:#555555;
}
.commtalbe tr.odd{
	background: #b8d1f3;
}

.commtalbe tr.even
{
	background: #dae5f4;
}
.namespan {
	color:#00609E; font-weight: 700; padding-right: 10px;
}
.timespan{
	font-size: 10px; color:#555555; padding-left: 5px;
}
.timeimg{
	width: 10px;
}
    </style>
  </head>

  <body style="">
  	<!-- Navbar -->
  	<?php $this->load->view('/includes/nav_header');?>
		