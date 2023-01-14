	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<a href="index.html" class="sidebar__logo">
			<!-- <img src="{{asset('public/admin/img/logo.svg')}}" alt=""> -->
			<h1><span class="logo-text-1">LT</span><span class="logo-text-2">tv</span></h1>
		</a>
		<!-- end sidebar logo -->
		
		<!-- sidebar user -->
		<div class="sidebar__user">
			<div class="sidebar__user-img">
				<img src="{{asset('public/admin/img/user.svg')}}" alt="">
			</div>

			<div class="sidebar__user-title">
				@if (Route::has('login'))
					@auth
						<span>Admin</span>
						<p>{{ Auth::user()->name }}</p>
					@endauth
				@endif
			</div>

			<button class="sidebar__user-btn" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
				<i class="icon ion-ios-log-out"></i>
			</button>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            	@csrf
            </form>
		</div>
		<!-- end sidebar user -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="@if(session('index') == 'dashboard') # @else {{route('admin.dashboard')}} @endif" class="sidebar__nav-link @if(session('index') == 'dashboard') sidebar__nav-link--active @endif"><i class="icon ion-ios-keypad"></i> {{__('lang.dashboard')}}</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="{{route('admin.item.list')}}" class="sidebar__nav-link @if(session('index') == 'catalog') sidebar__nav-link--active @endif"><i class="icon ion-ios-film"></i> {{__('lang.catalog')}}</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="users.html" class="sidebar__nav-link @if(session('index') == 'users') sidebar__nav-link--active @endif"><i class="icon ion-ios-contacts"></i> {{__('lang.users')}}</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="comments.html" class="sidebar__nav-link @if(session('index') == 'comments') sidebar__nav-link--active @endif"><i class="icon ion-ios-chatbubbles"></i> {{__('lang.comments')}}</a>
			</li>

			<li class="sidebar__nav-item">
				<a href="reviews.html" class="sidebar__nav-link @if(session('index') == 'reviews') sidebar__nav-link--active @endif"><i class="icon ion-ios-star-half"></i> {{__('lang.reviews')}}</a>
			</li>

			<li class="dropdown sidebar__nav-item">
				<a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-folder-open"></i> {{__('lang.categories')}}</a>

				<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownCategory">
					<li><a href="{{route('admin.genre.add')}}">Genres Add</a></li>
					<li><a href="{{route('admin.genre.list')}}">Genres List</a></li>
					<li><a href="{{route('admin.category.add')}}">Category Item Add</a></li>
					<li><a href="{{route('admin.category.list')}}">Category Item List</a></li>
					<li><a href="#">Category Post</a></li>
					<li><a href="#">Category Post List</a></li>
				</ul>
			</li>
			
			<!-- dropdown -->
			<li class="dropdown sidebar__nav-item">
				<a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-copy"></i> {{__('lang.pages')}}</a>

				<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
					<li><a href="{{route('admin.item.add')}}">Add item</a></li>
					<li><a href="edit-user.html">Edit user</a></li>
					<li><a href="{{route('home')}}">Go to Homepage</a></li>
					<li><a href="signin.html">Sign In</a></li>
					<li><a href="signup.html">Sign Up</a></li>
					<li><a href="forgot.html">Forgot password</a></li>
					<li><a href="404.html">404 Page</a></li>
				</ul>
			</li>

			<!-- dropdown -->
			<li class="dropdown sidebar__nav-item">
				<a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-globe"></i> {{__('lang.lang')}}</a>

				<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownLanguage">
					@if(session('locale') == 'vi')
						<li><a href="{{url('lang/vi')}}">
								<strong>{{__('lang.vi')}}</strong>
							</a></li>
						<li><a href="{{url('lang/en')}}">{{__('lang.en')}}</a></li>
					@else
						<li><a href="{{url('lang/vi')}}">{{__('lang.vi')}}</a></li>
						<li><a href="{{url('lang/en')}}">
								<strong>{{__('lang.en')}}</strong>
							</a></li>
					@endif
				</ul>
			</li>
			<!-- end dropdown -->
		</ul>
		<!-- end sidebar nav -->
		
		<!-- sidebar copyright -->
		<div class="sidebar__copyright">© {{now()->year}} LTtv. <br>Developed by <a href="" target="_blank">LT team</a></div>

		<!-- end sidebar copyright -->
	</div>
	<!-- end sidebar -->