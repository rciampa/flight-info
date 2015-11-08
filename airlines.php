<?php
include "includes/genericDataAccess.inc.php";
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
      <a href="index.php" ><li>Day Statistics</li></a>
      <a href="#" class="active"><li>Airlines</li></a>
      <a href="passengers.php"><li>Passengers</li></a>
      <a href="aircraft.php"><li>Aircraft</li></a>
      <a href="gates.php"><li>Gates</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Airlines</h1>
    <form action="#" method="get">
      <label for="text">Search by name:</label>
      <input type="text" name="searchText">
      <label for="select">Order by</label>
      <select name="order">
        <option value="name">Name</option>
        <option value="phone">Phone</option>
        <option value="updated">Last Updated</option>
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
      $query = "SELECT * FROM airline";

      if(isset($_GET['searchText']) && $_GET['searchText'] != NULL){
        $query .= " WHERE LCASE(SUBSTR(name, 1, CHAR_LENGTH(:name))) = LCASE(:name)";
        $searchParams[':name'] = $_GET['searchText'];
      }

      if(isset($_GET['order'])){
        $query .= " ORDER BY :order";
        $searchParams[':order'] = $_GET['order'];
      }

      $results = fetchAllRecords($query, $searchParams);

      // If query produces results
      if(isset($results[0])){
        ?>
        <th>Name</th>
        <th>Website</th>
        <th>Phone no.</th>
        <th>Last Updated</th>

        <?php
        //Print results
        foreach($results as $row){
          echo "<tr><td>" . $row['name'] .
          "</td><td>" . $row['website'] .
          "</td><td>" . $row['phone'] .
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
