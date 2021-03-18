<style>
    .message-text-header{
        font-size: 18px; color:#a82a21
    }
    li:nth-child(even) {background: none}
    .item-label{color:#a82a21 !important}
</style>
<template>
<div class="page" data-name="bible">
<?php $data['title']='마이메뉴';  $this->load->view('/app/page_navbar',$data);?>
<div class="page-content">


<div class="list accordion-list inset" style="border: 1px #ccc solid; margin-top:60px;">
  <ul>
    <li  class="accordion-item <?php if(!$this->session->userdata('user_name')) echo 'accordion-item-opened'?>" >
      <a href="" class="item-link item-content">
        <div class="item-media"><i class="f7-icons">person_crop_circle</i></div>
        <div class="item-inner">
          <div id="namediv" class="item-title">이름<?php if($this->session->userdata('user_name')) echo '&nbsp;:&nbsp;&nbsp;'.$this->session->userdata('user_name');?></div>
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
                         
                          <div class="col-70"> <input id="nameinput" type="text" style="border: #ccc solid 1px; font-size: 20px; border-radius: 3px; background:#fff;" name="user_name" placeholder="이름을 입력합니다" <?php if($this->session->userdata('user_name')) echo 'value="'.$this->session->userdata('user_name').'"';?>></div>
                          <div class="col-30" style="vertical-align: middle;">  <button id="namesubmit" class="button convert-form-to-data" style=" color:#a82a21; margin-top:10px "><i class="f7-icons" style="font-size:24px;">checkmark_circle</i><span style="font-size:20px;">확인</span> </button></div>
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
    <li id="phoneaccordionli" style="" class="accordion-item">
      <a href="#" class="item-link item-content">
        <div class="item-media"><i class="f7-icons">phone_circle</i></div>
        <div class="item-inner">
          <div id="phonenumberdiv" class="item-title">핸드폰 번호 <?php if($this->session->userdata('tem_phone')) echo ': '.$this->session->userdata('tem_phone')?></div>
          <div class="item-after"></div>
        </div>
      </a>
      <div class="accordion-item-content" style="background-color:#eee;">
      
       
        <ul style="margin: 10px 10px; background-color:lightyellow;">
          <li class="accordion-item">
            <div class="item-content item-input">
              <div class="item-inner">
                <div class="item-title item-label">Country Code 국가번호 </div>
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
              <div class="item-inner">
            
                <div class="item-title item-label"><div id="timeingdiv" style="display: none; color:#a82a21"><span>잠시후 인증번호 재 발송이 가능합니다.</span><span id="timing" style="font-weight: 500; "></span></div></div>
                <div class="item-input-wrap">
                  
                      <div class="row no-gap" style="margin-bottom: 20px;">
                        <div class="col-70" style="padding-left: 15px;;">  <input id="phoneinput"  type="number" name="myphone" placeholder="핸드폰 번호 입력..." style="font-size: 24px;" <?php if($this->session->userdata('phone')) echo 'value="'.$this->session->userdata('phone').'"';?>></div>
                       
                        <div class="col-30" style="padding-top:10px;"> <button id="phonesubmit" class="button convert-form-to-data" style=" color:#a82a21; font-size: 20px;"><i class="f7-icons">doc_checkmark</i>확인</button></div>
                      
                      </div> 
                
                 
                </div>
              </div>
            </div>
          </li>
          
          <li id="authcodeli" style="display: none;">
            <div class="item-content item-input">
              <div class="item-inner">
                <div class="item-title item-label">Authentication Code 인증번호 </div>
                <div class="row no-gap">
                    <div class="col-70" style="padding-left: 15px;;">  <input id="codeinput"  type="number" name="mycode" placeholder="인증번호..." style="font-size: 30px;"></div>
                    <div class="col-30" style="padding-top:10px;"> <button id="codesubmit" class="button convert-form-to-data" style=" color:#a82a21; font-size: 20px;"><i class="f7-icons">doc_checkmark</i>확인 </button></div>
                  </div> 
               
              </div>
            </div>
          </li>
         
        </ul>
    </div>
    </li>
    <li id="modolli" style="" class="accordion-item">
        <a href="#" class="item-link item-content">
            <div class="item-media"><i class="f7-icons">person_2_square_stack</i></div>
            <div class="item-inner">
              <div id="phonenumberdiv" class="item-title">모돌선교회원</div>
              <div class="item-after"><i class="f7-icons"></i></div>
            </div>
          </a>
          <div class="accordion-item-content" style="background-color:#eee;">
            <div class="list inset links-list">
                <ul style="margin: 10px 10px; background-color:lightyellow; color:#a82a21; font-size: 20px">
                    <li><a href="/memberid/">기존 선교회원 번호찾기</a></li>
                    <li><a href="/newmember/">신규 선교회원 가입하기</a></li>
                </ul>
              </div>
            </div>
    </li>
  </ul>
  <!--
  <div class="block-footer" >
    <p>본인의 이름과 핸드폰 번호를 등록하시면 더 많은 혜택을 누리실수 있습니다.</p>
  </div>
  -->
</div>

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
</div>

</template>
<script>
return {

    on: {
        pageInit: function (e, page)  
          {
            $("option[data-countryCode=' <?php  echo $this->session->userdata('country');?>']").attr("selected","selected");
            $('#namesubmit').on('click', function(){
             var formData = app.form.convertToData('#my-form');
             if($("#nameinput").val()==""){
                app.dialog.alert("이름을 입력해 주시기 바랍니다.",'OKCN Radio');
               setTimeout(function () { app.dialog.close();}, 3000);
               }
               // else if($("input[name='demo-radio-inline']:checked").val()==null){
               // app.dialog.alert("성별을 선택해 주시기 바랍니다.",'OKCN Radio');
              // setTimeout(function () { app.dialog.close();}, 3000);
              // } 
               else {
              //  app.request.post('/app/postusername', { user_name:$("#nameinput").val(),gender:$("input[name='demo-radio-inline']:checked").val() }, function (data) {
                app.request.post('/app/postusername', { user_name:$("#nameinput").val() }, function (data) {
                    $("#namediv").html("이름: " + $("#nameinput").val());
                    app.accordion.close(".accordion-item") ;
                  });  
               }
              });

              $('#phonesubmit').on('click', function(){
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



                        app.dialog.alert('6자리수 인증번호를 발송하였습니다.휴대전화 문자메시지에서 인증번호를 확인 후 인증번호 입력란에 인증번호를 입력하세요! ','OKCN Radio');
                       
                        
                   $('#authcodeli').show();
                    setTimeout(function () { app.dialog.close(); }, 10000);
                  });  
                   
                    
                }else{

                    app.dialog.alert("전화번호를 정확히 입력해 주시기 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                }
                   
                 
               
              });


              $('#codesubmit').on('click', function(){
                  var code = $("#codeinput").val();
                  var regs = /\d{6}/;
                  if(!regs.test(code)){
                    app.dialog.alert("인증번호를 정확히 입력해 주시기 바랍니다.","OKCN Radio");
                    setTimeout(function () { app.dialog.close();}, 3000);
                  }else{
                    app.request.post('/app/confirmcode', { code: code }, function (data) {
                        var info =	JSON.parse(data);
                        if(info.status == "signupeduser"){
                            $('#authcodeli').hide();
                            $("#phonenumberdiv").html("핸드폰 번호 :" + info.tem);
                            $("#namediv").html("이름: " + info.name);
                            $("#nameinput").val(info.name);
                            app.accordion.close(".accordion-item") ;
                        }
                        if(info.status == "success")
                     {
                     $('#authcodeli').hide();
                     $("#phonenumberdiv").html("핸드폰 번호 :" + info.name);
                     app.accordion.close(".accordion-item") ;
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

              

              });


             
            }
    }

}

</script>