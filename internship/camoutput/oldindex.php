<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Cam Output</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel='stylesheet' href='../corestyle.css'>
  
<style>
  section{
    text-align: center;
  }
  h3{
    padding: 0;
    padding-bottom: 4px;
    margin: 0;
    line-height: 14px;
    font-size: 14px;
  }
  canvas{
  	width: 640px;
  	height: 480px;
  	background-color: #ddd;
    border: 2px solid #ccc;
  }
  </style>
</head>
<body>

<section>
	<h1>Live Cam Viewer</h1>
	<fieldset>
    <h3>Currently Watching:

    <select id="selector" onchange="setImgURI()">
    <?php
    $linuxDir = "/opt/lampp/htdocs/internship/caminput/";
    $macDir = "/Applications/XAMPP/htdocs/caminput/";
    $winDir = "C:/xampp/htdocs/internship/caminput/";

    $currentDir = $winDir;
    foreach (glob($currentDir . '*.png') as $filename) {
      $camname = str_replace($currentDir, '', $filename);
      $camname = str_replace(".png", '', $camname);
      echo "<option value='".$camname."'>".$camname."</option>";
    }

    ?>
    </select>
    </h3>
		<canvas id="canvas"></canvas>

	</fieldset>
</section>

<script>

var timeoutPeriod = 500;
var imageURI = '../caminput/default.png';
var x=0, y=0;
var img = new Image(640, 480);
	var canvas = document.getElementById("canvas");
	var context = canvas.getContext("2d");
	canvas.width = 640;
	canvas.height = 480;

function setImgURI(camid){
  // cheeky one-liner to get the value of the selector and add it to the image source text
  imageURI = 'caminput/' + document.getElementById('selector').options[document.getElementById('selector').selectedIndex].value + '.png';
}
setImgURI();

img.onload = function() {
    context.drawImage(img, x, y, canvas.width, canvas.height);
    setTimeout(timedRefresh,timeoutPeriod);
};

function timedRefresh() {
    // just change src attribute, will always trigger the onload callback
    img.src = imageURI + '?d=' + Date.now();
}
context.imageSmoothingEnabled = false;
timedRefresh();

</script>

</style>

</body>
</html>