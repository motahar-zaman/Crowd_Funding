<div id="date-modal"  class="modal fade" role="dialog">

  <div class="modal-dialog" role="document">
    <div id="date-modal" class="modal-content" role="dialog">
      <form action="{{route('admin-order-payment-date')}}">
      {!! csrf_field() !!}
        <input type="hidden" name="to_id" value="" >
        <div class="modal-header">
          <h5 class="modal-title px-3 col-10"><span id=""></span> </h5>
           <button type="button" class="close col-2 text-right" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        
        </div>
        <div class="modal-body modal_body_area row">
          
          {{--<p class="col-12 mb-0 pb-0" id="get_vendor_name"></p>--}}
          {{-- <div class="form-group col-md-12 mt-0 pt-0">--}}
			         {{-- <label for="">宛先</label> --}}
			     {{--<input class="form-control" type="hidden" name="name" value="{{ Auth::user()->first_name.' '.Auth::user()->last_name }}" requried readonly>--}}
           {{--  </div>--}}
         
         <input type="hidden" name="id" value=""  class="order_id1">
         <input type="hidden" name="status" value="" class="status1">
        <div class="form-group col-md-12">
			       <label for="">入金予定日を入力してください。</label>
			          <input type="date" class="form-control required" name="seller_payment_date" placeholder="件名"  value="" required >
		     </div>
        
    <div class="col-md-12">
      <h4 class="text-center text-white"> <button type="submit" class="btn btn-warning text-white" style="background:#0099ff;">送信する</button></h4>
    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
      </form>
    </div>
  </div>
</div>