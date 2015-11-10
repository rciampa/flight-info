<?php
include "includes/genericDataAccess.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Aircraft</title>
  <link rel="stylesheet" href="Styles/theme.css" media="screen" charset="utf-8">
</head>
<body>
 <nav>
    <h3>Aviation Info</h3>
    <ul>
      <a href="index.php" ><li>Day Statistics</li></a>
      <a href="airlines.php" ><li>Airlines</li></a>
      <a href="passengers.php"><li>Passengers</li></a>
      <a href="#" class="active"><li>Aircraft</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Aircraft</h1>
    <form action="#" method="get">
      <label for="text">Search for:</label>
      <input type="text" name="searchText">

      <label for="select">in</label>
      <select name="searchBy">
        <option value="nNumber">Number</option>
        <option value="make">Make</option>
        <option value="model">Model</option>
        <option value="airlineId">Owner</option>
      </select>

      <label for="select">Order by</label>
      <select name="order">
        <option value="nNumber">Number</option>
        <option value="make">Make</option>
        <option value="model">Model</option>
        <option value="airlineId">Owner</option>
      </select>
      <input type="submit" name="submit" value="Submit">
      <input type="submit" name="reset" value="Reset">
    </form>

    <table>
      <?php
      if(isset($_GET['reset'])){
        unset($_GET);
      }

      $searchParams = array();
      $query = "SELECT * FROM aircraft";

      // Search by text
      if(isset($_GET['searchText']) && $_GET['searchText'] != NULL){
        $field = $_GET['searchBy'];

        // using $field IS NOT SAFE... :field not working. -- fix
        $query .= " WHERE LCASE($field) = LCASE(:value)";
        $searchParams[':value'] = $_GET['searchText'];
      }

      // Set order -- params not working
      if(isset($_GET['order'])){
        $query .= " ORDER BY " . $_GET['order'];

        // $searchParams[':order'] = $_GET['order'];
      }

      // // Debug
      // echo "DEBUG ------- <br> QUERY: " . $query . "<br>";
      // print_r($searchParams);
      // echo "<br>---------";

      $results = fetchAllRecords($query, $searchParams);

      // If query produces results
      if(isset($results[0])){
        ?>
        <th>Number</th>
        <th>Make</th>
        <th>Model</th>
        <th>Owner</th>

        <?php
        //Print results
        foreach($results as $row){
          echo "<tr><td>" . $row['nNumber'] .
          "</td><td>" . $row['make'] .
          "</td><td>" . $row['model'] .
          "</td><td>" . $row['airlineId'] .
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
