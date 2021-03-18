<style>
  .chapter {
  background: #fff;
  text-align: center;
  color: #000;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 5px;
  margin-bottom: 10px;
  font-size: 18px;
  width:18% ;
  margin-left: 1%;
  margin-right: 1%;
}
.nonechapter {
  height: 0px;
  width:20% ;
}
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
         
     <div class="title sliding " style="color:#fff; padding-left: 5px; font-size: 24px; font-weight: 500;" ><?php echo 'title';?></div>
              
   </div>
</div>
  
	<div class="page-content" style="margin-top:17px;">	
			 
  <div class="list accordion-list" style="">
  <ul>
    <?php $i=0; foreach($booklist as $item){ $i++;?>
      <li class="accordion-item"><a href="#" class="item-content item-link">
        <div class="item-inner">
          <div class="item-title" ><?php echo $item->name;?></div>
        </div></a>
      <div class="accordion-item-content">
        <div class="block" style="padding:0 30px;">
          <div class="row" style="">

            <?php $xx = $item->count + (5 - $item->count%5);  for ($x = 1; $x <= $xx; $x++) { ?>
     <?php if($x <=$item->count) {?>
            <div class="chapter" onclick="backtobible('<?php echo $item->name.'#'.$item->book_id.'-'.$x;?>')"><?php echo $x;?></div>
            <?php } else {?>
              <div class="nonechapter"></div>
            <?php }?>
            <?php }?>
          </div>
         
        </div>
      </div>
    </li> 
              
  <?php }?>
      

  </ul>
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