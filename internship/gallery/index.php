<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('../includes/meta.php'); ?>

    <title>3D Printed Object Gallery</title>
    <style type="text/css">
      h1{
        padding-top: 50px;
      }    
      p.nummodels{
        float: left;
      }
      p.printing{
        float:right;
      }
      td{
        padding: 5px;
      }
      p.fail{
        color: red;
        float: right;
        font-weight: 700;
      }
      p.win{
        font-weight: 700;
        color: green;
        float: right;
      }
      h3{
        font-size: 14px;
        line-height: 14px;
        padding: 0;
        margin-top: 6px;
        margin-bottom: 4px;
      }
      p{
        font-size: 12px;
        line-height: 12px;
      }
      p.name{
        font-size: 14px;
        float:left;
        font-weight: 700;
      }
      p.time{
        float:right;
      }
      p.description{
        clear:both;
        float: left;
      }
      p.printer{
        padding-top: 15px;
        float:left;
        clear:both;
      }
      p.description{
        clear: both;
      }
      p.material{
        clear: both;
        float: left;
      }
      p.description{

      }
      p.dateadded{
        float: left;
        clear:both;
      }
      p.totalhours{
        float: left;
        clear: both;
      }
      p.successrate{
        float: left;
        clear: both;
      }
      td{
        border-top: 1px solid grey;
      }
      table{
        width: 100%;
      }
    </style>
  </head>

  <body>
  <?php include_once('../includes/navbar.php'); ?>


    <div class="container">
      <h1>3D Printed Object Gallery</h1>


      <?php

        $gallerycontent = "";

        // connect to the database
        include_once("../connection.php");
        // run an sql query to get all the data
        $sql = "select * from object";
        $result = $conn->query($sql);
        // go through each of the records, adding the data to the table
        $gallerycontent .= "<table>";

        $num3dobjects = $result->num_rows;
        $totalhours = 0;
        $successrate = 0;

        $successtext = "undefined";

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            if($row["failed"]){ $successtext = "<p class='fail'>FAIL</p>";}
            else{ $successtext = "<p class='win'>SUCCESS</p>";}

            // add to the cumulative variables
            $successrate += $row["failed"];
            $totalhours += $row["printduration"];

            // add to the gallery content
            $newrow = "<tr>
            <td><img width='300px' src='".$row["imagedirectory"]."'></td>
            <td>
            <p class='name'>".$row["name"]."</p>
            <p class='time'>Print Time: ".$row["printduration"]." hours</p>
            <p class='description'>".$row["description"]."</p>
            <p class='printer'>Printer: ".$row["printertype"]."</p>
            <p class='material'>Material: ".$row["material"]."</p>
            <p class='dateadded'>".$row["dateadded"]."
            ".$successtext."</p>
            </td>
            </tr>";

            $gallerycontent .= $newrow;
          }
        }
        $gallerycontent .= "</table>";


        // calculate the success rate based on the number of failures
        $successrate = round(100 * (1 - ($successrate / $num3dobjects)), 1);

        $statistics = "<fieldset><h3>Useful Statistics</h3>
                <p class='nummodels'>Current number of models: ".$num3dobjects."</p>
                <p class='printing'>Currently printing: 4</p>
                <p class='totalhours'>Total time spent printing: ".$totalhours." hours</p>
                <p class='successrate'>Success Rate: ".$successrate."%</p></fieldset>
        ";

        echo $statistics;
        echo $gallerycontent;
      ?>



      <hr>

      <footer>
        <p>&copy; 2016</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
