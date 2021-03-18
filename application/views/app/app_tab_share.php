<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="theme-color" content="#f44336">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

  <link rel="stylesheet" href="/assets/framework7_578/css/framework7.bundle.min.css">
  <link rel="stylesheet" href="/assets/framework7_578/css/framework7-icons.css">
  <link rel="stylesheet" href="/assets/plugins/bootstrap/dist/css/bootstrap.css" />
  
<style>
   .message-text-header{
        font-size: 18px; color:#a82a21
    }
   .message-name{
     display: none;
   } 
   .messagebody{
    background-color: #fff; border-radius: 30px; border-top-left-radius: 0px; padding: 20px;box-shadow: 4px 4px 14px #bbb; margin: 5px 20px 10px 5px; font-size: 18px;
   }
   .messagebodyme{
    background-color:coral; border-radius: 30px; border-top-right-radius: 0px; padding: 20px;box-shadow: 4px 4px 14px #bbb; margin: 5px 20px 10px 5px; font-size: 18px;
   }
   .messagetime{
    margin-left: 25px; color:#999; margin-bottom: 20px;
   }
   .avatarimg{
    width: 30px; border-radius: 10px; margin-left: 15px; 
   }
   .avatartd{
    width: 45px; vertical-align: top;
   }
   .tome{
     color:#9f1f24 ;
   }
</style>
</head>
<body>
<div id="app">
<div class="view view-main view-init">
  <div class="page">
      <?php $data['title']='은혜나눔';   $this->load->view('/app/page_navbar',$data);?>
  <div class="page-content">

  <div class="toolbar messagebar" style="top:0px; background-color:#eee; border-bottom:solid #fff 1px">
  <div class="toolbar-inner"  id="sectionbody" style="">
              <div class="messagebar-area" style="padding: 10px 0px 10px 20px;">
                <input id="messageinput" type="text" class="" placeholder="오늘 받은 은혜는 ..." 
                style="background-color: #fff;padding: 10px 20px; height: 40px; width: 100%; border-radius: 20px; ">
              </div>
              <a class="link send-link" onclick="sendmessage()"> <img src="/images/send.png" style="width: 40px; margin-bottom: 20px;"></a>
            </div>
  </div>
  <div class="page-content messages-content ptr-content ptr-bottom" style="padding-top: 20px;background-color:#eee; ">
    <div class="messages" style="background-color: #eee;">
  <table style="width: 100%; padding: 10px;">
              <?php foreach($comments as $item) {?>
                <?php if(isset($member) && $member->id == $item->user_id) {?>
                  <tr>
                <td class="avatartd"></td>
                <td>
                  <div class="message-name"><?php echo $item->cm_id;?></div>
                  <div style="text-align: right; margin-right: 20px;"><a><?php echo $item->user_name;?></a></div>
                  <div class="messagebodyme"><?php echo $item->contents;?></div>
                   <div class="messagetime"><?php echo $item->create_time;?></div>
                </td>
              </tr>
              
              <?php } else {?>
                <tr>
                <td class="avatartd"><img class="avatarimg"  src="/images/thumb_150/<?php echo $item->image;?>"></td>
                <td>
                  <div class="message-name"><?php echo $item->cm_id;?></div>
                  <div style="margin-left: 5px; "><a ><?php echo $item->user_name;?></a></div>
                  <div class="messagebody <?php if(isset($member) && $item->user_id == $member->id) echo 'tome'?>"><?php echo $item->contents;?></div>
                   <div class="messagetime"><?php echo $item->create_time;?></div>
                </td>
              </tr>

              <?php }?>
              <?php }?>

            </table>
  

 
</div>
<div class="ptr-preloader">
    <div class="preloader"></div>
    <div class="ptr-arrow"></div>
  </div>
</div>


  </div>
  </div>
  </div>
  </div>


         

<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
<script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>


<script>
  var username = '';
  <?php $username = $user->user_name; if(isset($username)) {?>
   username = '<?php echo $username;?>';
    <?php }?>
var app = new Framework7({
  root: '#app'
});
if (app.device.ios) 
  {
   $("#sectionbody").css("margin-top",15);
  }
var $$ = Dom7;

var $ptrContent = $$('.ptr-content');
$ptrContent.on('ptr:refresh', function (e) {
  var lastcmid = $(".message-name").last().html();
  //console.log(lastcmid);
  $.get('/app/morecomment/<?php echo $user->id;?>/' + lastcmid, function (data) {
  //  console.log(data);
  $('.messages').append(data);
  app.ptr.done(); 
   })
  
  setTimeout(function () {
    
   
  }, 2000);
});

$("#messageinput").focus(function(){
 if(username == ''){
  app.dialog.confirm("받은 은혜를 나누시기 원하시면 사용자 이름을 먼저 입력해야 합니다. 이름 입력을 원하십니까?","OKCN Radio",function(){
  
    if (app.device.android) 
  {
    Android.gotologin("share");
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("gotologinfromshare");
    }
  });
    setTimeout(function () { app.dialog.close();}, 10000);

 }
  
});




function sendmessage()
{

  if($("#messageinput").val()==''){
    app.dialog.alert("은혜받은 내용을 입력해 주시기 바랍니다.","OKCN Radio");
    setTimeout(function () { app.dialog.close();}, 3000);
  }else{
    app.request.post('/app/commentfromapp/<?php echo $user->id;?>', { message: $("#messageinput").val(),username:username}, function (data) {
    //  alert(data);
      location.reload();
     })
  }
  
}
function changeName(e)
{
  
  username = e;
}


</script>

</body>
</html>
