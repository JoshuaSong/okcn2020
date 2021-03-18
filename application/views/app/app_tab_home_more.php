
  <div class="listTitle" >오늘의 영상</div>
                <div id="videoslider" class="swiper-container swiper-init swiper-container-horizontal" >
                    <div class="swiper-wrapper">
                        <?php foreach ($todayvideo as $row) { ?>
                          <div class="swiper-slide videoslide" >
                           
                          <a href="https://youtu.be/<?php echo $row->video_id; ?>" class="link  external" >
                            <img class="youtubeplay" src="/images/youtubeplay1.png" 
                            style="width: 50px; margin-right: auto; margin-left: auto; position:absolute; " >
                          <img id="img<?php echo $row->id; ?>"style="border-radius: 5px; width: 100%; " src="  https://img.youtube.com/vi/<?php echo $row->video_id; ?>/mqdefault.jpg">
                        </a>
                      </div>
                        
                        <?php } ?>
                    </div>
                </div>

                <div class="listTitle" >예배와 찬양</div>

<div  id="slider1"  class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
    
  <?php foreach ( $this->CI->getChannelByCatArray(array(1)) as $row) { ?>
    <div class="swiper-slide">
    <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
      <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
         <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
        </a>                                       
         </div>
                                       
    <?php } ?>

    
  </div>
</div>

<div class="listTitle" >말씀과 기도</div>

<div  id="slider6"  class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ( $this->CI->getChannelByCatArray(array(7,8)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">선교지</div>

<div id="slider2" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(2,3,4)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>

<div class="listTitle">모통이돌</div>

<div  id="slider3" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(5)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
<div class="listTitle">24시간 찬양</div>

<div   id="slider4" class="swiper-container swiper-init demo-swiper">

  <div class="swiper-wrapper">
  <?php foreach ($this->CI->getChannelByCatArray(array(6)) as $row) { ?>
    <div class="swiper-slide">
      <a href="" onclick="openthischannel('<?php echo $row->c_id; ?>')" class="program1" data-transition="f7-push">
        <div id="loading<?php echo $row->c_id; ?>" class="loadingdiv" style="position:absolute; width:100%; height: 100%; background-color:#000; opacity: 0.5; display: none;"><center><img src="/images/loading2.gif" style="width: 40px;margin-top:20%" ></center></div>
           <img id="img<?php echo $row->c_id; ?>"style="border-radius: 5px; width: 100%; " src="<?php echo $row->channel_poster; ?>">
          </a>                                       
           </div>
                                       
    <?php } ?>
    
  </div>
</div>
  <div class="listTitle">날자별 다시듣기</div>

  <div  id="slider5" class="swiper-container swiper-init demo-swiper">
  
    <div class="swiper-wrapper" >
      <?php $d = array();
      for ($i = 1; $i < 20; $i++) { ?>
        <div class="swiper-slide" onclick="openthisdate('<?php echo date("Y-m-d", strtotime("-$i days"));?>')"
          style="padding: 5px 0; font-size: 16px; text-align: center; background-color: #fff; border-radius: 5px; border: 1px solid #ccc;">
          <a  href="" i class="program1">
            <?php echo date("m-d (D)", strtotime("-$i days")) ?>
          </a>
           </div>
     
      <?php }?>    
   
      
    </div>
   