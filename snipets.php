<script>
chatWindow = document.getElementById('chat-window'); 
var xH = chatWindow.scrollHeight; 
chatWindow.scrollTo(0, xH);

///////////////////////////Animated With Jquery//////////////////
$('#myMessageContainer').stop ().animate ({
  scrollTop: $('#myMessageContainer')[0].scrollHeight
});
</script>