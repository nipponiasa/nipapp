

function editprice(name) {
    
    $.get('price_edit_form_modal?priceid='+name, function (data) {

              

                    $.each( data.data, function( id, value )
                    {
                      $('#commentsupdate').val(value.comments);
                      $("#commentsupdate").prop( "disabled", true );
                      $("#product_update").empty();
                      $("#product_update").append(new Option(value.model,value.model));
                      $("#product_update").prop( "disabled", true );
                      $("#offer_type_update").empty();
                        $('#offer_type_update').append(new Option(value.offer_type,value.offer_type));
                        $("#offer_type_update").prop( "disabled", true );
                        $('#price_update').val(value.price_us);
                        $("#price_update").prop( "disabled", true );
                        $('#us_yuan_at_date_update').val(value.us_yuan_at_date); 
                        $("#us_yuan_at_date_update").prop( "disabled", true );

                        $('#eur_yuan_at_date_update').val(value.eur_yuan_at_date); 
                        $("#eur_yuan_at_date_update").prop( "disabled", true );

                        $('#eur_us_at_date_update').val(value.eur_us_at_date); 
                        $("#eur_us_at_date_update").prop( "disabled", true );

                        $('#offer_type_update').val(value.offer_type);
                        $('#price_capture_date_update').val(value.price_capture_date); 
                        $("#price_capture_date_update").prop( "disabled", true );
                        $("#packingupdate").empty();
                        $('#packingupdate').append(new Option(value.packing,value.packing));
                        $("#packingupdate").prop( "disabled", true );
                        $('#order_name_update').val(value.order_name);
                        $("#order_name_update").prop( "disabled", true );
                        $('#packingqtyupdate').val(value.packingqty);
                        $("#packingqtyupdate").prop( "disabled", true );

                        if (value.price_us>0) {
                            $('#price_update').val(value.price_us);
                            $('#currencysignupdate').text("$");
                          } 
                        if (value.price_yuan>0) {
                            $('#price_update').val(value.price_yuan);
                            $('#currencysignupdate').text("¥");
                        } 
                        if (value.price_eur>0) {
                            $('#price_update').val(value.price_eur);
                            $('#currencysignupdate').text("€");
                        }


                          if (value.fixed_price>0) {
                            $('#fixed_price_update').prop( "checked", true );
                            $("#fixed_price_update").prop( "disabled", true );
                          } 


                        });



                

                                  
                                  
                $('#priceeditform').on('shown.bs.modal', function () {  });
    });
}