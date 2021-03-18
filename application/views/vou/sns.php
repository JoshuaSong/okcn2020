<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>VOU share with SNS</title>
    <link rel="stylesheet" href="/src/css/slidebars.css">
    <link rel="stylesheet" href="/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/css/style.css">
     <script src="/src/js/jquery-2.1.3.min.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script>
    	function gotohome()
    	{
    		window.location.href='http://okcnradio.org/';
    	}
    </script>
  </head>
  <body>
  	<nav class="navbar navbar-default navbar-fixed-top sb-slide" role="navigation">
			<div onclick="gotohome()" class="sb-toggle-left navbar-left">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div>
			<div >
				<div id="logo" class="navbar-left">
					<a href="#"><img src="/src/images/vou-logo.png" style="margin-top: 3px" height="36"></a>
				</div>
			</div>
		</nav>
  	<center>
    <div id="sb-site">
    	<center>
    	<div id="poster" style="width: 100%; max-width: 480px;  background-image: url(/src/images/tbg.png);background-repeat: repeat" >
    
    	<div style="width: 100%; height: 600px; " >
    		<image id="posterImg" src="https://dl.dropboxusercontent.com/u/385223495/vou/images/missionnews.jpg" style=" width: 100%; ">
    	</image></div>
     	</div>
    <h3>Share with SNS</h3>
    <a id="kakao-link-btn" href="javascript:;">
      <img src="https://dl.dropboxusercontent.com/u/385223495/vou/images/button_kakao.png" />
    </a>
    </center>
    </div>
</center>
 

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
        url: 'http://okcnradio.org/vou/kakao' 
      }
    });
    </script>
  </body>
</html>