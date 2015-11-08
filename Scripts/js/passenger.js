$(document).ready(function(){

  // Retrieve passenger flight information
  $("#passengers td").click(function(){
    // Finding passenger id and name
    var row = $(this).parent();
    var name = row.find(".firstName").html() + " " + row.find(".lastName").html();
    var id = row.find(".passengerId").html();

    // AJAX
    $.get("Scripts/ajax/passengerFlights.php", {"id": id}, function(data) {
      $("#ajaxResult").html(
        "<h3> Flights for " + name + "</h3>" +
        data
      );
    });
  });
});
