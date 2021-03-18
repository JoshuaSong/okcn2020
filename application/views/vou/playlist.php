<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>VOU-PlayList</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../src/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../src/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="../src/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="../src/js/jplayer.playlist.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

	var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [
		{
			title:"사영리의 이야기",
			artist:"통일의 소리 방송",
			mp3:"https://dl.dropboxusercontent.com/u/20855820/1-1.mp3",

			//mp3:"https://ec-media.soundcloud.com/Abh3DEN4ttJQ.128.mp3?f10880d39085a94a0418a7ef69b03d522cd6dfee9399eeb9a522039f6ff9bf392058bfe7d2d8b2452e494c4c95ae953509c2227c44bbccc6720ab057119096078cb960d5c5&AWSAccessKeyId=AKIAJNIGGLK7XA7YZSNQ&Expires=1423011564&Signature=uu3SrBzXNwITglYdLvyXHcj5bVg%3D",
			poster: "http://lovenorthkorea.org/wp-content/uploads/2014/09/%ED%95%9C%EC%82%AC%EB%9E%8C-title-770x315.jpg"
		},
		{
			title:"한사람의 기도",
			artist:"통일의 소리 방송",
			mp3:"http://api.soundcloud.com/tracks/186297336/stream?client_id=809655d6c80f96b01f1366cb7d0bb648",
			poster: "http://lovenorthkorea.org/wp-content/uploads/2014/09/%ED%95%9C%EC%82%AC%EB%9E%8C-title-770x315.jpg"
		},{
			title:"这一生美好的祝福",
			artist:"통일의 소리 방송",
			mp3: "http://k003.kiwi6.com/hotlink/6q0ccaxoyc/1-1.mp3",
			poster: "http://i.ytimg.com/vi/M4_JNapZd9E/maxresdefault.jpg"
		}
		
	], {
		
		supplied: "webmv, mp3,m4v",
		useStateClassSkin: true
		
	});
	//$("#jquery_jplayer_1").bind($.jPlayer.event.loadeddata, function(event) { 
  //alert(myPlaylist.select());
//});
setTimeout(function() {
		
     $("#jquery_jplayer_1").jPlayer("play",40);}, 1000);


});

</script>
</head>
<body>
<div id="jp_container_1" class="jp-video jp-video-360p" role="application" aria-label="media player">
	<div class="jp-type-playlist">
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div class="jp-gui">
			<div class="jp-video-play">
				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-controls-holder">
					<div class="jp-controls">
						<!--
						<button class="jp-previous" role="button" tabindex="0">previous</button>
						
						<!--
						<button class="jp-next" role="button" tabindex="0">next</button>
						-->
						<button class="jp-stop" role="button" tabindex="0">stop</button>
					</div>
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">mute</button>
						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-toggles">
						<!--
						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
						<button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
						-->
					</div>
				</div>
				<div class="jp-details">
					<div class="jp-title" aria-label="title">&nbsp;</div>
				</div>
			</div>
		</div>
	
		<div class="jp-playlist">
			<ul>
				
				<li>&nbsp;</li>
			</ul>
		</div>
	
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
 <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
  
    <h3>Share with SNS</h3>
    <a id="kakao-link-btn" href="javascript:;">
      <img src="https://dl.dropboxusercontent.com/u/385223495/vou/images/button_kakao.png" />
    </a>

    <script>
   
    Kakao.init('e2bbd49016dd2187797833ebb907dab9');

    Kakao.Link.createTalkLinkButton({
      container: '#kakao-link-btn',
      label: '통일의 소리 방송입니다.',
      image: {
        src: 'https://dl.dropboxusercontent.com/u/385223495/vou/images/voubtn.png',
        width: '300',
        height: '200'
      },
      webButton: {
        text: '방송 듣기',
        url: 'http://okcnradio.org/vou/kakao' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
      }
    });
    </script>
</body>

</html>
