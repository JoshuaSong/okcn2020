
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel responsive - jQuery Mobile Demos</title>
   <link rel="stylesheet" href="../src/css/jquery.mobile-1.4.5.min.css" />
   <link href="../src/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script src="../src/js/jquery-2.1.3.min.js"></script>
<script src="../src/js/jquery.mobile-1.4.5.min.js"></script>
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
			mp3:"http://api.soundcloud.com/tracks/186824972/stream?client_id=809655d6c80f96b01f1366cb7d0bb648",
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
//	$("#jquery_jplayer_1").bind($.jPlayer.event.loadeddata, function(event) { 
  //alert(myPlaylist.select());
//});
//setTimeout(function() {
		
  //   $("#jquery_jplayer_1").jPlayer("play",40);}, 1000);


});

</script>
</head>
<body>
<div data-role="page" >

    <div data-role="header">
        <h1>Panel responsive</h1>
        <a href="#nav-panel" >Menu</a>
        <a href="#add-form" data-icon="gear" data-iconpos="notext">Add</a>
    </div><!-- /header -->

    <div role="main" class="ui-content jqm-content jqm-fullwidth">

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
</div>	</div><!-- /content -->

	<div data-role="panel"  data-theme="b" id="nav-panel">

		<ul data-role="listview">
            <li data-icon="delete"><a href="#" data-rel="close">Close menu</a></li>
                <li><a href="#panel-responsive-page2">Accordion</a></li>
                <li><a href="#panel-responsive-page2">Ajax Navigation</a></li>
                <li><a href="#panel-responsive-page2">Autocomplete</a></li>
                <li><a href="#panel-responsive-page2">Buttons</a></li>
               
		</ul>

	</div><!-- /panel -->

	<div data-role="panel" data-position="right" data-display="reveal" data-theme="a" id="add-form">

        <form class="userform">

        	<h2>Login</h2>

            <label for="name">Username:</label>
            <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Cancel</a></div>
                <div class="ui-block-b"><a href="#" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini">Save</a></div>
			</div>
        </form>

	</div><!-- /panel -->

</div><!-- /page -->

<div data-role="page" id="panel-responsive-page2">

    <div data-role="header">
        <h1>Landing page</h1>
    </div><!-- /header -->

    <div role="main" class="ui-content jqm-content">

        <p>This is just a landing page.</p>

        <a href="#panel-responsive-page1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini ui-icon-back ui-btn-icon-left">Back</a>

    </div><!-- /content -->

</div><!-- /page -->

</body>
</html>
