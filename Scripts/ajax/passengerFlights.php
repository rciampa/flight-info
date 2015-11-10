<?php
  include "../../includes/genericDataAccess.inc.php";

  $query = "SELECT flight.* FROM passengerFlights
  LEFT JOIN flight ON passengerFlights.flightId = flight.flightId
  WHERE passengerId = :id ";
  $params[':id'] = $_GET['id'];

  $results = fetchAllRecords($query, $params);
  //$current = current($result);


  if(isset($results[0])){
    echo "<table>
    <th>Flight ID</th>
    <th>Number</th>
    <th>Airline ID</th>
    <th>Aircraft Number</th>
    <th>Departure Port</th>
    <th>Arrival Port</th>
    <th>Departure time</th>
    <th>Arrival Time</th>
    <th>Updated</th>
    <tr>
    ";

  foreach($results as $result){
    echo "<tr>";
    foreach($result as $r => $value){
      echo "<td>" . $value . "</td>";
      // echo "<tr><td>" . $r['flightId'] .
      // "</td><td>" . $r['updated'] . "</td></tr>";
    }
    echo "</tr>";
  }
}
?>
