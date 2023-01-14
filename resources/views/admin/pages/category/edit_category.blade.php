@extends('admin.layouts.master')
@php
	$title = __('lang.editcategory');
	session()->put('index', 'editcategory');
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
						<h2>Update category</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- {{var_dump(session('category'))}} -->

				<!-- Message -->
				<div class="col-12 pb-2">
					@if(session('message') == 'updatesuccess')
						<h3 class="text-green">Updated success!</h3>
						<!-- sửa lang -->
						@php session('message',null); @endphp
					@endif
				</div>

				@php
					$category_vi = session('category_vi');
					$category_en = session('category_en');
					$category = session('category');
				@endphp

				<!-- form -->
				<div class="col-12">
					<form action="{{url('/admin/category/update-category/'.$category->id)}}" method="POST" class="form">
						@csrf
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload cover (270 x 400)</label>
											<input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
											<img id="form__img" src="{{asset('public/storage/uploads/category/'.$category->image)}}" alt="{{$category->image}}">
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
										<label for="Vietnamese">category ( {{__('lang.vi')}} )</label>
									</div>

									<div class="col-12">
										<input name="title:vi" type="text" class="form__input" placeholder="Title" value="{{$category_vi->title}}">
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:vi" class="form__textarea" placeholder="Description">{{$category_vi->desc}}</textarea>
									</div>
								</div>
								<div class="row">

									<div class="col-12 text-white">
										<label for="English">Category ( {{__('lang.en')}} )</label>
									</div>
									
									<div class="col-12">
										<input name="title:en" type="text" class="form__input" placeholder="Title" value="{{$category_en->title}}">
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:en" class="form__textarea" placeholder="Description">{{$category_en->desc}}</textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<ul class="form__radio">
											<li>
												<span>Status:</span>
											</li>
											<li>
												@if($category->status == 1)
													<input value="1" id="type1" type="radio" name="status" data-toggle="collapse" data-target=".multi-collapse" checked=" checked">
												@else
													<input value="1" id="type1" type="radio" name="status" data-toggle="collapse" data-target=".multi-collapse">
												@endif
												<label for="type1"><span class="text-green">Visible</span></label>
											</li>
											<li>
												@if($category->status == 0)
													<input value="0" id="type2" type="radio" name="status" data-toggle="collapse" data-target=".multi-collapse" checked=" checked">
												@else
													<input value="0" id="type2" type="radio" name="status" data-toggle="collapse" data-target=".multi-collapse">
												@endif
												<label for="type2"><span class="text-red">Hidden</span></label>
											</li>
										</ul>
									</div>
									
									<div class="col-12">
										<div class="row">

											<div class="col-12">
												<button type="submit" class="form__btn">update</button>
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

	@php
		session()->put([
            'category_vi' => null,
            'category_en' => null,
            'category' => null,
        ]);
    @endphp
@endsection