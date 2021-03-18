<html><head><script>
function ready(){
	 var d = new Date();
	 var h = d.getHours().toString();
	 var m = d.getMinutes().toString();
	 var s = d.getSeconds().toString();
   // alert(h);
   //  var m=parseInt(d.toString().split(":")[1])%15;
   //  var starttime=parseInt(tz)+m*60;
    location.replace('http://okcnradio.org/vou/gt/'+h+":"+m+":"+s);
}

</script></head><body onload="ready()"></body></html>