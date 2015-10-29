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
        <a href="#" class="active"><li>Airlines</li></a>
        <a href="passengers.php"><li>Passengers</li></a>
        <a href="aircraft.php"><li>Aircraft</li></a>
        <a href="gates.php"><li>Gates</li></a>
      </ul>
    </nav>

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
    </form>

    <table>
      <th>Name</th>
      <th>Website</th>
      <th>Phone no.</th>
      <th>Last Updated</th>
      <tr>
        <td>Stub Airlines</td>
        <td>stub@stubairlines.com</td>
        <td>+1 831 202 2020</td>
        <td>01/01/15</td>
      </tr>
      <tr>
        <td>Stub Airlines</td>
        <td>stub@stubairlines.com</td>
        <td>+1 831 202 2020</td>
        <td>01/01/15</td>
      </tr>
      <tr>
        <td>Stub Airlines</td>
        <td>stub@stubairlines.com</td>
        <td>+1 831 202 2020</td>
        <td>01/01/15</td>
      </tr>
      <tr>
        <td>Stub Airlines</td>
        <td>stub@stubairlines.com</td>
        <td>+1 831 202 2020</td>
        <td>01/01/15</td>
      </tr>
    </table>
  </body>
</html>
