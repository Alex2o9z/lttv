@extends('admin.layouts.master')
@php
	$title = __('lang.addgenre');
	session()->put('index', 'addgenre');
@endphp
@section('title',$title)

@section('content')

	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>{{__('lang.addgenre')}}</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- Message -->
				<div class="col-12 pb-2">
					@if(session('message') == 'success')
						<h3 class="text-green">{{__('lang.added')}}</h3>
						<!-- sửa lang -->
						@php session('message',null); @endphp
					@endif
				</div>

				<!-- form -->
				<div class="col-12">
					<form action="{{route('admin.genre.store')}}" method="POST" class="form" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload cover (600 x 315)</label>
											<input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
								</div>
							</div>

							<style type="text/css">
								.text-white {
									color: white;
								}
							</style>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12 text-white">
										<label for="Vietnamese">Genre ( {{__('lang.vi')}} )</label>
									</div>

									<div class="col-12">
										<input name="title:vi" type="text" class="form__input" placeholder="Title" required>
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:vi" class="form__textarea" placeholder="Description" required></textarea>
									</div>
								</div>
								<div class="row">

									<div class="col-12 text-white">
										<label for="English">Genre ( {{__('lang.en')}} )</label>
									</div>
									
									<div class="col-12">
										<input name="title:en" type="text" class="form__input" placeholder="Title" required>
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:en" class="form__textarea" placeholder="Description" required></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<ul class="form__radio">
											<li>
												<span>Status:</span>
											</li>
											<li>
												<input value="1" id="type1" type="radio" name="status" checked="" required>
												<label for="type1">Visible</label>
											</li>
											<li>
												<input value="0" id="type2" type="radio" name="status" required>
												<label for="type2">Hidden</label>
											</li>
										</ul>
									</div>
									
									<div class="col-12">
										<div class="row">

											<div class="col-12">
												<button type="submit" class="form__btn">publish</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
	</main>
	<!-- end main content -->

@endsection