@extends('admin.layouts.master')
@php
	$title = __('lang.additem');
	session()->put('index', 'additem');
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
						<h2>Add new item</h2>
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
					<form action="{{route('admin.item.store')}}" method="POST" class="form" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
											<label for="form__img-upload">Upload poster (270 x 400)</label>
											<input id="form__img-upload" name="poster" type="file" accept=".png, .jpg, .jpeg">
											<img id="form__img" src="#" alt=" ">
										</div>
									</div>
									<div class="col-12 col-sm-6 col-md-12">
										<ul class="form__radio mt-2">
											<li>
												<span>Status:</span>
											</li>
											<li>
												<input value="1" id="status1" type="radio" name="status" checked="">
												<label for="status1">Visible</label>
											</li>
											<li>
												<input value="0" id="status2" type="radio" name="status">
												<label for="status2">Hidden</label>
											</li>
										</ul>
									</div>

									<div class="col-12 col-sm-6 col-md-12">
										<ul class="form__radio mt-2">
											<li>
												<span>Category:</span>
											</li>
											<!-- <li>
												<input value="1" id="status1" type="radio" name="status" checked="">
												<label for="status1">Visible</label>
											</li> -->
											@if(session('categories'))
												@foreach(session('categories') as $key => $category)
												<input value="{{$category->id}}" id="{{$category->id}}" type="radio" name="categories"><label for="{{$category->id}}"> {{$category->title}}</label>
												@endforeach
												{{session()->put('categories',null)}}
											@endif
										</ul>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">

									<div class="col-12 text-white">
										<label for="Vietnamese">Item ( {{__('lang.vi')}} )</label>
									</div>

									<div class="col-12">
										<input name="title:vi" type="text" class="form__input" placeholder="Title">
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:vi" class="form__textarea" placeholder="Description"></textarea>
									</div>

									<div class="col-12 text-white">
										<label for="English">Item ( {{__('lang.en')}} )</label>
									</div>

									<div class="col-12">
										<input name="title:en" type="text" class="form__input" placeholder="Title">
									</div>

									<div class="col-12">
										<textarea id="text" name="desc:en" class="form__textarea" placeholder="Description"></textarea>
									</div>

									<div class="col-12 col-lg-6">
										<input name="running_time" type="text" class="form__input" placeholder="Running timed in minutes">
									</div>
									
									<div class="col-12 col-lg-6">
										<ul class="form__radio mt-2">
											<li>
												<span>Pricing:</span>
											</li>
											<li>
												<input value="1" id="premium1" type="radio" name="premium" checked="">
												<label for="premium1">Free</label>
											</li>
											<li>
												<input value="0" id="premium2" type="radio" name="premium">
												<label for="premium2">Premium</label>
											</li>
										</ul>
									</div>

									<div class="col-12 col-lg-4">
										<input name="release_year" type="text" class="form__input" placeholder="Release year">
									</div>

									<div class="col-12 col-lg-4">
										<select name="quality" class="js-example-basic-single" id="quality">
											<option value=""></option>
											<option value="FullHD">FullHD</option>
											<option value="HD">HD</option>
										</select>
									</div>

									<div class="col-12 col-lg-4">
										<input name="age" type="text" class="form__input" placeholder="Age">
									</div>

									<div class="col-12 col-lg-6">
										<select name="countries" class="js-example-basic-multiple" id="country" multiple="multiple">
											@if(session('countries'))
												@foreach(session('countries') as $key => $country)
												<option value="{{$country->id}}">
													{{$country->nicename}}
												</option>
												@endforeach
												{{session()->put('countries',null)}}
											@endif
										</select>
									</div>

									<div class="col-12 col-lg-6">
										<select name="genres" class="js-example-basic-multiple" id="genre" multiple="multiple">
											@if(session('genres'))
												@foreach(session('genres') as $key => $genre)
												<option value="{{$genre->id}}">
													{{$genre->title}}
												</option>
												@endforeach
												{{session()->put('genres',null)}}
											@endif
										</select>
									</div>

									<div class="col-12">
										<div class="form__gallery">
											<label id="gallery1" for="form__gallery-upload">Upload photos</label>
											<input data-name="#gallery1" id="form__gallery-upload" name="gallery" class="form__gallery-upload" type="file" accept=".png, .jpg, .jpeg" multiple>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<ul class="form__radio">
									<li>
										<span>Item type:</span>
									</li>
									<li>
										<input value="0" id="type1" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse" checked="">
										<label for="type1">Movie (1 video)</label>
									</li>
									<li>
										<input value="1" id="type2" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse">
										<label for="type2">TV Series (Many videos)</label>
									</li>
								</ul>
							</div>
							
							<div class="col-12">
								<div class="row">

									<!-- movie -->
									<div class="col-12">
										<div class="collapse show multi-collapse" id="multiCollapseExample1">
											<div class="form__video">
												<div class="col-12">
													<textarea id="text" name="trailer" class="form__textarea" placeholder="Upload link trailer from youtube"></textarea>
												</div>
												<!-- <label id="movie1" for="form__video-upload">Upload video</label>
												<input data-name="#movie1" id="form__video-upload" name="movie" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*"> -->
											</div>
											<div class="form__video">
												<div class="col-12">
													<textarea id="text" name="video560p" class="form__textarea" placeholder="Upload link video 560p"></textarea>
												</div>
											</div>
											<div class="form__video">
												<div class="col-12">
													<textarea id="text" name="video720p" class="form__textarea" placeholder="Upload link video 720p"></textarea>
												</div>
											</div>
											<div class="form__video">
												<div class="col-12">
													<textarea id="text" name="video1080p" class="form__textarea" placeholder="Upload link video 1080p"></textarea>
												</div>
											</div>
											<div class="form__video">
												<div class="col-12">
													<textarea id="text" name="video1440p" class="form__textarea" placeholder="Upload link video 1440p"></textarea>
												</div>
											</div>
										</div>
									</div>
									<!-- end movie -->

									<!-- tv series -->
									<div class="col-12">
										<div class="collapse multi-collapse" id="multiCollapseExample2">
											<!-- season -->
											<div class="form__season">
												<div class="form__season-title">
													<div class="row">
														<div class="col-12">
															<span class="form__title">Season #1</span>
														</div>

														<div class="col-12 col-sm-6 col-md-5 col-xl-6">
															<input type="text" class="form__input" placeholder="Season title">
														</div>

														<div class="col-12 col-sm-6 col-md-4 col-xl-4">
															<input type="text" class="form__input" placeholder="Season info">
														</div>

														<div class="col-12 col-sm-4 col-md-3 col-xl-2">
															<button class="form__btn form__btn--add">add season</button>
														</div>
													</div>
												</div>

												<!-- episode -->
												<div class="form__episode">
													<div class="row">
														<div class="col-12">
															<span class="form__title">Episode #1</span>
															<button class="form__delete" type="button">
																<i class="icon ion-ios-close"></i>
															</button>
														</div>

														<div class="col-12 col-md-6">
															<input type="text" class="form__input" placeholder="Episode title 1">
														</div>

														<div class="col-12 col-md-6">
															<input type="text" class="form__input" placeholder="Air date">
														</div>

														<div class="col-12">
															<div class="form__video">
																<label id="s1s1" for="form__video-upload1">Upload episode 1</label>
																<input data-name="#s1s1" id="form__video-upload1" name="s1s1" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
															</div>
														</div>
													</div>
												</div>
												<!-- end episode -->

												<!-- episode -->
												<div class="form__episode">
													<div class="row">
														<div class="col-12">
															<span class="form__title">Episode #2</span>
															<button class="form__delete" type="button">
																<i class="icon ion-ios-close"></i>
															</button>
														</div>

														<div class="col-12 col-md-6">
															<input type="text" class="form__input" placeholder="Episode title 2">
														</div>

														<div class="col-12 col-md-6">
															<input type="text" class="form__input" placeholder="Air date">
														</div>

														<div class="col-12 col-sm-8 col-md-9 col-xl-10">
															<div class="form__video">
																<label id="s1s2" for="form__video-upload2">Upload episode 2</label>
																<input data-name="#s1s2" id="form__video-upload2" name="s1s2" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
															</div>
														</div>

														<div class="col-12 col-sm-4 col-md-3 col-xl-2">
															<button class="form__btn form__btn--add">add episode</button>
														</div>
													</div>
												</div>
												<!-- end episode -->
											</div>
											<!-- end season -->
										</div>
									</div>
									<!-- end tv series -->

									<div class="col-12">
										<button type="submit" class="form__btn">publish</button>
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