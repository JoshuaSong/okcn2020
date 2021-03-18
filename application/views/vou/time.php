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
	 var y=d.getFullYear().toString();
	 var mm=(d.getMonth()+1).toString();
	 var dd=d.getDate().toString();
	 var h = d.getHours().toString();
	 var m = d.getMinutes().toString();
	 var s = d.getSeconds().toString();

 var post=y+'-'+mm+'-'+dd+'  '+h+':'+m+':'+s;
   location.replace('/vou/g/'+post);
}

</script></head><body onload="ready()"></body></html>