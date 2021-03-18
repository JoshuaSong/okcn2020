<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<meta name="theme-color" content="#f44336">
		<meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
		
        <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />
    
           <style>
               	.ios .navbar {
    height: 64px;
   
}
               .section .item-title{
                text-align: center;
               


               }
          .section .item-infos{
            overflow: hidden;
            white-space: nowrap;
            text-overflow:ellipsis; 
            text-align: center;
            color: #888;
            margin-bottom: 15px;
          }
          .section .item-title{
            overflow: hidden;
            white-space: nowrap;
            text-overflow:ellipsis; 
            text-align: center;
            color: #555;
            font-size: 16px;
            margin-top: 10px;
           
          }
           .ios .title-section-with-link a {
    color: #950E4A;
}


div[class*="col"] {
  background: #fff;
  text-align: center;
  color: #000;
  border: 1px solid #ddd;

  margin-bottom: 7px;

  font-size: 12px;
}
.ios .links-list a{
  background-image: none;
  font-size: 16px;
  font-weight: 500;
  /* padding: 10px 3px; */
  padding: 2px 3px;

  text-align: center;
  display: block;
  
}
.ios .links-list a:link{
  text-decoration:none;
}
.ios .links-list a:visited{
  text-decoration:none;
}
.ios .links-list a:hover{
  text-decoration:none;
}


.ios .links-list a:after{
  content: none;
}

.ios .row .col-25 {
  width: calc((100% - 7px*3) / 4);
 
}
.tab-link-highlight{
  display: none;
}
           </style>
         
	</head>
	<body class="color-theme-pink">
		<div id="app" >	
			<div class="view view-main view-init ios-edges" data-url="/">
			<div class="page no-navbar">
	
	
	<div class="toolbar tabbar toolbar-top">
      <div class="toolbar-inner">
        <a href="#ot" class="tab-link tab-link-active">旧约</a>
        <a href="#nt" class="tab-link">新约</a>
        <a href="#version" class="tab-link">版本</a>
      </div>
    </div>
	
	<div id="tabpages" class="tabs tabs-with-top-toolbar">
 
		<div id="ot" class="page-content tab tab-active">
			<div class="block">
				<div class="section section-with-toolbar-top no-border">
				<div class="list links-list">

                    
  <div id="otrows" class="row" style="margin: 0px;">
   
    <div class="col-25 tablet-25" style="border:none;"></div>
  </div>
 
</div>
			
			
				</div>
			</div>
    </div>
    

		<div id="nt" class="page-content tab">
			<div class="block">
				<div class="section section-with-toolbar-top no-border">				
            <div class="list links-list">

                <div class="row" style="margin: 0px;">
                
                  <div class="col-25 tablet-25" style="border:none;"></div>
                </div>
				
				</div>
			</div>
    </div>
  </div>


		<div id="version" class="page-content tab">
			<div class="block block-list-ads">
				<div class="section section-with-toolbar-top no-border">
            <div class="list">
           
            </div>
					</div>
				</div>
			</div>
   
   
   
   
    </div>
    


	</div>

					
	
</div>
			</div>
		</div>
		<script src="/bright/js/framework7.min.js"></script>
        <script src="/bright/js/routes.js"></script>
     
        <script src="/bright/js/app.js"></script>
        <script>

    
    function playthisprogram(pid)
    {
      
    }

    function versionClicked(e)
    {

      app.request.get('/home/bibletabpages/' + e, function (data) {
          console.log(data,'data')
          $('#tabpages').html(data);
       
      });
    
    
    }


  </script>
	</body>
</html>