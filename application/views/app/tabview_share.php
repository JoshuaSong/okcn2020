<style>
    .message-text-header{
        font-size: 18px; color:#a82a21
    }
</style>
<template>
<div class="page" data-name="share">
<?php $data['title']='은혜나눔';  $this->load->view('/app/page_navbar',$data);?>
<div class="page-content">
<div class="toolbar messagebar" style="top:16px; background-color:#e5e5ea; border-bottom:solid #aaa 1px">
    <div class="toolbar-inner" style="padding:  5px">
      <div class="messagebar-area">
        <textarea class="resizable" placeholder="오늘 받은 은혜는 ..." style="background-color: ghostwhite;"></textarea>
      </div><a class="link send-link" href="#">나눔</a>
    </div>
  </div>
  <div class="page-content messages-content" style="padding-top: 20px;">
    <div class="messages" >
     
<?php foreach($comments as $item) {?>
    <div class="messages-title"></div>
      <div class="message message-received" style="max-width: 90%;">
        <div class="message-avatar" style="background-image:url(/images/avatar.jpg); opacity: 1;"></div>
        <div class="message-content">
          <div class="message-name">  </div>
          <div class="message-header">  </div>
          <div class="message-bubble">
            <div class="message-text-header"><?php echo $item->user_name?></div>
            <div class="message-text"><?php echo $item->contents;?></div>
            <div class="message-text-footer"><?php echo $item->create_time;?><br/></div>
          </div>
          <div class="message-footer"><br></div>
        </div>
      </div>
      <?php }?>
</div>
</div>
</div>

</template>
