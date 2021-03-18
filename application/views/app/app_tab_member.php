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
   a{
    text-decoration:none !important
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
<div id="profileview" class="view view-main view-init">
<div class="page" data-name="profile">
<?php $data['title']='마이메뉴';  $this->load->view('/app/page_navbar',$data);?>
<div class="page-content" style="margin-top:60px; background-color: #fff; padding-top:0px">
  <div class="toolbar tabbar toolbar-bottom">
    <div class="toolbar-inner">
      <a href="#tab-1" class="tab-link tab-link-active">메세지</a>
      <!--
      <a href="#tab-2" class="tab-link">참여</a>
      -->
      <a href="#tab-3" class="tab-link">프로그램</a>
 
      <a href="#tab-4" class="tab-link">프로필</a>
    </div>
  </div>
  <div class="tabs-animated-wrap">
    <div class="tabs">
      <div id="tab-1" class="page-content tab tab-active" style="padding-top:0px;">
     
          <div class="toolbar messagebar" style="top:0px; background-color:#eee; border-bottom:solid #fff 1px">
            <div class="toolbar-inner" style="padding:  5px">
              <div class="messagebar-area">
                <input id="messageinput" type="text" class="" placeholder="메세지 ..." style="background-color: #fff;padding: 10px 20px; height: 40px; width: 100%; border-radius: 20px; ">
              </div>
              <a class="link send-link" onclick="sendmessage()"> <img src="/images/send.png" style="width: 40px;"></a>
            </div>
          </div>
          <div class="page-content messages-content" style="background-color: #eee;" >
            <table style="width: 100%; padding: 10px;">
              <?php foreach($messages as $item) {?>
                <?php if($member->id != $item->from_member_id) {?>
              <tr>
                <td class="avatartd"><img class="avatarimg" onclick="memberclick('<?php echo $item->fromusername.'$'.$item->from_member_id?>')" src="/images/thumb_150/okcnradio.png"></td>
                <td>
                  <div style="margin-left: 5px; "><a onclick="memberclick('<?php echo $item->fromusername.'$'.$item->from_member_id?>')"><?php echo $item->fromusername;?></a> @ <a onclick="memberclick('<?php echo $item->tousername.'$'.$item->to_member_id.'$'.$member->status;?>')"><?php echo $item->tousername;?></a></div>
                  <div class="messagebody <?php if($item->to_member_id == $member->id) echo 'tome'?>"><?php echo $item->contents;?></div>
                   <div class="messagetime">2020-10-06 00:35:38</div>
                </td>
              </tr>
              <?php } else {?>
                <tr>
                <td class="avatartd"></td>
                <td>
                  <div style="text-align: right; margin-right: 20px;"><a onclick="memberclick('<?php echo $item->fromusername.'$'.$item->from_member_id?>')"><?php echo $item->fromusername;?></a> @ <a onclick="memberclick('<?php echo $item->tousername.'$'.$item->to_member_id.'$'.$member->status;?>')"><?php echo $item->tousername;?></a></div>
                  <div class="messagebodyme"><?php echo $item->contents;?></div>
                   <div class="messagetime">2020-10-06 00:35:38</div>
                </td>
              </tr>

              <?php }?>
              <?php }?>

            </table>


          
          </div>
        </div>
          <!--
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
         
        

        </div>
      </div>
       -->
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
            <li id="imageli">
              <div class="item-content item-input">
                  <div class="item-inner">
                    <div class="item-title item-label"></div>
                    <div class="item-input-wrap">
                    
                      <center><img id="profileimg" src="<?php $image = $member->image; if(isset($image)) {echo '/images/thumb/'.$image; } else {echo '/images/member.png';}?>" style="width: 70%; margin: 20px; border-radius: 10px;" >
                        <button onclick="openGallery()" class="col button button-round" style="background-color: #386892; color: #fff; width: 70%; font-size: 20px ; font-weight: 400; margin-bottom: 30px;">Choose a Image&hellip;</button>

                      </center>
                   
                               
                    </div>
                  </div>
                </div>
              
            
              </li>
            <li  class="accordion-item" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="namediv" class="item-title">사용자 이름<?php $name = $user->user_name; if(isset($name)) echo ':  '.$name;?></div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                        <ul style="margin: 10px 10px; background-color:#fff;">
                          <li class="accordion-item">
                            <div class="item-content item-input">
                              <div class="item-inner" style="padding-bottom: 0px;">
                             
                                <div class="item-input-wrap">
                                    <div  style="width:100%; padding: 10px 15px">
                                        <div class="row no-gap">
                                 
                                  <div class="col-70"> 
                                    <input id="nameinput" type="text"  style="border-bottom: #386892 solid 1px; font-size: 20px; " name="user_name" placeholder="사용자 네임..." <?php if(isset($name)) echo 'value="'.$name.'"';?> /></div>
                                  <div class="col-30" style="padding: 5px 0px 0px 10px; ">
                                    <button onclick="submitname()" class="col button button-outline button-round" 
                                    style="border-color: #386892; color: #386892; font-size: 20px ; font-weight: 400; ">OK</button>
                                    </div>
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
            <li  class="accordion-item"  style="display:none;">
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
                                  <div class="col-20" style="padding-left: 10px;"><button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
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
                  <div id="phonediv" class="item-title">핸드폰 번호<?php $phone = $member->phone; if(isset($phone)) echo ':  '.$phone;?></div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                      
                <ul style="margin: 10px 10px; background-color:#fff;">
                  <li class="accordion-item">
                    <div class="item-content item-input">
                      <div class="item-inner">
                        <div class="item-title item-label" style="color:  #386892;">Country Code 국가번호 </div>
                        <div class="item-input-wrap">
        
                            <table><tr>
                                <td><i class="f7-icons" style="font-size: 10px;">arrowtriangle_down_fill</i>  </td>
                                <td> <select id="contrycode">
                                   
                                    <option data-countryCode="US" value="1">USA (+1)</option>
                                    <option data-countryCode="KR" value="82">Korea - South (+82)</option>       
                                    <option data-countryCode="AR" value="54">Argentina (+54)</option>               
                                    <option data-countryCode="AU" value="61">Australia (+61)</option>
                                    <option data-countryCode="AT" value="43">Austria (+43)</option>    
                                    <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                    <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                    <option data-countryCode="CA" value="1">Canada (+1)</option>
                                    <option data-countryCode="CL" value="56">Chile (+56)</option>
                                    <option data-countryCode="CN" value="86">China (+86)</option>
                                    <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                    <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                    <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                    <option data-countryCode="FI" value="358">Finland (+358)</option>
                                    <option data-countryCode="FR" value="33">France (+33)</option>
                                    <option data-countryCode="DE" value="49">Germany (+49)</option>
                                    <option data-countryCode="GR" value="30">Greece (+30)</option>
                                    <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                    <option data-countryCode="IN" value="91">India (+91)</option>
                                    <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                    <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                    <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                    <option data-countryCode="IL" value="972">Israel (+972)</option>
                                    <option data-countryCode="IT" value="39">Italy (+39)</option>
                                    <option data-countryCode="JP" value="81">Japan (+81)</option>
                                    <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                    <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                    <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                    <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                    <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                    <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                    <option data-countryCode="NE" value="227">Niger (+227)</option>
                                    <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                    <option data-countryCode="NU" value="683">Niue (+683)</option>
                                    <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                    <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                    <option data-countryCode="NO" value="47">Norway (+47)</option>
                                    <option data-countryCode="OM" value="968">Oman (+968)</option>
                                    <option data-countryCode="PK" value="92">Pakistan (+92)</option>
                                    <option data-countryCode="PW" value="680">Palau (+680)</option>
                                    <option data-countryCode="PA" value="507">Panama (+507)</option>
                                    <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                    <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                    <option data-countryCode="PE" value="51">Peru (+51)</option>
                                    <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                    <option data-countryCode="PL" value="48">Poland (+48)</option>
                                    <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                    <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                    <option data-countryCode="RO" value="40">Romania (+40)</option>
                                    <option data-countryCode="RU" value="7">Russia (+7)</option>
                                    <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                    <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                    <option data-countryCode="ES" value="34">Spain (+34)</option>
                                    <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                    <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                    <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                    <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                    <option data-countryCode="TJ" value="992">Tajikistan (+992)</option>
                                    <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                    <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                    <option data-countryCode="GB" value="44">UK (+44)</option>
                                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                 
                                  </select></td>
                            </tr></table>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="accordion-item">
                    <div class="item-content item-input">
                      <div class="item-inner" style="padding-bottom: 0px;">
                        <div class="item-title item-label"><div id="timeingdiv" style="display: none; color:#386892;"><span>잠시후 인증번호 재 발송이 가능합니다.</span><span id="timing" style="font-weight: 500; "></span></div></div>
 
                        <div class="item-input-wrap">
                            <div  style="width:100%; padding: 10px 15px">
                                <div class="row no-gap">
                         
                          <div class="col-70"> 
                            <input id="phoneinput"  type="number" name="myphone" placeholder="새로운 핸드폰 번호..." style="border-bottom: #386892 solid 1px; font-size: 20px;" ></div>
                          <div class="col-30" style="padding: 5px 0px 0px 10px; ">
                            <button onclick = "phonesubmit()" class="col button button-outline button-round" style="border-color: #386892; color: #386892; font-size: 20px ; font-weight: 400;">OK</button>
                            </div>
                          </div>
                      </div>

                         
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="accordion-item">
                    <div class="item-content item-input">
                      <div class="item-inner">
                    
                                            <div class="item-input-wrap">
                          
                              <div class="row no-gap" style="margin-bottom: 20px;">
                                  
                              </div> 
                        
                         
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <li id="authcodeli" style="display: none;">
                    <div class="item-content item-input">
                      <div class="item-inner">
                        <div class="item-title item-label" style=" color:#386892;">Authentication Code 인증번호 </div>
                        <div  style="width:100%; padding: 10px 15px">
                        <div class="row no-gap">
                            <div class="col-70" style="padding-left: 15px;;">  <input id="codeinput" style="border-bottom: #386892 solid 1px; font-size: 20px;" type="number" name="mycode" placeholder="6자리 인증번호..." ></div>
                            <div class="col-30" style="padding-top:10px;"> 
                              <button onclick="codesubmit()" class="col button button-outline button-round" style="border-color: #386892; color: #386892; font-size: 20px ; font-weight: 400;">OK</button>
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
                  <div id="emaildiv" class="item-title">이메일: <?php $email = $member->email; if(isset($email)) echo $email;?></div>
                  <div class="item-after"></div>
                </div>
              </a>
              <div class="accordion-item-content" style="background-color:#eee;">
              
               
                <ul style="margin: 10px 10px; background-color:#fff;">
                  <li class="accordion-item">
                    <div class="item-content item-input">
                      <div class="item-inner" style="padding-bottom: 0px;">
                     
                        <div class="item-input-wrap">
                            <div  style="width:100%; padding: 10px 15px">
                                <div class="row no-gap">
                         
                          <div class="col-70"> 
                            <input id="emailinput" type="text"  style="border-bottom: #386892 solid 1px; font-size: 20px; " name="user_name" placeholder="Email..." <?php $email = $member->email; if(isset($email)) echo 'value="'.$email.'"';?> /></div>
                          <div class="col-30" style="padding: 5px 0px 0px 10px; ">
                            <button onclick="submitemail()" class="col button button-outline button-round" 
                            style="border-color: #386892; color: #386892; font-size: 20px ; font-weight: 400; ">OK</button>
                            </div>
                          </div>
                      </div>

                         
                        </div>
                      </div>
                    </div> 
                   
                  </li>
                  
                
                </ul>
       
              
      
      </div>
            </li>
            <li  class="accordion-item" style="display: none;" >
              <a href="" class="item-link item-content">
              
                <div class="item-inner">
                  <div id="postmaildiv" class="item-title">우편 주소:</div>
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
                                 
                                  <div class="col-80"> <input id="postmailinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="우편 주소" ></div>
                                  <div class="col-20" style="vertical-align: middle;">  <button  class="button convert-form-to-data" style=" color:#a82a21; margin-top:7px; height: 30px; "><img src="/images/check.png" style="width: 28px;"></button></div>
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
  </div>
  </div>


         

<script src="/assets/framework7_578/js/framework7.bundle.min.js"></script>
<script type="text/javascript" src="/assets/green/js/libs/jquery-1.10.2.min.js"></script>


<script>


  var tomember = <?php if($member->status == 10) {echo '0';} else { echo '1';} ?>;

 var app = new Framework7({
  root: '#app',
  theme: 'ios'
});
if (app.device.ios) 
  {
    $("#imageli").hide();
  }
$("option[data-countryCode='<?php $ccode = $user->country_code; if(!isset($ccode)) $ccode = 'KR'; echo $ccode;?>']").attr("selected","selected");
app.tab.show('#tab-4');

function changeImage(e)
{
  $("#profileimg").attr("src", "/images/thumb/" + e);

}
function submitname()
{
  if($("#nameinput").val()==""){

             
app.dialog.alert("사용자 네임을 입력해 주시기 바랍니다.",'OKCN Radio');
setTimeout(function () { app.dialog.close();}, 3000);
}

else {

app.request.post('/app/postusername/<?php echo $user->id;?>', { user_name:$("#nameinput").val() }, function (data) {
    $("#namediv").html("이름: " + $("#nameinput").val());
    app.accordion.close(".accordion-item") ;
   
    if (app.device.android) 
  {
    Android.changeNameShare($("#nameinput").val());
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage($("#nameinput").val());
    }


  });  
}
}
function submitemail()
{
  if($("#emailinput").val()==""){

             
app.dialog.alert("이메일을 입력해 주시기 바랍니다.",'OKCN Radio');
setTimeout(function () { app.dialog.close();}, 3000);
}

else {

app.request.post('/app/postemail/<?php echo $member->id;?>', { email:$("#emailinput").val() }, function (data) {

  if(data == "invalid"){
    app.dialog.alert("정확한 이메일을 입력해 주시기 바랍니다.",'OKCN Radio');
setTimeout(function () { app.dialog.close();}, 3000);
  } 

  if(data == "done")
  {
    $("#emaildiv").html("이메일: " + $("#emailinput").val());
    app.accordion.close(".accordion-item") ;
  }

  
   


  });  
}
}

function phonesubmit(){

  var country = $("#contrycode option:selected").val();
                  var phone = $("#phoneinput").val();
                if( phone.length == 10 || phone.length == 11)
                {

                    app.request.post('/app/sendsms', { phone: phone, country: country }, function (data) {
                        var myTimer, timing = 60;
                        $('#timeingdiv').show();
                        $('#timing').html(timing);
                        $('#phonesubmit').html('재발송').hide();
                        myTimer = setInterval(function() {
                                   --timing;
                                  $('#timing').html(timing);
                                 if (timing === 0) {
       
                                   clearInterval(myTimer);
                                  $('#phonesubmit').show();
                                  $('#timeingdiv').hide();
                                  }
                                  }, 1000);



                        app.dialog.alert('6자리수 인증번호를 발송하였습니다.휴대전화 문자메시지에서 인증번호를 확인 후 인증번호 입력란에 입력하세요! ','OKCN Radio');
                       
                        
                   $('#authcodeli').show();
                    setTimeout(function () { app.dialog.close(); }, 10000);
                  });  
                   
                    
                }else{

                    app.dialog.alert("전화번호를 정확히 입력해 주시기 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                }
}

function codesubmit(){
  var code = $("#codeinput").val();
                  var regs = /\d{6}/;
                  if(!regs.test(code)){
                    app.dialog.alert("인증번호를 정확히 입력해 주시기 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                  }else{
                    app.request.post('/app/confirmcode/<?php echo $user->id;?>', { code: code }, function (data) {
                        var info =	JSON.parse(data);
                      
                    if(info.status == "success")
                     {
                      window.location.assign("/app/member/<?php echo $user->id;?>");
                   //  $('#authcodeli').hide();
                   //  $("#phonenumberdiv").html("핸드폰 번호 :" + info.name);
                   //  app.accordion.close(".accordion-item") ;
                     }
                     if(info.status == "wrongcode")
                     {
                        app.dialog.alert("정확한 인증번호가 아닙니다. 다시 입력해 주시기 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                     }
                     if(info.status == "expired")
                     {
                        app.dialog.alert("인증번호 유호기간이 지났습니다. 인증번호를 다시 발송 받으시길 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                     }

                    
                    
                });
                  }

}

function memberclick(e)
{

var res = e.split("$");
tomember = res[1];
if(res.length == 2)
{
  $("#messageinput").attr('placeholder',  '@'+res[0]+' 메세지...');
} else if(res[2] == 10)
{
  $("#messageinput").attr('placeholder',  '@'+res[0]+' 메세지...');
}

}

function sendmessage()
{

  if($("#messageinput").val()==''){
    app.dialog.alert("메세지를 입력해 주시기 바랍니다.","OKCN Radio");
    setTimeout(function () { app.dialog.close();}, 3000);
  }else{
    app.request.post('/app/messagefromapp/<?php echo $member->id;?>', { message: $("#messageinput").val() ,tomember:tomember}, function (data) {
      location.reload();
     })
  }
  
}
function openGallery(){
 
  if (app.device.android) 
  {
    Android.openGallery();
   } else 
   {
    webkit.messageHandlers.callbackHandler.postMessage("openGallery");
    }

}
</script>

</body>
</html>
