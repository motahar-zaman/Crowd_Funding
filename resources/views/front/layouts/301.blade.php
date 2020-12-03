<div class="bg-dark">
	<div class="container">
		<div class="row container_div justify-content-center">
			<div class="col-md-12">
				<div class="mt-5">
					<div class="row">
						<div class="col-md-12">
							<div class="row inner">
								<div class="col-md-8  mb-5 ">
									<div class="content-inner mb-3">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">商品詳細</h4>
											<p>{!!nl2br(e($product->explanation))!!}</p>

										</div>
									</div>

									<div class="content-inner mb-3 ">
										<div class="bg-white p-2">
											<h4 class="pb-2 font-weight-bold">掲載者情報</h4>
											<div class="row mb-4">
												<div class="col-md-4">												
												  @if($product->company_info_image)
													<img src="{{ Request::root().'/uploads/products/'.$product->company_info_image }}" alt="" class="img-fluid" width="157px" height="157px;">
												  @endif	
												</div>
												<div class="col-md-8 name_margin">
													<h5>{{ $product->company_name }}</h5>
													<p>
														{!!nl2br(e($product->company_info))!!}
													</p>
													<span class="col-md-12 p-0">
														@if (Auth::check())
															@if($product->user_id == Auth::user()->id)
																{{-- <button class=" text-white btn btn-md mt-4 w6-14 msg_send_btn"  style="cursor:pointer; color:#fff;background-color:#ccc"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span> メッセージを送る</button> --}}
															@else
																<button class=" text-white btn btn-md mt-4 w6-14 msg_send_btn message_button btn-warning"  data-user_id="{{ $product->user->id }}" data-product_company_name="{{ $product->company_name ?  $product->company_name : $product->user->first_name.' '.$product->user->last_name}}" data-project_username="{{ $product->user->first_name.' '.$product->user->last_name }}" style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span> メッセージを送る</button>
															@endif
														@else
															<a class=" text-white btn btn-md mt-4 w6-14 bg-dark bg-yellow message_button btn-warning" href="{{ route('front-product-details-login', $product->id) }}"   style="cursor:pointer; color:#fff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span> メッセージを送る</a>
														@endif
													</span>
													{{-- <button type="button" class="btn btn-md mt-4 text-white w6-14" name="button" style=""> <span class="fa fa-envelope" style="color:#fff;"></span> メッセージを送る</button> --}}
												</div>
											</div>

										</div>
									</div>
							</div>
							<div class="col-md-4">
								@foreach ($any_two as $product)
								<div class="content-inner mb-3">
									<div class="bg-white p-2">
										<div class=row>
											<div class="px-4 mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0">
													<a href="{{route('front-product-details', ['id' => $product->id])}}" style="color:#6e6e6e">{{ $product->title }}</a>
												</h4>
												{{-- <span>リターン名がここに入りますす</span> --}}

											</div>
											<div class="px-4 mb-2 col-md-12">
												<a href="{{route('front-product-details', ['id' => $product->id])}}" style="color:#6e6e6e">
													<img src="{{$product->image ? Request::root().'/uploads/products/'.$product->image : asset('uploads/products/1615154785167836.jpeg')}}" alt="" class="" width="100%" height="200px" style="object-fit:contain">
												</a>
											</div>
											<div class="px-4 mb-2 col-md-12" style="font-size:15px;">
												<h4>{!!number_format($product->price)!!} ポイント</h4>
												CrofunポイントとはCrofunに登録されて いる様々な商品と交換できるポイントです。
											</div>
											@if(Auth::check())
												@if($product->user_id == Auth::user()->id)
													<div class="px-4 mb-2 mt-1 col-md-12">
														<form action="" method="">
															{{--<input type="hidden" name="id" value="{{$product->id}}">
															<input type="hidden" name="price" value="{{$product->price}}">
															<input type="hidden" name="title" value="{{$product->title}}">
															<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">--}}
															<button type="" class="px-3 text-white btn btn-lg btn-block addCart w6-18" style="background-color:#cccccc !important; height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
															{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
															{{-- </div> --}}
														</form>
													</div>
												@else
													<div class="px-4 mb-2 mt-1 col-md-12">
														<form action="{{route('front-cart-add')}}" method="get">
															<input type="hidden" name="id" value="{{$product->id}}">
															<input type="hidden" name="price" value="{{$product->price}}">
															<input type="hidden" name="title" value="{{$product->title}}">
															<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
															<button type="submit" class="px-3 text-white btn btn-lg btn-block addCart w6-18 btn-warning" style="height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
															{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
															{{-- </div> --}}
														</form>
													</div>
												@endif
											@else
												<div class="px-4 mb-2 mt-1 col-md-12">
													<form action="{{route('front-product-details-login', ['id' => $product->id])}}" method="get">
														<input type="hidden" name="id" value="{{$product->id}}">
														<input type="hidden" name="price" value="{{$product->price}}">
														<input type="hidden" name="title" value="{{$product->title}}">
														<input type="hidden" name="quantity" class="add_to_cart_quantity form-control" value="1" required placeholder="数量">
														<button type="submit" class="px-3 text-white btn btn-lg btn-block addCart w6-18 btn-warning" style="height:80%;cursor: pointer;"> <span class="fa fa-shopping-cart px-1"></span> カートに入れる</button>
														{{-- <div class=" div-radius1 m-0 p-0" style="height:50px"> --}}
														{{-- </div> --}}
													</form>
												</div>
											@endif
										</div>
									</div>
								</div>
							@endforeach
							</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
