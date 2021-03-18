<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Latest compiled and minified CSS
    <meta property="og:image" content="https://dl.dropboxusercontent.com/u/385223495/vou/images/theday.jpg"/>
	<meta property="og:title" content="통일의 소리 방송" />
	<meta property="og:description" content="통일의 소리 방송을 시작합니다." />
	 -->
<script>
function ready(){

	 var d = new Date();
	 var y=d.getFullYear();
	 var mm=("0"+(d.getMonth()+1)).slice(-2);
	 var dd=("0" +d.getDate()).slice(-2);
	 var h = ("0" +d.getHours()).slice(-2);
	 var m = ("0" +d.getMinutes()).slice(-2);
	 var s =  ("0" + d.getSeconds()).slice(-2);

 var post=y+'_'+mm+'_'+dd+'_'+h+':'+m+':'+s;
//  var post= d.toISOString().substr(0,10);
   location.replace('/test/t/'+post);
}

</script></head><body onload="ready()"></body></html>