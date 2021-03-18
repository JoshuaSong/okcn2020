function menuclick(e)
{
	commHide()
	$("#footer").hide();
	$("#onairTable").hide();
	$.get( "/vou/c/"+e, function( data ) {
                       $( "#channelDiv" ).html( data );});
    $("#posterImg").attr("src",($("#c"+e).attr("poster")));
  $("#jquery_jplayer_1").jPlayer("destroy");
}

   
    function sharesns(e)
    {
 
    $(".commshow").hide();
    $(".commhide").show();
    $("#snsdiv").slideToggle();
   
  
    }
    function snshide()
    {
  
    $("#onairTable").show();
    $("#snsdiv").hide();
    }
    function commclick()
    {
    	$(".commshow").toggle();
    	$(".commhide").toggle();
    	
    	getcomm(c_id);
    }
     function commShow()
    {
    	$("#posterImg").hide();
    	$("#onairTable").hide();
    	$("#comm_input_div").show();
    	$("#comm_tr").show();	
    	$("#commDiv").show();
    }
     function commHide()
    {
    	$(".commshow").hide();
    	$(".commhide").show();
    }
    
    function commpostclick()
    {
    	<?php if ($this->session->userdata('user_name')): ?>
    	//alert("OK");
    	var commval=$("#comminput").val();
    	$.post( "users/commentpost", {cid:c_id,comm:commval}, function( data ) {
    
     $("#comminput").val("");
        });
         <?php endif ?>
    }
    function commoninputclick()
    {
    	<!--
    	<?php if (!$this->session->userdata('user_name')): ?>
    	alert("로그인 혹은 회원가입을 하셔야 사연을 올릴수 있습니다");
    	location.replace('http://members.eprayerapp.com/mauth/site_signup/vou/');
   <?php endif ?>
   -->
    }
    function getcomm(e)
    {
    	$.get("/users/commentlist/"+e,function(data){
    		$("#commDiv").html(data);
    	});
    }
    
    function sharewithkakao(e)
    {
    	$.get("/users/ps/"+e+"/kakao");
    }