

<!-- Modal -->
<div class="modal fade" id="producteditmodal" tabindex="-1" role="dialog" aria-labelledby="editproductlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="motoeditformlabel2">Edit product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      {{-- The form --}}
      <form action='product_edit' id="productmodeleditform" method="post" >       {{-- id="producteditform" already exists --}}


        <div class="modal-body">
        <div class="container-fluid">


 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          

            <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="id">Product ID</label>
                            <input type="text" class="form-control" name="id" readonly>
                        </div>
                    </div>
            </div>



            <div class="row">
                  <div class="col-md-12 mb-3">
                            <div class="form-group">
                                  <label for="model">Model</label>
                                  <input type="text" class="form-control" name="model"     >
                          </div>
                  </div>
            </div>




           <div class="row">
                  <div class="col-md-12 mb-1">
                  <label for="maker">Maker</label>
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">    
               <select class="form-control"  name="maker" >
                             
                        <option value="ATUL">ATUL</option>
                        <option value="BASHAN">BASHAN</option>
                        <option value="COWELLS">COWELLS</option>
                        <option value="DAYANG">DAYANG</option>
                        <option value="DOOHAN">DOOHAN</option>
                        <option value="FD">FD</option>
                        <option value="HAOJIN">HAOJIN</option>
                        <option value="HELI">HELI</option>
                        <option value="HONGYA">HONGYA</option>
                        <option value="JIASI">JIASI</option>
                        <option value="JINCHENG">JINCHENG</option>
                        <option value="KAITONG">KAITONG</option>
                        <option value="LIFAN">LIFAN</option>
                        <option value="LIMA">LIMA</option>
                        <option value="NANILIAN">NANILIAN</option>
                        <option value="NIPPUESTO">NIPPUESTO</option>
                        <option value="QINGQI">QINGQI</option>
                        <option value="SHINERAY">SHINERAY</option>
                        <option value="SHIWEI">SHIWEI</option>
                        <option value="SUNRA" selected>SUNRA</option>
                        <option value="TIANYING">TIANYING</option>
                        <option value="VIGOROUS">VIGOROUS</option>
                        <option value="YINGANG">YINGANG</option>
                        <option value="ZNEN">ZNEN</option>
                        <option value="ZXMCO">ZXMCO</option>
                
                                                           

                  </select>
                  </div>     
                  </div>
            </div>






            <div class="row">
                  <div class="col-md-12 mb-1">
                  <label for="type">Type</label>
                  </div>
            </div>




            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">    
               <select class="form-control" aria-label="Default select example" name="type" >
                              <option value="Other" selected>Other</option>
                              <option value="Electric">Electric</option>
                              <option value="Petrol">Petrol</option>
                              <option value="Petrol (Euro V)">Petrol (Euro V)</option>
                              <option value="Batteries">Batteries</option>
                  </select>
                  </div>     
                  </div>
            </div>



            <div class="row">
                  <div class="col-md-12 mb-1">
                  <label for="country">Country</label>
                  </div>
            </div>


            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">    
               <select class="form-control" aria-label="Default select example" name="country" >
                              <option value="Generic" selected>Generic</option>
                              <option value="BE">BE</option>
                              <option value="CY">CY</option>
                              <option value="FR">FR</option>
                              <option value="DR">DR</option>
                              <option value="GT">GT</option>
                              <option value="NL">NL</option>
                  </select>
                  </div>     
                  </div>
            </div>
        
          
           

            
        </div>
        </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary m-2">Save</button>
            <button type="button" class="btn btn-secondary m-2 btn-ok" data-dismiss="modal">Close</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>