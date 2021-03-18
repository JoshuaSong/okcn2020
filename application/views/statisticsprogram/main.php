<!-- Table -->
<section class="datagrid-panel">
	
	<div class="content">
		<div class="panel">
			<div class="content-header no-mg-top">
				
				<i class="fa fa-bar-chart"></i>
				<div class="content-header-title"><?php echo $title;?></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content-box">
					<form action="" class="form-horizontal" method="post">
	<div class="row">
	<div class="col-md-6">	
     <div class="form-group ">
      <label class="control-label" for="date">
       Start Time
      </label>
    
		  
       <div class="input-group">
        <div class="input-group-addon"> <i class="fa fa-calendar"> </i></div>
        <input class="form-control" date="picker" id="startdate" name="startdate" placeholder="YYYY-MM-DD" value="<?php echo $start;?>" type="text"/>
       </div>
      </div>
	  </div>
	  <div class="col-md-6">	
     <div class="form-group ">
      <label class="control-label" for="date">
       End Time
      </label>
    
		  
       <div class="input-group">
        <div class="input-group-addon"> <i class="fa fa-calendar"> </i></div>
        <input class="form-control" id="enddate" date="picker" name="enddate" placeholder="YYYY-MM-DD" value="<?php echo $end;?>" type="text"/>
       </div>
      </div>
	  </div>
      </div>

	</form>
	

	<div class="row">
			<div class="col-md-12">
				<div class="content-header">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Programs</div>
				</div>
				<div class="content-box" style="height: 1000px;">
				<canvas id="channel-chart"></canvas>
				</div>
			</div>

		
		
		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
$(document).ready(function(){
		var date_input=$('input[date="picker"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		});
		date_input.change(function () {
			location.assign("http://okcnradio.org/StatisticsPrograms/view/" + $('#startdate').val() + "/" + $('#enddate').val());
		});
		
		var channelChart = $("#channel-chart");
var horizontalBarChartData = {
			labels: [<?php foreach($channelcounts as $item) { echo '"'.$item->channel_title.'['.$item->total.']",';} ;?>],
			datasets: [{
				label: "vistor",
			
				backgroundColor: "#0099ff",
				
				data: [<?php foreach($channelcounts as $item) { echo $item->total.',';} ;?>]
			}]

		};
		var mychannelChart = new Chart(channelChart, {
			type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					maintainAspectRatio: false,
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: ''
					}
				}
		});
	})


</script>