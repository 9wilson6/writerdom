$(document).ready(function(){
	$('#check'). click(function(){

		if($(this). prop("checked") == true){
			$('.dashboard_nav_left').css("display","inline");
		}
		else if($(this). prop("checked") == false){
			$('.dashboard_nav_left').css("display","none");
			$(window).on('resize', function(event){
				var windowWidth = $(window).innerWidth();
				if(windowWidth >= 992){
					$('.dashboard_nav_left').css("display","inline");
				}else{
					$('.dashboard_nav_left').css("display","none");
				}
			});

		}
	});




});

////////////////CHAT ///////////////
$("#chat_form").submit(function(event) {
	"use strict";
	event.preventDefault();

	let project_id= $("input[name='project_id']").val();
	let user_type= $("input[name='user_type']").val();
	let message= $("textarea").val();
	let student_id=$("input[name='student_id']").val();
	let tutor_id=$("input[name='tutor_id']").val();
	let submit = "submit";
	$.post("../chat", 
	{
		project_id: project_id,
		user_type: user_type,
		message: message,
		submit: submit,
		student_id: student_id,
		tutor_id: tutor_id
	} ,
	function(data, status){
		$("textarea").val("");
		$('#files').stop().animate({ scrollTop: $('#files')[0].scrollHeight});
		$('#messageBox').stop().animate({ scrollTop: $('#messageBox')[0].scrollHeight});
	});



});


//////////////////CHAT////////////

//////////////////////////////////////////////////


/////////////////////////////////////////////////