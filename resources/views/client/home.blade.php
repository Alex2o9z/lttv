@extends('client.layouts.master')
@php
	$title = __('lang.home');
@endphp
@section('title',$title)

@section('content')

	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="{{asset('public/frontend/img/home/home__bg.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{asset('public/frontend/img/home/home__bg2.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{asset('public/frontend/img/home/home__bg3.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{asset('public/frontend/img/home/home__bg4.jpg')}}"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="home__title"><b>{{__('lang.newitems')}}</b> {{__('lang.ofthisseason')}}</h1>

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel">
						@if(session('lasest_items'))
						@php $count = 0; @endphp
						@foreach(session('lasest_items') as $key => $item)
							@if($count <= 6)
							<div class="item">
								<!-- card -->
								<div class="card card--big">
									<div class="card__cover">
										<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
										<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
											<i class="icon ion-ios-play"></i>
										</a>
									</div>
									<div class="card__content">
										<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
										<span class="card__category">
											@foreach(session('item_genres') as $key => $item_genre)
												@foreach(session('genres') as $key => $val)
													@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
													<a href="#">{{$val->title}}</a>
													@endif
												@endforeach
											@endforeach
										</span>
										<span class="card__rate">
											@if(session('rate'))
											@foreach(session('rate') as $key => $val)
												@if($val->item_id == $item->id)
												<i class="icon ion-ios-star"></i>
												{{$val->rate}}
												@endif
											@endforeach
											@endif</span>
									</div>
								</div>
								<!-- end card -->
							</div>
							@endif
							@php $count += 1; @endphp
						@endforeach
						@php $count = 0; @endphp
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">{{__('lang.newitems')}}</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">{{__('lang.newreleases')}}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">{{__('lang.movies')}}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">{{__('lang.tvseries')}}</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">{{__('lang.newreleases')}}</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">{{__('lang.movies')}}</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">{{__('lang.tvseries')}}</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row">
						@if(session('lasest_items'))
						@foreach(session('lasest_items') as $key => $item)
							<!-- card -->
							<div class="col-6 col-sm-12 col-lg-6">
								<div class="card card--list">
									<div class="row">
										<div class="col-12 col-sm-4">
											<div class="card__cover">
												<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
												<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
													<i class="icon ion-ios-play"></i>
												</a>
											</div>
										</div>

										<div class="col-12 col-sm-8">
											<div class="card__content">
												<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
												<span class="card__category">
													@foreach(session('item_genres') as $key => $item_genre)
														@foreach(session('genres') as $key => $val)
															@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
															<a href="#">{{$val->title}}</a>
															@endif
														@endforeach
													@endforeach
												</span>

												<div class="card__wrap">
													@if(session('rate'))
														@foreach(session('rate') as $key => $val)
															@if($val->item_id == $item->id)
															<span class="card__rate"><i class="icon ion-ios-star"></i>
															{{$val->rate}}
															</span>
															@endif
														@endforeach
													@endif

													<ul class="card__list">
														<li>{{$item->quality}}</li>
														<li>{{$item->age}}</li>
													</ul>
												</div>

												<div class="card__description">
													<p>{{$item->desc}}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end card -->
						@endforeach
						@endif
					</div>
				</div>

				<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
					<div class="row">
						@if(session('one_eposide'))
						@foreach(session('one_eposide') as $key => $item)
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
									<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
									<span class="card__category">
										@foreach(session('item_genres') as $key => $item_genre)
											@foreach(session('genres') as $key => $val)
												@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
												<a href="#">{{$val->title}}</a>
												@endif
											@endforeach
										@endforeach
									</span>
									@if(session('rate'))
										@foreach(session('rate') as $key => $val)
											@if($val->item_id == $item->id)
											<span class="card__rate"><i class="icon ion-ios-star"></i>
											{{$val->rate}}
											</span>
											@endif
										@endforeach
									@endif
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforeach
						@endif
					</div>
				</div>

				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">

						@if(session('many_eposide'))
						@foreach(session('many_eposide') as $key => $item)
						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
									<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
									<span class="card__category">
										@foreach(session('item_genres') as $key => $item_genre)
											@foreach(session('genres') as $key => $val)
												@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
												<a href="#">{{$val->title}}</a>
												@endif
											@endforeach
										@endforeach
									</span>
									@if(session('rate'))
										@foreach(session('rate') as $key => $val)
											@if($val->item_id == $item->id)
											<span class="card__rate"><i class="icon ion-ios-star"></i>
											{{$val->rate}}
											</span>
											@endif
										@endforeach
									@endif
								</div>
							</div>
						</div>
						<!-- end card -->
						@endforeach
						@endif
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</section>
	<!-- end content -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="{{asset('public/frontend/img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">{{__('lang.expectedpremiere')}}</h2>
				</div>
				<!-- end section title -->

				@if(session('many_eposide'))
				@foreach(session('many_eposide') as $key => $item)
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
							<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
							<span class="card__category">
								@foreach(session('item_genres') as $key => $item_genre)
									@foreach(session('genres') as $key => $val)
										@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
										<a href="#">{{$val->title}}</a>
										@endif
									@endforeach
								@endforeach
							</span>
							<span class="card__rate">
								@if(session('rate'))
									@foreach(session('rate') as $key => $val)
										@if($val->item_id == $item->id)
										<span class="card__rate"><i class="icon ion-ios-star"></i>
										{{$val->rate}}
										</span>
										@endif
									@endforeach
								@endif</span>
						</div>
					</div>
				</div>
				<!-- end card -->
				@endforeach
				@endif

				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">{{__('lang.allitem')}}</h2>
				</div>
				<!-- end section title -->

				@if(session('items'))
				@foreach(session('items') as $key => $item)
				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
							<a href="{{url('/item/show/'.$item->id)}}" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="#">{{$item->title}}</a></h3>
							<span class="card__category">
								@foreach(session('item_genres') as $key => $item_genre)
									@foreach(session('genres') as $key => $val)
										@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
										<a href="#">{{$val->title}}</a>
										@endif
									@endforeach
								@endforeach
							</span>
							<span class="card__rate">
								@if(session('rate'))
									@foreach(session('rate') as $key => $val)
										@if($val->item_id == $item->id)
										<span class="card__rate"><i class="icon ion-ios-star"></i>
										{{$val->rate}}
										</span>
										@endif
									@endforeach
								@endif</span>
						</div>
					</div>
				</div>
				<!-- end card -->
				@endforeach
				@endif

				<!-- section btn -->
				<div class="col-12">
					<!-- <a href="#" class="section__btn">Show more</a> -->
					{{ session('items')->onEachSide(2)->links() }}
				</div>
				<!-- end section btn -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->

	<!-- partners -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">{{__('lang.ourpartners')}}</h2>
				</div>
				<!-- end section title -->

				<!-- section text -->
				<div class="col-12">
					<p class="section__text section__text--last-with-margin">{{__('lang.partnerdesc')}}</p>
				</div>
				<!-- end section text -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/themeforest-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/audiojungle-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/codecanyon-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/photodune-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/activeden-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->

				<!-- partner -->
				<div class="col-6 col-sm-4 col-md-3 col-lg-2">
					<a href="#" class="partner">
						<img src="{{asset('public/frontend/img/partners/3docean-light-background.png')}}" alt="" class="partner__img">
					</a>
				</div>
				<!-- end partner -->
			</div>
		</div>
	</section>
	<!-- end partners -->

@endsection