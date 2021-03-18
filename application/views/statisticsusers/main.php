<!-- Table -->
<section class="datagrid-panel">
	
	<div class="content">
		<div class="panel">
			<div class="content-header no-mg-top">
				
				<i class="fa fa-bar-chart"></i>
				<div class="content-header-title">LAST VISITORS: <?php echo $totalvisitor;?></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="content-box">
					<form action="https://formden.com/post/MlKtmY4x/" class="form-horizontal" method="post">
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
			<div class="col-md-5">
				<div class="content-header">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">접속 방식</div>
				</div>
				<div class="content-box">
					<canvas id="canvas-donut"></canvas>
				</div>
			</div>

			<div class="col-md-7">
				<div class="content-header">
					<i class="fa fa-newspaper-o"></i>
					<div class="content-header-title">Timezone 접속</div>
				</div>
				<div class="content-box">
					<canvas id="canvas-country"></canvas>
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
			location.assign("http://okcnradio.org/StatisticsUsers/view/" + $('#startdate').val() + "/" + $('#enddate').val());
		});
		
		var countryChart = $("#canvas-country");
		var configcuntry = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [ <?php foreach($countrys as $item) { echo $item->total.',';} ;?>],
					backgroundColor: [
					"#0099ff",
					"#ffcc66",
					"#339933",
					"#ff0066",
					"#cc0066",
					"#009999",
					],
					label: 'Dataset 1'
				}],
				labels: [ <?php foreach($countrys as $item) { echo '"'.$item->timezone.'('.$item->total.')",';} ;?>
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: ''
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
		var mycountryChart = new Chart(countryChart, configcuntry);



		var donutChart = $("#canvas-donut");
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [ <?php foreach($types as $item) { echo $item->total.',';} ;?>],
					backgroundColor: [
					"#0099ff",
					"#ffcc66",
					"#339933",
					"#ff0066",
					
					],
					label: 'Dataset 1'
				}],
				labels: [ <?php foreach($types as $item) { echo '"'.$item->os_type.'",';} ;?>
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: '접속 방식'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
		var mydonutlChart = new Chart(donutChart, config);
	})


</script>