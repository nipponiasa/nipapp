

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




    <form action='create_new_product' id="createmodel" method="post" >

        <div class="modal-body">
        <div class="container-fluid">
 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          

            @include('appprices.offcanvas.product_fields')
           

            </div>
            </div>

            
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary m-2">Create</button>
            <button type="button" class="btn btn-secondary m-2 btn-ok" data-dismiss="modal">Close</button>
        </div>


    </form>


</div>
</div>
</div>
