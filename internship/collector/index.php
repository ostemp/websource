<?php include_once('../includes/meta.php'); ?>

    <title>3D Printed Object Collector</title>
    <style>
      h1{
        padding-top: 50px;
      }    

      select, input{
        width: calc(50% - 2px);
        margin-bottom: 5px;
      }
      input#wide{
        width: 100%;
      }
      input[type="checkbox"]{
        width: 5%;
      }
      div#failed{
        margin-left: 50%;
        margin-top: -24px;
      }
      input[type="file"]{
        width: 50%;
      }
      input#publish{
        width: 100%;
      }
      </style>
  </head>

  <body>
  <?php include_once('../includes/navbar.php'); ?>


  <div class="container">
  <h1>3D Printed Object Collector</h1>


  <?php if(isset($_SESSION['user'])): ?>

  <form action="upload.php" method="post" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Object name (e.g. turbine blade)" required>
    <input type="number" name="timetaken" placeholder="Printing Time" required></br>

    <select name="printertype">
      <option value="Ultimaker 2+">Ultimaker 2+</option>
      <option value="Ultimaker 2+ Extended">Ultimaker 2+ Extended</option>
      <option value="Formlabs F2">Resin (Formlabs F2)</option>
      <option value="Project 660 Pro">Powder (ProJet 660 Pro)</option>
      <option value="Laser Cutter">Laser</option>
      <option value="Makerbot Replicator Z18">Makerbot Replicator Z18</option>
      <option value="Makerbot Replicator Desktop">Makerbot Replicator Desktop</option>
    </select>
    <select name="material">
      <option value="PLA/PHA Filament">PLA/PHA Filament (any color)</option>
      <option value="ABS">ABS</option>
      <option value="Woodfill">Woodfill</option>
      <option value="Corkfill">Corkfill</option>
      <option value="Brassfill">Brassfill</option>
      <option value="Bronzefill">Bronzefill</option>
      <option value="Copperfill">Copperfill</option>
      <option value="Copolyester">Co-polyester</option>
      <option value="Tough Resin">Resin (tough)</option>
      <option value="Flexible Resin">Resin (flexible)</option>
      <option value="Grey Resin">Resin (grey)</option>
      <option value="Black Resin">Resin (black)</option>
      <option value="White Resin">Resin (white)</option>
      <option value="Clear Resin">Resin (clear)</option>
      <option value="Castable Resin">Resin (castable)</option>
      <option value="Powder">Powder</option>
      <option value="Sheet Wood">Sheet Wood</option>
      <option value="Sheet Plastic">Sheet Plastic</option>
      <option value="Sheet Metal">Sheet Metal</option>
    </select></br>

    <input type="text" name="description" id="wide" placeholder="Brief description (e.g. printed by [name] to see if [test] would work)" required>

    <input type="file" name="imageinput" accept="image/*" placeholder="Image" required> 
    <div id="failed"><input type="checkbox" name="fail" value="fail">Failed</div>
    <input type="submit" id='publish' name="submit" value="Publish">

  </form>

<?php else: ?>

  <p>Please log in to access this feature.</p>

<?php endif; ?>

      <hr>

      <footer>
        <p>&copy; 2016</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
