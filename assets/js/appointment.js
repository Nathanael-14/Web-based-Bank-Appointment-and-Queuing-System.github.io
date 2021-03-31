//APPOINTMENT FORM 

$("#btncheck").ready(function()
  {
    var opening = "You have selected "
    var day = document.getElementById("reserveDay").value;
    var month = document.getElementById("reserveMonth").value;
    var year = document.getElementById("reserveYear").value;
    document.getElementById("dateSubheader").innerHTML = opening.concat(month.concat("/",day),"/".concat(year));
  });

$("#appointmentForm").ready(function()
  {
    if(document.getElementById("reserveDay").value.length <= 0)
    {
      $("#appointmentForm").animate({opacity: "toggle"},"fast");
      $("#datepicker").animate({width: "100%"},"fast");
      document.getElementById("dateSubheader").innerHTML = "Please select a date"
    }
  });

//APPOINTMENT END