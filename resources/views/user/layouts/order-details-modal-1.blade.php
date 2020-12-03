<div class="modal fade" id="order1">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <form action="{{route('user-order-shipping-info')}}">
      <input type="hidden" name="to_id" value="">

    
      <div class="modal-header">
          <h5 class="modal-title px-3 col-10"><span id=""></span> </h5>
          
           <button type="button" class="close col-2 text-right" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        
        </div>


      <div class="modal-body row justify-content-center modal_body_area">

        {{-- <div class="form-group col-md-12 mt-0 pt-0">
			       <label for=""></label>
			       <input class="form-control" type="hidden" name="name" value="{{Auth::user()->first_name.' '.Auth::user()->last_name}}" requried readonly>
		     </div> --}}
         <input type="hidden" name="id" value=""  class="order_id1">
         <input type="hidden" name="detail_id" value=""  class="order_detail_id1">
         <input type="hidden" name="status" value="" class="status1" >
         <input type="hidden" name="is_edit" value="" class="is_edit1" >


        <div class="form-group col-md-10">
			       <label for="" style="font-size:15px;">伝票番号を入力してください</label>
			          <input class="form-control required" id="document_number" name="document_number" placeholder="" required>
		     </div>
        <div class="form-group col-md-10">
			       <label for="" style="font-size:15px;">配送会社を選択してください</label>
             <!-- <input class="form-control" name="shipping_company" placeholder="" required> -->
             <select class="form-control required" id="shipping_company" name="shipping_company" required>
                <option value="">選択してください</option>
                <option value="ヤマト運輸">ヤマト運輸</option>
                <option value="佐川急便">佐川急便</option>
                <option value="日本郵便">日本郵便</option>
                <option value="その他">その他</option>
             </select>
    		</div>
    <div class="col-md-12">
      <h4 class="text-center"> <button type="submit" class="btn btn-dark" style="background-color: #c6c6c6;">送信する</button></h4>

    </div>
      </div>
      {{-- <div class="modal-footer ">

        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button> --}}
  {{-- </div> --}}
      </form>
    </div>
  </div>
</div>
