
             $('#trash').click(function(event) {
              event.preventDefault();
              var r=confirm("Are you sure you want to delete?");
              if (r==true)   {  
                 window.location = $(this).attr('href');
              }
          
          });
       
       
       
       
       
       
       $(document).ready(function() {
          $("#offer_type").change(function(){
            let offertype=$('#offer_type').val();
            if (offertype =="Order") {
              $("#order_name").prop( "disabled",false);
            } 
            else{
              $("#order_name").prop( "disabled",true);
            }
            
          });





          $("#currencyusd").on('click',function() {
            $('#currency_sign').text("$");
            //$("#us_yuan_at_date").prop( "disabled",true);
          });
          $("#currencyyuan").on('click',function() {
            $('#currency_sign').text("¥");
            // $("#us_yuan_at_date").prop( "disabled",false);
           });
           $("#currencyeur").on('click',function() {
            $('#currency_sign').text("€");
            // $("#us_yuan_at_date").prop( "disabled",false);
           });

   

      });














     
