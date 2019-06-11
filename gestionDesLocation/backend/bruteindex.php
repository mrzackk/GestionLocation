<!DOCTYPE html>
<html>
<head>
	<title> ATTABOY </title>

</head>
<body background="https://madtomatoes.com/wp-content/uploads/2010/11/matrix-animated-image.gif">

<center><h2 background-color="red"><font size="40" color="Red" >DUE TO A POTENTIAL BRUTEFORCE ATTACK, YOU ARE CURRENTLY BANNED</font></h2>
<center><h1><font size="25" color="Blue" ><big><tt>YOU CAN LOGIN AFTER <span id='demo'></span></tt></big></font> </h1>
	<div id="timer">
	  <span id="days" color="Red"></span>days
	  <span id="hours" color="Red"></span>hours
	  <span id="minutes" color="Red"></span>minutes
	  <span id="seconds" color="Red"></span>seconds
	</div>
	<?php $date = new DateTime();
echo $date->getTimestamp(); echo '<script>var dateEntered ='.$_GET['max'].';var now='.$_GET['min'].';</script>';?>

<p id="demo"></p>

<script>



function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
// Set the date we're counting down to
var countDownDate = getUrlParameter('max');
var countFrom = getUrlParameter('min');
//alert(countFrom);

if(countDownDate=='a'){
    document.getElementById("demo").innerHTML = " A millennium";
    
}else{
// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  
	countFrom++;
  // Find the distance between now and the count down date
  var distance = countDownDate-countFrom;
//alert(distance);
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / ( 60 * 60 * 24));
  var hours = Math.floor((distance % ( 60 * 60 * 24)) / ( 60 * 60));
  var minutes = Math.floor((distance % ( 60 * 60)) / ( 60));
  var seconds = Math.floor((distance % ( 60)) );

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    window.location.href = "login.php";;
  }
}, 1000);
}
</script>




<center><img src="http://3.bp.blogspot.com/-WYL_xsCOb8o/TsSKzTGbnuI/AAAAAAAAASE/VoyntSKwf70/s1600/Hacker.png" />
<marquee bgcolor="skyblue" height="30"><font color="red">WE ARE ANONYMOUS</font></marquee>
<iframe width="0" height="0" src="https://www.youtube.com/embed/kwz1cN6avxU?autoplay=1" frameborder="0" allowfullscreen></iframe>
<body/>
<html/>

