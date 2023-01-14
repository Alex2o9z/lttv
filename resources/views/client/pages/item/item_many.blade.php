@extends('client.layouts.master')
@php
	$title = __('lang.home');
	$item = session('item');
@endphp
@section('title',$item->title)

@section('content')
	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="{{asset('public/frontend/img/home/home__bg.jpg')}}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">{{$item->title}}</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src="{{asset('public/storage/uploads/item/'.$item->poster)}}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>{{session('rate')->rate}}</span>

										<ul class="card__list">
											<li>{{$item->quality}}</li>
											<li>{{$item->age}}</li>
											<li>{{$item->view}} Views</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span>
											@foreach(session('item_genres') as $key => $item_genre)
												@foreach(session('genres') as $key => $val)
													@if($val->id == $item_genre->genre_id && $item_genre->item_id == $item->id)
													<a href="#">{{$val->title}}</a>
													@endif
												@endforeach
											@endforeach</li>
										<li><span>Release year:</span> {{$item->release_year}}</li>
										<li><span>Running time:</span> {{$item->running_time}} min</li>
										<li><span>Country:</span> 
											@foreach(session('item_countries') as $key => $item_country)
												@foreach(session('countries') as $key => $val)
													@if($val->id == $item_country->country_id && $item_country->item_id == $item->id)
													<a href="#">{{$val->nicename}}</a>
													@endif
												@endforeach
											@endforeach </li>
									</ul>

									<div class="card__description card__description--details">
										{{$item->desc}}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						@if(session('video560p'))
						<source src="{{session('video560p')->link}}" type="video/mp4" size="{{session('video560p')->size}}"> @endif
						@if(session('video720p'))
						<source src="{{session('video720p')->link}}" type="video/mp4" size="{{session('video720p')->size}}"> @endif
						@if(session('video1080p'))
						<source src="{{session('video1080p')->link}}" type="video/mp4" size="{{session('video1080p')->size}}"> @endif
						@if(session('video1440p'))
						<source src="{{session('video1440p')->link}}" type="video/mp4" size="{{session('video1440p')->size}}"> @endif

						<!-- Fallback for browsers that don't support the <video> element -->
						@if(session('video1440p'))
						<a href="{{session('trailer')->link}}" download>Download</a> @endif
					</video>
				</div>
				<!-- end player -->

				<!-- accordion -->
				<div class="col-12 col-xl-6">
					<div class="accordion" id="accordion">
						<div class="accordion__card">
							<div class="card-header" id="headingOne">
								<button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<span>Season: 1</span>
									<span>22 Episodes from Nov, 2004 until May, 2005</span>
								</button>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingTwo">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<span>Season: 2</span>
									<span>24 Episodes from Sep, 2005 until May, 2006</span>
								</button>
							</div>

							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingThree">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<span>Season: 3</span>
									<span>24 Episodes from Sep, 2006 until May, 2007</span>
								</button>
							</div>

							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="accordion__card">
							<div class="card-header" id="headingFour">
								<button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<span>Season: 4</span>
									<span>16 Episodes from Sep, 2007 until May, 2008</span>
								</button>
							</div>

							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
								<div class="card-body">
									<table class="accordion__list">
										<thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Air Date</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<th>1</th>
												<td>Pilot</td>
												<td>Tuesday, November 16th, 2004</td>
											</tr>
											<tr>
												<th>2</th>
												<td>Paternity</td>
												<td>Tuesday, November 23rd, 2004</td>
											</tr>
											<tr>
												<th>3</th>
												<td>Occam's Razor</td>
												<td>Tuesday, November 30th, 2004</td>
											</tr>
											<tr>
												<th>4</th>
												<td>Maternity</td>
												<td>Tuesday, December 7th, 2004</td>
											</tr>
											<tr>
												<th>5</th>
												<td>Damned If You Do</td>
												<td>Tuesday, December 14th, 2004</td>
											</tr>
											<tr>
												<th>6</th>
												<td>The Socratic Method</td>
												<td>Tuesday, December 21st, 2004</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end accordion -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Discover</h2>
						<!-- end content title -->

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="Comments">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Comments</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Reviews</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Photos</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>
		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configur" data-width="" data-numposts="10">

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- comments -->
								<div class="col-12">
									<div class="comments">
										<ul class="comments__list">
											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">30.08.2018, 17:53</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>

														<button type="button">7<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item comments__item--answer">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">24.08.2018, 16:41</span>
												</div>
												<p class="comments__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>8</button>

														<button type="button">3<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item comments__item--quote">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">11.08.2018, 11:11</span>
												</div>
												<p class="comments__text"><span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</span>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>11</button>

														<button type="button">1<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">07.08.2018, 14:33</span>
												</div>
												<p class="comments__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>99</button>

														<button type="button">35<i class="icon ion-md-thumbs-down"></i></button>
													</div>

													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>

											<li class="comments__item">
												<div class="comments__autor">
													<img class="comments__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="comments__name">John Doe</span>
													<span class="comments__time">02.08.2018, 15:24</span>
												</div>
												<p class="comments__text">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
												<div class="comments__actions">
													<div class="comments__rate">
														<button type="button"><i class="icon ion-md-thumbs-up"></i>74</button>

														<button type="button">13<i class="icon ion-md-thumbs-down"></i></button>
													</div>
													
													<button type="button"><i class="icon ion-ios-share-alt"></i>Reply</button>
													<button type="button"><i class="icon ion-ios-quote"></i>Quote</button>
												</div>
											</li>
										</ul>

										<form action="#" class="form">
											<textarea id="text" name="text" class="form__textarea" placeholder="Add comment"></textarea>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end comments -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
							<div class="row">
								<!-- reviews -->
								<div class="col-12">
									<div class="reviews">
										<ul class="reviews__list">
											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>8.4</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>9.0</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>

											<li class="reviews__item">
												<div class="reviews__autor">
													<img class="reviews__avatar" src="{{asset('public/frontend/img/user.png')}}" alt="">
													<span class="reviews__name">Best Marvel movie in my opinion</span>
													<span class="reviews__time">24.08.2018, 17:53 by John Doe</span>

													<span class="reviews__rating"><i class="icon ion-ios-star"></i>7.5</span>
												</div>
												<p class="reviews__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
											</li>
										</ul>

										<form action="#" class="form">
											<input type="text" class="form__input" placeholder="Title">
											<textarea class="form__textarea" placeholder="Review"></textarea>
											<div class="form__slider">
												<div class="form__slider-rating" id="slider__rating"></div>
												<div class="form__slider-value" id="form__slider-value"></div>
											</div>
											<button type="button" class="form__btn">Send</button>
										</form>
									</div>
								</div>
								<!-- end reviews -->
							</div>
						</div>

						<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
							<!-- project gallery -->
							<div class="gallery" itemscope>
								<div class="row">
									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-1.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="{{asset('public/frontend/img/gallery/project-1.jpg')}}" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 1</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-2.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="{{asset('public/frontend/img/gallery/project-2.jpg')}}" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 2</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-3.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="{{asset('public/frontend/img/gallery/project-3.jpg')}}" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 3</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-4.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="{{asset('public/frontend/img/gallery/project-4.jpg')}}" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 4</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="{{asset('public/frontend/img/gallery/project-5.jpg')}}" itemprop="contentUrl" data-size="1920x1280">
											<img src="img/gallery/project-5.jpg" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 5</figcaption>
									</figure>
									<!-- end gallery item -->

									<!-- gallery item -->
									<figure class="col-12 col-sm-6 col-xl-4" itemprop="associatedMedia" itemscope>
										<a href="img/gallery/project-6.jpg" itemprop="contentUrl" data-size="1920x1280">
											<img src="{{asset('public/frontend/img/gallery/project-6.jpg')}}" itemprop="thumbnail" alt="Image description" />
										</a>
										<figcaption itemprop="caption description">Some image caption 6</figcaption>
									</figure>
									<!-- end gallery item -->
								</div>
							</div>
							<!-- end project gallery -->
						</div>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">You may also like...</h2>
						</div>
						<!-- end section title -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
									<span class="card__category">
										<a href="#">Action</a>
										<a href="#">Triler</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover2.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Benched</a></h3>
									<span class="card__category">
										<a href="#">Comedy</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover3.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Whitney</a></h3>
									<span class="card__category">
										<a href="#">Romance</a>
										<a href="#">Drama</a>
										<a href="#">Music</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover4.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Blindspotting</a></h3>
									<span class="card__category">
										<a href="#">Comedy</a>
										<a href="#">Drama</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover5.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
									<span class="card__category">
										<a href="#">Action</a>
										<a href="#">Triler</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
						<!-- end card -->

						<!-- card -->
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="{{asset('public/frontend/img/covers/cover6.jpg')}}" alt="">
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">Benched</a></h3>
									<span class="card__category">
										<a href="#">Comedy</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->