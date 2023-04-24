

<!-- Modal -->
<div class="modal fade" id="priceeditform" tabindex="-1" role="dialog" aria-labelledby="priceeditformlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="priceeditform">Show Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


  <div class="modal-body">
  <div class="container-fluid">

 

          
 

            <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                        <label for="product">Product</label>
                        <select class="form-control" name="product_update" id="product_update">
                         </select>
                  </div> 

                       
                  </div>
            </div>

          

            <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                        <label for="offer_type_update">Offer Type</label>
                        <select class="form-control"  name="offer_type_update" id="offer_type_update">
                        </select>
                  </div> 

                       
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-12">
                            <div class="form-group">
                                  <label for="order_name_update">Purchase Order (if applicable)</label>
                                  <input     type="text" class="form-control" name="order_name_update" id="order_name_update"     >
                          </div>
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="packingupdate">Packing</label>
                        <select class="form-control"  name="packingupdate" id="packingupdate">
                        </select>
                  </div> 

                       
                  </div>
            
                  <div class="col-md-6">
                  <div class="form-group">
                        <label for="packingqtyupdate">Qty</label>
                        <input type="text" class="form-control"  name="packingqtyupdate" id="packingqtyupdate">
 
                  </div> 

                       
                  </div>
            
            
            
            
            </div>



            <label for="us_yuan_at_date">Price</label>
            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                          <span class="input-group-text" name="currencysignupdate" id="currencysignupdate"></span>
                              </div>
                              <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price_update" id="price_update">
            </div>



        <div class="row">


        <div class="col-md-4">
                <div class="form-group">
                        <label for="us_yuan_at_date_update">Ex. Rate $ to ¥</label>
                        <input     type="text" class="form-control" name="us_yuan_at_date_update" id="us_yuan_at_date_update"     >
                </div>
        </div>

        <div class="col-md-4 ">
                <div class="form-group">
                    <label for="eur_yuan_at_date_update">Ex. Rate € to ¥</label>
                    <input     type="text" class="form-control" name="eur_yuan_at_date_update" id="eur_yuan_at_date_update"     >
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="eur_us_at_date_update">Ex. Rate € to $</label>
                    <input     type="text" class="form-control" name="eur_us_at_date_update" id="eur_us_at_date_update"     >
                </div>
            </div>

        </div>








            <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                                <label for="price_capture_date_update">Capture Date</label>
                                <input type="date" class="form-control" id="price_capture_date_update" name="price_capture_date_update">
                    </div>    
                  </div>
            </div>


            <div class="row">
            <div class="col-md-12">
                <label for="commentsupdate">Comments</label>
            </div>
            </div>




            <div class="row">
                        <div class="col-md-12">
                                          <div class="form-group">
                                             
                                                <textarea id="commentsupdate" name="commentsupdate" rows="3" cols="48" disabled></textarea>






                                             
                                          </div>
                        </div>
            </div>








    </div>
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  btn-ok" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>



