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
      <a href="index.php" ><li>Airlines</li></a>
      <a href="#" class="active"><li>Passengers</li></a>
      <a href="aircraft.php"><li>Aircraft</li></a>
      <a href="gates.php"><li>Gates</li></a>
    </ul>
  </nav>

  <div class="content">
    <h1>Airlines</h1>
    <form action="#" method="get">
      <label for="text">Search for:</label>
      <input type="text" name="searchText">

      <label for="select">in</label>
      <select name="searchBy">
        <option value="id">ID</option>
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
    </form>

    <table>
      <?php
      $searchParams = array();
      $query = "SELECT * FROM aircraft";

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

      // Debug
      echo "DEBUG ------- <br> QUERY: " . $query . "<br>";
      print_r($searchParams);
      echo "<br>---------";

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
        <th>Updated</th>

        <?php
        //Print results
        foreach($results as $row){
          echo "<tr><td>" . $row['id'] .
          "</td><td>" . $row['first'] .
          "</td><td>" . $row['last'] .
          "</td><td>" . $row['dob'] .
          "</td><td>" . $row['phone'] .
          "</td><td>" . $row['email'] .
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
