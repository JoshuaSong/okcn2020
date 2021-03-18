<script>
	  $(document).ready(function() 
        {
        	$.slidebars();
        	 if(window.location.hash) {
  var e = window.location.hash.replace("#","");
  $.get( "/vou/c/"+e, function( data ) {
                       $( "#channelDiv" ).html( data );});
        	
} else {
  // Fragment doesn't exist
}
        	$(window).on('hashchange', function() {
        		var prevHash = window.location.hash;
        		alert(prevHash);
  
});
        })
       
</script>

</head>
<body>