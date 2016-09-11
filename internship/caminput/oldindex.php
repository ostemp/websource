<!DOCTYPE html>
<html>
<head>
	<title>Webcam Input</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="../corestyle.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<style>
  *{
    font-size: 12px;
  }
  section{
    text-align: center;
  }
  video{
    margin-top: -12px;
    border: 2px solid #ccc;
  }
  div#output{
    visibility: hidden;
  }
  select, button{
    padding: 0;
    height: 14px;
    margin-bottom: 5px;
  }
  fieldset{
    padding-top: 8px;
  }
	</style>
</head>
<body>

<section>
<header>
<h1>3D Lab Live Uploader</h1>
</header>
<fieldset>
<select id='selector' onchange='selectChange()'></select>  Upload to Server
<input type="checkbox" name="clockrunning" placeholder="Upload to Server" id="checkbox" checked onchange="checkboxchanged()">
<div id="outputtext"></div>
</br>

<video id='video' autoplay></video>
<div id="output"></div>

<p><strong>Warning:</strong> This page uploads images directly to the server to be viewed by anyone.</br>Please take care configuring the camera and have full permission for recording from any relevant authorities.</p>
</fieldset>
</section>

<script>

var clockrunning = true;

var allcameras = Array();
var currentCameraID = "camera not assigned";
var currentURL = "";

function checkboxchanged(){
  var checkbox = document.getElementById('checkbox');
  //console.log(checkbox.checked);
  if(checkbox.checked){
    clockrunning = true;
  }else{
    clockrunning = false;
  }
  uploadloop();
}

// check if the user has a camera
function hasGetUserMedia() {
  return !!(navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);
}

if (hasGetUserMedia()) {
  // Good to go!
  //alert('getUserMedia is working!');
} else {
  alert('getUserMedia() is not supported in your browser');
}
navigator.getUserMedia = ( navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

var errorCallback = function(e) {
	console.log('error: ', e);
};
var successCallback = function(e){
	var video = document.getElementById('video');
  window.URL.revokeObjectURL(currentURL);
	currentURL = e;
  video.src = window.URL.createObjectURL(currentURL);
	//console.log('new source allocated' + e);
};


function sourceSelected(audioSource, videoSource) {
  var constraints = {
    audio: false,
    video: { optional: [{sourceId: videoSource}] }
  };

  navigator.getUserMedia(constraints, successCallback, errorCallback);
};

MediaStreamTrack.getSources(function(sourceInfos) {
  var audioSource = null;
  var videoSource = null;

  //console.log(sourceInfos.length);
  for (var i = 0; i != sourceInfos.length; ++i) {
    var sourceInfo = sourceInfos[i];
    if (sourceInfo.kind === 'audio') {
      console.log("microphone: " +	sourceInfo.label || 'microphone');

    } else if (sourceInfo.kind === 'video') {
      console.log("camera: " + sourceInfo.label || 'camera');

      videoSource = sourceInfo.id;
      allcameras.push(sourceInfo)
    } else {
      //console.log('Some other kind of source: ', sourceInfo);
    }
  }
  sourceSelected(null, videoSource);
  onload();
});

function onload(){

  currentCameraID = prompt("Please name your camera:");
	// now to populate the UI
	allcameras.reverse();
	var selector = document.getElementById('selector');
	//console.log('onload called');
	for(var i = 0; i < allcameras.length; i++){
		//console.log('loop run');
		var option = document.createElement("option");
		option.value = allcameras[i].label;
		option.innerHTML = allcameras[i].label;
		selector.appendChild(option);
	}
}

function selectChange(){
	var selector = document.getElementById('selector');
	sourceSelected(null, allcameras[selector.selectedIndex]);	
}

var videoId = 'video';
var scaleFactor = 1;
var snapshots = [];
 
/**
 * Captures a image frame from the provided video element.
 *
 * @param {Video} video HTML5 video element from where the image frame will be captured.
 * @param {Number} scaleFactor Factor to scale the canvas element that will be return. This is an optional parameter.
 *
 * @return {Canvas}
 */


function capture(video, scaleFactor) {
    if(scaleFactor == null){
        scaleFactor = 1;
    }
    var w = video.videoWidth * scaleFactor;
    var h = video.videoHeight * scaleFactor;
    var canvas = document.createElement('canvas');
    canvas.width  = w;
    canvas.height = h;
    var ctx = canvas.getContext('2d');
    ctx.drawImage(video, 0, 0, w, h);
    ctx.font="20px Arial";
    var date = new Date();
    var datetext = date.toTimeString();
    ctx.fillStyle="#00f";
    ctx.fillText(datetext.substr(0,8), 540, 440);
    return canvas;
} 
 
/**
 * Invokes the <code>capture</code> function and attaches the canvas element to the DOM.
 */
function shoot(){
    var video  = document.getElementById(videoId);
    //var output = document.getElementById('output');
    var canvas = capture(video, scaleFactor);
    
    snapshots.unshift(canvas);
    var Pic = canvas.toDataURL("image/png");
    sendData(Pic);
}

function sendData(imageData){
    // first define a new XMLHttpRequest
    var xhr = new XMLHttpRequest();
    // open it with method 'post', url 'upload.php' and async 'true'
    xhr.open("POST", "addimage.php", true);
    // set the request headers 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // finally send the request, setting the post variables as the parameter
    xhr.send("camID=" + currentCameraID + "&data=" + imageData);
    // define a function called when the response succeeds
    xhr.onload = function() {
        //document.getElementById("outputtext").innerHTML = xhr.responseText;        
    }
}

var counter = 0;
function uploadloop(){
  counter++;
  if(counter >=60){
  	counter = 0;
  	shoot();
  }
  if(clockrunning){ window.requestAnimationFrame(uploadloop); }
}
uploadloop();
</script>
</body>
</html>















