$(function(){

 
setInterval(function() {
        $("#messageBox").load("../chat", {
           project_id: project_id,
           user_type: user_type
        });
        // alert(project_id+"user"+user_type);
    //     $('#files').stop().animate({ scrollTop: $('#files')[0].scrollHeight});
    // $('#messageBox').stop().animate({ scrollTop: $('#messageBox')[0].scrollHeight});
    
    }, 100);

 $('#messageBox').stop().animate({ scrollTop: $('#messageBox')[0].scrollHeight});

 $('textarea').keyup(function(){
    // alert(user_type);
    $.post("../chat", {
           project_id: project_id,
           user_type: user_type,
           event: "keylistener"
        });   
 });
 
});
