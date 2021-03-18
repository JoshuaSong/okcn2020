<style>
	.media{ width: 32px; float: right; margin-right: 19px; margin-left: 19px}
	.mediaTD{width:70px;}
 	.channelTR:hover{ 	text-decoration: none;
	background-color: rgba(255, 255, 255, 0.05)}
	.channelTR.selected{
		background-color: #023155;

	}
	
	
	table.channel_table tr{
		height: 50px;
		cursor:pointer;
	color:#FFFFFF;
	padding: 5px;
	margin: 0;
	border-top: 1px solid rgba(255, 255, 255, 0.1); 
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
	}
	table.channel_table tr:nth-child(even) 
	{background-color: rgba(255, 255, 255, 0.25)}
	
</style>

<table class="channel_table" width="100%;">
<?php foreach ($channels as $item): ?>
<tr id="tr<?php echo $item->p_id;?>" onclick="trclick(<?php echo $item->p_id;?>)" mediaurl="<?php echo $item->program_url;?>"  class= "channelTR">
	<td  class="mediaTD"><img id="img<?php echo $item->p_id?>" class="media" src="/src/images/Media.png" /></td>
	<td id="tt<?php echo $item->p_id;?>" class="titleTD" ><span><?php echo $item->program_date.'  '.$item->program_title.'  ('.$item->actor_name.')';?></span>
	</td>
</tr>
<?php endforeach; ?>
</table>
