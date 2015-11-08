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
      <a href="index.php" ><li>Airlines</li></a>
      <a href="#" class="active"><li>Passengers</li></a>
      <a href="aircraft.php"><li>Aircraft</li></a>
      <a href="gates.php"><li>Gates</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Flights</h1>
    <form action="#" method="get">
      <label for="text">Departure port:</label>
      <input type="text" name="departurePort">

      <label for="text">Arrival port:</label>
      <input type="text" name="arrivalPort">

      <label for="select">Order by</label>
      <select name="order">
        <option value="flightId">ID</option>
        <option value="number">Flight No</option>
        <option value="departureTime">Departing Time</option>
        <option value="arrivalTime">Arriving Time</option>
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>

    <table>
      <?php
      $searchParams = array();
      $query = "SELECT * FROM flight";

      $hasWhere = false;

      // Search for departure port
      if(isset($_GET['departurePort']) && $_GET['departurePort'] != NULL){
        $query .= " WHERE departurePort = UCASE(:departurePort)";
        $searchParams[':departurePort'] = $_GET['departurePort'];
        $hasWhere = true;
      }

      // Search for arrival port
      if(isset($_GET['arrivalPort']) && $_GET['arrivalPort'] != NULL){
        addScript($hasWhere, $query);
        $query .= "arrivalPort = UCASE(:arrivalPort)";
        $searchParams[':arrivalPort'] = $_GET['arrivalPort'];
      }

      // Set order params -- Not working
      if(isset($_GET['order'])){
        $query .= " ORDER BY " . $_GET['order'];
      }

      $results = fetchAllRecords($query, $searchParams);

      // If query produces results
      if(isset($results[0])){
        ?>
        <th>Id</th>
        <th>Number</th>
        <th>Airline Id</th>
        <th>Aircraft Number</th>
        <th>Departure Port</th>
        <th>Arrival Port</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Updated</th>

        <?php
        //Print results
        foreach($results as $row){
          echo "<tr><td>" . $row['flightId'] .
          "</td><td>" . $row['number'] .
          "</td><td>" . $row['airlineId'] .
          "</td><td>" . $row['aircraftNumber'] .
          "</td><td>" . $row['departurePort'] .
          "</td><td>" . $row['arrivalPort'] .
          "</td><td>" . $row['departureTime'] .
          "</td><td>" . $row['arrivalTime'] .
          "</td><td>" . $row['updated'] .
          "</td></tr>";
        }
      }else{
        echo "<h4>Sorry, a matching airline could not be found</h4>";
      }
      ?>
    </table>
  </div>

</body>
</html>
