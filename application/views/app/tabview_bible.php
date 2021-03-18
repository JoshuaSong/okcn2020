<style>
   
    a:focus, a:hover {
      text-decoration-line: none;
    }
    .tabbar.toolbar-top a.tab-link-active {
    border-bottom: 2px solid #a82a21;
    font-weight: 700;
    color:#a82a21;
}

.content{
font-size: 24px;
line-height: 30px;
color: #444;

}
.label {
    color: #a82a21;
    font-size: 24px;
    font-family: "Helvetica Neue",Arial,"Liberation Sans",FreeSans,sans-serif;
    font-weight: bold;
    line-height: 1;
    margin-top: 2px;
    margin-left: 4px;
    margin-right: 6px;
}
div.label {
    display: none;
}

sup {
    color: #008000;
}
.notification.modal-in{
  top:110px;
  background-color: #fff;
}
td.verseNumber
	{
		font-size: x-large;
 vertical-align:top;
 color:Blue;
		
		}
	td.verseContent
	{
		font-size: x-large;
letter-spacing: 0.02em;
padding: 1px;
font-family: "Ezra SIL","TITUS Cyberbit Basic","SBL Hebrew","New Peninim MT","Cardo","Arial Unicode MS","New Athena Unicode", "Gentium", "Palatino Linotype", "Lucida Grande", "Galilee", "Arial Unicode MS", "sans-serif";
		}
.tablefloat {
float: left;

margin: 0px;
}
.floatLeft
{
	float: left;
margin: 4px;
	font-size: 20px;
	}
	
	.eng
	{
		font-size:16px;
		color: #b35a33;
		}
	.ps
	
	{font-size:14px;
		color: Green;
		
		}
span.heading
{
	font-size: 20px;
	}
span.reftext
{
	font-size: 16px;
	
  }
  .note {
    display: none;
}
</style>
<template>
<div class="page" data-name="bible">
<?php $data['title']='성경';  $this->load->view('/app/page_navbar',$data);?>
<p class="segmented segmented-raised" style="position:relative; z-index: 100; background-color: #fff; width: 100%; padding: 8px; top:58px">
  <a id="bbn" href=""  class="button" style="font-size: 20px; ">Bible</a>
    
  <a id="bvn"  class="button" href="/bibleversionlist/" style="font-size: 20px; ">Version</a>
  </p>
  <div class="page-content" style="margin-top:60px; background-color: #eee; padding-top:0px">
   <div class="block" style="margin-top: 0px;">
    
    <div class="row"  style="text-align: center;font-size: 50px; margin-top:20px;">
      <div class="col-20"> <button class="button" style="height: 50px;"><i class="f7-icons" style="font-size: 40px;">chevron_left_circle</i></button></div>
      <div class="col-60">  <button class="button" style="height: 50px;"><i class="f7-icons" style="font-size: 50px;" >play_rectangle</i></button> <span id="pbbn" style="font-size: 30px;"></span></div>
      <div class="col-20"><button class="button" style="height: 50px;" onclick="nextchapter()"><i class="f7-icons" style="font-size: 40px;">chevron_right_circle</i></button></div>
    </div>
    <div id="bibleChapter">

    </div>
    <br/><br/><br/><br/><br/><br/>
  </div>
  </div>
</div>

</template>

<script>

return {
  on:{
   pageInit:function (e,page){
  
        initpage();
       

   },
  pageReinit: function (e,page)
  {
    initpage();


  }
 }
}
function initpage(){
  app.request.get('/html/bible/' + bvs + bid + '.html', function (data) {
    $('#bibleChapter').html(data);
    $('#bbn').html(bbn + '&nbsp;&nbsp;' + chid);
    $('#pbbn').html(bbn + '&nbsp;&nbsp;' + chid);
    $('#bvn').html(bvn);
    $("#bbn").attr("href", "/biblebooklist/" + blang + "/" + ot + "/" +nt);
    

    $('sup').on('click', function (e) {
     var strong = $(e.target).html();
      app.request.get('/html/dict/strongs/' + strong + '.html', function (data) {
        var notificationWithButton = app.notification.create({
  icon: '<i class="f7-icons">book_circle_fill</i>',
  title: 'Strongs Bible Dictionary',
  subtitle: strong ,
  text: data,
  closeButton: true,
       });
       notificationWithButton.open();
      })
     
     });
  });
}

</script>