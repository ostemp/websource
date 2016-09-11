    <?php include_once('includes/meta.php'); ?>

    <title>Digital Centre 3D Printing Observatory</title>
    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>
  <?php include_once('includes/navbar.php'); ?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>The Digital Centre 3D Printing Observatory</h1>
        <p>This site is used to collect and store images of all objects printed in 3D using our collection of <strong class="colored">plastic, resin, powder and mixed material printers</strong>. This site also lets you watch one of the <strong class="colored">live camera feeds</strong> from our labs.</p>
        <p><a class="btn btn-primary btn-lg" href="collector/" role="button">Add Print &raquo;</a>
        <a class="btn btn-primary btn-lg" href="gallery/" role="button">View Gallery &raquo;</a>
        <a class="btn btn-primary btn-lg" href="camoutput/" role="button">Watch Live &raquo;</a></p>
      </div>
    </div>

    <div class="container">
    <h1>Latest Prints</h1>

    <?php
    // connect to the database
    include("connection.php");
    // run an sql query to get all the data
    $sql = "select * from object order by dateadded DESC";
    $result = $conn->query($sql);
    echo "<div class='row'>";
    // go through each of the records, adding the data to the table
    if($result->num_rows > 0){
      $counter = 0;    
      while($row = $result->fetch_assoc()){
        $counter ++;
        if($counter > 3) break;
        echo "<div class='col-md-4'><img width='250px' src='gallery/".$row["imagedirectory"]."'></div>";
      }
    }
    echo "</div>";
    ?> 

      <hr>

      <footer>
        <p>&copy; 2016</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
