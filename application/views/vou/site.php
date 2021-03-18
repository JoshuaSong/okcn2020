<center>
    <div id="sb-site">
    	<center>
    	<div id="poster" style="width: 100%; max-width: 480px; min-height: 900px; background-image: url(/src/images/tbg.png);background-repeat: repeat" >
    
    	<div style="width: 100%; " ><image id="posterImg"  class="commhide" src="<?php echo $first->channel_poster;?>" style=" width: 100%; "></image></div>
    	<div class="commshow" onclick="commHide()" style=" display: none; height: 30px; width:100%; background-image: url(/src/images/tbg.png);  background-repeat: repeat;">
    		<center><img src="/src/images/down.png" style="margin-top: 5px; width:36px" /></center>
    	</div>
    	<table width="100%" style="color:#FFFFFF">
    		
    		<tr style="border: 1px #023155 solid; " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;  background-color: #023155">공지</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777">통일의 소리 방송 시험가동중입니다.</td>
    		</tr>
    		<tr id="comm_tr" class="commshow" style="border: 1px #023155 solid;  display: none " >
    		<td align="center" width="70px" style="padding: 2px 10px 2px 10px;border-top:1px solid #ffffff;  background-color: #023155">사연</td>
    		<td style="padding: 2px 10px 2px 10px; background-color:#777; border-top:1px solid #B9DEF0; ">채널:《<?php echo $first->channel_title;?>》</td>
    		</tr>
    	</table>
    	</table>
<!--Channel Div          --> 
    	<div  id="channelDiv"></div>
<!--Comm Div          -->
    	<div  id="commDiv" class="commshow" style="background-color: #b8d1f3; display: none; padding-bottom: 50px"></div>

<!--SNS Div          -->

     <div id="snsdiv" style="display: none; padding-top: 10px ">
    	<center>
    	 <a href='javascript:OpenFacebook()'><img src="/src/images/fbshare.png"/ style="width:120px;"></a>
    <a id="kakao-link-btn" href="javascript:;">
      <img src="/src/images/katalkshare.png" onclick="sharewithkakao(<?php echo $first->p_id;?>)" style="width:120px; margin-left: 30px"/>
    </a>
    </center>
    	</div>
    	

    	
<!--OnAir Table          -->    	
    	<table id="onairTable" class="commhide"  style="color:#ffffff; padding: 10px; margin: 10px" cellpadding="5px"><tr>
    		<td width="70px" style="color:#cccccc;"><img class="onair" src="/src/images/onair.png" /><span class="program" style="display: none">프로그램</span></td>
    		<td id="titleTD" style="font-size: 20px;">
    			<img  style="width: 24px; margin-left: 30px" src="/src/images/loading.gif" />
    			
    			</td>
    	</tr><tr class="onair">
    		<td style="color:#cccccc;">방송시간</td>
    		<td id="timeTD"></td>
    	</tr>
    	<tr>
    		<td style="color:#cccccc;">진행자</td>
    		<td id="actorTD"></td>
    	</tr>
    	</table>
    	
    	
    		<div id="time"></div>
   
    		
    	</div>
    	</center>
 
    </div>
</center>
<!--Left Slidebar Menu UL          -->    
    <div class="sb-slidebar sb-left">
      <nav>
		<ul class="sb-menu">
			<li><img src="/src/images/vou-logo-p.png"  alt="" height="40"></li>
			<li onclick="onair()"><img src="/src/images/onair.png">실시간 방송</li>
			<?php echo $channels; ?>
			
		</ul>
		<br/><br/><br/><br/><br/><br/>
	</nav>
    </div>
<!--Right Slidebar Menu UL          -->    
    <div class="sb-slidebar sb-right">
      
    </div>
<!--Comm Inputing Div          --> 
<div class="commshow" style="display:none; position: fixed; left: 0px;  bottom: 100px;  height: 60px;  width: 100%;   z-index: 10;">
      <center>
      	<div style="max-width: 480px; height: 60px; background-image: url(/src/images/tbg.png); background-repeat: repeat; ">
      	<table width="100%" >
      		<tr><td width="85%" style="padding: 10px;"> 
      		<input type="text" class="form-control" id="comminput" onclick="commoninputclick()" placeholder="여기에 사연을 입력해 주세요"></td>
      		<td  style="padding: 10px 10px 10px 0px;"><button type="button" onclick="commpostclick()" class="btn btn-success">올리기</button></td></tr>
      	</table>
      </div>
      </center>
      </div>
      
<!--Footer Div          --> 
<div id="footer">
      <center><div style="width: 100%; max-width: 480px; ">
       
<div id="jp_container_1" class="jp-video" role="application" aria-label="media player">
	<div class="jp-type-playlist">
	<div id="jquery_jplayer_1" class="jp-jplayer" style="display: none"></div>
		<div class="jp-gui">
			
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">	
						<div class="jp-play-bar" style="float: left"></div>
					</div>
					
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
			</div>
		</div>
		<div class="jp-playlist" style="display: none">
			<ul>
				<li>&nbsp;</li>
			</ul>
		</div>
	</div>
</div>
<table style="font-size: 12px; color: #F9F9F9; margin-top: 25px;">
	<tr><td onclick="commclick()"><image src="/src/images/comment.png" style="width: 28px"></image><p>사연</p></td>
		<td width="200px" align="center" valign="top"> <div id="playbtn" role="button" onclick="play()"  style="width: 48px; height: 48px; " >
       	<image src="/src/images/play.png" style="width:48px"></image>
       </div>
       <div id="pausebtn" role="button" onclick="pause()"  style="display:none; width: 48px; height: 48px; " ><image src="/src/images/pause.png" style="width:48px"></image></div>
   </td>
   <td id="shareTd" onclick="sharesns()" pid="<?php echo $first->p_id;?>" valign="bottom"><image src="/src/images/share.png" style="width: 24px;"></image><p style="padding-top: 3px">나눔</p></td>
	</tr>
</table>
<div id="titleDiv" style="color: #c5ccd2; display: none"></div>
				</div>
				
       </div>
      
   <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '100284936743865',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   function OpenFacebook() 
{

	FB.ui(
		{
			method: 'share',
			href: 'http://okcnradio.org/vou/p/<?php echo $first->p_id;?>',
		},
		function(response) {
			if (response && !response.error_code) {
				//alert('Posting completed.');
			} else {
				//alert('Error while posting.');
			}
		}
	);
	$.get("users/ps/<?php echo $first->p_id;?>/fb");
	

}

</script>        

<script>
    Kakao.init('e2bbd49016dd2187797833ebb907dab9');
    Kakao.Link.createTalkLinkButton({
      container: '#kakao-link-btn',
      label: '통일의 소리 방송입니다.방송 프로그램 하나 소개합니다.《<?php echo  $first->program_title;?>》 입니다. 진행에 <?php echo  $first->actor_name;?> 입니다.',
      image: {
        src: '<?php echo  $first->channel_poster;?>',
        width: '480',
        height: '360'
      },
      webButton: {
        text: '이 방송을 듣습니다',
        url: 'http://okcnradio.org/vou/p/<?php echo  $first->p_id;?>' 
      }
    });
</script>
  </body>
</html>