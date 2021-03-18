<style>
	.media{ width: 32px; float: right; margin-right: 19px; margin-left: 19px}
	.mediaTD{width:70px;}
 	.channelTR:hover{ 	text-decoration: none;
	background-color: rgba(255, 255, 255, 0.05)}
	.channelTR.selected{
		background-color: #023155;

	}
	.channelTR{
		min-height:48px;
		cursor:pointer;
		color:#FFFFFF;
	padding: 0;
	margin: 0;
	border-top: 1px solid rgba(255, 255, 255, 0.1); 
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);}
	
</style>
<script>
var playid=0;
var status="playing";
	function trclick(e)
	{
		if(playid==e)
		{
			if(status=="playing")
			{
			 $("#channelplayer").jPlayer("pause");
			}
			if(status=="pause")
			{
			 $("#channelplayer").jPlayer("play");
			}
		}
		else
		{
			jplaying(e);
		}

	}
	function jplaying(e)
	{
		playid=e;
		$("#channelplayer_container").appendTo("#tt"+e);
		$(".channelTR").removeClass("selected");
		$("#tr"+e).addClass("selected");
		$(".media").attr("src","/src/images/play.png");
		$("#img"+e).attr("src","/src/images/loading.gif");
		$("#channelplayer").jPlayer("destroy");
		$("#channelplayer").jPlayer({
        ready: function () {
                        $(this).jPlayer("setMedia", {
                            mp3:$("#tr"+e).attr("mediaurl")
                        }).jPlayer("play");
                    },
                    supplied: "mp3",
                    cssSelectorAncestor: "#channelplayer_container",
                    useStateClassSkin: true
                });
      

		  $("#channelplayer").bind($.jPlayer.event.play, function() {
     		$(".media").attr("src","/src/images/play.png");
		    $("#img"+e).attr("src","/src/images/pause.png");
		    status="playing";
     	});
     	$("#channelplayer").bind($.jPlayer.event.pause, function() {
         $(".media").attr("src","/src/images/play.png");
         status="pause";
         });
	}
	function sharech(e)
	{
		window.location.href='http://okcnradio.org/vou/p/'+e;
	}
</script>
<table width="100%;">
<?php foreach ($channels as $item): ?>
<tr id="tr<?php echo $item->p_id;?>"  mediaurl="<?php echo $item->program_url;?>"  class= "channelTR">
	<td onclick="trclick(<?php echo $item->p_id;?>)" class="mediaTD"><img id="img<?php echo $item->p_id?>" class="media" src="/src/images/play.png" /></td>
	<td id="tt<?php echo $item->p_id;?>" class="titleTD" ><span><?php echo $item->program_date.'  '.$item->program_title.'  ('.$item->actor_name.')';?></span>
	</td>
	 <td width="30px;" onclick="sharech(<?php echo $item->p_id;?>)"><image src="/src/images/share.png" style="width: 20px;"></image></td>
</tr>
<?php endforeach; ?>
</table>

	
		<div id="channelplayer_container" class="jp-video" role="application" aria-label="media player">
	<div class="jp-type-playlist">
	<div id="channelplayer" class="jp-jplayer" style="display: none"></div>
		<div class="jp-gui">
			
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">	
						<div class="jp-play-bar" style="float: left"></div>
					</div>
					
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				
			</div>
		</div>


		  
	</div>
</div>
