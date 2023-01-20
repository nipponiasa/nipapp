

<!-- Modal -->
<div class="modal fade" id="createnewprice" tabindex="-1" role="dialog" aria-labelledby="createnewpricelabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="motoeditformlabel">New price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


  <div class="modal-body">
  <div class="container-fluid">

  @if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif








    <form action='create_new_price' name="createprice" id="createprice" method="post"  enctype="multipart/form-data" >
 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">





      <div class="row">
            <div class="col-md-12 mb-3">
                  <div class="form-group">
                        <label for="product">Product</label>
                        <select class="form-control" name="product" id="product"   required>
                               <option value="null" selected></option>
                               @foreach(App\Models\Product::all()  as $product)
                                          <option value={{ $product->id }}>{{ $product->model }} - {{ $product->country }}</option>
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
                                  <label for="order_name">Purchase Order</label>
                                  <input     type="text" class="form-control" name="order_name" id="order_name"   disabled>
                          </div>
                  </div>
            </div>


            <div class="row">
                  <div class="col-md-6 mb-3">
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



                  <div class="col-md-6 mb-3">
                  <div class="form-group">
                        <label for="packingqty">Qty</label>
                        <input type="text" class="form-control"  name="packingqty" id="packingqty">
                  </div> 

                       
                  </div>








            </div>




<div class="row">
    <div class="col-md-4 mb-2">
    <label for="price">Price</label>
                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                                <span class="input-group-text" id="currency_sign">$</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" id="price">
                  </div>
   </div>

      <div class="col-md-4 mb-2">
      <label for="currencyusd">Currency</label>
                  <div class="form-check">
                        <input class="form-check-input currencysign" type="radio" name="currencysign" id="currencyusd" value="usd" checked>
                        <label class="form-check-label" for="currencyusd">USD($)</label>
                  </div>
                  <div class="form-check">
                              <input class="form-check-input currencysign" type="radio" name="currencysign" id="currencyyuan" value="yuan">
                              <label class="form-check-label"  for="currencyyuan">Yuan(¥)</label>
                            
                  </div>  
      </div>
   

      <div class="col-md-4 mb-2">
   
                                    <div class="form-group">
                                          <label for="us_yuan_at_date">Rate $ to ¥ <span title="This is the exchange rate given by the factory, or if this is not applicable use the exchange rate of the date of the offer." style="color:blue;">&#9432;</span></label>
                                          <input type="text" class="form-control" name="us_yuan_at_date" id="us_yuan_at_date">
                                    </div>
     </div>                


</div>












            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">
                                          <label for="price_capture_date">Capture Date</label>
  <input type="date" class="form-control" id="price_capture_date" name="price_capture_date">
                  </div> 

                       
                  </div>
            </div>




  
            <div class="row">
                        <div class="col-md-12 mb-3">
                                          <div class="form-group">
                                                <label for="proovingdoc">Attach info (pdf files only)</label>
                                                <input type="file" class="form-control-file" name="proovingdoc" id="proovingdoc">
                                          </div>
                        </div>
            </div>



            <div class="row">
                        <div class="col-md-12 mb-3">
                                          <div class="form-group">
                                                <label for="comments">Comments</label>
                                                <textarea id="comments" class="boxsizingBorder" name="comments" rows="3" cols="45">

</textarea>






                                             
                                          </div>
                        </div>
            </div>



            <div class="row">
                  <div class="col-md-3 ">
                  <button type="submit" class="btn btn-primary" onclick()>Create</button>
                  </div>
            </div>


</form>





    </div>
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  btn-ok" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

