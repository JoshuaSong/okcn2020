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
<script>

     var plarray=<?php echo $playlist; ?>;
     var start=<?php echo $starting;?>;
     var pid=<?php echo $first->p_id;?>;
     var c_id=<?php echo $first->c_id;?>;
     var nowtime,pausetime;
     var pauses=true;
     var load=0;
     var snsshow=false;
     var firstplaystatus=true;
  //   var d = new Date()
     //var n = d.getTimezoneOffset();
     $(document).ready(function() 
        {
        	
        	
        //	getnowseconds();
        //	getpauseseconds();

         $.slidebars();
         playlisting();
         pauses=false;
        
           });
function firstplay()
{
	$("#jquery_jplayer_1").jPlayer("play");
	//pauses=false;
}
           
function webpostRID(e)
{
	$.get("/users/postgcmid/"+e);
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
		
		
		//firstplaystatus=false;
	
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
		AndroidFunction.firstplay();
		});
		
     $("#jquery_jplayer_1").bind($.jPlayer.event.play, function() {
     	$('#playbtn').hide();
     	$("#pausebtn").show();
     	$.get("/users/pt/"+pid);
     	});
      $("#jquery_jplayer_1").bind($.jPlayer.event.pause, function() {
      	$("#playbtn").show();
	    $("#pausebtn").hide();
	    AndroidFunction.notplaying();
     });
     
}
    function play()
    {
    	if(pauses==true)
    	{
    		 $('#playbtn').css('background-image', 'url(/src/images/trans.png)');
   
    	getnowseconds()
    	 if(nowtime-pausetime > 60)
      {
  	     
  	      setTimeout(function() {
  	      	 $("#playbtn").css('background-image','');
         	 AndroidFunction.reload();
        
    }, 300);
       }
       else
       {
       
       	  setTimeout(function() {
         	$("#jquery_jplayer_1").jPlayer("play");
         $("#playbtn").css('background-image','');
    }, 300);
       	pauses=false;
       }
    	}

    }
    
    
    function pause(){
    getpauseseconds();
    $('#pausebtn').css('background-image', 'url(/src/images/trans.png)');
    setTimeout(function() {
         $("#jquery_jplayer_1").jPlayer("pause");
         $("#pausebtn").css('background-image','');
    }, 300);
    pauses=true;
    }
    
    function getnowseconds()
    {
    	var now = new Date();
    	nowtime=Math.floor(now.getTime()/1000);
    	
    }
        function getpauseseconds()
    {
    	var now = new Date();
        pausetime=Math.floor(now.getTime()/1000);
    	
    }
function menuclick(e)
{
	commHide()
	$("#footer").hide();
	$("#onairTable").hide();
	$.get( "/vou/c/"+e, function( data ) {
                       $( "#channelDiv" ).html( data );});
    $("#posterImg").attr("src",($("#c"+e).attr("poster")));
  $("#jquery_jplayer_1").jPlayer("destroy");
}

    function onair()
    {
    	
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
    	AndroidFunction.loadoneprogram('http://members.eprayerapp.com/mauth/site_signup/vouapp/<?php echo $this->session->userdata('user_id');?>');
   <?php endif ?>
    }
    function getcomm(e)
    {
    	$.get("/users/commentlist/"+e,function(data){
    		$("#commDiv").html(data);
    	});
    }
    
    function sharewithkakao(e)
    {
    	$.get("/users/ps/"+e+"/kakao");
    }
    function trclick(e)
	{
		 AndroidFunction.loadoneprogram('http://okcnradio.org/vou/papp/'+e);
		
	}
	function onair()
    {
    	
    	AndroidFunction.reload();
    }
     function signup()
        {
        	 AndroidFunction.loadoneprogram('http://members.eprayerapp.com/mauth/site_signup/vouapp/<?php echo $this->session->userdata('user_id');?>');
        }
    </script>

  </head>

		