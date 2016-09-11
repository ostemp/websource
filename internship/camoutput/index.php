<?php include_once('../includes/meta.php'); ?>
    <title>3D Live Printing</title>
    <style>
    h1{
      padding-top: 50px;
    }
      h3{
        padding-top: 0px;
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
      div#live{
        width: 644px;
        text-align: left;
      }
    </style>
  </head>

  <body>
    <?php include_once('../includes/navbar.php'); ?>


    <div class="container" id="live">
    <h1>Live Video Feed</h1>

    <h3>Currently Watching:

    <select id='selector' onchange="setImgURI()">
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

    <?php if(isset($_SESSION['user'])){
      echo '<a class="btn btn-success" href="../caminput">Add Video Source as '.ucfirst($_SESSION['user']).'</a>';


    }
    ?>
      <hr>

      <footer>
        <p>&copy; 2016</p>
      </footer>
    </div> <!-- /container -->


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
  imageURI = '../caminput/' + document.getElementById('selector').options[document.getElementById('selector').selectedIndex].value + '.png';
  console.log(imageURI);
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
  </body>
</html>
