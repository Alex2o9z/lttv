	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="{{ route('home')}}" class="header__logo">
								<!-- <img src="{{asset('public/frontend/img/logo.svg')}}" alt=""> -->
								<h1><span class="logo-text-1">LT</span><span class="logo-text-2">tv</span></h1>
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('lang.home')}}</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
										<li><a href="index.html">Home slideshow bg</a></li>
										<li><a href="index2.html">Home static bg</a></li>
									</ul>
								</li>
								<!-- end dropdown -->

								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('lang.catalog')}}</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
										<li><a href="catalog1.html">Catalog Grid</a></li>
										<li><a href="catalog2.html">Catalog List</a></li>
										<li><a href="details1.html">Details Movie</a></li>
										<li><a href="details2.html">Details TV Series</a></li>
									</ul>
								</li>
								<!-- end dropdown -->

								<li class="header__nav-item">
									<a href="{{route('client.pricing')}}" class="header__nav-link">{{ __('lang.pricing')}}</a>
								</li>

								<li class="header__nav-item">
									<a href="faq.html" class="header__nav-link">{{__('lang.help')}}</a>
								</li>

								@if(session('locale') == 'vi')
									<li class="header__nav-item">
										<a href="{{url('lang/en')}}" class="header__nav-link">{{session('locale')}}</a>
									</li>
								@else
									<li class="header__nav-item">
										<a href="{{url('lang/vi')}}" class="header__nav-link">{{session('locale')}}</a>
									</li>
								@endif

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.html">{{__('lang.aboutus')}}</a></li>
										<!-- <li><a href="404.html">404 Page</a></li> -->
										<li>
											@if(session('locale') == 'vi')
												<a href="{{url('lang/en')}}">Tiếng Anh</a>
											@else
												<a href="{{url('lang/vi')}}">Vietnamese</a>
											@endif
										</li>
										@if(Route::has('login'))
											@auth
												@if(Auth::user()->level == 1)
												<li><a href="{{route('admin.home')}}">Go to Dashboard</a></li>
												@endif
											@endauth
										@endif
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>

								@if (Route::has('login'))
									@auth
										<!-- header User -->
										<a href="#" class="header__sign-in" id="dropdownMenuUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<img class="header__avatar" src="{{asset('public/frontend/img/user.svg')}}" alt="">
											<span>&nbsp; {{ Auth::user()->name }}</span>
										</a>

										<ul style="width: auto;" class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuUser">
											<li><a href="about.html">{{__('lang.info')}}</a></li>
											<li><a href="about.html">{{__('lang.setting')}}</a></li>
											
											<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{__('lang.sign_out')}}</a>
											</li>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                        	@csrf
	                                        </form>
										</ul>
										<!-- end header User -->
									@else
										<a href="{{ route('login') }}" class="header__sign-in">
											<i class="icon ion-ios-log-in"></i>
											<span>{{__('lang.sign_in')}}</span>
										</a>
										@if (Route::has('register'))
											<!-- <a href="{{ route('login') }}" class="header__sign-up">
												<i class="icon ion-ios-create"></i>
												<span>sign up</span>
											</a> -->
										@endif
									@endauth
								@endif

							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="#" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->
