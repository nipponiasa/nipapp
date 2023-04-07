

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

            
            @include('appprices.offcanvas.product_fields')
           

            
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