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
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" >신규 선교회원 가입하기</div>
              
   </div>
</div>
  
	<div class="page-content" style="margin-top:17px;">	

  <form class="list" id="my-form">
  <ul>
  <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">핸드폰 번호</div>
          <div class="item-input-wrap">
            <input type="text" name="phone" placeholder="Your name" <?php if($this->session->userdata('phone')) echo 'value="'.$this->session->userdata('phone').'"';?>>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">실명</div>
          <div class="item-input-wrap">
            <input type="text" name="name" placeholder="Your name">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">E-mail</div>
          <div class="item-input-wrap">
            <input type="email" name="email" placeholder="E-mail">
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content item-input">
        <div class="item-inner">
          <div class="item-title item-label">Gender</div>
          <div class="item-input-wrap">
            <select name="gender">
              <option value="male" selected>Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div class="item-content">
        <div class="item-inner">
          <div class="item-title">소식지 받아보기 원함</div>
          <div class="item-after">
            <label class="toggle toggle-init">
              <input type="checkbox" name="toggle" checked value="yes"><i class="toggle-icon"></i>
            </label>
          </div>
        </div>
      </div>
    </li>
  </ul>
</form>
<div class="block block-strong row">
  <div class="col"><a class="button convert-form-to-data" href="#">선교회원 가입하기</a></div>
 
</div>
</div>
</template>

<script>
	return {
		on: {
			pageInit: function (e, page)  
			  {
         
	}
  }
  }


	  </script>