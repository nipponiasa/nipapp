

<!-- Modal -->
<div class="modal fade" id="createnewprice" tabindex="-1" role="dialog" aria-labelledby="createnewpricelabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


    <div class="modal-header">
        <h5 class="modal-title" id="motoeditformlabel">List a new price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


    <form action='create_new_price' name="createprice" id="createprice" method="post"  enctype="multipart/form-data" >

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









 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    @include('appprices.offcanvas.price_fields')            


    






    </div>
    </div> <!-- modal-body -->


      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-secondary  btn-ok" data-dismiss="modal">Close</button>
      </div>


    </form>


    </div>
  </div>
</div>



{{-- The currency rates come from laravel (PricesController\list_prices) --}}
{{-- Σημείωση. Για PHP named array σε JavaScript Object, βάζεις var data=@json($php_var); --}}
<script>
    var dailyRates={
        usdcny: {{$rate_usd_cny}},
        eurcny: {{$rate_eur_cny}},
        eurusd: {{$rate_eur_usd}}
    }

    document.querySelector("#fetchRates").addEventListener('click',function(){
        $('#createnewprice [name="us_yuan_at_date"]').val( $('#createnewprice [name="us_yuan_at_date"]').val() || dailyRates.usdcny );
        $('#createnewprice [name="eur_yuan_at_date"]').val( $('#createnewprice [name="eur_yuan_at_date"]').val() || dailyRates.eurcny );
        $('#createnewprice [name="eur_us_at_date"]').val( $('#createnewprice [name="eur_us_at_date"]').val()||dailyRates.eurusd );
    });
</script>