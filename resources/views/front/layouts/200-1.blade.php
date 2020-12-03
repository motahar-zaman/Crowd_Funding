<style>
   .project-details-msg-btn{
        font-size: 18px !important;
        font-family: w6 !important;
    }
</style>

<div class="bg-dark no-container project_details_bottom_info">
	<div class="container">
		<div class="row">
			<div class=" col-md-12 container_div col-sm-12">
				<div class="mt-5">
					<div class="row">
						<div class="col-md-12">
							<div class="row inner">
								<div class="col-md-8  mb-5 ">
									<div class="content-inner-blue mb-3">
										<div class="bg-white padding20px">
											<h4 class="marginBottom2rem font-weight-bold title">プロジェクトの目的</h4>
											<p class="des" style="word-wrap:break-word"> {!!nl2br(e($project->purpose))!!} </p>
										</div>
									</div>
									<div class="content-inner-blue mb-3 ">
											<div class="bg-white padding20px">
												{{--<h4 class="pb-2 font-weight-bold">{{ $project->title }}</h4>--}}
												<h4 class="marginBottom2rem font-weight-bold title">プロジェクト概要</h4>
												<div class="mb-4">
													<div class="square" style="min-height:150px">
														<div class="">
															<img style="float:left;margin:5px 20px 10px 5px;object-fit:cover;" src="{{ asset('uploads/projects/'. $project->featured_image) }}" alt="" class="additional_img image_margin"  width="196px" height="145px" >
														</div>
														<p style=" text-align: justify;"> {!!nl2br(e($project->description))!!}  </p>
													</div>
													{{--<div class="col-md-8">
														<div class="row">
															<span class="col-md-12 description des" style="word-wrap: break-word;" data-description="{{ $project->description }}" style="word-wrap:break-word">
															</span>
														</div>
													</div>
													<div class="col-md-12 des description_extend pt-2" style="word-wrap:break-word"></div>--}}
												</div>
	
											</div>
										</div>


										<div class="content-inner-blue mb-3 ">
											<div class="bg-white padding20px">
												{{-- <h4 class="pb-2 font-weight-bold">予算用途の内訳</h4> --}}
												<h4 class="marginBottom2rem font-weight-bold title" >{!! nl2br(e($project->beneficiary)) !!}</h4>
												<div class="row">
													<span class="col-md-12 des pb-3" style="word-wrap:break-word">
														{!! nl2br(e($project->budget_usage_breakdown)) !!}
													</span>
												</div>
											</div>
										</div>

								@if ($project->details)
								<div class="details_description_all" ></div>
									@foreach($project->details as $projectDetails)
										<div class="content-inner-blue  mb-3">
											<div class="bg-white padding20px">
												<h4 class="marginBottom2rem font-weight-bold title">{{$projectDetails->details_title}}</h4>
												@if($projectDetails->draft_file)
												<div class="mb-4">
													<div class="square" style="min-height:150px">
														<div class="">
															<img style="float:left;margin:5px 20px 10px 5px;object-fit:cover;" src="{{asset('uploads/projects/'. $projectDetails->draft_file) }}" alt="" class="additional_img image_margin" width="196px;" height="145px">
														</div>
														<p style=" text-align: justify;"> {!!nl2br(e($projectDetails->details_description))!!}  </p>
													</div>

													{{--<div class="square">
														<div class="">
															<img src="{{asset('uploads/projects/'. $projectDetails->draft_file) }}" alt="" class="additional_img" width="211px" height="auto">
														</div>
														<p class=""style="text-align: justify;">
															{!! nl2br(e($projectDetails->details_description)) !!}
														</p>
													</div>--}}
												</div>
												@else
												<div class="row mb-4">
													<span class="col-md-12 des" style="word-wrap:break-word">
														{!! nl2br(e($projectDetails->details_description)) !!}
													</span>
												</div>
												@endif

											</div>
										</div>
									@endforeach
								@endif



							<div class="content-inner-blue mb-3 ">
								<div class="bg-white padding20px">
									<h4 class="marginBottom2rem font-weight-bold title">起案者プロフィール</h4>
									{{-- <h4 class="pb-2 font-weight-bold">{{ $project->title }}</h4> --}}

									@if($project->user->pic)
									<div class="row mb-4">
										<?php
										$pic = $project->user->pic;
										// dd($pic);
										if($pic){
											$pic = Request::root().'/uploads/'.$pic;
										}
										// else{
										// 
										// }}
										?>
										<div class="col-md-4">
											<img style="object-fit:cover;" src="{{asset('uploads/'. $project->user->pic) }}" alt="" class="img-fluid  image_margin" style="border:1px solid #cccccc " width="196px;" height="145px">
											{{--<img style="object-fit:cover;" src="{{asset('uploads/'. $project->user->pic) }}" alt="" class=" additional_img image_margin" style="border:1px solid #cccccc " width="196px;" height="145px">--}}
										</div>
										<div class="col-md-8" style="padding:5px">
											<div class="row">
												<span class="col-md-12 title name_padding"style="padding-bottom:40px">
													<h5>{{$project->user->first_name.' '.$project->user->last_name}}</h5>
												</span>
												<p class="col-md-12">
													{{ (isset($project->user->profile)) ? $project->user->profile->profile : '' }}
												</p>
											</div>
											<div class="row p-0 mt-auto">
												<span class="col-md-12">
													@if (Auth::check())
														@if($project->user_id==Auth::user()->id)
															<div class=""></div>
														@else
															<button class="p-2 text-white btn btn-md mt-4 msg_send_btn project-details-msg-btn w6-14"  data-user_id="{{ $project->user->id }}"  data-project_username="{{ $project->user->first_name.' '.$project->user->last_name }}" style="cursor:pointer; color:#fff; background-color:#0099ff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
														@endif
													@else
														<a class="p-2 text-white btn btn-md mt-4 bg-dark project-details-msg-btn w6-14" href="{{ route('front-project-details-login', $project->id) }}"   style="cursor:pointer; color:#fff; background-color:#0099ff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</a>
													@endif
												</span>
											</div>
											{{-- <button type="button" class="btn btn-md mt-4" name="button" style="background:#c6c6c6"; > <span class="fa fa-envelope" style="color:#fff;"></span> メッセージを送る</button> --}}

										</div>
										@else
											<div class="col-md-12">
												<div class="row">
													<span class="col-md-12 title"style="padding-bottom:40px">
														<h5>{{$project->user->first_name.' '.$project->user->last_name}}</h5>
													</span>
													<p class="col-md-12">
														{{ (isset($project->user->profile)) ? $project->user->profile->profile : '' }}
													</p>
												</div>
												<div class="row p-0 mt-auto">
													<span class="col-md-12">
														@if (Auth::check())
															@if($project->user_id==Auth::user()->id)
																<div class=""></div>
															@else
																<button class="p-2 text-white btn btn-md mt-4 w6-14 msg_send_btn project-details-msg-btn"  data-user_id="{{ $project->user->id }}"  data-project_username="{{ $project->user->first_name.' '.$project->user->last_name }}" style="cursor:pointer; color:#fff; background-color:#0099ff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</button>
															@endif
														@else
															<a class="p-2 text-white btn btn-md mt-4 w6-14 bg-dark project-details-msg-btn" href="{{ route('front-project-details-login', $project->id) }}"   style="cursor:pointer; color:#fff; background-color:#0099ff;"> <span style="color:#fff !important;"> <i class="fa fa-envelope"></i> </span>メッセージを送る</a>
														@endif
													</span>
												</div>
											</div>
										@endif
									</div>

								</div>
							</div>

									
							</div>
							<div class="col-md-4">
								<div class="content-inner-arrow mb-3 details_btm_arrow">
									<div class="bg-white " style="padding: 15px 15px 0px 15px;">
										<div class="row">
											<div class="mb-2 col-md-12 text-center">
												<h4 class="forn-weight-bold reward_extra">リターンを選ぶ</h4>
												<span class="reward_extra_details"> このプロジェクトを支援するためには,<br> リターンをお選びください。</span>
											</div>
										</div>
										<div class="arrow-down">

										</div>
									</div>
									<div class="detailsbtnarrow">
										<img src="{{ URL::to('assets/front/img/btmarrow.png') }}">
									</div>
								</div>
								@foreach ($project->reward->sortBy('amount') as $reward)

								<div class="content-inner-blue mb-3">
									<div class="bg-white padding20px">
										<div class=row>
											<div class=" mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0 reward_extra">￥{{ number_format($reward->amount) }} コース</h4>
												<span>{{$reward->is_other}}</span>

											</div>
											<div class=" mb-2 col-md-12">
												@if ( $reward->other_file)
													<img style="object-fit:cover" src="{{ asset('uploads/projects/'. $reward->other_file) }}" alt="" class="reward_img" width="100%" height="250px">
												@endif

											</div>
											<div class=" mb-2 col-md-12 des" style="font-size:15px;">
												<span>{{ $reward->is_crofun_point }}  ポイント</span> <br>
												{{-- {{ $reward->is_crofun_point }} --}}
											{!!nl2br(e($reward->other_description))!!}
											</div>
											@if (Auth::check())
												@if(($user->profile->phonetic) == null ||($user->profile->phonetic2) == null ||($user->profile->phone_no) == null||($user->profile->postal_code) ==null||($user->profile->prefectures) == null||($user->profile->municipility) == null ||($user->first_name) == null ||($user->last_name) == null  )
									
													<div  class=" mb-4 mt-1 col-md-12 profileModal"  >
														<div  href="" class=" text-white btn btn-md btn-block reward_button" name="button" style="background:#0099ff;">このリターンを選択する</div>
													</div>
												@else
													@if($project->end < date("Y-m-d", strtotime('now')))
														<div class=" mb-4 mt-1 col-md-12">
															<div  href="" class=" text-white btn btn-md reward_button btn-block <?php echo $project->end < date('Y-m-d')?'disabled':'enabled';?>" name="button" style="background:#cccccc;">このリターンを選択する</div>
														</div>
													@else
														@if($project->user_id==$user_profile->id)
															<div class=" mb-4 mt-1 col-md-12">
																<div  href="" class=" text-white btn btn-md btn-block reward_button" name="button" style="background:#0099ff;;background-color:#cccccc;">このリターンを選択する</div>
															</div>
														@else
															<div class=" mb-4 mt-1 col-md-12">
																<a  href="/user/invest/{{ $project->id }}?reward={{ $reward->id }}" class="reward_button text-white btn btn-md btn-block  <?php echo $project->start > date('Y-m-d')?'disabled':'enabled';?>" name="button" style="background:#0099ff;">このリターンを選択する</a>
															</div>
														@endif
													@endif
												@endif
											@else
												@if($project->end < date("Y-m-d", strtotime('now')))
													<div class=" mb-4 mt-1 col-md-12">
														<div  href="" class="reward_button text-white btn btn-md btn-block   <?php echo $project->start > date('Y-m-d')?'disabled':'enabled';?>" name="button" style="background:#cccccc;">このリターンを選択する</div>
													</div>
												@else
													<div class=" mb-4 mt-1 col-md-12">
														<a  href="{{route('front-project-details-login', ['id' => $project->id])}}" class="reward_button text-white btn btn-md btn-block <?php echo $project->start > date('Y-m-d')?'disabled':'enabled';?>" name="button" style="background:#0099ff;">このリターンを選択する</a>
													</div>
												@endif
											@endif

										</div>
									</div>
								</div>
							@endforeach

								{{-- <div class="content-inner-blue mb-3">
									<div class="bg-white p-2">
										<div class=row>
											<div class="px-4 mb-2 col-md-12">
												<h4 class="fornt-weight-bold p-0 ">￥5,000 コース</h4>
												<span>リターン名がここに入りますす</span>

											</div>
											<div class="px-4 mb-2 col-md-12">
												<img src="{{ asset('images/BMW-TA.jpg') }}" alt="" class="" width="100%" height="200px">

											</div>
											<div class="px-4 mb-2 col-md-12" style="font-size:15px;">
												<a href="#">1000ポイント</a> <br>
												CrofunポイントとはCrofunに登録されて いる様々な商品と交換できるポイントです。
											</div>
											<div class="px-4 mb-2 mt-1 col-md-12">
												<button type="button" class=" text-white btn btn-md btn-block" name="button" style="background:#0099ff;">このリターンを選択する</button>

											</div>

										</div>
									</div>
								</div> --}}
							</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

