

<!-- Modal -->
<div class="modal fade" id="createnewproduct" tabindex="-1" role="dialog" aria-labelledby="createnewproductlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="motoeditformlabel">New product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


  <div class="modal-body">
  <div class="container-fluid">
    <form action='create_new_product' id="createmodel" method="post" >
 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
          

    <div class="row">
                  <div class="col-md-12 mb-3">
                            <div class="form-group">
                                  <label for="maker">Model</label>
                                  <input     type="text" class="form-control" name="model" id="model"     >
                          </div>
                  </div>
            </div>






           <div class="row">
                  <div class="col-md-12 mb-1">
                  <label for="type">Maker</label>
                  </div>
            </div>

            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">    
               <select class="form-control"  name="maker" id="maker">
                             
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
               <select class="form-control" aria-label="Default select example" name="type" id="type">
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
                  <label for="type">Country</label>
                  </div>
            </div>


            <div class="row">
                  <div class="col-md-12 mb-3">
                  <div class="form-group">    
               <select class="form-control" aria-label="Default select example" name="country" id="country">
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
        
          
           



 
            <div class="row">
                  <div class="col-md-3 mb-5">
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
