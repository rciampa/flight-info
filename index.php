<?php
include "includes/genericDataAccess.inc.php";

function addScript(&$hasWhere, &$query){
  if(!$hasWhere){
    $query .= " WHERE ";
  }else{
    $query .= " and ";
    $hasWhere = true;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Airlines</title>
  <link rel="stylesheet" href="Styles/theme.css" media="screen" charset="utf-8">
</head>
<body>
  <nav>
    <h3>Aviation Info</h3>
    <ul>
      <!-- FIX NAV -->
      <a href="#" class="active"><li>Day Statistics</li></a>
      <a href="airlines.php" ><li>Airlines</li></a>
      <a href="passengers.php"><li>Passengers</li></a>
      <a href="aircraft.php"><li>Aircraft</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Day Statistics</h1>
    <h2>Flights departing  <?php
      if(isset($_GET['flightDay']) && !isset($_GET['today'])){
        // Show user specified date
        $flightDay = $_GET['flightDay'];

        // Ensures nnnn-nn-nn format where n is a single number.
        if(!preg_match("/([0-9]{4}-[0-9]{2}-[0-9]{2})/", $flightDay)){
          // Invalid date - reset to default date (today)
          $flightDay = date("Y-m-d");
        }
      }else{
        // Show current date
        $flightDay = date("Y-m-d");
      }

      // Show date
      echo $flightDay . "</h2>";

      // Get flights for specified date
      $query = "SELECT *, timediff(departureTime, arrivalTime) as timeDifference FROM flight
      WHERE substring(departureTime, 1, 10) = :departDay";

      if(isset($_GET['order'])){
        $query .= " ORDER BY :order";
        $searchParams[':order'] = $_GET['order'];
      }

      $searchParams[':departDay'] = $flightDay;

      $results = fetchAllRecords($query, $searchParams);

      // Debug
      // print_r($results);
    ?>
    <form action="index.php" method="get">
      <label for="date">Date: </label>
      <input type="date" name="flightDay">

      <label for="select">Order by: </label>
      <select name="order">
        <option value="id">ID</option>
        <option value="departureTime">Departure Time</option>
        <option value="arrivalTime">Arrival Time</option>
      </select>

      <input type="submit" value="Submit">
      <input type="submit" name="today" value="Today">
    </form>

    <table>
      <?php
        if(isset($results[0])){
      ?>

      <th>Id</th>
      <th>Number</th>
      <th>Airline</th>
      <th>Aircraft No</th>
      <th>Departing Port</th>
      <th>Arrival Port</th>
      <th>Departure Time</th>
      <th>Arriving Time</th>
      <th>Duration</th>
      <th>Updated</th>

      <?php
          foreach($results as $result){
            $diff = substr($result['timeDifference'], 1, 5);

            echo "<tr><td>" . $result['flightId'] .
            "</td><td>" . $result['number'] .
            "</td><td>" . $result['airlineId'] .
            "</td><td>" . $result['aircraftNumber'] .
            "</td><td>" . $result['departurePort'] .
            "</td><td>" . $result['arrivalPort'] .
            "</td><td>" . $dept = substr($result['departureTime'], 11, 5) .
            "</td><td>" . $arriv = substr($result['arrivalTime'], 11, 5) .
            "</td><td>" . $diff .
            "</td><td>" . $result['updated'] .
            "</td></tr>";
          }
        }else{
          echo "<h4>No flights scheduled for this day.</h4>";
        }
      ?>
    </table>

    <?php
      if(isset($results[0])){
        $maxQuery = "SELECT max(timediff(arrivalTime, departureTime)), number FROM flight
        WHERE substring(departureTime, 1, 10) = :departDay";

        $minQuery = "SELECT min(timediff(arrivalTime, departureTime)), number FROM flight
        WHERE substring(departureTime, 1, 10) = :departDay";

        $avgQuery = "SELECT avg(timediff(arrivalTime, departureTime)), number FROM flight
        WHERE substring(departureTime, 1, 10) = :departDay";

        $par[':departDay'] = $searchParams[':departDay'];

        $max = fetchAllRecords($maxQuery, $par);
        $min = fetchAllRecords($minQuery, $par);
        $avg = fetchAllRecords($avgQuery, $par);

        echo "<h4>Longest flight duration: " . $max[0]['number'] . "</h4>";
        echo "<h4>Shortest flight duration: " . $min[0]['number'] . "</h4>";
        echo "<h4>Average flight duration: " . $avg[0]['number'] . "</h4><br>";
      }
    ?>

  </div>

</body>
</html>
