@extends('client.layouts.master_auth')
@php
	$title = __('lang.error404');
@endphp
@section('title',$title)
@section('content')
	
	<!-- <div style="color: white;">
		<?php var_dump(session('locale')) ?></div> -->

	<!-- page 404 -->
	<div class="page-404 section--bg" data-bg="{{asset('public/frontend/img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-404__wrap">
						<div class="page-404__content">
							<h1 class="page-404__title">404</h1>
							<p class="page-404__text">{{__('lang.desc404')}}</p>
							<a href="{{ url()->previous() }}" class="page-404__btn">{{__('lang.back404')}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page 404 -->

@endsection