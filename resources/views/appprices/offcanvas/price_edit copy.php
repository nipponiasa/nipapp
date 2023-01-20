

<!-- Modal -->
<div class="modal fade" id="priceeditform" tabindex="-1" role="dialog" aria-labelledby="priceeditformlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="priceeditform">New price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


  <div class="modal-body">
  <div class="container-fluid">
    <form action='update_price' name="updateprice" id="updateprice" method="post"  enctype="multipart/form-data" >
 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
          


            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">
                        <label for="product">Product</label>
                        <select class="form-control" name="product_update" id="product_update">
                               <option value="null" selected></option>
                               @foreach(App\Models\Product::all()  as $product)
                                          <option value={{$product->id}}>{{$product->model}}</option>
                               @endforeach
                        </select>
                  </div> 

                       
                  </div>
            </div>

          

            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">
                        <label for="offer_type">Offer Type</label>
                        <select class="form-control"  name="offer_type" id="offer_type">
                              <option value="Other" selected>Other</option>
                              <option value="Order" >Order</option>
                              <option value="Quotation" >Quotation</option>
                        </select>
                  </div> 

                       
                  </div>
            </div>



            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">
                        <label for="packing">Packing</label>
                        <select class="form-control"  name="packing" id="packing">
                        <option value="Other" selected>Other</option>
                       <option value="CBU" >CBU</option>
                       <option value="SKD" >SKD</option>
                       <option value="CKD" >CKD</option>     
                        </select>
                  </div> 

                       
                  </div>
            </div>



<hr>



            <div class="row">
                  <div class="col-md-12"> <label for="price">Price</label></div>
            </div>
 


<div class="row">
    <div class="col-md-4 mb-6">
                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                                <span class="input-group-text" id="currency_sign">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price_update" id="price_update">
                  </div>
   </div>

      <div class="col-md-3 mb-6">
    
                  <div class="form-check">
                        <input class="form-check-input" type="radio" name="currency" id="usd" value="usd" checked>
                        <label class="form-check-label" for="usd">USD($)</label>
                  </div>
                  <div class="form-check">
                              <input class="form-check-input" type="radio" name="currency" id="yuan" value="yuan">
                              <label class="form-check-label" for="yuan">Yuan(¥)</label>
                
                              </div>  
      </div>
   

</div>


<div class="row">
            <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                          <label for="us_yuan_at_date">Rate $ to ¥</label>
                                          <input     type="text" class="form-control" name="us_yuan_at_date_update" id="us_yuan_at_date_update"     >
                                    </div>
                  </div>

                  <div class="col-md-4 mb-3 " >
                                   
                   </div>



                  <div class="col-md-4 mb-3 "  style="margin-top:30px;">
                                    <div class="form-group ">
                                          <label for="fixed_price" class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value=True name="fixed_price" id="fixed_price" >Fixed price</label>
                                    </div> 
                   </div>
      
</div>












  <div class="row">
                  <div class="col-md-12 mb-3">
                  </div>
  </div>




            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">
                                          <label for="price_capture_date">Capture Date</label>
  <input type="date" id="price_capture_date_update" name="price_capture_date_update">
                  </div> 

                       
                  </div>
            </div>




  
<hr/>        




            <div class="row">
                  <div class="col-md-12 mb-3">
                            <div class="form-group">
                                  <label for="order_name">Purchase Order (if applicable)</label>
                                  <input     type="text" class="form-control" name="order_name_update" id="order_name_update"     >
                          </div>
                  </div>
            </div>






            <div class="row">
                        <div class="col-md-12 mb-3">
                                          <div class="form-group">
                                                <label for="attachments">Attach info (pdf files only)</label>
                                                <input type="file" class="form-control-file" name="attachments" id="attachments">
                                          </div>
                        </div>
            </div>







            <div class="row">
                  <div class="col-md-3 ">
                  <button type="submit" class="btn btn-primary">Create</button>
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
