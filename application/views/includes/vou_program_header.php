<html>
  <head>
    <title>VOU</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
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
        	//$.get("/users/touchweb/"+pid+"/"+n);
        	<?php if(!$this->session->userdata('user_id')||$this->session->userdata('user_id')==0) {;?>
			$.get("/users/inster_user_id");	
		<?php }else {?>
		$.get("/users/user_login/"+n+"/"+pid);
		
		<?php }?>
        $(".onair").hide();
        $(".program").show();
         $.slidebars();
         playlisting();
           setTimeout(function() {
         $("#jquery_jplayer_1").jPlayer("play");
          $.get("/users/pt/"+pid);
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
		$("#actorTD").html(arr[0].replace('by ',''));
		
		
		});
		
     $("#jquery_jplayer_1").bind($.jPlayer.event.play, function() {
     	$('#playbtn').hide();
     	$("#pausebtn").show();
       // alert(pid);
     	$.get("/users/pt/"+pid);
     	});
      $("#jquery_jplayer_1").bind($.jPlayer.event.pause, function() {
      	$("#playbtn").show();
	    $("#pausebtn").hide();
     });
     
}
    function play()
    {
    	  $("#jquery_jplayer_1").jPlayer("play");
    }
    
    
    function pause(){
    	
   $("#jquery_jplayer_1").jPlayer("pause");
   
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
        //	window.location.href='http://members.eprayerapp.com/mauth/site_signup/vou/';
        }

    
    
    
<?php $this->load->view('/includes/vou_common_script');?>
    
    </script>

  </head>

		