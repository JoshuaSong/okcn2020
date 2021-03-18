<html class="sb-init">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
    <title>VOU Program</title>
   
    <link rel="stylesheet" href="/src/css/bootstrap.min.css">
     <link rel="stylesheet" href="/src/css/slidebars.css">
   <link rel="stylesheet" href="/src/css/mystyle.css">
    <link href="/src/css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
     <script src="/src/js/jquery-2.1.3.min.js"></script>
     <script type="text/javascript" src="/src/js/jquery.jplayer.min.js"></script>
     <script src="/src/js/slidebars.min.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
    if(window.location.hash) {
      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      alert (hash);
      // hash found
  } else {
      // No hash found
  }
    var status="pause";
      $(document).ready(function(){
      	 $.slidebars();
      	playing();
      }); 
     function btnclick()
     {
    
     	if(status=="playing")
			{
				
			 $("#programplayer").jPlayer("pause");
			 $("#btnimg").attr("src","/src/images/play.png");
			 $.get("/users/pt/<?php echo $program->p_id;?>");
			 status="pause";
			}
			
			else if(status=="pause")
			{
			 $("#programplayer").jPlayer("play");
			 $("#btnimg").attr("src","/src/images/pause.png");
			 status="playing";
			}
     }
      function playing(){
      	 $("#programplayer").jPlayer({
        ready: function () {
                        $(this).jPlayer("setMedia", {
                            mp3:'<?php echo $program->program_url;?>'
                        });
                    },
                    supplied: "mp3",
                    cssSelectorAncestor: "#programplayer_container",
                    useStateClassSkin: true
                });
          $("#programplayer").bind($.jPlayer.event.loadedmetadata, function() { 
          	$("#btnimg").attr("src","/src/images/play.png");
          	
          	});
           
      }
   
    	function gotohome()
    	{
    		window.location.href='http://okcnradio.org/';
    	}
    	function menuclick(e)
{
	window.location.href='http://okcnradio.org/vou#'+e;
}

    </script>
  </head>
  <body>
 <?php $this->load->view('/includes/nav_header');?>
  	<center>
  		   	 <div class="sb-slidebar sb-left" >
      <nav>
		<ul class="sb-menu">
			<li onclick="onair()"><img src=""  alt="" height="40"><img src="/src/images/onair.png"></li>
				<?php echo $channels; ?>
			
		</ul>
		<br/>
	</nav>
    </div>
    <div id="sb-site">
 
    	<center>
    <div id="poster" style="width: 100%; max-width: 480px; min-height: 900px;  background-image: url(/src/images/tbg.png);background-repeat: repeat" >
    
    	<div style="width: 100%; " >
    		<image id="posterImg" src="<?php echo $program->channel_poster;?>" style=" width: 100%; ">
    	</image></div>
    	    <div id="programplayer_container" class="jp-video" role="application" aria-label="media player">
	<div class="jp-type-playlist">
	<div id="programplayer" class="jp-jplayer" style="display: none"></div>
		<div class="jp-gui">
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">	
						<div class="jp-play-bar" style="float: left"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
			</div></div></div>
	</div>
	<div style="width: 100%; border-bottom: 2px solid #ffffff;">
	<table ><tr>
		<td style="padding:10px 30px 10px 0px;" onclick="btnclick()"><img id="btnimg" style="width: 48px; height: 48px" src="/src/images/loading.gif" /></td>
		<td><div style="color:#ffffff;"><?php echo $program->program_title.'<br/> 진행자:'.$program->actor_name;?></div>
	
		</td>
	</tr></table>
	</div>	
	<a id="kakao-link-btn" href="javascript:;">
      <img style="margin: 30px" src="/src/images/katalkshare.png" />
    </a>
    </div>
  
    
    </center>
    </div>

</center>
 

    <script>
   
    Kakao.init('e2bbd49016dd2187797833ebb907dab9');

    Kakao.Link.createTalkLinkButton({
      container: '#kakao-link-btn',
      label: '통일의 소리 방송입니다.방송 프로그램 하나를 소개합니다.《<?php echo $program->program_title;?>》 입니다. 진행에 <?php echo $program->actor_name;?> 입니다.',
      image: {
        src: '<?php echo $program->channel_poster;?>',
        width: '480',
        height: '360'
      },
      webButton: {
        text: '이 방송을 듣습니다',
        url: 'http://okcnradio.org/vou/p/<?php echo $program->p_id;?>' 
      }
    });
    </script>
  </body>
</html>