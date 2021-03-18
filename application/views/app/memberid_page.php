<style>

</style>
<template>

<div class="page">
<div class="navbar" style="background-color:#a82a21;  height:60px;">
  <div class="navbar-inner" style="padding-left: 15px;">
           
    <div class="left" >
        <a href="#" class="link back">
          <i class="icon icon-back" style="color:#fff; font-size: 22px"></i>
        </a>
    </div>
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" >선교회원 번호찾기</div>
              
   </div>
</div>
  
	<div class="page-content" style="margin: 20px 15px">	

  <form class="list" id="my-form">
  <ul>
  <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">선교회원으로 등록된 핸드폰 번호</div>
          <div class="item-input-wrap">
            <input type="text" name="phone" placeholder="Your name" <?php if($this->session->userdata('phone')) echo 'value="'.$this->session->userdata('phone').'"';?>>
          </div>
        </div>
      </div>
    </li>
    <li class="accordion-item">
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">선교회원으로 등록된 실명</div>
          <div class="item-input-wrap">
            <input id="nameinput" type="text" name="user_name" placeholder="이름을 입력합니다" >
          </div>
        </div>
      </div>
    </li>
    
   
  </ul>
</form>
<div class="block block-strong row">
  <div id="memberiddiv" class="col" ><a class="button" href="#">선교회원 번호찾기</a></div>
 
</div>
</div>
</template>
 
<script>
	return {
		on: {
			pageInit: function (e, page)  
			  {
         
          $('#memberiddiv').on('click', function(){
          //  app.dialog.alert("성별을 선택해 주시기 바랍니다.",'알려드립니다');
          settingsView.router.navigate('/member/', {});
          //  memberView.router.navigate('/member/', {});
           
	         });
         }
  }
  }


	  </script>