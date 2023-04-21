<div class="row">
    <div class="col-md-12 ">
          <div class="form-group">
                <label for="product">Product</label>
                <select class="form-control" name="product" id="product"   required>
                       <option value="null" selected></option>
                       @foreach(App\Models\Product::all()->sortBy(['country','model']) as $product)
                                  <option value={{ $product->id }}>{{ $product->country }} - {{ $product->model }}</option>
                       @endforeach
                </select>
          </div> 
     </div>
</div>

  

    <div class="row">
          <div class="col-md-12 ">
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
          <div class="col-md-12 ">
                    <div class="form-group">
                          <label for="order_name">Purchase Order</label>
                          <input     type="text" class="form-control" name="order_name" id="order_name"   disabled>
                  </div>
          </div>
    </div>


    <div class="row">
          <div class="col-md-6 ">
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



          <div class="col-md-6 ">
          <div class="form-group">
                <label for="packingqty">Qty</label>
                <input type="text" class="form-control"  name="packingqty" id="packingqty">
          </div> 

               
          </div>








    </div>

    <hr>


    {{-- PRICES --}}

    <div class="row my-3">


        <div class="col-md-6 ">
        <label for="price">Price</label>
                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text" id="currency_sign">$</span>
                                        </div>
                                        <input type="text" class="form-control {{-- form-control-lg --}}" aria-label="Amount (to the nearest dollar)" name="price" id="price">
                    </div>
    </div>

        <div class="col-md-6 px-4">
        <label for="currencyusd" class="m-0">Currency</label>
                    <div class="form-check">
                            <input class="form-check-input currencysign" type="radio" name="currencysign" id="currencyusd" value="usd" checked>
                            <label class="form-check-label" for="currencyusd">USD($)</label>
                    </div>
                    <div class="form-check">
                                <input class="form-check-input currencysign" type="radio" name="currencysign" id="currencyyuan" value="yuan">
                                <label class="form-check-label"  for="currencyyuan">Yuan(¥)</label>
                                
                    </div>  
        </div>
                


    </div>



    {{-- CURRENCY RATES --}}

    <div class="my-2">
        <div class="d-flex">
            <label for="prices" class="m-0">Currency Rates<span title="This is the exchange rate given by the factory, or if this is not applicable use the exchange rate of the date of the offer." style="color:blue;">&#9432;</span></label>
            {{-- <button class="btn btn-link text-info p-0 mx-4" type="button">Fetch rates</button> --}}
            <button id="fetchRates" class="btn btn-info btn-sm mx-4 py-0" type="button">Fill rates</button>
            {{-- type default = submit form! --}}
        </div>
    <div class="row px-4 my-1">

        <div class="col-md-4">
            <div class="form-group d-flex flex-column">
                <label for="us_yuan_at_date" class="m-0 font-weight-normal text-center">Rate $ to ¥ </label>
                <input type="text" class="form-control text-center" name="us_yuan_at_date" id="us_yuan_at_date">
            </div>
        </div>  
        
        <div class="col-md-4 ">
            <div class="form-group d-flex flex-column">
                <label for="eur_yuan_at_date" class="m-0 font-weight-normal text-center">Rate € to ¥ </label>
                <input type="text" class="form-control text-center" name="eur_yuan_at_date" id="eur_yuan_at_date">
            </div>
        </div>  

        <div class="col-md-4 ">
            <div class="form-group d-flex flex-column">
                <label for="eur_us_at_date" class="m-0 font-weight-normal text-center">Rate € to $ </label>
                <input type="text" class="form-control text-center" name="eur_us_at_date" id="eur_us_at_date">
            </div>
        </div>  

    </div> 

</div>



<hr>



    <div class="row">
            <div class="col-md-12 ">
            <div class="form-group">
                    <label for="price_capture_date">Capture Date</label>
                    <input type="date" class="form-control text-center" id="price_capture_date" name="price_capture_date">
            </div> 
                        
        </div>
    </div>





    <div class="row">
                <div class="col-md-12 ">
                                  <div class="form-group">
                                        <label for="proovingdoc">Attach info (pdf files only)</label>
                                        <input type="file" class="form-control-file" name="proovingdoc" id="proovingdoc">
                                  </div>
                </div>
    </div>



    <div class="row">
                <div class="col-md-12 ">
                                  <div class="form-group d-flex flex-column">
                                        <label for="comments">Comments</label>
                                        <textarea id="comments" class="boxsizingBorder" name="comments" rows="3" cols="45"></textarea>


                                     
                                  </div>
                </div>
    </div>