<!DOCTYPE html>
<html>
<head>
    <title>Left Side Menu</title>

    
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0;" />
    
    <link rel="stylesheet" type="text/css" href="../src/css/af.ui.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/icons.css" />
    <script type="text/javascript" src="../src/js/jquery-2.1.3.min.js"></script>

    <script type="text/javascript" charset="utf-8" src="../src/js/appframework.ui.min.js"></script>
    <!--AppFramework plugin for sliding side menu-->
    <script type="text/javascript" charset="utf-8" src="../src/js/af.slidemenu.js"></script>
<link href="../src/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />

    <script>   
        $.ui.autoLaunch = false;
        $.ui.animateHeaders = false;
                
        $(document).ready(function(){
            $.ui.setSideMenuWidth('260px');
            $.ui.launch();
            
        });
    </script>
</head>
<body> 
<div id="afui">
    
    <!--Left Side Menu Navigation bar -->
    <nav>
        <ul class="list">
            <li><a href="#page1" class="icon home">통일의 소리</a></li>
            <li><a href="#page2" class="icon heart">Favorites</a></li>
            <li><a href="#page3" class="icon chat">Messages</a></li>
            <li><a href="#page4" class="icon user">Profile</a></li>
        </ul>
    </nav>
    
    <div id="content" style=""> 
        
    <!--Main View Pages-->
        <div class="panel" title="Home" id="page1" data-footer="none" selected="true">
            <header>
                <a id="menubadge" onclick='$.ui.toggleSideMenu()' class='menuButton' style="float:left !important"></a>
                <h1>통일의 소리</h1>
            </header>
            <p>This is view for first menu item</p>
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
        </div>
        
        <div class="panel" title="Favorites" id="page2" data-footer="none">
            <header>
                <a id="menubadge" onclick='$.ui.toggleSideMenu()' class='menuButton' style="float:left !important"></a>
                <h1>Favorites</h1>
            </header>
            <p>This is view for second menu item</p>
        </div>
        
        <div class="panel" title="Messages" id="page3" data-footer="none">
            <header>
                <a id="menubadge" onclick='$.ui.toggleSideMenu()' class='menuButton' style="float:left !important"></a>
                <h1>Messages</h1>
            </header>
            <p>This is view for third menu item</p>
        </div>
        
        <div class="panel" title="Profile" id="page4" data-footer="none">
            <header>
                <a id="menubadge" onclick='$.ui.toggleSideMenu()' class='menuButton' style="float:left !important"></a>
                <h1>Profile</h1>
            </header>
            <p>This is view for fourth menu item</p>
        </div>
        
    </div>
</div>
</body>
</html>    