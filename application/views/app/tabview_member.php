<style>
  .message:not(.message-first) .message-name{
    display:block;
  }
  .message-name {
    font-size: 20px;
  }
  .message-sent.message-tail .message-bubble {
    background-color:cornflowerblue !important;
  }
  .message {
    margin-top: 10px !important;
  }
</style>
<template>
<div class="page" data-name="bible">
<?php $data['title']='모돌 회원';  $this->load->view('/app/page_navbar',$data);?>

  <div class="page-content" style="margin-top:60px; background-color: #eee; padding-top:0px">
  <div class="toolbar tabbar toolbar-bottom">
    <div class="toolbar-inner">
      <a href="#tab-1" class="tab-link tab-link-active">메세지</a>
      <a href="#tab-2" class="tab-link">참여</a>
      <a href="#tab-3" class="tab-link">프로그램</a>
 
      <a href="#tab-4" class="tab-link">프로필</a>
    </div>
  </div>
  <div class="tabs-animated-wrap">
    <div class="tabs">
      <div id="tab-1" class="page-content tab tab-active" style="padding-top:0px;">
     
          <div class="toolbar messagebar" style="top:0px; background-color:#e5e5ea; border-bottom:solid #aaa 1px">
            <div class="toolbar-inner" style="padding:  5px">
              <div class="messagebar-area">
                <textarea class="resizable" placeholder="메세지 ..." style="background-color: ghostwhite;"></textarea>
              </div><a class="link send-link" href="#"> <img src="/images/check.png" style="width: 28px;"></a>
            </div>
          </div>
          <div class="page-content messages-content" style="padding-top: 20px;">
            <div class="messages">
             
              <div class="message message-received message-tail" style="max-width: 90%;">
                <div class="message-avatar" style="background-image:url(/images/avatar.jpg); opacity: 1;"></div>
                <div class="message-content">
                  <div class="message-name">목양담당자 </div>
                  <div class="message-header">  </div>
                  <div class="message-bubble">
                   
                    <div class="message-text">지혜자님.....많이 망설이다 국악찬양을 넣었는데....이렇게 사연을 남겨주시니  정말 기쁘고 감사하네요.... 사랑하고 축복 합니다....감사합니다...❤️</div>
                    <div class="message-text-footer">2020-10-06 00:35:38<br></div>
                  </div>
                  <div class="message-footer"><br></div>
                </div>
              </div>
              <div class="message message-received message-tail" style="max-width: 90%;">
                <div class="message-avatar" style="background-image:url(/images/avatar.jpg); opacity: 1;"></div>
                <div class="message-content">
                  <div class="message-name">목양담당자 </div>
                  <div class="message-header">  </div>
                  <div class="message-bubble">
                   
                    <div class="message-text">매주 행복한 목소리와 함께 풍겨오는 모돌의 
                      향기가 오늘 추석에는 국악찬양으로 찾아와서
                      기쁨을 주었습니다 해피 추석! 우리에게
                      풍성한 양식을 주신 하나님께 추석
                      의 감사를 드립니다 </div>
                    <div class="message-text-footer">2020-10-06 00:35:38<br></div>
                  </div>
                  <div class="message-footer"><br></div>
                </div>
              </div>
  
            <div class="message message-sent message-tail" style="max-width: 90%;">
              <div class="message-avatar" style="background-image:url(/images/avatar.jpg); opacity: 1;"></div>
              <div class="message-content">
                <div class="message-name">모돌회원  </div>
                <div class="message-header">  </div>
                <div class="message-bubble">
                 
                  <div class="message-text">지혜자님.....많이 망설이다 국악찬양을 넣었는데....이렇게 사연을 남겨주시니  정말 기쁘고 감사하네요.... 사랑하고 축복 합니다....감사합니다...❤️</div>
                  <div class="message-text-footer">2020-10-06 00:35:38<br></div>
                </div>
                <div class="message-footer"><br></div>
              </div>
            </div>
        


          </div>
          
          </div>
        </div>
      <div id="tab-2" class="page-content tab" >
        <div class="timeline">
          <div class="timeline-item">
            <div class="timeline-item-date">27 <small>DEC</small></div>
            <div class="timeline-item-divider"></div>
            <div class="timeline-item-content card">
              <div class="card-header">헌금</div>
              <div class="card-content card-content-padding">선교헌금: 100 USD</div>
              <div class="card-footer">자동이체헌금</div>
            </div>
          </div>
         
          <!-- Timeline item with special timeline elements and inner -->
          <div class="timeline-item">
            <div class="timeline-item-date">24 <small>DEC</small></div>
            <div class="timeline-item-divider"></div>
            <div class="timeline-item-content">
              <div class="timeline-item-inner">
                <div class="timeline-item-title">기도 동참</div>
                <div class="timeline-item-subtitle">연말까지 '80일 전투'를 벌이기로 결정했다</div>
                
                <img id="img38" style="border-radius: 5px; width: 100%; " src="https://wp.cornerstone.or.kr/wp-content/uploads/2020/10/201007.jpg">
              </div>
            </div>
          </div>
       
           <div class="timeline-item">
            <div class="timeline-item-date">20 <small>DEC</small></div>
            <div class="timeline-item-divider"></div>
            <div class="timeline-item-content">
              <div class="timeline-item-inner">
                <div class="timeline-item-title">은혜나눔</div>
                <div class="timeline-item-subtitle">매주 행복한 목소리와 함께 풍겨오는 모돌의 향기가 오늘 추석에는 국악찬양으로 찾아와서 기쁨을 주었습니다 해피 추석! 우리에게 풍성한 양식을 주신 하나님께 추석 의 감사를 드립니다</div>
                
              </div>
            </div>
          </div>

          <div class="timeline-item">
            <div class="timeline-item-date">19 <small>DEC</small></div>
            <div class="timeline-item-divider"></div>
            <div class="timeline-item-content">
              <div class="timeline-item-inner">
                <div class="timeline-item-title">카톡으로 프로그램 나눔</div>
                <div class="timeline-item-subtitle">[2020-10-03]케보드 말쿠트카</div>
                <img id="currentImage" class="img-responsive" src="https://cdsaws.s3-us-west-2.amazonaws.com/vou/images/okcn_159704049044097.jpg" style=" width: 100%;">
              </div>
            </div>
          </div>
         
          <!-- Timeline item with Card -->

        </div>
      </div>
      <div id="tab-3" class="page-content tab" style="padding-top:0px;">
        <div class="list media-list">
          <div class="block-title" style="text-align: center; margin-top:40px;">최근 청취한 프로그램</div>
            <ul>
                <?php foreach($recent as $item) {?>
              <li>
                <a href="#" class="item-link item-content">
                  <div class="item-media"><img src="<?php echo $item->channel_poster;?>" width="80"/></div>
                  <div class="item-inner">
                    <div class="item-title-row">
                      <div class="item-title"><?php echo '['.$item->program_date.']'.$item->channel_title;?></div>
                     
                    </div>
                  
                    <div class="item-text"><?php echo $item->program_title;?></div>
                  </div>
                </a>
              </li>
                <?php }?>
              
            </ul>
        </div>
          
        
      </div>
      <div id="tab-4" class="page-content tab" style="padding-top:0px;">
        <div class="list accordion-list inset" style="border: 1px #ccc solid;margin-top: 20px; ">
          <ul>
            <li>
              <div class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label"></div>
                    <div class="item-input-wrap">
                      <center><img src="/images/member.png" style="width: 70%; margin: 20px;"></center>
                    <input type="file" style="display:none" onChange="changetoupload()" name="userfile" id="file-1" class="inputfile inputfile-1" />
                                 <label id="uploadchooselabel" for="file-1" class="btn mgbottom-5 btn-md-width btn-info" style="width: 100%; margin: 0px;" ><i class="fa fa-search"></i> 
                                 <span id="labelspan">Choose a Image&hellip;</span></label>
                                      <br/><br/>
                                 <div class="progress">
                                  <div id="progressBar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;background-color: #40C0CB"></div>
                                 </div>
                    </div>
                  </div>
                </div>
              
            
              </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">사용자 이름:</div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:lightyellow;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-80"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="사용자 이름..." ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
                                  </div>
                              </div>
        
                                 
                                </div>
                              </div>
                            </div>
                          </li>
                           <!-- 
                          <li>
                            <div class="item-content item-input">
                              <div class="item-inner">
                                <div class="item-title item-label">Gender 성별</div>
                                <div  style="width:100%; padding: 10px 15px;">
                                <div class="row">
                         
                          <div class="col-50">Male 남&nbsp;&nbsp;<label class="radio"><input type="radio" name="demo-radio-inline" value="1" <?php if($this->session->userdata('gender') == 1) echo 'checked';?>><i class="icon-radio"></i></label></div>
                          <div class="col-50">Female 여&nbsp;&nbsp;  <label class="radio"><input type="radio" name="demo-radio-inline" value="0" <?php if($this->session->userdata('gender') == 0) echo 'checked';?>><i class="icon-radio"></i></label></div>
                          </div>
                      </div>
                               
                              </div>
                            </div>
                          </li>
                          -->
                        
                        </ul>
               
                      
              
              </div>
            </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">회원 실명:</div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:lightyellow;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-80"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="회원 실명..." ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
                                  </div>
                              </div>
        
                                 
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        
                        </ul>
               
                      
              
              </div>
            </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">핸드폰 번호:</div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:lightyellow;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-80"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="핸드폰 번호..." ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
                                  </div>
                              </div>
        
                                 
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        
                        </ul>
               
                      
              
              </div>
            </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">이메일:</div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:lightyellow;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-80"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="Email..." ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
                                  </div>
                              </div>
        
                                 
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        
                        </ul>
               
                      
              
              </div>
            </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">우편 주소:</div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:lightyellow;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-80"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="우편 주소" ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
                                  </div>
                              </div>
        
                                 
                                </div>
                              </div>
                            </div>
                          </li>
                          
                        
                        </ul>
               
                      
              
              </div>
            </li>
            
          </ul>
          <!--
          <div class="block-footer" >
            <p>본인의 이름과 핸드폰 번호를 등록하시면 더 많은 혜택을 누리실수 있습니다.</p>
          </div>
          -->
        </div>
      </div>
     
    </div>
  </div>
  </div>
</div>

</template>

<script>

return {
  on:{
   pageInit:function (e,page){
  
      
    app.tab.show('#tab-4');

   },
  pageReinit: function (e,page)
  {
   


  }
 }
}


</script>