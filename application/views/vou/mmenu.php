<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>jQuery.mmenu demo</title>

		<link type="text/css" rel="stylesheet" href="css/demo.css" />
		<link type="text/css" rel="stylesheet" href="../src/css/jquery.mmenu.css" />
				
<script src="../src/js/jquery-2.1.3.min.js"></script>
		
		<link href="../src/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../src/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="../src/js/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="../src/js/jquery.mmenu.min.js"></script>
		<!-- for the one page layout -->
		<style type="text/css">
			#intro,
			#first,
			#second,
			#third
			{
				height: 400px;
			}
			#intro
			{
				padding-top: 0;
			}
			#first,
			#second,
			#third
			{
				border-top: 1px solid #ccc;
				padding-top: 150px;
			}
		</style>
		
		<!-- for the fixed header -->
		<style type="text/css">
			.header,
			.footer
			{
				box-sizing: border-box;
				width: 100%;
				position: fixed;
			}
			.header
			{
				top: 0;
			}
			.footer
			{
				bottom: 0;
			}
		</style>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('nav#menu').mmenu(
					{
						//offCanvas: false
					}
				);
				var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [
		{
			title:"사영리의 이야기",
			artist:"통일의 소리 방송",
			mp3:"https://dl.dropboxusercontent.com/u/20855820/1-1.mp3",
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
			m4v: "http://r5---sn-gxap5ojx-cage.googlevideo.com/videoplayback?id=o-ALJ4-wQ4MYVyJdE719LaJKrErDdpJZueJzUA0RerhRZ6&signature=B38619824A13AB720C1CCF27B9CB806DDF22E1F0.39F677BA557CA5D2D32E6F2EA253542C5A8B6B17&sver=3&mt=1397553860&mv=u&upn=-rcdSogVJaM&mws=yes&sparams=id%2Cip%2Cipbits%2Citag%2Cpcm2fr%2Cratebypass%2Csource%2Cupn%2Cexpire&source=youtube&pcm2fr=yes&itag=22&key=yt5&ip=164.164.88.35&fexp=900064%2C901454%2C937417%2C913434%2C936916%2C934022%2C936923&ms=au&ipbits=0&ratebypass=yes&expire=1397578291&title=Updated%20SunPower%20Monitoring%20System",
			poster: "http://i.ytimg.com/vi/M4_JNapZd9E/maxresdefault.jpg"
		}
		
	], {
		
		supplied: "webmv, mp3,m4v",
		useStateClassSkin: true
		
	});
	setTimeout(function() {
		
     $("#jquery_jplayer_1").jPlayer("play",40);}, 1000);



			});
		</script>
	</head>
	<body>
		<div id="page">
			<div class="header FixedTop">
				<a href="#menu"></a>
				Demo
			</div>
			<div class="content" id="content">
				<div id="intro">
					<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
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
						-->
						<button class="jp-play" role="button" tabindex="0">play</button>
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
					<p><strong>This is a demo.</strong><br />
						Click the menu icon to open the menu.</p>
					
					<p>The links in the menu link to a section on the same page, some small javascript makes the page scroll smoothly.</p>
				</div>
				<div id="first">
					<p><strong>This is the first section.</strong><br />
						Notice how the fixed header and footer slide out along with the page.</p>

					<p><a href="#menu">Open the menu.</a></p>
				</div>
				<div id="second">
					<p><strong>This is the second section.</strong><br />
						You can also drag the page to the right to open the menu.</p>
					<p><a href="#menu">Open the menu.</a></p>
				</div>
				<div id="third">
					<p><strong>This is the third section.</strong><br />
						<a href="#menu">Open the menu.</a></p>
				</div>
			</div>
			<div class="footer FixedBottom">
				Fixed footer :-)
			</div>
			<nav id="menu">
				<ul>
					<li><a href="#content">Introduction</a></li>
					<li><a href="#first">First section</a></li>
					<li><a href="#second">Second section</a></li>
					<li><a href="#third">Third section</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html>