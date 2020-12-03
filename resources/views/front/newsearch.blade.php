@extends('main_layout')

@section('custom_css')

<style>
		.padding_search{
			padding-left: 10px;
			padding-right: 10px;
		}
		
		
		@media (max-width: 575.98px){
			.marginLeft{
				margin-left:0px;
			}
		}
		@media only screen and (min-width: 575.98px) {
		.flex_cont {
			display: flex;
			align-items: stretch;
			overflow: auto;
			overflow-y: hidden;
			min-width: 1080px;
			flex-shrink: 0;
			}
		}


		@media (min-width: 1800px){
			.project_img{
				height: 353px;
				width: auto;
			}
			.col-md-4{
				/* max-width:498px; */
				padding-left: 10px;
				padding-right: 10px;
			} 
		}
		@media (max-width: 1800px){
			.project_img{
				height: 320px;
				width: auto;
			}
			.col-md-4{
				/* max-width:452px; */
				padding-left: 10px;
				padding-right: 10px;
			} 
		}
		@media (max-width: 1700px){
			.project_img{
				height: 297px;
				width: auto;
			}
			.col-md-4{
				/* max-width:422px; */
				padding-left: 10px;
				padding-right: 10px;
			} 
		}
		@media (max-width: 1600px){
			.project_img{
				height:278px; width:auto;
			}
			.col-md-4{
				/* max-width:397px; */
				padding-left: 10px;
				padding-right: 10px;
			}
		}
		@media (max-width: 1500px){
			.project_img{
				height:256px; width:auto;
			}
			.col-md-4{
				/* max-width:367px; */
				padding-left: 10px;
				padding-right: 10px;
			}
		}
		@media (max-width: 1400px){
			.project_img{
				height:234px; width:auto;
			}
			.col-md-4{
				/* max-width:337px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 17px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1300px){
			.project_img{
				height:216px; width:auto;
			}
			.col-md-4{
				/* max-width:313px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 15px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1210px){
			.project_img{
				height:205px; width:auto;
			}
			.col-md-4{
				/* max-width:298px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 14px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 14px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1160px){
			.project_img{
				height:193px; width:auto;
			}
			.col-md-4{
				/* max-width:284px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 13px;
			}
			.banner-text{
				font-size: 33px !important;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 13px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1110px){
			.project_img{
				height:185px; width:auto;
			}
			.col-md-4{
				/* max-width:270px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 12px;
			}
			.banner-text{
				font-size: 31px !important;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 12px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1060px){
			.project_img{
				height:174px; width:auto;
			}
			.col-md-4{
				/* max-width:256px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 12px;
			}
			.banner-text{
				font-size: 29px !important;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 13px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 1010px){
			.project_img{
				height:162px; width:auto;
			}
			.col-md-4{
				/* max-width:240px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 10px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
			.banner-text{
				font-size: 27px !important;
			}
		}
		@media (max-width: 950px){
			.project_img{
				height:234px; width:auto;
			}
			.col-md-4{
				/* max-width:335px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			.banner-text{
				font-size: 24px !important;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 9px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
			
		}
		@media (max-width: 890px){
			.project_img{
				height:215px; width:auto;
			}
			.col-md-4{
				/* max-width:310px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 9px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
			.project_count_area{
				font-size: 15px;
			}
		}
		@media (max-width: 830px){
			.project_img{
				height:207px; width:auto;
			}
			.col-md-4{
				/* max-width:300px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 8px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
			.project_count_area{
				font-size: 14px;
			}
		}
		@media (max-width: 795px){
			.project_img{
				height:190px; width:250px;
			}
			.col-md-4{
				max-width:272px;
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			.project_count_area{
				font-size: 13px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 8px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 765px){
			.project_img{
				height:193px; width:auto;
			}
			.col-md-4{
				/* max-width:282px; */
				padding-left: 10px;
				padding-right: 10px;
			}
			.project_item_footer{
				font-size: 10px;
			}
			/*ul.plist li a{
				color: #707070;
				font-size: 7px !important;
				text-decoration: none;
				font-weight: bold;
				margin-right: 15px;
			}*/
		}
		@media (max-width: 573px){
			.project_img{
				height:260px; width:auto;
			}
			.col-md-4{
				max-width:100%;
				padding-left: 10px;
				padding-right: 10px;
			}
		}




		@media (max-width: 1370px) {
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 16px;
				font-weight: 500;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}

		@media (max-width: 1295px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 16px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 13px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}
		
		@media (max-width: 1170px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 15px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}
		@media (max-width: 1080px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 12px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 8px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}
		@media (max-width: 930px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 11px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 10px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 7px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}
		@media (max-width: 870px) {
			.top_menu li a {
				color: #333333;
				text-decoration: none;
				font-size: 9px !important;
				font-weight: 500;
				margin-left: 20px;
				padding-bottom: 5px;
				font-family: w3;
			}
			.first_tabs ul li a {
				color: #333333;
				text-decoration: none;
				font-size: 6px;
				font-weight: 500;
				font-weight: bold;
				/* padding-top: 10px;
				padding-bottom: 10px; */
				display: inline-block;
			}
		}



		.project_title a{
			word-wrap: break-all !important;
			overflow: hidden;
			white-space: nowrap;
			hyphens: auto;
			line-height: 30px;
		}
		.project_progress_height{
			margin-bottom: 10px;
		}
		.progress{
			background-color: #cccccc !important
		}

	</style>

@stop

@section('content')

@include('front.layouts.project-list-breadcrums-search')

<div class="container">
<div class="mt20">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="popular">
					{{--<div class="row mb-4">
						<div class="col-md-3 offset-md-0">
							<span>すべてのプロジェクト  {{ count($projects) }}件</span>
						</div>
						<div class="col-md-2 offset-md-7">
							@include('front.layouts.sort')

						</div>
					</div>--}}
					<div class="row mb-4">
						<div class="col-md-4 col-sm-6 offset-md-0">
							<span class="project_count_area">すべてのプロジェクト  {{count($projects)}} 件</span>
						</div>
						<div class="col-md-4 col-sm-0 "></div>
						<div class="col-md-4 col-sm-6">
							<div class="col-md-6 p-0 offset-md-6">
								@include('front.layouts.sort')
							</div>
						</div>
					</div>
					<div class="row projects">
					<?php
					$col = 3;
					foreach($projects as $p){?>
						<div class="col-md-4">
							@include('front.layouts.project')
						</div>	
					<?php }?>
					</div>
					<div class="row text-center">
						{!! $projects->appends(request()->except('page'))->links() !!}
					</div>
				</div>

			</div>
		</div>

		{{-- <div class="col-md-2 mt50">
			@include('front.layouts.right_menu')
		</div> --}}
	</div>

</div>

</div>


@stop

@section('custom_js')
@yield('sort_js')
@stop
