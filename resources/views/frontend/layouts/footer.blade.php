<footer class="main-footer">
	<div class="container">
        
        <!--    
	   <a href="{{route('completedoffer')}}" style="font-size:14px;font-weight:bold">Completed Offers</a> |
		<a href="#" style="font-size:14px;font-weight:bold">Customer Support</a>
	    -->
	    
	    <a href="{{asset('Terms-and-Condition')}}" target="_blank" style="font-size:14px;font-weight:bold">Terms and Condition</a> |
		<a href="{{asset('privacy-policy')}}" target="_blank" style="font-size:14px;font-weight:bold">Privacy Policy</a>
	    
	</div>
</footer>
<script defer>
	$(document).ready(function(){
		
		if(sessionStorage.getItem("new") == 'test'){
			console.log(sessionStorage.getItem("new"))
			var check = $('html,body').find('.compare_deals');
			var interval = setInterval(function(){
				if(check.length > 0){
					$('html,body').animate({
					scrollTop: $(".compare_deals").offset().top},
					'slow',function(){
						console.log('happen')
						setTimeout(function(){
							clearInterval(interval);
						},1000)
					});
					
				}
			},1000);
		}
		
		var url = window.location.href;
		if(url != '{{asset("dashboard")}}'){
			$('.compare_btn').attr('href',"{{asset("dashboard")}}");
			$('.compare_btn').addClass('compare_auto');
			// $('html,body').animate({
			// scrollTop: $(".compare_deals").offset().top},
			// 'slow');
		}else{
			sessionStorage.clear();
			$('.compare_btn').removeClass('compare_auto');
		}
	});
</script>


<script>
$(document).ready(function(){

var ws = new WebSocket("ws://localhost:8090/");
ws.onopen = function () {
	console.log("Websocket connected");
}
ws.onmessage = function (event) {
    // Message received
	
	var s = JSON.parse( event.data);
	
	
	if(s != null || s !=  "undefined"){
	var newspot = parseInt(s.message) - 1 ;
	$("#spot"+s.id).empty().html(newspot);
	}
	
    console.log("Message received = " + event.data + ' ' + s.message + ' == ' +  s.id);
};
ws.onclose = function () {
    // websocket is closed.
    console.log("Connection closed");
};
   

})
</script>


<script type="text/javascript">
$(document).on('click', '#fire', function(e){
e.preventDefault(); 



var ws = new WebSocket("ws://localhost:8090/");
var idx = 260;

ws.onopen = function () {
    // Websocket is connected
    console.log("Websocket connected");
	var text = $("#spot"+idx).text();
	var array = {'id':idx,'message':text}
	
	var s = JSON.stringify(array)
	ws.send(s);
	console.log("Message sent");
};
ws.onmessage = function (event) {
    // Message received
	//console.log("Message received = " + event.data);
};
ws.onclose = function () {
    // websocket is closed.
    console.log("Connection closed");
};
   
});
</script>
			