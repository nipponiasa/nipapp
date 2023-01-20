
$('#createprice').submit(function() {

  if($("#product").val()=='null')
  {alert("Please select product!");
  event.preventDefault();
  }

  if($("#price_capture_date").val()=='')
  {alert("Please select capture date!");
  event.preventDefault();
  }


});


