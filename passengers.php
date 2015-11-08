<?php
include "includes/genericDataAccess.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Airlines</title>
  <link rel="stylesheet" href="Styles/theme.css" media="screen" charset="utf-8">
  <script src="Scripts/js/jquery-2.1.4.min.js" type="text/javascript"></script>
  <script src="Scripts/js/passenger.js" type="text/javascript"></script>
</head>
<body>
  <nav>
    <h3>Aviation Info</h3>
    <ul>
      <a href="index.php"><li>Day Statistics</li></a>
      <a href="airlines.php" ><li>Airlines</li></a>
      <a href="#" class="active"><li>Passengers</li></a>
      <a href="aircraft.php"><li>Aircraft</li></a>
      <a href="gates.php"><li>Gates</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Passengers</h1>
    <form action="#" method="get">
      <label for="text">Search for:</label>
      <input type="text" name="searchText">

      <label for="select">in</label>
      <select name="searchBy">
        <option value="passengerId">ID</option>
        <option value="first">First Name</option>
        <option value="last">Last Name</option>
      </select>

      <label for="select">Order by</label>
      <select name="order">
        <option value="id">ID</option>
        <option value="first">First Name</option>
        <option value="last">Last Name</option>
        <option value="updated">Updated</option>
      </select>
      <input type="submit" name="submit" value="Submit">
      <input type="submit" name="reset" value="Reset">
    </form>

    <table id="passengers">
      <?php
      if(isset($_GET['reset'])){
        unset($_GET);
      }
      $searchParams = array();
      $query = "SELECT * FROM passenger";

      // Search by text
      if(isset($_GET['searchText']) && $_GET['searchText'] != NULL){
        $field = $_GET['searchBy'];

        // using $field IS NOT SAFE... :field not working. -- fix
        $query .= " WHERE $field = :value";
        $searchParams[':value'] = $_GET['searchText'];
        // $searchParams[':col'] = $_GET['searchBy'];
      }

      // Set order -- Not working
      if(isset($_GET['order'])){
        $query .= " ORDER BY :order";
        $searchParams[':order'] = $_GET['order'];
      }
      //
      // // Debug
      // echo "DEBUG ------- <br> QUERY: " . $query . "<br>";
      // print_r($searchParams);
      // echo "<br>---------";

      $results = fetchAllRecords($query, $searchParams);

      // If query produces results
      if(isset($results[0])){
        ?>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Scheduled Flights</th>
        <th>Updated</th>

        <?php
        //Print results
        foreach($results as $row){
          $query = "SELECT count(*) FROM passengerFlights
          WHERE passengerId = " . $row['passengerId'];

          $flightCount = fetchAllRecords($query);

          echo "<tr><td class='passengerId'>" . $row['passengerId'] .
          "</td><td class='firstName'>" . $row['first'] .
          "</td><td class='lastName'>" . $row['last'] .
          "</td><td>" . $row['dob'] .
          "</td><td>" . $row['phone'] .
          "</td><td>" . $row['email'] .
          "</td><td>" . $flightCount[0]['count(*)'] .
          "</td><td>" . $row['updated'] .
          "</td></tr>";
        }
      }else{
        echo "<h4>Sorry, a matching airline could not be found</h4>";
      }
      ?>
    </table>

    <div id="ajaxResult">

    </div>
  </div>

</body>
</html>
