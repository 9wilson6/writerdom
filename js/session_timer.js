$(function(){
	let timeStamp= new Date();
	localStorage.setItem("lastTimeStamp", timeStamp);
	function timeChecker(){
		setInterval(function(){
			let storedTimeStamp= localStorage.getItem("lastTimeStamp");
			timeCompare(storedTimeStamp);

		}, 3000);
	}
function timeCompare(timeString){
	let currenTime= new  Date();
	let pastTime= new Date(timeString);

	let timeDiff=currenTime - pastTime;

	let minPast= Math.floor((timeDiff/60000));
	// console.log(minPast);
	if (minPast >60) {
		localStorage.removeItem("lastTimeStamp");
		window.location.href="../logout";
	}
}
$(document).mousemove( function(){
let timeStamp= new Date();
localStorage.setItem("lastTimeStamp", timeStamp);
});
timeChecker();
});