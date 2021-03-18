<style>
  .list .item-content{
    padding-left:0px;
  }
  #overlay {
    position: absolute;
    left: 20%;
    top: 0;
    right: 0;
    width: 80%;
    bottom: 0;

    background:black;
    background:rgba(0,0,0,0.8);

    filter: blur(10px);
    -webkit-filter: blur(10px);
    -moz-filter: blur(10px);
    -o-filter: blur(10px);
    -ms-filter: blur(10px);
}
#blurimg {
    
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px) grayscale(50%);
</style>
<template>

<div class="page">
<div class="navbar" style="background-color:#9f1f24;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" ><?php echo $channel->channel_title;?></div>
              
   </div>
</div>
  
	<div id="channelcontent" class="page-content  ptr-content ptr-bottom" style="padding-top: 50px;">	
  <div>
    
    <img id="blurimg" class="img-responsive" src="<?php echo  $channel->channel_poster;?>" style=" width: 100%; ">
  <div>
    <img class="img-responsive" src="<?php echo  $channel->channel_poster;?>" style="width: 100%;clip-path: inset(0 70% 0 0);  position: absolute; top:50px ; left:0;">

    <div style="width: 70%; height: 100%; position: absolute; top:50px ; left:30%; background: rgba(159, 31, 37, 0.4); ">
      <p style="padding:20px;font-size: 16px !important; color: #fff; font-weight: 900; text-shadow: 2px 2px 8px #555;"><?php  if(isset( $channel->summary)) echo $channel->summary;?></p>
    </div>
  </div>
  </div>
    <!--
    <div id="overlay">
      <img  class="img-responsive" src="<?php echo  $channel->channel_poster;?>" style="">
      
    </div>
			-->
			
	<div class="list media-list" style="margin-top: 0px;">
  <ul id="channelul">
  <?php $i=$channel->count; foreach($programs as $row) if(isset($row)) { ?>
    <li>
      <a class="item-link item-content" programid="<?php echo $row->p_id;?>" programcount="<?php echo $i;?>">
        <div class="item-media"><div class="item-text" style="width: 50px;font-size: 12px; color: #9f1f24; text-align: right; padding-right: 10px;"><?php echo $i.'회';?></div>
          <img src="/images/playbutton1.png" width="40"/>
        </div>
        <div class="item-inner">
         
            <div class="item-text" style="font-size:14px; padding-right: 15px;"><?php echo '['.$row->program_date.']'.$row->program_title;?></div>
            
          
         
        </div>
      </a>
    </li>
	<?php $i--; }?>



  </ul>
</div>
<div class="ptr-preloader">
    <div class="preloader"></div>
    <div class="ptr-arrow"></div>
  </div>
</div>

</template>

<script>
	return {
		on: {
			pageInit: function (e, page)  
			  {
          $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == getDocHeight()) {
           alert("bottom!");
       }
   });
          var $ptrContent = $('#channelcontent');
         // app.ptr.create($ptrContent)
          $ptrContent.on('ptr:refresh', function (e) 
          {
           var pid =  $('.item-link').last().attr('programid');
           var pcount = $('.item-link').last().attr('programcount');
          // app.dialog.alert(pcount,'OKCN Radio');
           $.get('/app/morechannelprogram/<?php echo $channel->c_id;?>/' + '/' + pid + '/' + pcount , function (data) {
              console.log(data);
             $('#channelul').append(data);
          

             })
         
          });
    }
          }
		      }
		     
			
	  </script>